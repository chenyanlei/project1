<?php

/**
 * Created by IntelliJ IDEA.
 * User: junlei
 * Date: 16/5/23
 * Time: 下午14:47
 */
class Footer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function about() {
        $this->session->footer_page=2;
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('about_us',FALSE) ;
        $this->load_view_footer('footer/about-us.html',$data) ;

    }
    public function contact() {
        $this->session->footer_page=3 ;
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('contact_us',FALSE) ;
        $this->load_view_footer('footer/contact-us.html',$data) ;

    }
    public function join() {
        $this->session->footer_page=4 ;
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('join_us',FALSE) ;
        $this->load_view_footer('footer/join-us.html',$data) ;

    }
    public function server() {
        $this->session->footer_page=5 ;
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('server',FALSE) ;
        $this->load_view_footer('footer/server.html',$data) ;

    }
    

}   