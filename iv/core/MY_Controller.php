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
    public function load_view_footer($page,$data=array()) {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['header_lang']=$this->lang->line('lang',FALSE) ;
        $data['header_commit']=$this->lang->line('commit',FALSE) ;
        $data['txt_login_title']=$this->lang->line('login',FALSE) ;
        $data['txt_register_title']=$this->lang->line('register',FALSE) ;

        $this->load->view('footer-info', $data) ;
        $this->load->view($page, $data) ;
        $this->load->view('footer', $data) ;
    }

    public function load_view_top($page,$data=array()) {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['header_lang']=$this->lang->line('lang',FALSE) ;
        $data['header_commit']=$this->lang->line('commit',FALSE) ;
        $data['txt_login_title']=$this->lang->line('login',FALSE) ;
        $data['txt_register_title']=$this->lang->line('register',FALSE) ;

        $this->load->view('header_top', $data) ;
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
    public function load_views_help($pages=array(),$data=array()) {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['header_lang']=$this->lang->line('lang',FALSE) ;
        $data['header_commit']=$this->lang->line('commit',FALSE) ;
        $data['txt_login_title']=$this->lang->line('login',FALSE) ;
        $data['txt_register_title']=$this->lang->line('register',FALSE) ;

        $this->load->view('footer-info', $data) ;
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
    public function load_view_webapp_footer($page,$data=array()) {
        $this->load->view($page, $data) ;
        $this->load->view('webapp/footer.html') ;
    }
    public function load_view_errors($err_msg){
         $this->lang->load('info',$GLOBALS['language']) ;
         $data['tip_title'] =  $this->lang->line('error_title',FALSE) ;;
        if($err_msg){
            $data['err_msg'] =  $err_msg;
        }else{
            $data['err_msg'] =  $this->lang->line('error_info',FALSE);
        }
         
          $this->load_view('errors/public/error',$data);
    }

    public function add_default_params(&$sdata, $token=''){
         $sdata['from'] = 'web';
         $sdata['type']=2;
         if($token){
           $sdata['token']=$token;      
         }
    }
    public function add_webapp_default_params(&$sdata, $token=''){
         $sdata['from'] = 'wx_web';
         $sdata['type']=2;
         if($token){
           $sdata['token']=$token;      
         }
    }

    public function is_login(){
        if(isset($_SESSION['token']) && $_SESSION['begin_use'] == '1'){
            return true;
        }else{
            header('location:/user/login');
            return false;
        }
    }



}