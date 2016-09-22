<?php

/**
 * 微信中游客数据加载
 * User: yake
 * Date: 16/8/1
 * Time: 下午9:22
 */
class Wx_product_tourism_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function get_agent_info_by_aid($aid) {
        $this->load->model("atomic/user_atomic_model", "user_atomic_model") ;
        $where = array("id" => $aid) ;
        $select = "id, uid, email, mobile, name, level, wx_openid" ;
        return $this->user_atomic_model->slt_row_arr($where, $select) ;
    }

    public function load_agent_list($user_info, $rn=20, $pn=0) {
        $uid = $user_info['id'] ;

        $sql_cnt = "select count(distinct aid) from order_0 where uid=".$uid ;
        $this->load->model('atomic/order_atomic_model', 'order_atomic');
        $cnt_query = $this->order_atomic->query($sql_cnt) ;
        if($cnt_query) {
            $cnt_rst = $cnt_query->row_array() ;
            $cnt = $cnt_rst["count(distinct aid)"];
            $sql = "select distinct aid from order_0 where uid=".$uid ;
            $query = $this->order_atomic->query($sql) ;
            if($query) {
                $rst = $query->result_array() ;
                if(!empty($rst)) {
                    foreach($rst as $rst_item) {
                        $ids[] = $rst_item['aid'] ;
                    }
                    $this->load->model("atomic/user_atomic_model", "user_atomic_model") ;
                    $where = array("#in#" => "id", "#arr#" => $ids) ;
                    $select = "id, uid, email, mobile, name, level, wx_openid" ;
                    $rst_agent = $this->user_atomic_model->slt_res_arr($where, $select, $rn, $rn * $pn) ;

                    //添加头像
//                foreach($rst_agent as $rst_item) {
//                    $openids = $rst_item['wx_openid'] ;
//                }
//                $this->load->model("wx/wx_user_atomic_model", "wx_user_atomic_model") ;
//                $where = array("#openid#" => "id", "#arr#" => $openids) ;
//                $select = "headimgurl, nickname, subscribe" ;
//                $rst_wx = $this->wx_user_atomic_model->slt_res_arr($where, $select) ;
//                $index = 0 ;
//                foreach($rst_wx as $agent_item) {
//                    $rst_agent[$index]['headimgurl'] = $agent_item[$index]['headimgurl'];
//                }
                    return array(
                        "total" =>intval($cnt),
                        "rn"=>$rn,
                        "pn"=>$pn,
                        "agent_list" => $rst_agent
                    ) ;
                }
            }
        }


    }

    public function get_data_type($user_info) {
        $uid = $user_info['id'] ;
        $this->load->model('atomic/order_atomic_model', 'order_atomic');
        $sql = "select distinct aid from order_0 where uid=".$uid ;
        $query = $this->order_atomic->query($sql) ;
        if($query) {
            $rst = $query->result_array() ;
            if(!empty($rst)) {
                if(sizeof($rst) == 1) {
                    return array("data_type"=>Ptype::WX_PRODUCT_TYPE_AGENT_PRODUCT, "aid" => $rst[0]['aid']) ;
                } else {
                    return array("data_type"=>Ptype::WX_PRODUCT_TYPE_AGENT_LIST) ;
                }
            }
        }

        return array("data_type"=>Ptype::WX_PRODUCT_TYPE_AGENT_PRODUCT, "aid" => "2") ;
    }

}