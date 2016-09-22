<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/22
 * Time: 下午2:52
 */
class User_detail_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'user_detail_0';
    }

    public function set_bank_info($uid, $account, $name) {
        $arr = array('bank_account' => $account,'bank_name'=>$name, 'uid' => $uid) ;
        $where = array('uid' => $uid) ;
        return $this->ins_or_upd($arr, $where) ;
    }

    public function get_bank_info($uid) {
        $select = 'bank_account, bank_name' ;
        $where = array('uid' => $uid) ;
        $rst =  $this->slt_row_arr($where, $select) ;
        if(empty($rst['bank_account']) && empty($rst['bank_name'])) {
            return array() ;
        }
        return $rst ;
    }

    public function set_currency($uid, $currency) {
        $arr = array('currency' => $currency, 'uid' => $uid) ;
        $where = array('uid' => $uid) ;
        return $this->ins_or_upd($arr, $where) ;
    }

    public function get_currency($uid) {
        $select = 'currency' ;
        $where = array('uid' => $uid) ;
        $rst =  $this->slt_row_arr($where, $select) ;
        if(empty($rst['currency'])) {
            return array() ;
        }
        return $rst ;
    }

}