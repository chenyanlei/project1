<?php

/**
 * Created by IntelliJ IDEA.
 * User: junlei
 * Date: 16/5/23
 * Time: 下午14:47
 */
class Spread extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function extend() {
    	$pid = (int)($this->input->get('pid'));
    	if(!$pid){
    		$this->load_view_errors(null);
            return false;
    	}
    	$sdata['pid'] = $pid;

    	$this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口http://api.qsctrip.com/get_list_by_pid?token=dd72ef0dce1daf2305a6e47691bad12b&type=2&pid=1
        $url=URL_API.'product_material/get_list_by_pid';
       
        $s=h_curl($url,$sdata);

        $info=json_decode($s,true);

        if($info['result']['err'] == 0) {

            $data = $this->get_product_info($pid);
            $data['data'] = $info['content']['data'];
            $data['img_url'] = $info['content']['img_url'];
            $data['act'] = 'e';
            $data['id'] = $pid;
            $this->lang->load('info', $GLOBALS['language']);
            $data['tip_title'] = $this->lang->line('mall_mng', FALSE);
            $this->load_view('spread/extend.html', $data);
        }else if($info['result']['err'] == 4004){
            $data = $this->get_product_info($pid);
            $data['data'] ='';
            $data['act'] = 'e';
            $data['id'] = $pid;
            $this->lang->load('info', $GLOBALS['language']);
            $data['tip_title'] = $this->lang->line('mall_mng', FALSE);
            $this->load_view('spread/extend.html', $data);
        } else {
           $msg = $info['result']['err'].':'.$info['result']['msg'];
           $this->load_view_errors($msg);
        }
       
    }

   
     public function myextend() {
    	$pid = (int)($this->input->get('pid'));
    	if(!$pid){
    		$this->load_view_errors(null);
            return false;
    	}
    	$sdata['pid'] = $pid;

    	$this->add_default_params($sdata,$_SESSION['token']) ;
        $url=URL_API.'product_material/get_my_list';
       
        $s=h_curl($url,$sdata);
        $info=json_decode($s,true);

        if($info['result']['err'] == 0){

            $data=$this->get_product_info($pid);
            $data['data']=  $info['content']['data'];
            $data['img_url']=  $info['content']['img_url'];
            $data['act'] = 'm';
	    	$data['id']=$pid;
    	    $this->lang->load('info',$GLOBALS['language']) ;
            $data['tip_title']=$this->lang->line('mall_mng',FALSE);
            $this->load_view('spread/extend.html',$data) ;
        }else if($info['result']['err'] == 4004){
            $data = $this->get_product_info($pid);
            $data['data'] ='';
            $data['act'] = 'm';
            $data['id'] = $pid;
            $this->lang->load('info', $GLOBALS['language']);
            $data['tip_title'] = $this->lang->line('mall_mng', FALSE);
            $this->load_view('spread/extend.html', $data);
        } else {
           $msg = $info['result']['err'].':'.$info['result']['msg'];
           $this->load_view_errors($msg);
        }
       
    }

     public function get_product_info($pid) {
    	$s_data['id'] = $pid;
    	$s_data['deep_detail'] = 0;
    	$s_data['p_type'] = 1;
    	$this->add_default_params($s_data,$_SESSION['token']) ;
      
      	$url=URL_API.'product/detail';
        $s=h_curl($url,$s_data);
        $info=json_decode($s,true);

        if($info['result']['err'] == 0){
            $con=$info['content'];
            $data['title']=$con['title'];
            $data['face_img']=$con['face_img'];
            $data['display_prices']=$con['display_prices'];
            $data['price_type']=$con['price_type'];
            return $data;
        } else {
          return false;
        }
       
    }

    public function add(){

    	$mid = (int)($this->input->post('mid'));
    	if(!$mid){
    		$this->load_view_errors(null);
            return false;
    	}
    	$sdata['mid'] = $mid ;
    	$pid = (int)($this->input->post('pid'));
    	if(!$pid){
    		$this->load_view_errors(null);
            return false;
    	}
    	$sdata['pid'] = $pid ;
    	$this->add_default_params($sdata,$_SESSION['token']) ;
        
        $url=URL_API.'/product_spread/create';
       
        $s=h_curl($url,$sdata);

        $info=json_decode($s,true);

        if($info['result']['err'] == 0){
        	$infos = $info['content'];
            header('location:/product/get_share_detail?id='.$infos['id'].'&aid='.$infos['aid'].'&p_type=1');
        } else {
           $msg = $info['result']['err'].':'.$info['result']['msg'];
           $this->load_view_errors($msg);
        }
    }

    public function mymaterial(){
        $params = array();
        $page = (int)($this->input->get('page'));
        if($page){
            $params['pn'] = $page;
        }
        $params['rn'] = 8;
        $this->load->library('request') ;
        $this->request->add_default_request_params($params) ;
        $this->request->add_token_from_session($params) ;

        //请求接口
        $url=URL_API.'product_material/get_my_list';
        $s=h_curl($url,$params);

        $info = json_decode($s,true) ;

        if($info['result']['err'] === 0) {
            $data=$info['content'];
            $data['page'] = $page;
            $data['aid'] = $this->session->user_id;
            $data['p_type'] = Ptype::ONE_DAY;
             $this->lang->load('info',$GLOBALS['language']) ;
            $data['tip_title']=$this->lang->line('shop_mng',FALSE);
             $this->load_view('spread/mymaterial.html',$data);
        }else if($info['result']['err'] = 4004){
            $this->lang->load('info',$GLOBALS['language']) ;
            $data['tip_title']=$this->lang->line('shop_mng',FALSE);
            $data['act'] = 'share';
            $this->load_view('shop/no_result.html',$data);
        }else{
             $msg = $info['result']['err'].':'.$info['result']['msg'];
           $this->load_view_errors($msg);
        }
       
    }

    public function add_spread(){
         $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('shop_mng',FALSE);
        $this->load_view('spread/add_spread.html',$data);
    }


    public function do_add_spread(){
        $params = $this->input->post(null);
         $this->load->library('request') ;
        $this->request->add_default_request_params($params) ;
        $this->request->add_token_from_session($params) ;

        //请求接口
        $url=URL_API.'product_material/add';
        $s=h_curl($url,$params);
        $info = json_decode($s,true) ;

        if($info['result']['err'] === 0) {
             header('location:/spread/mymaterial');
        }else{
             $msg = $info['result']['err'].':'.$info['result']['msg'];
           $this->load_view_errors($msg);
        }
    }

    public function material_detail(){
        $params['id'] = $this->input->get('id');
        $params['aid'] = $this->session->user_id;
        $params['p_type'] = Ptype::ONE_DAY;
         $this->load->library('request') ;
        $this->request->add_default_request_params($params) ;
        $this->request->add_token_from_session($params) ;

        //请求接口
        $url=URL_API.'product_material/get_detail';
        $s=h_curl($url,$params);
        $info = json_decode($s,true) ;

        if($info['result']['err'] === 0) {
            $data=$info['content'];
            $this->lang->load('info',$GLOBALS['language']) ;
            $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
             $this->load_view_top("spread/material_detail.html",$data);
        }else{
             $msg = $info['result']['err'].':'.$info['result']['msg'];
           $this->load_view_errors($msg);
        }
    }

     public function material_detail_iframe(){
        $params['id'] = $this->input->get('id');
        $params['aid'] = $this->session->user_id;
        $params['p_type'] = Ptype::ONE_DAY;
         $this->load->library('request') ;
        $this->request->add_default_request_params($params) ;
        $this->request->add_token_from_session($params) ;

        //请求接口
        $url=URL_API.'product_material/get_detail';
        $s=h_curl($url,$params);
        $info = json_decode($s,true) ;

        if($info['result']['err'] === 0) {
            $data=$info['content'];
             $this->load->view("spread/material_detail.html",$data);
        }else{
             $msg = $info['result']['err'].':'.$info['result']['msg'];
           $this->load_view_errors($msg);
        }
    }
}  