<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_commition_model extends CI_Model
{
	const ONE_DAY 		= 86400;// 60 * 60 * 24 ;
	const TWO_DAY 		= 172800;// ONE_DAY * 2
	const THREE_DAY 	= 259200;// ONE_DAY * 3
	const FOUR_DAY 		= 345600; // ONE_DAY * 4
	const SERVEN_DAY 	= 604800; // ONE_DAY * 7

	public function __construct()
	{
		parent::__construct();
		$this->load->model('atomic/user_commition_atomic_model', 'user_commition_atomic_model');
	}

	public function get_my_commition_by_date() {
		$rst[0] = $this->_get_yestoday_data() ;
		$rst[1] = $this->_get_last_7_days_data() ;
		$rst[2] = $this->_get_this_month_data() ;
		$rst[3] = $this->_get_last_month_data() ;
		return $rst ;
	}

	private function _get_yestoday_data() {
		$date = date("Y-m-d", time() - User_commition_model::ONE_DAY ) ;
		return $this->_get_data_by_date($date) ;
	}

	// 获取昨天的数据
	private function _get_data_by_date($date) {
		$where = array("date" => $date, "uid" => $GLOBALS['user_id']);
		$select = "my_sale_commition, my_sale_order_num, my_sale_money, my_agent_commition, my_agent_order_num, my_agent_money";
		$rst = $this->user_commition_atomic_model->slt_row_arr($where, $select) ;
		if(empty($rst)) {
			return $this->_create_user_date_data($date) ;
		} else {
			return $rst ;
		}
	}

	private function _create_user_date_data($date) {
		$uid = $GLOBALS['user_id'] ;
		$where = array("date" => $date, "uid"=>$uid);
		$select = "id" ;
		$rst = $this->user_commition_atomic_model->slt_row_arr($where, $select) ;
		if(!empty($rst)) {
			return null;
		}

		$arr = explode("-",$date) ;
		$cal_start_time = mktime(0,0,0,$arr[1], $arr[2], $arr[0]) ;  // 出行日期之后一天作为结算日期
		$cal_end_time =  $cal_start_time + User_commition_model::ONE_DAY ;

		// 取出行后一天的订单数据
		$where = array(
			"travel_date>"=>$cal_start_time,
			"travel_date<"=>$cal_end_time,
			"aid"=>$uid,
			"status" => Ptype::ORDER_STATUS_PAYED
		) ;
		$select = "num, unit_price, total_fee, pid" ;
		$this->load->model("atomic/order_atomic_model", "order_atomic_model") ;
		$orders = $this->order_atomic_model->slt_res_arr($where, $select);

		$pid_price = array() ;

		// 如果没有订单
		if(empty($orders)) {
			$data = array(
				"uid"=>$uid,
				"date" => $date,
				"my_sale_commition" => 0,
				"my_sale_order_num"=>0,
				"my_sale_money"=>0
			) ;
		} else {
			$data = array(
				"uid"=>$uid,
				"date" => $date
			) ;

			$this->load->model("product_model") ;
			$my_sale_commition = 0 ;
			$my_sale_money = 0;
			$my_sale_order_num = 0;

			foreach($orders as $order) {
				if(!isset($pid_price[$order['pid']])) {
					$commition = $this->_get_product_commition_by_calander($uid, $order['pid'], $order['travel_date']) ;
					if($commition != -1) {
						$pid_price[$order['pid']] = $commition;
					}
				}

				$my_sale_commition += $pid_price[$order['pid']] * $order['num']  ;
				$my_sale_money += $order['total_fee'];
				$my_sale_order_num += $order['num'];
			}

			$data['my_sale_commition'] = $my_sale_commition ;
			$data['my_sale_money'] = $my_sale_money ;
			$data['my_sale_order_num'] = $my_sale_order_num ;
		}

		//========================================================================================================
		// 计算二级代理佣金
		$sql = "SELECT pid, num, total_fee, unit_price FROM order_0
				WHERE aid in
					(select uid from user_agent_0 where recommend_uid=".$uid.")".
			" AND travel_date <=". $cal_end_time.
			" AND travel_date >". $cal_start_time .
			" AND (status=".Ptype::ORDER_STATUS_PAYED." OR status=".Ptype::ORDER_STATUS_END. ")" ;

//        echo $sql ;

		$query_rst = $this->atomic_model->query($sql) ;
		if($query_rst) {
			$rst = $query_rst->row_array() ;
			if(isset($rst)) {
				$my_agent_commition = 0 ;
				$my_agent_money = 0;
				$my_agent_order_num = 0;
				foreach($rst as $order) {
					if(!isset($pid_price[$order['pid']])) {
						$commition = $this->_get_product_commition_by_calander($uid, $order['pid'], $order['travel_date']) ;
						if($commition != -1) {
							$pid_price[$order['pid']] = $commition;
						}
					}

					$my_agent_commition += $pid_price[$order['pid']] * $order['num'] * 0.05 ;// 5%的佣金分成
					$my_agent_money += $order['total_fee'];
					$my_agent_order_num += $order['num'];
				}

				$data['my_agent_commition'] = $my_agent_commition;
				$data['my_agent_money'] = $my_agent_money;
				$data['my_agent_order_num'] = $my_agent_order_num;
			} else {
				$data['my_agent_commition'] = 0;
				$data['my_agent_money'] = 0;
				$data['my_agent_order_num'] = 0;
			}
		} else {
			$data['my_agent_commition'] = 0;
			$data['my_agent_money'] = 0;
			$data['my_agent_order_num'] = 0;
		}

		$this->user_commition_atomic_model->ins($data) ;
		return $data;
	}

	private function _get_product_commition_by_calander($uid, $pid, $travel_date) {
		$this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');
		$select = 'id, p_type, price_type, calendar_type' ;
		$where = array('id' => $pid) ;
		$rst = $this->slt_row_arr($where, $select) ;

		if(empty($rst)) {
			return -1;
		}

		$this->load->model('atomic/pd_calendar_prices_atomic_model', 'pd_calendar_prices_atomic_model');
		$prices = $this->pd_calendar_prices_atomic_model->get_prices_by_pid( $pid, $rst['calendar_type'], $uid) ;

		if($rst['calendar_type'] == Ptype::CALENDAR_TYPE_FULL_YEAR) {
			return $prices[0]['price2'] - $prices[0]['price1'] ;
		} else {
			foreach($prices as $price) {
				if($travel_date > $price['calendar_from'] && $travel_date < $price['calendar_to']) {
					return $prices['price2'] - $prices['price1'];
				}
			}
		}

		return -1;
	}

	// 获取过去7天的数据
	private function _get_last_7_days_data() {
		$date_from =  date("Y-m-d", time() - User_commition_model::SERVEN_DAY) ;
		$date_to =  date("Y-m-d", time() - User_commition_model::ONE_DAY) ;

		$where = array("date>=" => $date_from,"date<=" => $date_to, "uid" => $GLOBALS['user_id']);
		$select = "date, my_sale_commition, my_sale_order_num, my_sale_money, my_agent_commition, my_agent_order_num, my_agent_money";
		$order_by = "date ASC" ;
		$rst = $this->user_commition_atomic_model->slt_res_arr($where, $select, null, null, $order_by) ;
		if(empty($rst) || sizeof($rst) < 7) {
			for($index=1; $index<=7; $index++) {
				$date = date("Y-m-d", time() - User_commition_model::ONE_DAY * $index) ;
				if(!isset($item[$date])) {
					$this->_create_user_date_data($date) ;
				}
			}
		}

		$select = "sum(my_sale_commition) as my_sale_commition,
					sum(my_sale_order_num) as my_sale_order_num,
					sum(my_sale_money) as my_sale_money,
					sum(my_agent_commition) as my_agent_commition,
					sum(my_agent_order_num) as my_agent_order_num,
					sum(my_agent_money) as my_agent_money";

		$date_s = date("Y-m-d", time() - User_commition_model::ONE_DAY * 7) ;
		$date_e = date("Y-m-d", time() - User_commition_model::ONE_DAY) ;
		$where = array("date>=" => $date_s, "date<=" => $date_e, "uid"=>$GLOBALS['user_id']) ;
		return $this->user_commition_atomic_model->slt_row_arr($where, $select) ;
	}

	private function _get_this_month_data() {
		$day = date("d", time()) ;
		$year = date("Y", time()) ;
		$month = date("m", time()) ;

		$date_from = mktime(0,0,0,$month, 1, $year);
		$date_to = mktime(0,0,0,$month, $day, $year);
		$days = $day ;

//		echo "date_from".$date_from."<br/>" ;
//		echo "date_to".$date_to."<br/>" ;
//		echo "days".$days."<br/>" ;

		$where = array("date>=" => $date_from,"date<=" => $date_to, "uid" => $GLOBALS['user_id']);
		$select = "date, my_sale_commition, my_sale_order_num, my_sale_money, my_agent_commition, my_agent_order_num, my_agent_money";
		$order_by = "date ASC" ;
		$rst = $this->user_commition_atomic_model->slt_res_arr($where, $select, null, null, $order_by) ;
		if(empty($rst) || sizeof($rst) < $days) {
			for($index=0; $index<$days; $index++) {
				$date = date("Y-m-d", $date_from + $index * User_commition_model::ONE_DAY) ;
				if(!isset($item[$date])) {
					$this->_create_user_date_data($date) ;
				}
			}
		}

		$select = "sum(my_sale_commition) as my_sale_commition,
					sum(my_sale_order_num) as my_sale_order_num,
					sum(my_sale_money) as my_sale_money,
					sum(my_agent_commition) as my_agent_commition,
					sum(my_agent_order_num) as my_agent_order_num,
					sum(my_agent_money) as my_agent_money";

		$where = array("date>=" => date('Y-m-d',$date_from), "date<=" => date('Y-m-d',$date_to), "uid"=>$GLOBALS['user_id']) ;
		return $this->user_commition_atomic_model->slt_row_arr($where, $select) ;
	}

	// 获取上个月的数据
	private function _get_last_month_data() {

		$first_day = $this->getPrevMonthFirstDay("now");
		$last_day = $this->getPrevMonthLastDay("now");

		$arr_from = explode("-", $first_day) ;
		$arr_to = explode("-", $last_day) ;

		$date_from = mktime(0,0,0,$arr_from[1], $arr_from[2], $arr_from[0]);
		$date_to = mktime(0,0,0,$arr_to[1], $arr_to[2], $arr_to[0]);
		$days = $arr_to[2] - $arr_from[2] + 1 ;

		$where = array("date>=" => $date_from,"date<=" => $date_to, "uid" => $GLOBALS['user_id']);
		$select = "date, my_sale_commition, my_sale_order_num, my_sale_money, my_agent_commition, my_agent_order_num, my_agent_money";
		$order_by = "date ASC" ;
		$rst = $this->user_commition_atomic_model->slt_res_arr($where, $select, null, null, $order_by) ;
		if(empty($rst) || sizeof($rst) < $days) {
			for($index=0; $index<$days; $index++) {
				$date = date("Y-m-d", $date_from + $index * User_commition_model::ONE_DAY) ;
				if(!isset($item[$date])) {
					$this->_create_user_date_data($date) ;
				}
			}
		}

		$select = "sum(my_sale_commition) as my_sale_commition,
					sum(my_sale_order_num) as my_sale_order_num,
					sum(my_sale_money) as my_sale_money,
					sum(my_agent_commition) as my_agent_commition,
					sum(my_agent_order_num) as my_agent_order_num,
					sum(my_agent_money) as my_agent_money";

		$where = array("date>=" => date('Y-m-d',$date_from), "date<=" => date('Y-m-d',$date_to), "uid"=>$GLOBALS['user_id']) ;
		return $this->user_commition_atomic_model->slt_row_arr($where, $select) ;
	}

	private function getPrevMonthFirstDay($date) {
		return date('Y-m-d', strtotime(date('Y-m-01', strtotime($date)) . ' -1 month'));
	}

	private function getPrevMonthLastDay($date) {
		return date('Y-m-d', strtotime(date('Y-m-01', strtotime($date)) . ' -1 day'));
	}


}

/* vim: set ts=4 sw=4 sts=4 noet: */
