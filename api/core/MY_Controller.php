<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function load_view($page,$data=array()) {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['header_lang']=$this->lang->line('lang',FALSE) ;
        $data['header_commit']=$this->lang->line('commit',FALSE) ;
        $data['txt_login_title']=$this->lang->line('login',FALSE) ;
        $data['txt_register_title']=$this->lang->line('register',FALSE) ;

        $this->load->view('header', $data) ;
		$this->load->view($page, $data) ;
		$this->load->view('footer', $data) ;
    }

    public function load_views($pages=array(),$data=array()) {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['header_lang']=$this->lang->line('lang',FALSE) ;
        $data['header_commit']=$this->lang->line('commit',FALSE) ;
        $data['txt_login_title']=$this->lang->line('login',FALSE) ;
        $data['txt_register_title']=$this->lang->line('register',FALSE) ;

        $this->load->view('header', $data) ;
        foreach($pages as $page) {
            $this->load->view($page, $data) ;
        }

        $this->load->view('footer', $data) ;
    }

    public function load_view_without_header($page,$data=array()) {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['header_lang']=$this->lang->line('lang',FALSE) ;
        $data['header_commit']=$this->lang->line('commit',FALSE) ;
        $data['txt_login_title']=$this->lang->line('login',FALSE) ;
        $data['txt_register_title']=$this->lang->line('register',FALSE) ;

        $this->load->view('header_no_title', $data) ;
        $this->load->view($page, $data) ;
        $this->load->view('footer', $data) ;
    }

    public function load_view_without_footer($page,$data=array()) {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['header_lang']=$this->lang->line('lang',FALSE) ;
        $data['header_commit']=$this->lang->line('commit',FALSE) ;
        $data['txt_login_title']=$this->lang->line('login',FALSE) ;
        $data['txt_register_title']=$this->lang->line('register',FALSE) ;

        $this->load->view('header', $data) ;
        $this->load->view($page, $data) ;
    }

    public function load_view_without_header_footer($page,$data=array()) {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['header_lang']=$this->lang->line('lang',FALSE) ;
        $data['header_commit']=$this->lang->line('commit',FALSE) ;
        $data['txt_login_title']=$this->lang->line('login',FALSE) ;
        $data['txt_register_title']=$this->lang->line('register',FALSE) ;

        $this->load->view('header_no_title', $data) ;
        $this->load->view($page, $data) ;
        $this->load->view('footer_no_title', $data) ;
    }




}