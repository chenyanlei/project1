<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/17
 * Time: 下午7:22
 */
class Store extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

   public function manage_store() {
        $this->session->current_page = 9;
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('store',FALSE);
       $this->load_view("store/store.html",$data);
   }
   public function add_store_id() {
        $this->session->current_page = 9;
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('store',FALSE);
       $this->load_view("store/add_store.html",$data);
   }
   public function add_store_info() {
        $data['uid']=$this->input->post('uid');
        $data['contact_phone'] = $this->input->get_post('contact_phone');
        $this->session->current_page = 9;
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('store',FALSE);
       $this->load_view("store/add_store_info.html",$data);
   }
    public function add_user(){
        $this->load_view("store/add_user.html");
    }
    public function set_agent_info(){
        $data['uid'] = $this->input->post('uid');
        $this->load_view("store/set_info.html",$data);
    }

    public function get_list(){
        $sdata = $this->input->get(null) ;
        if(!isset($sdata)) {
            $sdata = $this->input->post(null) ;
        }

        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'user_member/get_list';
        $s=h_curl($url,$sdata);
        //返回数据给客户端
        h_echo_json($s);
    }

    public function delete_agent(){
        $sdata['uid'] = $this->input->get_post('uid');
        

        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'user_member/del_agent';
        $s=h_curl($url,$sdata);
        //返回数据给客户端
        h_echo_json($s);
    }

    public function reset_agentinfo(){
        $sdata = $this->input->get_post(null);

        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'user_member/reset_agent_info';
        $s=h_curl($url,$sdata);
        //返回数据给客户端
        h_echo_json($s);
    }

}