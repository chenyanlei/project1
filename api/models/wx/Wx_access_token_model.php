<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/7/29
 * Time: 下午3:34
 */
class Wx_access_token_model extends CI_Model
{
    const OK              =  0;
    const TOKEN_INVALID   =  40001;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('wx/wx_account_atomic_model', 'wx_account_atomic') ;
    }

    public function get_access_token(&$access_token, $force=false) {
        $where = array('app_name' => 'qsctrip') ;
        if(!$force){

            $slt="access_token, last_refresh";
            $rst = $this->wx_account_atomic->slt_row_arr($where, $slt) ;
            if( !empty($rst) && isset($rst['access_token']) && time() - $rst['last_refresh'] < 7140) {
                $access_token = $rst['access_token'] ;
                return true;
            }
        }

        $this->load->helper('curl') ;
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx4bfa67be4a93ca1f&secret=cabf6f01f3b1832af601aff6fd888a73" ;
        $result = '';
        $rst_data = h_curl($result, $url);

        if($rst_data === Ecode::OK) {
            $rst = json_decode($result, true) ;
            if(isset($rst['access_token'])) {
                $access_token =  $rst['access_token'] ;
                $rst = $this->wx_account_atomic->ins_or_upd(array('app_name'=>'qsctrip','access_token'=>$access_token, 'last_refresh'=>time()),$where) ;
                if(empty($rst)) {
                    return false ;
                } else {
                    return true ;
                }
            } else {
                return false ;
            }
        } else {
            echo "request weixin access_token err!";
            return false ;
        }
    }

}