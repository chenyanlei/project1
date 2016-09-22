<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Provider_model extends CI_Model
{
	private $ERC_OK				= Ecode::OK;
	private $ERC_INSERT_FAIL	= Ecode::INSERT_FAIL;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('atomic/product_atomic_model', 'product_atomic');
		$this->load->model('atomic/user_product_atomic_model', 'user_product_atomic');
		$this->load->model('product_img_index_model', 'product_img_index_model');


	}

	public function test() {
//		echo "\ntest\n" ;
	}

	/**
	 * 添加产品
	 *
	 * @param $uid
	 * @param $title
	 * @param $language
	 * @param $country
	 * @param $city
	 * @param $feature
	 * @param $recommed_reason
	 * @param $preferential
	 * @param $travel_brief
	 * @param $fee_brief
	 * @param $contact_name
	 * @param $contact_phone
	 * @param $contact_tel
	 * @param $ueditor
	 * @return int
	 */
	public function add($uid, $title, $language, $country, $city, $feature, $recommed_reason, $preferential, $travel_brief,
						$fee_brief, $contact_name, $contact_phone, $contact_tel, $ueditor, $imgs,$travel_introduction,$type,
						$date_start,$date_end,$face_img)
	{
		//1. 插入产品信息
		$ins_arr = array('type' => $type,
					'title' => $title ,
					'start_time' => $date_start ,
					'end_time' => $date_end ,
				 	'language' => $language,
				 	'country' => $country,
				 	'city' => $city,
				 	'product_feature' => $feature,
					'recommend'=>$recommed_reason,
					'preferential'=>$preferential,
					'descr'=>$travel_brief,
					'fee_brief'=>$fee_brief,
					'contact_name'=>$contact_name,
					'contact_phone'=>$contact_phone,
					'contact_tel'=>$contact_tel,
					'fee_brief'=>$ueditor,
					'face_img' => $face_img,
					'travel_introduction'=>$travel_introduction
				) ;

		$ins_ret = $this->product_atomic->ins($ins_arr) ;
		if(!isset($ins_ret['insert_id'])) {
			Ecode::logs($this->ERC_INSERT_FAIL, __METHOD__) ;
			return $this->ERC_INSERT_FAIL ; 
		}

		//2.插入图片表
//		var_dump($imgs) ;
//		var_dump($ins_ret['insert_id']) ;
//		Ecode::logs($this->ERC_INSERT_FAIL, var_dump($imgs) ) ;
//		Ecode::logs($this->ERC_INSERT_FAIL, $ins_ret['insert_id'] ) ;
		$this->product_img_index_model->add_product_img_index($ins_ret['insert_id'], $imgs) ;

		//3. 插入用户-产品管理表
		$ins_mng_arr = array('uid'=>$uid, 'pid'=>$ins_ret['insert_id'], 'status'=>1) ;
		$ins_mng_ret = $this->user_product_atomic->ins($ins_mng_arr) ;
		if(!isset($ins_mng_ret['insert_id'])) {
			Ecode::logs($this->ERC_INSERT_FAIL, __METHOD__) ;
			return $this->ERC_INSERT_FAIL ;
		}

		//4.返回插入成功
		return $this->ERC_OK ; 
	}

	public function set_report($user_id, $accused_key, $accused_value, $option, $footnote)
	{
		$ins_arr = array('user_id'=>$user_id, 'accused_key'=>$accused_key, 'accused_value'=>$accused_value, 'option'=>$option, 'footnote'=>$footnote, 'create_time'=>time());
		$ins_ret = $this->report_atomic->ins($ins_arr);
		if (!isset($ins_ret['insert_id']))
		{
			Ecode::logs($this->ERC_INSERT_FAIL, __METHOD__, 'user_id='.$user_id, 'option='.$option.'&footnote='.$footnote);
			return $this->ERC_INSERT_FAIL;
		}
		return $this->ERC_OK;
	}

	/**
	 * 根据类型获取产品
	 *  $type  要获取的类型
	 * 	0  所有产品
	 *  1  销售中
	 *  2  已下线
	 *  3  已删除
	 *
	 *  $limit  个数
	 *  $offset 偏移值
	 *  $uid    用户
	 */
	public function get_product_by_type(&$data, &$total, $uid, $type=0, $offset=0, $limit=10) {
		$pids = array();
		//1.查找总个数
		$total = $this->get_user_product_pids($pids, $uid, $type, $offset, $limit) ;
		if($total == -1) {
			return 1;
		} else if($total == -2) {
			return 2;
		}

		//2.字段
		$product_select = "title,descr,country,city,face_img,product_feature,price_current,can_book,id" ;

		foreach ($pids as $key => $value) {
			$product_id_arr[] = $value['pid'];
		}

		//3.查找
//		public function slt_res_arr($where=null, $select=null, $limit=null, $offset=null, $order_by=null, $group=null)
		$data = $this->product_atomic->slt_res_arr(array('#in#'=>'id', '#arr#'=>$product_id_arr), $product_select);

		return $this->ERC_OK ;
	}

	/**
	 *
	 * 获取用户下的产品id
	 * $pids  查询到的id
	 * $uid
	 * $uid   用户id
	 * $offset 偏移量
	 * $record_num 记录个数
	 *
	 * return
	 * 		返回pids个数
	 * 		-1 个数为0
	 * 		-2 加载完成
	 *
	 **/
	private function get_user_product_pids(&$pids, $uid, $type=0,$offset=0,$limit=10) {
		$total = $this->get_user_product_total($uid, $type);

		if($total <= 0) {
			return -1 ;
		}

		if($offset >= $total ) {
			return -2 ;
		}

		if($type === 0) {
			$arr = array('uid'=>$uid) ;
		} else {
			$arr = array('uid'=>$uid, 'status'=>$type) ;
		}

		$select = array('pid') ;
		$pids = $this->user_product_atomic->slt_res_arr($arr, $select, $limit, $offset);
		return $total;
	}

	/**
	 * 获取总个数
	 * @param $uid
	 * @param int $type
	 * @return int
	 */
	public function get_user_product_total($uid, $type=0) {
		if($type === 0) {
			$arr = array('uid'=>$uid) ;
		} else {
			$arr = array('uid'=>$uid, 'status'=>$type) ;
		}


		$total = $this->user_product_atomic->cnt($arr) ;
		if($total <= 0) {
			return -1;
		}
		return $total;
	}

	/**
	 * 获取类型的页码
	 *
	 * @param $uid
	 * @param int $type
	 * @param int $limit
	 * @return int page
	 */
	public function get_user_product_pages($uid, $type=0,$limit=10) {
		$record_num = $this->get_user_product_total($uid, $type) ;
		return ($record_num + $limit -1) /$limit ;

	}

	/**
	 * 获取产品详情
	 *
	 */
	public function get_product_detail(&$detail, $pid) {

		$data = $this->product_atomic->slt_res_arr(array('id'=>$pid));

//		var_dump($data) ;
		if($data != null) {
			$detail = $data[0] ;

			$imgs = $this->product_img_index_model->get_imgs_by_pid($pid) ;

//			var_dump($imgs) ;
			if(count($imgs) > 0) {
				$detail['imgs'] = $imgs ;
			}
			return 0 ;
		}

		return -1 ;

	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
