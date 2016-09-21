<?php

class Request_openid{

	public $cfg = array();

	public function __construct()
	{
		$CI =& get_instance();
		$CI->config->load('application', TRUE);
		$this->cfg = $CI->config->item('wx', 'application');
	}

	function get_openid(){
		$user_agent = $_SERVER['HTTP_USER_AGENT'];//获取浏览器信息
		if (strpos($user_agent, 'MicroMessenger')){
			if($_GET['code']){
				$appId      = $this->cfg['app_id'];
				$appsecret  = $this->cfg['app_secret'];
				$apiurl = $this->cfg['api_url'];
				$code=$_GET['code'];//echo $code;
				$url=$apiurl.'access_token?appid='.$appId.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code';
				
				$getopenid = file_get_contents($url);
				$openidinfo=json_decode($getopenid);
				$openid=$openidinfo->openid;
				$_SESSION['openid']=$openid;
			}
		}
	}

	function get_wx_code($redirecturl) {
		$code=$_GET['code'] ;
		if(isset($code)) {
			return ;
		}

	    $encodeurl=urlencode($redirecturl);
	    $appid=$this->cfg['app_id'];
	    $openurl=$this->cfg['open_url'];
	    $getcodeurl=$openurl.'authorize?appid='.$appid.'&redirect_uri='.$encodeurl.'&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect';

		//    echo var_dump($getcodeurl) ;
	    header('location:'.$getcodeurl) ;
//		var_dump($redirecturl);
	}

	function get_return($redirecturl){
			if(!$_SESSION['openid']){
				$this->get_wx_code($redirecturl);
				$this->get_openid();
			}
	}

	function band_openid(){
		if($_SESSION['openid']){
			$data = array();
			$data['openid']=$_SESSION['openid'];
			$data['from'] = 'wx_web';
			$data['key'] = md5("openid".$data['openid']."from".$data['from'].Ptype::SECRIT_KEY) ;
			$url = URL_API.'wx_user/get_user_info';
			$content= h_curl($url,$data);
			$info = json_decode($content,true);
			if($info['result']['err'] === 0){
				$_SESSION['userinfo'] = $info['content'];
				$_SESSION['token'] = $info['content']['token'];
			}else{
				$data['msg'] = $info['result']['err'].':'.$info['result']['msg'];
				$this->load->view('/webapp/error/other_error.html',$data);
			}
		}
	}

}