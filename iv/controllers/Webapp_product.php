<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/11
 * Time: 下午12:38
 */
class Webapp_product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $user_agent = $_SERVER['HTTP_USER_AGENT'];//获取浏览器信息
        if (strpos($user_agent, 'MicroMessenger')) {
            if (!isset($_SESSION['openid'])) {
                $this->load->library('request_openid');
                $this->request_openid->get_return(URL . $_SERVER['REQUEST_URI']);
            }
            if (!isset($_SESSION['token'])) {
                $this->load->library('request_openid');
                $this->request_openid->band_openid();
            }
        }
    }

    //获取代理商产品列表
    public function get_a_product_list(){
        $this->load->view('/webapp/product_list');
    }
    //店张推荐
    public function agent_recommond(){
        //绑定参数
        $aid = $this->input->get('aid');
        if(!$aid){
            $aid = 2;
        }
        $sdata['aid'] = $aid;
        $page = (int)($this->input->get('page'));
        if($page){
            $sdata['pn'] = $page;
        }

        $rn = (int)($this->input->get('rn'));
        if($rn){
            $sdata['rn'] = $rn;
        }else{
            $sdata['rn'] = 3;
        }

        $this->add_webapp_default_params($sdata,$_SESSION['token']);

        //请求接口
        $url=URL_API.'product_shop/get_agent_product';

        $s=h_curl($url,$sdata);
        $datainfo = json_decode($s,true);
        if($datainfo['result']['err'] === 0){
            $data=$datainfo['content'];
            $s= json_encode($data);
        }

        h_echo_json($s);
    }

    //产品详情
    public function product_detail(){

       $id =$this->input->get('pid');
       $p_type =$this->input->get('p_type');
       $aid =$this->input->get('aid');
       if(!isset($aid)) {
           $aid = 2 ;
       }

       $sdata['aid'] =  $aid;
       $sdata['p_type'] = $p_type;
       $sdata['id'] = $id;
       $url=URL_API.'product/detail';
        if(isset($_SESSION['token'])){
            $this->add_webapp_default_params($sdata,$_SESSION['token']);
        }else{
            $this->add_webapp_default_params($sdata);
        }

       $content= h_curl($url,$sdata);
       $datainfo=json_decode($content,true);
       // var_dump($datainfo);
       if($datainfo['result']['err'] === 0) {
           $data = $datainfo['content'];
//           $this->load->library('weixin_js');
//           $data['config'] = $this->weixin_js->getSignPackage();
           $data['pid'] = $id;
           $data['aid'] = $aid;
           $data['edit_url'] = '/product_edit/oneday?id=' . $id;
           $data['tip_title'] = $this->lang->line('product_mng', false);
           $data1['data'] = json_encode($data);
           $this->load->view('webapp/product_detail', $data1);
       }else if($datainfo['result']['err'] === 4004){
           $this->load->view('/webapp/error/no_result.html');
       } else {
           $data['msg'] = $datainfo['result']['err'].':'.$datainfo['result']['msg'];
           $this->load->view('/webapp/error/other_error.html',$data);
       }
    }




    //平台产品分类首页
    public function  group_travel (){
        $sdata = array();
        $this->add_webapp_default_params($sdata,$_SESSION['token']);
        //目的地接口请求
        $url_d=URL_API.'destination/get_all_list';
        $sd=h_curl($url_d,$sdata);
        $destinate = json_decode($sd,true);
        //绑定参数
        $classfy = $this->input->get('act');
        if($classfy === 'z') {
            $sdata['classify'] = 1;
            $act = 'z' ;
        }elseif($classfy === 'y'){
            $sdata['classify'] = 2;
             $act = 'y' ;
        }else{
            $this->load_view_errors(null);
        }

        //产品列表请求
        //请求接口
        $url=URL_API.'product_mall/all';

        $s=h_curl($url,$sdata);

        $info=json_decode($s,true);

        if($info['result']['err'] == 0){
            $data= $info['content'];
            $data['dest'] = $destinate['content'];
            $data['aid']=2;
            $data['act'] = $act;
            $data1['data'] = json_encode($data);
            $this->load->view('webapp/group_travel.html',$data1);
        }else if($info['result']['err'] === 4004){
            $this->load->view('/webapp/error/no_result.html');
        } else {
            $data['msg'] = $info['result']['err'].':'.$info['result']['msg'];
            $this->load->view('/webapp/error/other_error.html',$data);
        }

    }

    //商品列表
    public function pro_list(){
        $this->load->view('webapp/pro_list.html');
    }
    //商品列表请求接口
    public function pro_list_data(){
        $this->add_webapp_default_params($sdata,$_SESSION['token']);
        $continent=$this->input->get('continent');
        $arr = array('asia','europe','north_america','africa','oceania');
        if($continent!='' && in_array($continent,$arr)){
            $sdata['continent'] = $continent;
        }
        $page = (int)($this->input->get('page'));
        if($page){
            $sdata['pn'] = $page;
        }

        $country=$this->input->get('country');
        if($country){
            $sdata['country'] =  $country;
        }
        $rn = (int)($this->input->get('rn'));
        if($rn){
            $sdata['rn'] = $rn;
        }else{
            $sdata['rn'] = 3;
        }

        $classfy = $this->input->get('act');
        if($classfy === 'z') {
            $sdata['classify'] = 1;
        }elseif($classfy === 'y'){
            $sdata['classify'] = 2;
        }else{
            $this->load_view_errors(null);
        }

        //请求接口
        $url=URL_API.'product_mall/all';
        $s=h_curl($url,$sdata);

        h_echo_json($s);
    }

    //请求全部国家
    public function pro_country_search(){
        $this->load->view('webapp/pro_country_search.html');
    }

    //目的地接口
    public function destination(){
        $sdata = array();
        $this->add_webapp_default_params($sdata,$_SESSION['token']);
        //目的地接口请求
        $url_d=URL_API.'destination/get_all_list';
        $sd=h_curl($url_d,$sdata);
        h_echo_json($sd);
    }
    //微信产品服务入口
    public function product_service(){
        //参数绑定
        $sdata = array();
        $this->add_webapp_default_params($sdata,$_SESSION['token']);

        //请求接口
        $url=URL_API.'wx_product/get_data_type';
        $s=h_curl($url,$sdata);

        $datainfo=json_decode($s,true);
        if($datainfo['result']['err'] === 0){
            $datatype = $datainfo['content']['data_type'];
            if($datatype === 2){
                $aid = $datainfo['content']['aid'];
                if(!isset($aid)){
                    $aid = 2;
                }
                header('location:/webapp_product/get_a_product_list?aid='. $aid );
            }else if($datatype === 1){
                header('location:/webapp_product/shop_list');
            }
        }else{
            $data['msg'] = $datainfo['result']['err'].':'.$datainfo['result']['msg'];
            $this->load->view('/webapp/error/other_error.html',$data);
        }
    }

    //店铺列表
    public function shop_list(){
        //参数绑定
        $sdata = array();
        $this->add_webapp_default_params($sdata,$_SESSION['token']);

        //请求接口
        $url=URL_API.'wx_product/load_agent_list';
        $s=h_curl($url,$sdata);
        $datainfo=json_decode($s,true);

        if($datainfo['result']['err'] === 0){
            $data = $datainfo['content'];
            $this->load->view('webapp/agent_list.html',$data);
        }else if($datainfo['result']['err'] === 4004){
            $this->load->view('/webapp/error/no_result.html');
        }else{
            $data['msg'] = $datainfo['result']['err'].':'.$datainfo['result']['msg'];
            $this->load->view('/webapp/error/other_error.html',$data);
        }
    }

    //平台推荐产品
    public function service_recommend(){
        $sdata= array();
        $this->add_webapp_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'product_mall/recommend';

        $s=h_curl($url,$sdata);
        $info = json_decode($s,true);
        if($info['result']['err'] == 0){
            $info['content']['act'] = 'r';
            $s = json_encode($info);
        }
        h_echo_json($s);
    }
    //平台热门产品
    public function service_hot(){
        $sdata= array();
        $this->add_webapp_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'product_mall/hot';

        $s=h_curl($url,$sdata);
        $info = json_decode($s,true);
        if($info['result']['err'] == 0){
            $info['content']['act'] = 'h';
            $s = json_encode($info);
        }

        h_echo_json($s);
    }

}