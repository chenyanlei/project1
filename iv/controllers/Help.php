<?php

/**
 * Created by IntelliJ IDEA.
 * User: junlei
 * Date: 16/5/23
 * Time: 下午14:47
 */
class Help extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home() {
        $this->session->footer_page=1 ;
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('help',FALSE) ;
        $pages = array() ;
        array_push($pages,"help/use_help.html") ;
        $this->load_views_help($pages,$data);

    }

    public function service_protocol() {
        $this->load->view('help/service_protocol') ;
    }


}   