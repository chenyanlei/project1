<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/6/3
 * Time: 下午6:55
 */
class Admin_user_agent_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('atomic/agent/user_agent_atomic_model', 'user_agent_atomic');
    }

    public function get_all_agent() {
        $this->load->model('user_model') ;
//        $this->user_model->s





    }

}