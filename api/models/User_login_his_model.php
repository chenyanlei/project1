<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/27
 * Time: 下午9:21
 */
class User_login_his_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('atomic/user_login_his_atomic_model', 'user_login_his_atomic');
    }

    public function record_login_log($uid, $status, $ip, $msg, $login_name,$login_from=null) {
        if(!isset($login_from) || !$login_from) {
            $login_from = "web" ;
        }

        $arr = array('uid' => $uid ,
                'status' => $status ,
                'ip' => $ip ,
                'msg' => $msg ,
                'login_name' => $login_name,
                'login_from' => $login_from) ;
        $this->user_login_his_atomic->ins($arr) ;
    }



}