<?php

header("Content-type:text/html;charset=utf-8");


class Huaxing_sms_send  {

	public function __construct() {
		$CI = & get_instance() ;
		$CI->config->load('application', TRUE);
		$this->cfg_huaxing = $CI->config->item('sms_huaxing', 'application');
	}

	public function post($strContent, $strPhone, $strSourceAdd='') {
		require_once APPPATH.'/libraries/sms_huaxing/HttpSend.php';
		$sender = new HttpSend();
		$strParam = "reg=" . $this->cfg_huaxing['reg'] . "&pwd=" . $this->cfg_huaxing['pwd'] . "&sourceadd=" . $strSourceAdd . "&phone=" . $strPhone . "&content=" . $strContent;
		return $sender->postSend($this->cfg_huaxing['server_url'],$strParam);
	}

	public function get($strContent, $strPhone, $strSourceAdd='') {
		require_once APPPATH.'/libraries/sms_huaxing/HttpSend.php';
		$sender = new HttpSend();
		$strParam = "reg=" . $this->cfg_huaxing['reg'] . "&pwd=" . $this->cfg_huaxing['pwd'] . "&sourceadd=" . $strSourceAdd . "&phone=" . $strPhone . "&content=" . $strContent;
		return $sender->getSend($this->cfg_huaxing['server_url'],$strParam);
	}

}

