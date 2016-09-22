<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/21
 * Time: 下午4:14
 */
class Wx_account_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('wx/wx_account_atomic_model', 'wx_account_atomic');
    }



}