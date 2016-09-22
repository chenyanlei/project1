<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_img_index_model extends CI_Model
{
	private $ERC_OK				= Ecode::OK;
	private $ERC_INSERT_FAIL	= Ecode::INSERT_FAIL;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('atomic/product_img_index_atomic_model', 'product_img_index_automic');
	}

	public function add_product_img_index($pid, $imgs = array()) {
		if(is_array($imgs) && sizeof($imgs) > 0) {
			for($index=0;$index<count($imgs);$index++) {
				$item = array("pid"=>$pid, "url"=> $imgs[$index]) ;
				$this->product_img_index_automic->ins($item) ;
			}
		}
	}

	/**
	 * 根据pid获取活动对应图片信息
	 * @param $pid
	 * @return mixed
	 */
	public function get_imgs_by_pid($pid) {
		return $this->product_img_index_automic->slt_res_arr(array('pid'=>$pid)) ;
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
