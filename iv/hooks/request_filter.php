<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Request_filter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
//		$this->load->model('token_model');
//		$this->ERC_BAD_REQUEST				= Ecode::BAD_REQUEST; //非法请求
//		$this->ERC_BAD_REQUEST_TOKEN		= Ecode::BAD_REQUEST_TOKEN; //Token无效
//		$this->ERC_BAD_REQUEST_TOKEN_TIME	= Ecode::BAD_REQUEST_TOKEN_TIME; //Token过期
//		$this->ERC_BAD_REQUEST_WARNING		= Ecode::BAD_REQUEST_WARNING; //警告:没有Token且越过强制校验
	}

	public function token_destructor()
	{

//		$GLOBALS['user_id'] = 0;
//		$token = $this->input->get_post('token', TRUE);
//		if (FALSE !== $token)
//		{
//			$expiry_time = time() - 31536000; //86400 * 365; //Token有效期一年
//			$user_id = 0 ;
//			$create_time = 0 ;
//			$model_erc = $this->token_model->get_user_id_create_time($user_id, $create_time, $token);
//			if (0 !== $model_erc || 0 === $user_id || 0 === $create_time)
//			{
//				exit(h_echo_json($this->ERC_BAD_REQUEST_TOKEN));
//			}
//			elseif ($expiry_time > $create_time)
//			{
//				exit(h_echo_json($this->ERC_BAD_REQUEST_TOKEN_TIME));
//			}
//			$GLOBALS['user_id'] = (int)$user_id;
////			$GLOBALS['user_id'] = 1;//(int)$user_id;
//		}
//		else
//		{
//			$method = $this->uri->segment(2);
//			$method_arr = array(
//				'set_comment' => '评论需先登录',
//				'set_laud' => '点赞需先登录',
//				'set_comment_laud' => '同上',
//				'set_topic' => '发布需先登录',
//				'set_timeline' => '同上',
//				'set_nickname' => '用户修改操作需先登录',
//				'set_brief' => '同上',
//				'set_role_reversal' => '同上',
//				'set_setting' => '同上'
//			);
//
//			//强制校验的Methods
//			if (array_key_exists((string)$method, $method_arr))
//			{
//				exit(h_echo_json($this->ERC_BAD_REQUEST));
//			}
//			$controller = $this->uri->segment(1);
//			$controller_arr = array(
//				'relation' => '获取或改变用户关系,需先登录',
//				'upload' => '上传需先登录'
//			);//强制校验的Controllers
//			if (array_key_exists($controller, $controller_arr))
//			{
//				exit(h_echo_json($this->ERC_BAD_REQUEST));
//			}
//			$ignore_controller_arr = array(
//				'recommend' => '推荐',
//				'engine' => '系统',
//				'captcha' => '验证码',
//				'search' => '搜索',
//				'login' => '登录'
//			);//无需校验的Controllers
//			$ignore_method_arr = array(
//				'get_timeline_list' => '获取时间线列表',
//				'get_comment_list' => '获取评论列表',
//				'get_category_list' => '获取话题类目列表',
//				'get_topic_list' => '获取话题列表',
//				'get_topic' => '获取话题详情'
//			);//无需校验的Methods
//			if (!array_key_exists($controller, $ignore_controller_arr) && !array_key_exists((string)$method, $ignore_method_arr))
//			{
//				Ecode::logs($this->ERC_BAD_REQUEST_WARNING, __METHOD__, 'token='.$token, 'method='.$method.'&controller='.$controller);
//			}
//		}
		return;
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
