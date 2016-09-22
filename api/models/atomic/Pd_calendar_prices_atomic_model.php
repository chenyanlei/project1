<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/29
 * Time: 下午5:53
 */
class Pd_calendar_prices_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'p_calendar_prices_0';
    }

    // 添加日历价格
    public function add_calendar_prices($p_type, $dataObj,$pid=null) {
        $ary = array('price1' => $dataObj['price1'],
                     'price2' => $dataObj['price2'],
                     'a1_price'=>$dataObj['price1'],
                     'a2_price'=>$dataObj['price1'],
                     'a3_price'=>$dataObj['price1'],
                     'b1_price'=>$dataObj['price1'],
                     'b2_price'=>$dataObj['price1'],
                     'b3_price'=>$dataObj['price1'],
                     'c_price' =>$dataObj['price2'],
                     'type' => $p_type ,
                     'calendar_from' => isset($dataObj['calendar_from'])?$dataObj['calendar_from']:0 ,
                     'calendar_to' => isset($dataObj['calendar_to'])?$dataObj['calendar_to']:0
            ) ;

        if(isset($pid)) {
            $ary['pid'] = $pid;
        }

        $rst = $this->ins($ary) ;
        return $rst ;
    }

    public function upd_price($p_type, $dataObj) {
        $c_from = $this->toUnixTimestamp(isset($dataObj['calendar_from'])?$dataObj['calendar_from']:0) ;
        $c_to = $this->toUnixTimestamp(isset($dataObj['calendar_to'])?$dataObj['calendar_to']:0) ;
        $ary = array('price1' => $dataObj['price1'],
            'price2' => $dataObj['price2'],
            'type' => $p_type ,
            'calendar_from' => $c_from ,
            'calendar_to' => $c_to
        ) ;
        $where = array('id' => $dataObj['id']) ;
        $this->upd($ary, $where) ;
    }

    public function modify_or_add_price($pid,$p_type, $dataObj) {
        foreach($dataObj as $price_item) {
            $price_obj = json_decode($price_item, true);
            if(!isset($price_obj['id'])) {  // insert
                $this->add_calendar_prices($p_type, $price_obj,$pid) ;
            } else { // upd
                $this->upd_price($p_type, $price_obj) ;
            }
        }
    }

    // 添加一个价格
    public function remove_calendar_price($p_type, $id) {
        $where = array('p_type' => $p_type, 'id' => $id);
        return $this->del($where) ;
    }

    // 关联产品和价格
    public function attach_pid($pid, $prices_id) {
        if(is_array($prices_id)) {
            foreach($prices_id as $id) {
                $upd = array('pid' => $pid ) ;
                $where = array('id' => $id) ;
                $this->upd($upd, $where) ;
            }
        }
    }

    public function get_prices_by_pid($pid, $calendar_type, $uid='') {
        // TODO
        // 获取uid的等级、类型

        // 根据这些组合，取出一组价格

//        echo "get_prices_by_pid" ;

//        var_dump($pid) ;
//        var_dump($calendar_type) ;
//        var_dump($uid) ;

        $where = array('pid' => $pid) ;
        if($calendar_type == Ptype::CALENDAR_TYPE_A_PERIOD) {
            $cur_time = time() ;
            $where['calendar_to>'] = $cur_time ;
        } else if($calendar_type == Ptype::CALENDAR_TYPE_DATE) {
            $where['calendar_from>'] = time() ;
        }

//        var_dump($uid) ;

        if($uid == 0 || $uid =='') {  // 如果没有uid,则按照游客价格返回
            $select = 'id,  c_price, calendar_from, calendar_to' ;
            $rst = $this->slt_res_arr($where,$select) ;
            $index = 0 ;
            foreach($rst as $item) {
                $rst[$index]['price1'] = $item['c_price'] ;
                $index ++ ;
            }

            return $rst ;
        } else {
            $select = 'level, user_type';
            $this->load->model("atomic/user_atomic_model", "user_atomic") ;
            $rst = $this->user_atomic->slt_row_arr(array('id'=> $uid), $select) ;
            if($rst['user_type'] == Ptype::TYPE_S) {
                $select = 'id,  price1, price2, calendar_from, calendar_to' ;
                $order_by = null ;
            } else {
                $price1 = $this->_get_agent_field($rst['level']) ;
                $select = 'id ,'.$price1.' as price1, c_price as price2, c_price, calendar_from, calendar_to' ;
                $order_by = " calendar_from ASC " ;
            }

            $slt_rst = $this->slt_res_arr($where,$select, null, null, $order_by) ;

            return $slt_rst ;
        }
    }



    public function get_display_prices_by_pid($pid,$uid='') {
        $select = 'level, user_type';
        $this->load->model("atomic/user_atomic_model", "user_atomic") ;
        $rst = $this->user_atomic->slt_row_arr(array('id'=> $uid), $select) ;

//        var_dump($rst) ;
        if($rst['user_type'] == Ptype::TYPE_S) {
            $select = 'id, price1, price2, calendar_from, calendar_to' ;
            $order_by = " price1 ASC " ;
        } else {
            $price1 = $this->_get_agent_field($rst['level']) ;

//            var_dump($price1) ;
            $select = 'id ,'.$price1.' as price1, c_price as price2, c_price, calendar_from, calendar_to' ;
            $order_by = $price1." ASC " ;
        }

        // 代理最低价、销售价
        $where_min = array('pid' => $pid) ;
        $data_min = $this->slt_row_arr($where_min,$select, $order_by) ;
        return array('price1' => $data_min['price1'], 'price2' => $data_min['price2']) ;
    }

    //同行价
    private function _get_agent_field($a_level) {
        switch($a_level) {
            case Ptype::LEVEL_AGENT_PERSON_LEVEL_1:
                $price2 = "a1_price " ;
                break;
            case Ptype::LEVEL_AGENT_PERSON_LEVEL_2:
                $price2 = "a2_price " ;
                break;
            case Ptype::LEVEL_AGENT_PERSON_LEVEL_3:
                $price2 = "a3_price " ;
                break;
            case Ptype::LEVEL_AGENT_COM_LEVEL_1:
                $price2 = "b1_price " ;
                break;
            case Ptype::LEVEL_AGENT_COM_LEVEL_2:
                $price2 = "b2_price" ;
                break;
            case Ptype::LEVEL_AGENT_COM_LEVEL_3:
                $price2 = "b3_price " ;
                break;
            default:
                $price2= "c_price" ;
                break;
        }
//        $price2 .= "price1" ;
        return $price2 ;
    }

    private function toUnixTimestamp($var) {
        $this->load->library('commen') ;
        return $this->commen->toUnixTimestamp($var) ;
    }

    // 获取管理员的价格
    public function get_admin_prices_by_pid($pid) {
        $where = array('pid' => $pid) ;
        $select = 'id, price1,price2, calendar_from, calendar_to, a1_price, a2_price, a3_price,
                b1_price, b2_price, b3_price, c_price' ;
        return $this->slt_res_arr($where,$select) ;
    }

    public function admin_fill_prices( $data ) {
        $arr = array(
//            'price1' => $data['price1'] ,
//            'price2' => $data['price2'] ,
            'a1_price' => $data['a1_price'] ,
            'a2_price' => $data['a2_price'] ,
            'a3_price' => $data['a3_price'] ,
            'b1_price' => $data['b1_price'] ,
            'b2_price' => $data['b2_price'] ,
            'b3_price' => $data['b3_price'] ,
            'c_price' => $data['c_price'] ) ;

        if(isset($data['price_id'])) {
            $where = array('id' => $data['price_id']) ;
            return $this->upd($arr, $where) ;
        } else {
            $where = array('pid' => $data['pid']) ;
            $select = 'id' ;
            $rst = $this->slt_res_arr($where,$select) ;
            if( empty($rst) ) {
                return $this->ins($arr) ;
            } else {
                $rst = $this->upd($arr, $where) ;
                return $rst ;
            }
        }
    }
}