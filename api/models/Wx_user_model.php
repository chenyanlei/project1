<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/8/1
 * Time: 下午4:14
 */
class Wx_user_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('wx/wx_user_atomic_model', 'wx_user_atomic');
    }

    public function get_user_infor_by_openid($openid, $from) {
        $this->load->model("atomic/user_atomic_model", "user_atomic_model") ;
        $where = array("wx_openid" => $openid) ;
        $select = "id" ;
        $rst = $this->user_atomic_model->slt_row_arr($where, $select) ;

        if(!empty($rst)) {
            $this->load->model("user_model") ;
            $rst = $this->user_model->get_user_infor_by_id($rst['id']) ;

            $where = array("openid" => $openid) ;
            $select = "nickname, headimgurl, unionid, sex, province, city" ;
            $this->load->model("wx/wx_user_atomic_model", "wx_user_atomic_model") ;
            $wx_rst = $this->wx_user_atomic_model->slt_row_arr($where, $select) ;
            $rst['wx'] = $wx_rst;

            $token = '' ;
            $this->token_model->set_token($token, $rst['id']) ;
            $rst['token'] = $token ;
            unset($rst['passwd']) ;
            unset($rst['loginsult']) ;
            return $rst ;
        }

        return null ;
    }

    public function bind_by_mobile($openid, $phone) {
        //手机号是否存在
        $where = array("mobile" => $phone) ;
        $cnt = $this->user_atomic_model->cnt($where) ;
        if($cnt > 0) {
            $arr = array("wx_openid" => $openid) ;

            $where1 = array("wx_openid" => $openid) ;
            $arr1 = array("wx_openid" => $openid."-".$phone, "name" => "binded") ;

            $this->load->model("atomic/user_atomic_model", "user_atomic_model") ;

            $this->user_atomic_model->db->trans_start() ;

            //1.先把旧的openid更新掉
            $rst = $this->user_atomic_model->upd($arr1 , $where1) ;

            //2.再把openid关联到mobile上
            $this->user_atomic_model->upd($arr, $where) ;

            $this->user_atomic_model->db->trans_complete() ;

            return !empty($rst) ;
        } else {
            $where = array("wx_openid" => $openid) ;
            $arr = array("mobile" => $phone) ;
            $rst = $this->user_atomic_model->upd( $arr, $where) ;
            return !empty($rst) ;
        }
    }

    public function get_openid_by_id($id) {
        $where = array("id" => $id) ;
        $select = "wx_openid" ;
        $this->load->model("atomic/user_atomic_model", "user_atomic_model") ;
        $rst = $this->user_atomic_model->slt_row_arr($where, $select) ;
        if(!empty($rst)) {
            return $rst['wx_openid'];
        }
        return "";
    }

    public function register_from_wx_web($openid, $from) {
        $this->load->model("atomic/user_atomic_model", "user_atomic_model") ;
        $where_user = array("wx_openid" =>  $openid) ;
        $rst = $this->user_atomic_model->cnt($where_user) ;
//        $rst = $this->wx_user_atomic->cnt($where) ;
        if( $rst == 0 ) {
            $where = array("openid" =>  $openid) ;
            $arr = array(
                "openid" =>  $openid,
                "create_time" =>time()
            ) ;

            $this->load->model("user_model") ;
            $this->wx_user_atomic->db->trans_start() ;

            $this->wx_user_atomic->ins_or_upd($arr,$where) ;

            // 添加为注册用户
            $rst = $this->user_model->register(Ptype::TYPE_A , User_model::REG_TYPE_WX, time(), '', null, '', $from, '', $openid) ;
            $this->user_model->begin_use_platfrom($rst['insert_id']) ;
            $this->wx_user_atomic->db->trans_complete() ;
            if(empty($rst)) {
                return -1;
            } else {
                return 2;
            }
        }

        return 1;
    }



}