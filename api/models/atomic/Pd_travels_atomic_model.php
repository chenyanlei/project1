<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/29
 * Time: 下午5:53
 */
class Pd_travels_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'p_travels_0';
    }

    public function detail($pid, $uid='', $travel_intro=true) {
        $select = 'id, title,continent,country,city,start_city,lang,tagname,min_num,p_type,is_customer,price_type,calendar_type,face_img,visa,fee_desc,p_status,booking_policy' ;
        $where = array('id' => $pid) ;
        $rst = $this->slt_row_arr($where, $select) ;
        if(empty($rst)) {
            return null ;
        }

        if($travel_intro) {
            $this->load->model('atomic/pd_travels_detail_atomic_model','pd_travels_detail_atomic_model') ;
            $detail = $this->pd_travels_detail_atomic_model->get_travel_intro($pid, $rst['p_type']) ;
            $rst['travel_intro'] = $detail;//['travel_intro'] ;
        }


        return $rst ;
    }

}