<?php
/**
 * Created by PhpStorm.
 * User: chenj
 * Date: 2016/8/5
 * Time: 15:45
 */
class Webapp_global extends MY_Controller
{
    //酒店、美食、购物列表
    public function merchant_list()
    {
        $this->load->view('webapp/global_shopping.html');
    }
    //前端请求接口
    public function get_list(){
        $act = $this->input->get_post('act');
        if($act == 's'){
            $sdata['s_type'] = 1;
        }else if($act == 'h'){
            $sdata['s_type'] = 2;
        }else if($act == 'f'){
            $sdata['s_type'] = 3;
        }
        //绑定参数
        $page = (int)($this->input->post('pn'));
        if($page){
            $sdata['pn'] = $page;
        }

        $rn = (int)($this->input->post('rn'));
        if($rn){
            $sdata['rn'] = $rn;
        }else{
            $sdata['rn'] = 4;
        }

        $this->add_webapp_default_params($sdata);

        //请求接口
        $url=URL_API.'/merchant/get_list';
        $s=h_curl($url,$sdata);
        h_echo_json($s);
    }

    public function detail(){
        $this->load->view('webapp/shopping_detail.html');
     }
    public function introduce_shopping(){
        $this->load->view('webapp/introduce_shopping.html');
     }
    public function introduce_food(){
        $this->load->view('webapp/introduce_food.html');
    }
    public function introduce_hotel(){
        $this->load->view('webapp/introduce_hotel.html');
    }

     public function get_detail_data(){
          $data = $this->input->get(null) ;
          $url=URL_API.'merchant/get_detail';
          $this->load->library('request') ;
          $this->request->add_default_request_params($data);
          $this->request->add_token_from_session($data);
          $s= h_curl($url,$data);
          h_echo_json($s) ;
    }
    
}