<?php

/**
 * Created by IntelliJ IDEA.
 * User: junlei
 * Date: 16/06/29
 * Time: 14:00
 *
 *
 */
class Share extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //我的分享
    public function myshare(){
        $this->session->current_page = 8;
        $params = array();
        $page = (int)($this->input->get('page'));
        if($page){
            $params['pn'] = $page;
        }
        $params['rn'] = 8;
        $this->load->library('request') ;
        $this->request->add_default_request_params($params) ;
        $this->request->add_token_from_session($params) ;

        //请求接口product_spread/get_list
        $url=URL_API.'product_spread/get_list';
        $s=h_curl($url,$params);

        $info = json_decode($s,true) ;
        if($info['result']['err'] === 0) {
            $data=$info['content'];
            $data['page'] = $page;
             $this->lang->load('info',$GLOBALS['language']) ;
            $data['tip_title']=$this->lang->line('shop_mng',FALSE);
            $this->load_view('shop/share.html',$data);
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
 
}    