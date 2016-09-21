<?php

/**
 * Created by IntelliJ IDEA.
 * User: junlei
 * Date: 16/06/29
 * Time: 14:00
 *
 *
 */
class Financial extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function currency() {

    	
        $this->session->current_page = 7;
        $sdata = array();
        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'/user/get_bank_info';

        $s=h_curl($url,$sdata);
        // var_dump($s);exit;
        $userinfo=json_decode($s,true);
        if($userinfo['result']['err']===0){
        	$this->lang->load('info',$GLOBALS['language']) ;
       		$data['tip_title']=$this->lang->line('financial_mng',FALSE) ;
            $data['bank']=$userinfo['content'];
            $this->load_view('financial/account',$data);
        }else if($userinfo['result']['err']===4004){
        	$this->lang->load('info',$GLOBALS['language']) ;
       		$data['tip_title']=$this->lang->line('financial_mng',FALSE) ;
            $this->load_view('financial/set_account',$data);
        }else{
          $msg = $userinfo['result']['err'].':'.$userinfo['result']['msg'];
             $this->load_view_errors($msg);
        }
    }

    public function set_bank(){
        $data=$this->input->post(null);

         if(!isset($data['account'])) {
            $data['account'] ='' ;
        }

        if(!isset($data['name'])) {
            $data['name'] ='' ;
        }

    	$this->lang->load('info',$GLOBALS['language']) ;
       	$data['tip_title']=$this->lang->line('financial_mng',FALSE) ;
       	$this->load_view('financial/set_bank',$data);

    }

     public function doset_bank(){
        $account = $this->input->post('account');

        if(!$account){
            $this->load_view_errors(null);
            return false;
        }
        $sdata['account'] = $account;
        $name = $this->input->post('name');
        if(!$name){
            $this->load_view_errors(null);
            return false;
        }
        $sdata['name'] = $name;

        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'/user/set_bank_info';
        $s=h_curl($url,$sdata);

        $bankinfo=json_decode($s,true);


        if($bankinfo['result']['err']===0){
            header('location:/financial/currency');
         }else{
             $msg = $bankinfo['result']['err'].':'.$bankinfo['result']['msg'];
             $this->load_view_errors($msg);
         } 

    }

}    
