<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/29
 * Time: 下午5:53
 */
class Pd_travels_detail_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'p_travels_detail_0';
    }

    public function add_detail($pid, $detail, $p_type=Ptype::ONE_DAY) {
//        var_dump($p_type) ;
        if($p_type == Ptype::ONE_DAY) {
            $ary = array('pid' => $pid,
                'travel_intro' => json_decode($detail)[0]) ;
            return $this->ins($ary) ;
        } else if ($p_type == Ptype::GROUP_TRAVEL || $p_type == Ptype::LOCAL_GROUP) {
            $detail = json_decode($detail,true) ;
            $rst = "";
            foreach($detail as $day_data) {
                $obj_day_data = json_decode($day_data,true) ;
                $ary = array(
                    'pid' => $pid,
                    'days' => $obj_day_data['days'],
                    'start_name' => $obj_day_data['start_name'],
                    'start_img' => $obj_day_data['start_img'],
                    'end_name' => $obj_day_data['end_name'],
                    'end_img' => $obj_day_data['end_img'],
                    'travel_intro' => $obj_day_data['travel_detail']
                ) ;
                $rst = $this->ins($ary) ;
            }
            return $rst;
        }
    }

    public function modify_detail($pid, $detail) {
        $ary = array('travel_intro' => $detail) ;
        $where = array('pid' => $pid) ;
        return $this->upd($ary,$where) ;
    }

    public function get_travel_intro($pid, $p_type=Ptype::ONE_DAY) {
        if($p_type == Ptype::ONE_DAY) {
            $select = 'travel_intro' ;
//            $where = array('pid' => $pid) ;
//            $rst =  $this->slt_row_arr($where,$select);
//            return $rst['travel_intro'] ;
        } else {
            $select = 'id, days, start_name, start_img, end_name, end_img, travel_intro' ;
        }
        $where = array('pid' => $pid) ;
        return $this->slt_res_arr($where,$select);
    }

}