<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/17
 * Time: 下午7:28
 */
class User_mng extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
    }

    public function user_mng() {

        $this->session->current_page = 5;

        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;

        $this->load_view('user/mng_page',$data);

    }


}