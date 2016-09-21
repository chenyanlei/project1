<?php

/**
 * Created by IntelliJ IDEA.
 * User: junlei
 * Date: 16/06/29
 * Time: 14:00
 *
 *
 */
class Shop extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }



    //所有产品
    public function all(){
        $this->session->current_page = 2;
        $sdata= array();
        $page = (int)($this->input->get('page'));
        if($page){
            $sdata['pn'] = $page;
        }
        $sdata['rn'] = 6;
        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'product_shop/all';
       
        $s=h_curl($url,$sdata);


        $info=json_decode($s,true);
//        var_dump($info['content']);
        if($info['result']['err'] == 0){
            $data = $info['content'];
            $data['aid'] = $this->session->user_id;
            $data['act'] = 'a';
            $data['page'] = $page;
            $data['rn'] = $sdata['rn'];
           $this->lang->load('info',$GLOBALS['language']) ;
           $data['tip_title']=$this->lang->line('shop_mng',FALSE); 
           $this->load_view('shop/all.html',$data);
        }else if($info['result']['err'] = 4004){
            $this->lang->load('info',$GLOBALS['language']) ;
            $data['tip_title']=$this->lang->line('shop_mng',FALSE);
            $data['act'] = 'a';
            $this->load_view('shop/no_result.html',$data);
        }else{
           $msg = $info['result']['err'].':'.$info['result']['msg'];
           $this->load_view_errors($msg);
        }
    }

    //正在销售
    public function onsale(){
        $sdata= array();
        $page = (int)($this->input->get('page'));
        if($page){
            $sdata['pn'] = $page;
        }
        $sdata['rn'] = 6;
        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'product_shop/onsale';
       
        $s=h_curl($url,$sdata);

         
        $info=json_decode($s,true);

        if($info['result']['err'] == 0){
            $data = $info['content'];
            $data['act'] = 'o';
            $data['aid'] = $this->session->user_id;
            $data['page'] = $page;
            $data['rn'] = $sdata['rn'];
            $this->lang->load('info',$GLOBALS['language']) ;
            $data['tip_title']=$this->lang->line('shop_mng',FALSE);
            $this->load_view('shop/all.html',$data);
        }else if($info['result']['err'] = 4004){
            $this->lang->load('info',$GLOBALS['language']) ;
            $data['tip_title']=$this->lang->line('shop_mng',FALSE);
            $data['act'] = 'o';
            $this->load_view('shop/no_result.html',$data);    
        }else{
           $msg = $info['result']['err'].':'.$info['result']['msg'];
           $this->load_view_errors($msg);
        }
    }
    //下线
    public function offline(){
        $sdata= array();
        $page = (int)($this->input->get('page'));
        if($page){
            $sdata['pn'] = $page;
        }
        $sdata['rn'] = 6;
        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'product_shop/offline';
       
        $s=h_curl($url,$sdata);


        $info=json_decode($s,true);
        if($info['result']['err'] == 0){
            $data = $info['content'];
            $data['act'] = 'off';
            $data['aid'] = $this->session->user_id;
            $data['page'] = $page;
            $data['rn'] = $sdata['rn'];
            $this->lang->load('info',$GLOBALS['language']) ;
            $data['tip_title']=$this->lang->line('shop_mng',FALSE);
             $this->load_view('shop/all.html',$data);
         }else if($info['result']['err'] = 4004){
            $this->lang->load('info',$GLOBALS['language']) ;
            $data['tip_title']=$this->lang->line('shop_mng',FALSE);
            $data['act'] = 'off';
            $this->load_view('shop/no_result.html',$data);         
        } else {
           $msg = $info['result']['err'].':'.$info['result']['msg'];
           $this->load_view_errors($msg);
        }
    }
   
 
}    