<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Im
{
	private $client_id;
	private $client_secret;
	private $url;

	public function __construct()
	{
		$CI =& get_instance();
		$CI->load->helper('curl');
		$CI->config->load('application', TRUE);
		$cfg = $CI->config->item('easemob', 'application');

		$this->client_id = $cfg['client_id'];
		$this->client_secret = $cfg['client_secret'];
		$this->url = $cfg['url'];
	}

	/**
	 * 开放注册模式,已为App改写@2015-07-05
	 *
	 * @param $args['username'] 用户名        	
	 * @param $args['nickname'] 昵称
	 * @param $args['password'] 密码        	
	 * @return string
	 */
	public function open_register(&$result, $args)
	{
		$url = $this->url.'users';
		$curl_ret = h_curl($result, $url, $args);
		return $curl_ret;
	}

	/**
	 * 修改指定用户名的昵称,已为App改写@2015-07-05
	 *
	 * @param $args['username'] 用户名        	
	 * @param $args['nickname'] 昵称
	 * @return string
	 */
	public function change_nickname($username, $nickname)
	{
		$url = $this->url.'users/'.$username;
		$token = $this->get_token();
		$header = 'Authorization: Bearer '.$token;
		$args = array('nickname'=>$nickname);
		$curl_erc = h_curl($curl_result, $url, $args, $header, 'PUT');
		if (0 !== $curl_erc)
		{
			Ecode::logs($curl_erc, __METHOD__, 'user_id='.$username, ' nickname='.$nickname.' curl_result='.$curl_result);
		}
		return $curl_erc;
	}

	/**
	 * 获取指定用户详情,已为App改写@2015-08-05
	 *
	 * @param $curl_result 用户名
	 * @param $username 用户名
	 *
	 * @return fixed
	 */
	public function get_user(&$curl_result, $username)
	{
		$url = $this->url.'users/'.$username;
		$token = $this->get_token();
		$header = 'Authorization: Bearer '.$token;
		//$result = $this->postCurl ( $url, '', $header, $type = 'GET' );
		$curl_erc = h_curl($curl_result, $url, '', $header, 'GET');
		if (0 !== $curl_erc)
		{
			Ecode::logs($curl_erc, __METHOD__, 'username='.$username, 'curl_result='.$curl_result);
		}
		return $curl_erc;
	}

	/**
	 * 获取Token,已为App改写@2015-07-05
	 * @return string
	 */
	public function get_token()
	{
		$args['grant_type'] = 'client_credentials';
		$args['client_id'] = $this->client_id;
		$args['client_secret'] = $this->client_secret;
		$url = $this->url.'token';
		$curl_erc = h_curl($curl_result, $url, $args);
		if (0 !== $curl_erc)
		{
			Ecode::logs($curl_erc, __METHOD__, '', 'args='.implode(',', $args).' url='.$url.' curl_result='.$curl_result);
		}
		$tk_res = json_decode($curl_result, TRUE);
		return $tk_res['access_token'];
	}

	/**
	 * 获取指定用户详情
	 *
	 * @param $username 用户名        	
	 */
	public function userDetails($username) {
		$url = $this->url . "users/" . $username;
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, '', $header, $type = 'GET' );
		return $result;
	}

	/**
	 * 授权注册模式 || 批量注册
	 *
	 * @param $options['username'] 用户名        	
	 * @param $options['password'] 密码
	 *        	批量注册传二维数组
	 */
	public function accreditRegister($options) {
		$url = $this->url . "users";
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, $options, $header );
		return $result;
	}
	
	/**
	 * 重置用户密码
	 *
	 * @param $options['username'] 用户名        	
	 * @param $options['password'] 密码        	
	 * @param $options['newpassword'] 新密码        	
	 */
	public function editPassword($options) {
		$url = $this->url . "users/" . $options ['username'] . "/password";
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, $options, $header, $type = 'PUT');
		return $result;
	}
	/**
	 * 删除用户
	 *
	 * @param $username 用户名        	
	 */
	public function deleteUser($username) {
		$url = $this->url . "users/" . $username;
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, '', $header, $type = 'DELETE' );
	}
	
	/**
	 * 批量删除用户
	 * 描述：删除某个app下指定数量的环信账号。上述url可一次删除300个用户,数值可以修改 建议这个数值在100-500之间，不要过大
	 *
	 * @param $limit="300" 默认为300条        	
	 * @param $ql 删除条件
	 *        	如ql=order+by+created+desc 按照创建时间来排序(降序)
	 */
	public function batchDeleteUser($limit = "300", $ql = '') {
		$url = $this->url . "users?limit=" . $limit;
		if (! empty ( $ql )) {
			$url = $this->url . "users?ql=" . $ql . "&limit=" . $limit;
		}
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, '', $header, $type = 'DELETE' );
	}
	
	/**
	 * 给一个用户添加一个好友
	 *
	 * @param
	 *        	$owner_username
	 * @param
	 *        	$friend_username
	 */
	public function addFriend($owner_username, $friend_username) {
		$url = $this->url . "users/" . $owner_username . "/contacts/users/" . $friend_username;
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, '', $header );
	}
	/**
	 * 删除好友
	 *
	 * @param
	 *        	$owner_username
	 * @param
	 *        	$friend_username
	 */
	public function deleteFriend($owner_username, $friend_username) {
		$url = $this->url . "users/" . $owner_username . "/contacts/users/" . $friend_username;
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, '', $header, $type = "DELETE" );
	}
	/**
	 * 查看用户的好友
	 *
	 * @param
	 *        	$owner_username
	 */
	public function showFriend($owner_username) {
		$url = $this->url . "users/" . $owner_username . "/contacts/users/";
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, '', $header, $type = "GET" );
	}
	// +----------------------------------------------------------------------
	// | 聊天相关的方法
	// +----------------------------------------------------------------------
	/**
	 * 查看用户是否在线
	 *
	 * @param
	 *        	$username
	 */
	public function isOnline($username) {
		$url = $this->url . "users/" . $username . "/status";
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, '', $header, $type = "GET" );
		return $result;
	}
	/**
	 * 发送消息
	 *
	 * @param string $from_user
	 *        	发送方用户名
	 * @param array $username
	 *        	array('1','2')
	 * @param string $type
	 *			默认为：cmd	描述：透传消息
	 *					txt 描述：文本消息
	 * @param string $target_type
	 *        	默认为：users 描述：给一个或者多个用户(users)或者群组发送消息(chatgroups)
	 * @param string $content        	
	 * @param array $ext
	 *        	自定义参数
	 */
	function yy_hxSend($from_user = "admin", $username, $content, $type = "cmd", $target_type = "users", $ext = "") 
	{
		$option ['target_type'] = $target_type;
		$option ['target'] = $username;
		$params ['type'] = $type;
		$params ['action'] = $content;
		$option ['msg'] = $params;
		$option ['from'] = $from_user;
		$option ['ext'] = $ext;
		$url = $this->url . "messages";
		$access_token = $this->get_token();
		$header = 'Authorization: Bearer ' . $access_token;
		//var_dump($option);
		$result = h_curl($curl_res, $url, $option, $header, 'POST');
		//var_dump($curl_res);
		return $result;
	}

	/**
	 * 获取app中所有的群组
	 */
	public function chatGroups() {
		$url = $this->url . "chatgroups";
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, '', $header, $type = "GET" );
		return $result;
	}
	/**
	 * 创建群组
	 *
	 * @param $option['groupname'] //群组名称,
	 *        	此属性为必须的
	 * @param $option['desc'] //群组描述,
	 *        	此属性为必须的
	 * @param $option['public'] //是否是公开群,
	 *        	此属性为必须的 true or false
	 * @param $option['approval'] //加入公开群是否需要批准,
	 *        	没有这个属性的话默认是true, 此属性为可选的
	 * @param $option['owner'] //群组的管理员,
	 *        	此属性为必须的
	 * @param $option['members'] //群组成员,此属性为可选的        	
	 */
	public function createGroups($option) {
		$url = $this->url . "chatgroups";
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, $option, $header );
		return $result;
	}
	/**
	 * 获取群组详情
	 *
	 * @param
	 *        	$group_id
	 */
	public function chatGroupsDetails($group_id) {
		$url = $this->url . "chatgroups/" . $group_id;
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, '', $header, $type = "GET" );
		return $result;
	}
	/**
	 * 删除群组
	 *
	 * @param
	 *        	$group_id
	 */
	public function deleteGroups($group_id) {
		$url = $this->url . "chatgroups/" . $group_id;
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, '', $header, $type = "DELETE" );
		return $result;
	}
	/**
	 * 获取群组成员
	 *
	 * @param
	 *        	$group_id
	 */
	public function groupsUser($group_id) {
		$url = $this->url . "chatgroups/" . $group_id . "/users";
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, '', $header, $type = "GET" );
		return $result;
	}
	/**
	 * 群组添加成员
	 *
	 * @param
	 *        	$group_id
	 * @param
	 *        	$username
	 */
	public function addGroupsUser($group_id, $username) {
		$url = $this->url . "chatgroups/" . $group_id . "/users/" . $username;
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, '', $header, $type = "POST" );
		return $result;
	}
	/**
	 * 群组删除成员
	 *
	 * @param
	 *        	$group_id
	 * @param
	 *        	$username
	 */
	public function delGroupsUser($group_id, $username) {
		$url = $this->url . "chatgroups/" . $group_id . "/users/" . $username;
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, '', $header, $type = "DELETE" );
		return $result;
	}
	/**
	 * 聊天消息记录
	 *
	 * @param $ql 查询条件如：$ql
	 *        	= "select+*+where+from='" . $uid . "'+or+to='". $uid ."'+order+by+timestamp+desc&limit=" . $limit . $cursor;
	 *        	默认为order by timestamp desc
	 * @param $cursor 分页参数
	 *        	默认为空
	 * @param $limit 条数
	 *        	默认20
	 */
	public function chatRecord($ql = '', $cursor = '', $limit = 20) {
		$ql = ! empty ( $ql ) ? "ql=" . $ql : "order+by+timestamp+desc";
		$cursor = ! empty ( $cursor ) ? "&cursor=" . $cursor : '';
		$url = $this->url . "chatmessages?" . $ql . "&limit=" . $limit . $cursor;
		$access_token = $this->getToken ();
		$header [] = 'Authorization: Bearer ' . $access_token;
		$result = $this->postCurl ( $url, '', $header, $type = "GET " );
		return $result;
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
