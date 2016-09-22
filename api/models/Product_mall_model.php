<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/6/25
 * Time: 下午3:05
 */
class Product_mall_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model') ;
    }

    public function filter($rn,$pn,$is_hot,$uid=NULL) {
//        $this->load->model('atomic/pd_filter_atomic_model', 'pd_filter_atomic') ;
        $this->load->model('atomic/pd_travels_atomic_model', 'pd_travels_atomic_model') ;
        if($is_hot) {
            $where = array('is_hot' => 1) ;
            $order_by = 'time_hot DESC' ;
        } else {
            $where = array('is_recommend' => 1) ;
            $order_by = 'time_recommend DESC' ;
        }
        $total = $this->pd_travels_atomic_model->cnt($where) ;
        $offset = $rn * $pn ;
        if($offset > $total) {
            return Ecode::NO_RESULT;
        }

        $select = 'id' ;
        $rst = $this->pd_travels_atomic_model->slt_res_arr($where, $select, $rn, $offset, $order_by) ;
        if(!$rst) {
            return Ecode::S2S_ARG_ERR;
        }

        foreach($rst as $pid) {
            $pids[] = $pid['id'] ;
        }

        $list = $this->product_model->get_product_list_by_ids($pids,$uid, true) ;

        $data = array(
            'rn'=>$rn,
            'pn'=>$pn,
            'total'=>sizeof($list),
            'pns'=>intval(($total +$rn -1) / $rn ) ,
            'list'=>$list
            ) ;

        return $data ;
    }

    public function all($rn,$pn,$continent, $country, $city, $tag,$uid=NULL,$classify=Ptype::PRODUCT_CLASSIFY_GROUP) {
        $rst = $this->product_model->query_filter($rn,$pn,$continent, $country, $city, $tag,$uid, $classify) ;
        return $rst ;
    }

}