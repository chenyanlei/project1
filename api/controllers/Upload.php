<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'third_party/qiniu-php-sdk-7.0.7/autoload.php' ;
// 引入鉴权类
use Qiniu\Auth;
// 引入上传类
//use Qiniu\Storage\UploadManager;


class Upload extends CI_Controller
{
	private $current_login_user_id = -1;
	public function __construct()
	{
		parent::__construct();
		$this->ERC_OK					= Ecode::OK;
		$this->ERC_UPLOAD_FAIL			= Ecode::UPLOAD_FAIL;
	}

	public function set_upload()
	{
//		// 指定允许其他域名访问
//		header('Access-Control-Allow-Origin:*');
//		// 响应类型
//		header('Access-Control-Allow-Methods:POST');
//		// 响应头设置
//		header('Access-Control-Allow-Headers:x-requested-with,content-type');

		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
		header('Cache-Control: no-cache');
		header('Access-Control-Max-Age: 1000');
		header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');


//		var_dump($_FILES) ;

		$this->current_login_user_id	= $GLOBALS['user_id'] + 4032 ;// 2016*2=4032 //无需判断,hooks/request_filter.php已显性赋值
		$this->load->helper('dir');
		$dir_erc = h_get_user_dir($user_dir, $this->current_login_user_id);
		if (0 !== $dir_erc)
		{
			h_echo_json($dir_erc); //获取用户图片目录失败
			exit;
		}
		$config['upload_path'] = $user_dir;
		$config['file_name'] = $this->current_login_user_id.'_'.microtime(TRUE).'.png';
		$config['allowed_types'] = '*';
		$config['overwrite'] = TRUE;
		$config['max_size'] = '2048'; //2048k == 2M
		$this->load->library('upload', $config);

		$url = URL_IMG_USER.$this->current_login_user_id.DIRECTORY_SEPARATOR.$config['file_name'];
		if (!$this->upload->do_upload('data'))
		{
			$errors = $this->upload->display_errors();
			h_echo_json($this->ERC_UPLOAD_FAIL, array('err' => $errors));
			Ecode::logs($this->ERC_UPLOAD_FAIL, __METHOD__, 'user_id='.$this->current_login_user_id, 'url='.$url);
			exit;
		}
		$id = $this->insert_to_db($url) ;

		$callback = $pid = $this->input->post('callback') ;

		h_echo_json($this->ERC_OK, array('url'=>$url,'id'=>$id),'',true,$callback);
	}

//	public function get_upload_key() {
//		// 2016 * 30 = 60480
//		$id = base64_encode(60480 +  $GLOBALS['user_id']) ;
//		$time = base64_encode(microtime(TRUE)) ;
//		$key = strlen($id).$id.strlen($time).$time ;
//		h_echo_json($this->ERC_OK, array('key' => $key)) ;
//	}

	private function insert_to_db($url) {
		$pid = $this->input->post('pid') ;
		$ary = array('url' => $url) ;
		if(isset($pid) && $pid !== 0) {
			$ary['pid'] = $pid ;
		}
		$this->load->model('atomic/pd_travels_imgs_atomic_model','travels_imgs_atomic_model') ;
		$rst = $this->travels_imgs_atomic_model->ins($ary) ;
		return isset($rst['insert_id'])?$rst['insert_id']:0;
	}

	public function test_set_upload()
	{
		$data['token'] = $this->input->get_post('token', TRUE);
		$this->load->view('test_set_upload', $data);
	}

	public function callback() {
		$_body = file_get_contents('php://input');
		$body = json_decode($_body, true);

//		$uid = $body['uid'];
//		$fname = $body['fname'];
//		$fkey = $body['fkey'];
//		$desc = $body['desc'];
//		$ary = array('uid' => $uid,
//			'fname' => $fname,
//			'fkey' => $fkey,
//			'desc' => $desc) ;

//		$pid = -1;
//		$fkey = $_body ;//$this->input->get('fkey');

		$pid = $body['pid'];
		$fkey = $body['fkey'];
		$this->load->model('atomic/pd_travels_imgs_atomic_model', 'pd_travels_imgs_atomic_model') ;
		$rst = $this->pd_travels_imgs_atomic_model->add_img($pid, $fkey) ;

		$attached = $pid != -1 ;

		header('Content-Type: application/json');
		if($rst === false) {
			http_response_code(500);
			echo json_encode('please retry');
		} else {
			$resp = array('ret' => 'success', 'key' => $fkey , 'id' => $rst, '$pid' => $pid, 'attached' => $attached);  // 添加key，否则有回调和没有回调的返回数据结果不一致
			echo json_encode($resp);
		}
	}

	/**
	 * 获取七牛uptoken
	 */
	public function get_qiniu_uptoken() {
		// 需要填写你的 Access Key 和 Secret Key
//		$accessKey = 'ZKh3You5caRZRrMK9-iz5iG6y3QjdEdzZNuBMwH3';
//		$secretKey = 'MqaY8h1E-bs3SYgF_F4T4QhAk78wAlGSa4EMmOGm';
//		$accessKey = 'cT-t2FmJAbM8DBVUHRAxZpI-vHlmxD0A5tXusecA';
//		$secretKey = 'RBmYq-0B97SFmM1T4-yeoeppuC1U4D8YI6MGQPL4';

		$accessKey = '7CG_9kNYFgQ8j4RD6-rg4TE6kOLl1y0BgYdk3lnZ';
		$secretKey = 'DNNTH52lFKgEiIaZvkMspVPbjznfk4eS5K8cWlZ0';


		// 构建鉴权对象
		$auth = new Auth($accessKey, $secretKey);

		// 要上传的空间
		$bucket = 'qsctrip';
//		$bucket = 'test';

		$token = $this->input->get_post('token') ;
		$type = $this->input->get_post('type') ;
		$pid = $this->input->get_post('pid') ;
		if(!isset($pid) || $pid <= 0) {
			$pid = -1 ;
		}
		// 上传文件到七牛后， 七牛将文件名和文件大小回调给业务服务器
		$policy = array(
			'callbackUrl' => 'http://api.qsctrip.com/upload/callback?token='.$token.'&type='.$type,
			'callbackBody' => '{"fkey":"$(key)", "pid":'.$pid. '}'
//				'callbackBody' => '{"fname":"$(fname)", "fkey":"$(key)", "desc":"$(x:desc)", "uid":' . $GLOBALS['user_id']. '}'
		);
		$uptoken = $auth->uploadToken($bucket, null, 3600, $policy);

//		$uptoken = $auth->uploadToken($bucket);


//		h_echo_json(Ecode::OK,array('uptoken' => $token)) ;
		$ary = array('uptoken' => $uptoken) ;
		echo json_encode($ary) ;
	}

	public function refresh_qiniu_token() {

		$rst = '' ;
//		h_curl($rst, )
	}

	public function test_upload_to_qiniu() {
		$this->load->view('upload/up_to_qiniu');
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
