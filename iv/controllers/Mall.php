<?php

/**
 * Created by IntelliJ IDEA.
 * User: junlei
 * Date: 16/6/27
 * Time: 下午9:00
 *
 * 
 * 
 * 
 * 当前语言
 *
 */
class Mall extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        if(!isset($_SESSION['token'])) {
            header("location:/user/login") ;
            die() ;
        }
    }


    //热门
    public function hot(){

        $sdata= array();
        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'product_mall/hot';
       
        $s=h_curl($url,$sdata);

        $info=json_decode($s,true);
//         var_dump($info['content']);
        if($info['result']['err'] == 0){

            $data = $info['content'];
            $data['act'] = 'h';
            $data['result'] ="1";
            $data['aid'] = $this->session->user_id;
            $this->lang->load('info',$GLOBALS['language']) ;
            $data['tip_title']=$this->lang->line('mall_mng',FALSE);
            //$this->load->view('mall/recommend.html',$data);
             $this->load_view('mall/recommend.html',$data);
        }else if($info['result']['err'] === 4004){
            $this->lang->load('info', $GLOBALS['language']);
            $data['tip_title'] = $this->lang->line('mall_mng', FALSE);
            $this->load_view('mall/no_result.html', $data);
        } else {
           $msg = $info['result']['err'].':'.$info['result']['msg'];
           $this->load_view_errors($msg);
        }
    }

    //推荐
     public function recommend(){

        
        $this->session->current_page = 1;
        $sdata= array();
        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'product_mall/recommend';
       
        $s=h_curl($url,$sdata);
        $info=json_decode($s,true);

        if($info['result']['err'] === 0) {

            $data = $info['content'];
            $data['act'] = 'r';
            $data['result'] = "1";
            $data['aid'] = $this->session->user_id;
            $this->lang->load('info', $GLOBALS['language']);
            $data['tip_title'] = $this->lang->line('mall_mng', FALSE);
            // $this->load->view('mall/recommend.html',$data);
            $this->load_view('mall/recommend.html', $data);
        }else if($info['result']['err'] === 4004){
            $this->lang->load('info', $GLOBALS['language']);
            $data['tip_title'] = $this->lang->line('mall_mng', FALSE);
            $this->load_view('mall/no_result.html', $data);
        } else {
           $msg = $info['result']['err'].':'.$info['result']['msg'];
           $this->load_view_errors($msg);
        }
    }
    //
    public function search(){

        $this->session->current_page = 1;
        $sdata= array();
        $this->add_default_params($sdata,$_SESSION['token']) ;
        $tagname=$this->input->get('tagname');
        $sdata['tag'] = $tagname;
        $continent=$this->input->get('continent');
        $arr = array('asia','europe','north_america','africa','oceania');
        if($continent!='' && $continent!= 'allcontinent' && in_array($continent,$arr)){
            $sdata['continent'] = $continent;
        }
        $page = (int)($this->input->get('page'));
        if($page){
            $sdata['pn'] = $page;
        }

        $country=$this->input->get('country');
        $sdata['country'] =  $country;
        $sdata['rn'] = 6;
        $classfy = $this->input->get('act');
        if($classfy === 'z') {
            $sdata['classify'] = Ptype::PRODUCT_CLASSIFY_GROUP;
        }elseif($classfy === 'y') {
            $sdata['classify'] = Ptype::PRODUCT_CLASSIFY_FREE;
        }elseif($classfy === 'zi'){
            $sdata['classify'] = Ptype::PRODUCT_CLASSIFY_GROUP_IN;
        }elseif($classfy === 'yi'){
            $sdata['classify'] = Ptype::PRODUCT_CLASSIFY_FREE_IN;
        }else{
            $this->load_view_errors(null);
        }
        
        //请求接口
        $url=URL_API.'product_mall/all';
       
        $s=h_curl($url,$sdata);

        $info=json_decode($s,true);


        //请求接口
        $url_d=URL_API.'destination/get_all_list';

        $sd=h_curl($url_d,$sdata);
        $con_info=json_decode($sd,true);
        
        if($info['result']['err'] == 0){
          
            $data = $info['content'];
            $data['page']=$page;
            $data['rn'] = 6;
            $data['result'] ="1";
            $data['aid'] = $this->session->user_id;
            if(!isset($data['list'])){
                $data['list'] = $data['recommend'];
                $data['result'] ="";
            }
            $data['act'] = $classfy;
            if($tagname!='' && $tagname!='alltagname'){
                    $data['tagname'] = $tagname;
            }else{
                    $data['tagname'] = '';
            }   
            if($continent!='' && $continent!= 'allcontinent' && $country=='' && in_array($continent,$arr)){
                
                $data['country_list'] = $con_info['content'][$continent];
                $data['continent'] = $continent;  
                $this->change($continent); 
                $data['contin'] = $continent;  
            }else{
                $data['country_list'] = '';
                $data['continent'] = '';
            }

           if($country!='' && $country!='allcontry'){
                 $data['continent'] = $continent;
                 $this->change($continent); 
                 $data['contin'] = $continent;
                 $data['country'] = $country;
                 $data['country_list'][0]['name']=$country;
            }else{
                $data['country'] = '';
            }
            $this->lang->load('info',$GLOBALS['language']) ;
            $data['tip_title']=$this->lang->line('mall_mng',FALSE);     
           // $this->load->view('mall/recommend.html',$data);
             $this->load_view('mall/recommend.html',$data);
        }else if($info['result']['err'] === 4004){
            $this->lang->load('info', $GLOBALS['language']);
            $data['tip_title'] = $this->lang->line('mall_mng', FALSE);
            $this->load_view('mall/no_result.html', $data);
        } else {
           $msg = $info['result']['err'].':'.$info['result']['msg'];
           $this->load_view_errors($msg);
        }
    }
    private function change(&$continent){
        switch($continent){
            case 'asia':
                       $continent="亚洲";
                       break;
            case 'europe':
                       $continent="欧洲";
                       break; 
            case 'north_america':
                       $continent="北美洲";
                       break;
            case 'africa':
                    $continent="非洲和中东";
                    break;
            case 'oceania':
                    $continent="大洋洲";
                    break;        
        }
    }
}    