<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/25
 * Time: 上午9:51
 */
class Personal extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('request') ;
    }

    public function commition() {
       
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $c_type = $this->input->get_post('c_type') ;

        if($c_type === '2'){
            $data['c_type'] = 2;
        }else{
            $data['c_type'] = 1;
        }

        //获取我的佣金
        $this->_get_my_commition($data, $c_type) ;



        $this->load_view("personal/commition",$data);
    }

    public function _get_my_commition(&$data, $c_type) {
        $params['c_type'] = $c_type ;
        $this->request->add_default_request_params($params) ;
        $this->request->add_token_from_session($params) ;

        //请求接口
        $url=URL_API.'/commition/get_my_commition';
        $s=h_curl($url,$params);
        $rst = json_decode($s, true) ;

        if($rst['result']['err'] == Ecode::OK) {
            $data['data'] = $rst['content'] ;
        }
    }

    public function home() {
        $this->session->current_page = 4;
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $data['menu_data']= 0 ;
         $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('account',FALSE);
        $pages = array() ;
        array_push($pages,"personal/header") ;
        array_push($pages,"personal/account_info") ;
        array_push($pages,"personal/footer") ;

//        $this->_get_my_agent_info($data) ;
        $this->_get_user_detail_info($data) ;
        $this->load_views($pages,$data);
    }

    private function _get_user_detail_info(&$data) {
        $params = $this->input->get() ;
        $this->request->add_token_from_session($params) ;
        $this->request->add_default_request_params($params) ;
        //请求接口
        $url=URL_API.'user/get_my_detail';

        $s=h_curl($url,$params);
        $json_obj = json_decode($s, true) ;
        if($json_obj['result']['err'] == Ecode::OK) {
            $data['user_detail'] = $json_obj['content'];
        }
    }

    public function receive_account() {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $data['menu_data']= 1 ;

        $sdata = array();
        $this->add_default_params($sdata,$_SESSION['token']) ;

        //请求接口
        $url=URL_API.'/user/get_bank_info';

        $s=h_curl($url,$sdata);
        $userinfo=json_decode($s,true);

//        var_dump($userinfo) ;

        if($userinfo['result']['err']===0){
            $data['bank']=$userinfo['content'];
            $pages = array() ;
            array_push($pages,"personal/header") ;
            array_push($pages,"personal/receive_account") ;
            array_push($pages,"personal/footer") ;
            $this->load_views($pages,$data);
        }else if($userinfo['result']['err']===4004){
            $pages = array() ;
            array_push($pages,"personal/header");
            array_push($pages,"personal/set_receive_account") ;
            array_push($pages,"personal/footer") ;
            $this->load_views($pages,$data);
        }else{
            $msg = $userinfo['result']['err'].':'.$userinfo['result']['msg'];
            $this->load_view_errors($msg);
        }
    }

    public function set_receive_account() {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $data['menu_data']= 1 ;
        $pages = array() ;
        array_push($pages,"personal/header") ;
        array_push($pages,"personal/set_receive_account") ;
        array_push($pages,"personal/footer") ;
        $this->load_views($pages,$data);
    }

    public function set_bank(){

        $data=$this->input->post(null);
        if(!isset($data['account'])) {
            $data['account'] ='';
        }
        if(!isset($data['name'])) {
            $data['name'] ='';
        }

        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $data['menu_data']= 1 ;

        $pages = array() ;
        array_push($pages,"personal/header") ;
        array_push($pages,"personal/set_bank") ;
        array_push($pages,"personal/footer") ;
        $this->load_views($pages,$data);
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
            header('location:/personal/receive_account');
        }else{
            $msg = $bankinfo['result']['err'].':'.$bankinfo['result']['msg'];
            $this->load_view_errors($msg);
        }
    }

    public function modify_pwd() {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $data['menu_data']= 2 ;
        $pages = array() ;
        array_push($pages,"personal/header") ;
        array_push($pages,"personal/modify_pwd") ;
        array_push($pages,"personal/footer") ;
        $this->load_views($pages,$data);
    }

    public function setting_currency() {

        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $data['menu_data']= 3 ;
        $sdata = array();
        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'/user/get_currency';
        $s=h_curl($url,$sdata);
        $currinfo=json_decode($s,true);
        if($currinfo['result']['err']===0){
            $data['currency'] = $currinfo['content']['currency'];
            $pages = array() ;
            array_push($pages,"personal/header") ;
            array_push($pages,"personal/setting_currency") ;
            array_push($pages,"personal/footer") ;
            $this->load_views($pages,$data);
        }else if($currinfo['result']['err']===4004){
            $data['currency'] ='';
            $pages = array() ;
            array_push($pages,"personal/header") ;
            array_push($pages,"personal/setting_currency") ;
            array_push($pages,"personal/footer") ;
            $this->load_views($pages,$data);
        }else{
            $msg = $currinfo['result']['err'].':'.$currinfo['result']['msg'];
            $this->load_view_errors($msg);
        }
    }

    public function doset_currency(){
        $currency = $this->input->post('currency');
        if(!$currency){
            $this->load_view_errors(null);
            return false;
        }
        $sdata['currency'] = $currency;
        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'/user/set_currency';
        $s=h_curl($url,$sdata);
        $reinfo=json_decode($s,true);

        if($reinfo['result']['err']===0){
            header('location:/personal/setting_currency');
        }else{
            $msg = $reinfo['result']['err'].':'.$reinfo['result']['msg'];
            $this->load_view_errors($msg);
        }
    }

    public function msg_all() {
        $msg_type = $this->input->get('msg_type') ;
        if($msg_type == '0') {
            $data['menu_data']= 4 ;
        } else if($msg_type == '1') {
            $data['menu_data']= 5 ;
        } else if($msg_type == 2) {
            $data['menu_data']= 6 ;
        } else if($msg_type == 3) {
            $data['menu_data']= 7 ;
        } else {
            $data['menu_data']= 4 ;
        }
        //load data
        // ...

        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $pages = array() ;
        array_push($pages,"personal/header") ;
        array_push($pages,"personal/msg/all") ;
        array_push($pages,"personal/footer") ;
        $this->load_views($pages,$data);
    }

    public function check_pwd(){
        $pwd = $this->input->post('old_pass');
        if(!$pwd){
            return false;
        }
        //请求接口
        $url=URL_API.'user/check_pwd_by_uid';
         $sdata['password'] =  $pwd;
         $this->add_default_params($sdata,$_SESSION['token']) ;
         $s=h_curl($url,$sdata);

         $returninfo = json_decode($s,true);
         if($returninfo['result']['err']==0){
            $this->session->pass_sign = '';
            $sign = md5(time().rand(10000,99999));
            $this->session->pass_sign = $sign;
         }else{
            $this->session->pass_sign = '';
         }
        //返回数据给客户端
        h_echo_json($s);

    }

    public function reset_password(){
        if(!$this->session->pass_sign){
            $this->load_view_errors(null);
            return false;
        }
        $npwd = $this->input->post('n_pwd');
        if(!$npwd){
            $this->load_view_errors(null);
            return false;
        }
        $sdata['pwd'] =  $npwd;
        $rnpwd = $this->input->post('rn_pwd');
        if(!$npwd){
            $this->load_view_errors(null);
            return false;
        }
        $sdata['repwd'] =  $rnpwd;

         //请求接口
        $url=URL_API.'user/reset_pwd';

        $this->add_default_params($sdata,$_SESSION['token']) ;
        $s=h_curl($url,$sdata);

          $info=json_decode($s,true);

        if($info['result']['err']==0){
            header('location:/personal/home');
        }else{
            $msg =$info['result']['err'].':'.$info['result']['msg'];
            $this->load_view_errors($msg);
        }
    }
}