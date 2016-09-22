<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/27
 * Time: 上午6:49
 */
class Product_push_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('atomic/push_product_atomic_model', 'push_product_atomic_model') ;
    }

    public function get_list($rn, $pn) {
        $this->load->model('product/travels_model', 'travels_model') ;
        $rst = $this->travels_model->get_can_push_product($rn, $pn) ;
        return $rst ;
    }

    public function push_to_all_user($pid, $p_type) {
        $rst = $this->push_product_atomic_model->add_one_push_msg($pid, 0) ;
        if(-1 == $rst) {     //插入失败

        } else if(0 == $rst) { // 插入成功

        } else if(1 == $rst) { //已经存在

        }

//        return $this->_beigin_push($pid, $p_type) ; //暂不支持推送
        h_echo_json(Ecode::BAD_REQUEST) ;
    }

    private function _beigin_push($pid, $p_type) {

//        $where = array('id' => $pid) ;
//        $select = "p_type" ;
//        $this->load->model('atomic/pd_travels_atomic_model', 'pd_travels_atomic_model') ;
//        $rst = $this->pd_travels_atomic_model->slt_row_arr($where, $select) ;


        $this->load->model('atomic/user_atomic_model', 'user_atomic_model') ;
        $count = $this->user_atomic_model->get_count(Ptype::TYPE_A) ;

        $this->load->model('atomic/a_p_travels_atomic_model','a_p_travels_atomic_model') ;
        for($index =0 ; $index<$count;) {
            $rst = $this->user_atomic_model->get_users_by_type(Ptype::TYPE_A, 100, $index) ;
//            var_dump($rst) ;
            foreach($rst as $user) {
//                $arr = array('uid' => $user['id'], 'pid' => $pid) ;
                $this->a_p_travels_atomic_model->add_item($user['id'], $pid, $p_type) ;
            }
            $index += 100 ;
        }
        return true ;
    }



}