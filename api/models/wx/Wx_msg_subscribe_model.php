<?php

/**
 * 微信用户关注操作
 * User: yake
 * Date: 16/07/28
 * Time: 下午6:55
 */
class Wx_msg_subscribe_model extends CI_Model
{
    public $access_token = '';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('wx/wx_access_token_model', 'wx_access_token_model') ;
        $this->load->helper('curl') ;
    }

    public function get_wx_user_by_openid($openid) {
        $user_infor = $this->_get_wx_user_info($openid) ;
        if($user_infor == null) {
            return 1;
        }

        // 注册
        $this->load->model("wx/wx_user_atomic_model", "wx_user_atomic_model") ;
        $arr = array(
            "openid" => $user_infor['openid'],
            "nickname" => isset($user_infor['nickname'])?$user_infor['nickname']:"",
            "headimgurl" => isset($user_infor['headimgurl'])?$user_infor['headimgurl']:"",
            "unionid" => isset($user_infor['unionid'])?$user_infor['unionid']:"",
            "sex" => isset($user_infor['sex'])?$user_infor['sex']:"",

            "province" => isset($user_infor['province'])?$user_infor['province']:"",
            "city" => isset($user_infor['city'])?$user_infor['city']:"",
            "country" => isset($user_infor['country'])?$user_infor['country']:"",
            "create_time" => time(),
            "subscribe" => isset($user_infor['subscribe'])?$user_infor['subscribe']:"0",
        ) ;

        $where = array("openid" => $user_infor['openid']) ;
        $rst = $this->wx_user_atomic_model->ins_or_upd($arr,$where) ;
    }

    public function subscribe($obj_msg) {
        $fromUsername = $obj_msg->FromUserName;
        $user_infor = $this->_get_wx_user_info($fromUsername) ;
        if($user_infor == null) {
            return 1;
        }

        // 注册
        $this->load->model("wx/wx_user_atomic_model", "wx_user_atomic_model") ;
        $arr = array(
            "openid" => $user_infor['openid'],
            "nickname" => $user_infor['nickname'],
            "headimgurl" => $user_infor['headimgurl'],
            "unionid" => $user_infor['unionid'],
            "sex" => $user_infor['sex'],

            "province" => $user_infor['province'],
            "city" => $user_infor['city'],
            "country" => $user_infor['country'],
            "create_time" => time(),
            "subscribe" => $user_infor['subscribe'],
        ) ;

        $where = array("openid" => $user_infor['openid']) ;
        $rst = $this->wx_user_atomic_model->ins_or_upd($arr,$where) ;
//        if($rst) {
//
//        }
    }

    public function unsubscribe($obj_msg) {

    }

    private function _get_wx_user_info($fromUsername, $force_access_token=false) {
        $this->wx_access_token_model->get_access_token($this->access_token, $force_access_token) ;
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$this->access_token&openid=$fromUsername&lang=zh_CN" ;
        $result = '';
        $rst_data = h_curl($result, $url);

        if($rst_data == Ecode::OK) {
            $rst = json_decode($result, true) ;
            if(isset($rst['errcode']) && $rst['errcode'] == Wx_access_token_model::TOKEN_INVALID) {
                if($force_access_token) {
                    return null;
                }
                $user_info = $this->_get_wx_user_info($fromUsername, true) ;
                return $user_info;
            }

            return $rst;
        }

        return null ;
    }



}