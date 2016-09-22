<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/18
 * Time: 上午11:53
 */

require_once APPPATH.'third_party/qiniu-php-sdk-7.0.7/autoload.php' ;
// 引入鉴权类
use Qiniu\Auth;
// 引入上传类
//use Qiniu\Storage\UploadManager;
class Image extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->ERC_OK					= Ecode::OK;
        $this->ERC_UPLOAD_FAIL			= Ecode::UPLOAD_FAIL;
        $this->UN_ATTACHED_PID          = -1 ;
    }

    public function get_private_qiniu_uptoken() {
        $accessKey = '7CG_9kNYFgQ8j4RD6-rg4TE6kOLl1y0BgYdk3lnZ';
        $secretKey = 'DNNTH52lFKgEiIaZvkMspVPbjznfk4eS5K8cWlZ0';

        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);

        // 要上传的空间
        $bucket = 'qsctrip-private';

        $uptoken = $auth->uploadToken($bucket);
        $ary = array('uptoken' => $uptoken) ;
        echo json_encode($ary) ;
    }

    public function get_general_qiniu_uptoken() {
        $accessKey = '7CG_9kNYFgQ8j4RD6-rg4TE6kOLl1y0BgYdk3lnZ';
        $secretKey = 'DNNTH52lFKgEiIaZvkMspVPbjznfk4eS5K8cWlZ0';

        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);

        // 要上传的空间
        $bucket = 'qsctrip';

		$uptoken = $auth->uploadToken($bucket);
        $ary = array('uptoken' => $uptoken) ;
        echo json_encode($ary) ;
    }

    /**
     * 获取七牛uptoken
     */
    public function get_qiniu_uptoken() {
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
        $p_type = $this->input->get_post('p_type') ;
        if( !$this->ptype->is_validate($p_type) ) {
            die(h_echo_json(Ecode::C2S_ARG_ERR)) ;
        }

        if(!isset($pid) || $pid <= 0) {
            $pid = $this->UN_ATTACHED_PID ;
        }
        // 上传文件到七牛后， 七牛将文件名和文件大小回调给业务服务器
        $policy = array(
            'callbackUrl' => 'http://api.qsctrip.com/image/callback?token='.$token.'&type='.$type,
            'callbackBody' => '{"fkey":"$(key)", "pid":'.$pid.',"p_type":'.$p_type. '}'
        );
        $uptoken = $auth->uploadToken($bucket, null, 3600, $policy);
//		$uptoken = $auth->uploadToken($bucket);
        $ary = array('uptoken' => $uptoken) ;
        echo json_encode($ary) ;
    }

    public function get_upload_key() {
        // 2016 * 30 = 60480
        $id = base64_encode(60480 +  $GLOBALS['user_id']) ;
        $time = base64_encode(microtime(TRUE)) ;
        $key = strlen($id).$id.strlen($time).$time ;
        h_echo_json($this->ERC_OK, array('key' => $key)) ;
    }

    public function callback() {
        $_body = file_get_contents('php://input');
        $body = json_decode($_body, true);

        $pid = $body['pid'];
        $fkey = $body['fkey'];
        $p_type = $body['p_type'];
        $this->load->model('product_model') ;
//        $this->load->model('atomic/pd_travels_imgs_atomic_model', 'pd_travels_imgs_atomic_model') ;
        $rst = $this->product_model->add_img($p_type, $pid, $fkey) ;

        header('Content-Type: application/json');
        if($rst === false) {
            http_response_code(500);
            echo json_encode('please retry');
        } else {
            $attached = $this->UN_ATTACHED_PID!=$pid ;
            $resp = array('ret' => 'success', 'key' => $fkey , 'id' => $rst, '$pid' => $pid, 'attached' => $attached);  // 添加key，否则有回调和没有回调的返回数据结果不一致
            echo json_encode($resp);
        }
    }

    public function del_img() {
        $id = $this->input->get_post('id') ;
        $pid = $this->input->get_post('pid') ;
        $p_type = $this->input->get_post('p_type') ;
        $uid = $GLOBALS['user_id'];

        $this->load->model('product_model') ;
        $rst = $this->product_model->del_img($uid, $p_type, $id, $pid) ;
        if( isset($rst['affected_rows']) ) {
            h_echo_json(Ecode::OK, array(), '删除图片成功') ;
        } else {
            h_echo_json(Ecode::DELETE_FAIL, array(), '删除图片失败') ;
        }
    }



}