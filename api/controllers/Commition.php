<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/19
 * Time: 下午3:13
 */
class Commition extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('order_model') ;
    }

    public function get_my_commition_by_date() {
        $this->load->model("user_commition_model") ;
        $rst = $this->user_commition_model->get_my_commition_by_date() ;
        if(!empty($rst)) {
            h_echo_json(Ecode::OK, $rst) ;
        } else {
            h_echo_json(Ecode::NO_RESULT) ;
        }
    }

    /**
     *
     * 代理获取我的佣金总额
     *
     * 两个条件：
     *  1. 订单已支付
     *  2. 出发时间在现在之前
     *
     **/
    public function get_my_commition() {
        $c_type = $this->input->get_post('c_type') ;
        if($c_type == Ptype::COMMITION_TYPE_MY_AGENT) { //COMMITION_TYPE_MY_SALE
            $this->_get_my_agent_commition_list() ;
        } else {
            $this->_get_my_sale_commition_list() ;
        }
    }

    // 获取我的佣金总额
    private function _get_my_sale_commition_list() {
        $uid = $GLOBALS['user_id'] ;
        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        if(!isset($rn) || $rn < 1) {
            $rn = 20 ;
        }
        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $offset = $rn * $pn ;
        $this->load->model('order_model') ;
        $cur_time = time() ;

        // 总个数
        $sql = "SELECT count(id) FROM order_0 WHERE aid=".$uid." AND travel_date <= $cur_time AND
                (status=".Ptype::ORDER_STATUS_PAYED. " OR status=".Ptype::ORDER_STATUS_END. ")" ;
        $query = $this->atomic_model->query($sql) ;
        if($query) {
            $rst = $query->row_array() ;
//            var_dump($rst) ;
        }

        if($offset > $rst['count(id)']) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        $data['total_num'] = $rst['count(id)'];

        $sql = "SELECT sum(commition) FROM order_0 WHERE aid=".$uid." AND travel_date <= $cur_time AND
                (status=".Ptype::ORDER_STATUS_PAYED. " OR status=".Ptype::ORDER_STATUS_END. ")"  ;
        $query = $this->atomic_model->query($sql) ;
        $rst = $query->row_array() ;
        $data['total_commition'] = $rst['sum(commition)'];
        $data['rn'] = $rn;
        $data['pn'] = $pn;
        $data['pages'] = intval( ($data['total_num'] - 1) / $rn + 1 );

        $sql = "SELECT order_id, uid, aid, pid, total_fee, unit_price, num, commition, create_time, status FROM order_0 WHERE aid=".$uid." AND travel_date <= $cur_time AND
                (status=".Ptype::ORDER_STATUS_PAYED. " OR status=".Ptype::ORDER_STATUS_END. ")"  ;

        $query = $this->atomic_model->query($sql) ;
        if(!$query) {
            h_echo_json(Ecode::S2S_ARG_ERR) ;
            return ;
        }

        $rst = $query->result_array() ;
        $data['list'] = $rst ;

        h_echo_json(Ecode::OK, $data) ;
    }

    // 获取我的二级代理的佣金总额
    private function _get_my_agent_commition_list() {
        $uid = $GLOBALS['user_id'] ;

        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        if(!isset($rn) || $rn < 1) {
            $rn = 20 ;
        }
        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $offset = $rn * $pn ;
        $this->load->model('order_model') ;
        $cur_time = time() ;

//        $sql = "select uid from user_agent_0 where recommend_uid=".$uid." " ;


        $sql = "SELECT count(id) FROM order_0 WHERE aid in (select uid from user_agent_0 where recommend_uid=".$uid.")".
            " AND travel_date <= $cur_time AND (status=".Ptype::ORDER_STATUS_PAYED. " OR status=".Ptype::ORDER_STATUS_END. ")" ;

//        echo $sql ;

        $query = $this->atomic_model->query($sql) ;
        if(!$query) {
            h_echo_json(Ecode::S2S_ARG_ERR) ;
            return ;
        }

        $rst = $query->row_array() ;
//        var_dump($rst) ;
        $data['total_num'] = $rst['count(id)'] ;

        $sql = "SELECT sum(commition) FROM order_0 WHERE aid in (select uid from user_agent_0 where recommend_uid=".$uid.")".
            " AND travel_date <= $cur_time AND (status=".Ptype::ORDER_STATUS_PAYED. " OR status=".Ptype::ORDER_STATUS_END. ")"  ;
        $query = $this->atomic_model->query($sql) ;
        $rst = $query->row_array() ;

        $data['total_commition'] = $rst['sum(commition)'];
        $data['rn'] = $rn;
        $data['pn'] = $pn;
        $data['pages'] = intval( ($data['total_num'] - 1) / $rn + 1 );

        $sql = "SELECT order_id, uid, aid, pid, total_fee, unit_price, num, commition, create_time, status FROM order_0
            WHERE aid in (select uid from user_agent_0 where recommend_uid=".$uid.")"." AND travel_date <= $cur_time AND
            (status=".Ptype::ORDER_STATUS_PAYED. " OR status=".Ptype::ORDER_STATUS_END. ")";

        $query = $this->atomic_model->query($sql) ;
        if(!$query) {
            h_echo_json(Ecode::S2S_ARG_ERR) ;
            return ;
        }

        $rst = $query->result_array() ;
        $data['list'] = $rst ;

        h_echo_json(Ecode::OK, $data) ;
    }

    

}