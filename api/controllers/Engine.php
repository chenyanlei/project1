<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Engine extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->ERC_OK			= Ecode::OK;
		$this->ERC_C2S_ARG_ERR	= Ecode::C2S_ARG_ERR; //客户端传递的参数错误
	}

	public function init_android()
	{
		$arr['app_version'] = '0.2.0'; //三位版本号
		$arr['app_update_type'] = '0'; //升级类型：0-不强制升级; 1-强制升级;
		$arr['app_download_url'] = 'http://dl.nuanyu.cn/nuanyu-0.2.0-guanwang.apk'; //APK下载URL
		h_echo_json($this->ERC_OK, $arr);

		// -------------------- Statistic @background --------------------//
		$device_id = $this->input->get_post('device_id', TRUE); //设备唯一编号
		$device_model = $this->input->get_post('device_model', TRUE); //设备型号
		$device_resolution = $this->input->get_post('device_resolution', TRUE); //设备分辨率
		$os_name = $this->input->get_post('os_name', TRUE); //OS名称：0-Android; 1-iOS
		$os_version = $this->input->get_post('os_version', TRUE); //OS版本号
		$this->load->model('statistic_model');
		$this->statistic_model->set_stat_app_active($device_id, $device_model, $device_resolution, $os_name, $os_version);
		exit;
	}

	public function init_ios()
	{
		$app_build = $this->input->get_post('app_build', TRUE); //客户端传递的app_build版本号
		/* 用于精准控制指定版本强制升级
		if (1 > $app_build)
		{
			$arr['app_update_type'] = '1'; //升级类型：0-不强制升级; 1-强制升级;
		}
		else
		{
			$arr['app_update_type'] = '0'; //升级类型：0-不强制升级; 1-强制升级;
		}
		 */
		$arr['app_build'] = '1'; //在AppStore的build版本,自然数自增
		$arr['app_version'] = '1.0.0'; //三位版本号,给用户看的,没实质作用
		$arr['app_update_type'] = '1'; //升级类型：0-不强制升级; 1-强制升级;
		$arr['app_download_url'] = 'http://appstore.apple.com/xxx'; //App在AppStore的URL
		h_echo_json($this->ERC_OK, $arr);

		// -------------------- Statistic @background --------------------//
		$device_id = $this->input->get_post('device_id', TRUE); //设备唯一编号
		$device_model = $this->input->get_post('device_model', TRUE); //设备型号
		$device_resolution = $this->input->get_post('device_resolution', TRUE); //设备分辨率
		$os_name = $this->input->get_post('os_name', TRUE); //OS名称：0-Android; 1-iOS
		$os_version = $this->input->get_post('os_version', TRUE); //OS版本号
		$app_version = $this->input->get_post('app_version', TRUE); //客户端传递的app_version显示版本号(暂时未入库统计)
		$this->load->model('statistic_model');
		$this->statistic_model->set_stat_app_active($device_id, $device_model, $device_resolution, $os_name, $os_version);
		exit;
	}

	public function get_howtobemissnuan()
	{
		$this->load->view('engine_get_howtobemissnuan');
	}

	public function get_contributors()
	{
		$this->load->view('engine_get_contributors');
	}

	public function get_privacy()
	{
		$this->load->view('engine_get_privacy');
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
