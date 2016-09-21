<?php

/**
 * Created by IntelliJ IDEA.
 * User: junlei
 * Date: 16/5/23
 * Time: 下午14:47
 */
class Customer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_login();
    }

    public function customer_mng() {

       $this->session->current_page = 5;
        $this->session->customer_menu_select = Constant::CUSTOMER_LIST;

        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $this->load_view('customer/customer_page',$data);
    }

    public function get_customer_list() {
        $data = $this->input->get(null) ;
        if(!isset($data)) {
            $data = $this->input->post(null) ;
        }
        $url=URL_API.'customer/get_list';
        $this->load->library('request') ;
        $this->request->add_default_request_params($data);
        $this->request->add_token_from_session($data);
        $content= h_curl($url,$data);

        h_echo_json($content) ;
    }

    public function detail() {

        $this->lang->load('info',$GLOBALS['language']) ;
        
      
   
        

        $rst = $this->get_customer_detail() ;

      
        if($rst['result']['err'] === 0){
        	$data = $rst['content'] ;
        	$data['tip_title']=$this->lang->line('customer_mng',FALSE) ;
        	$this->load_view('customer/customer_detail',$data);
        }else{
        	 $msg =$rst['result']['err'].':'.$rst['result']['msg'];
             $this->load_view_errors($msg);
        }
       
    }



    private function get_customer_detail() {
        $data = $this->input->get(null) ;
        if(!isset($data)) {
            $data = $this->input->post(null) ;
        }
        $url=URL_API.'Customer/detail';
        $this->load->library('request') ;
        $this->request->add_default_request_params($data);
        $this->request->add_token_from_session($data);

        $content= h_curl($url,$data);
        $rst = json_decode($content,true);
        return $rst;
    }
}   