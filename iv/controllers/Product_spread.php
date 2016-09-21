<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/27
 * Time: 下午7:25
 */
class Product_spread extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('request') ;
    }

    public function modify() {
        $data = $this->input->post() ;
        $this->request->add_default_request_params($data) ;
        $this->request->add_token_from_session($data) ;

        //请求接口
        $url=URL_API.'product_spread/modify';
        $rst = h_curl($url,$data);
        h_echo_json( $rst) ;
    }

    public function upload() {
        $data = $this->input->post() ;
        $this->request->add_default_request_params($data) ;
        $this->request->add_token_from_session($data) ;

        //请求接口
        $url=URL_API.'product_spread/upload';
        $rst = h_curl($url,$data);

        h_echo_json( $rst) ;
    }

    public function spread() {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $data['p_type'] = PType::ONE_DAY ;      // 添加产品类型
        $data['cur_menu'] = $this->session->product_mng_menu_id ;

        $pages = array() ;
        array_push($pages,"product/header") ;
        array_push($pages,"product/edit/spread") ;
        array_push($pages,"product/footer");
        $pid = $this->input->get('id');
        $p_type = $this->input->get_post('p_type') ;
        $this->get_detail_by_id($data, $pid, PType::ONE_DAY) ;

        $this->load_views($pages,$data);
    }

    private function get_detail_by_id(&$data, $id,$p_type) {
        $params=array();
        //通用参数
        $this->add_default_params($params,$_SESSION['token']) ;

        $params['p_type'] = $p_type ;
        $params['id'] = $id ;
        //请求接口
        $url=URL_API.'product/detail';
        $s=h_curl($url,$params);

        $detail = json_decode($s,true) ;
        if($detail['result']['err'] === 0) {
            $data['detail']=$detail['content'];
          
        }
    }

    public function spread_edit() {
      
        $data['p_type'] = PType::ONE_DAY ;      // 添加产品类型
        $data['cur_menu'] = $this->session->product_mng_menu_id ;
        $id = $this->input->get_post('id') ;
        $p_type = $this->input->get_post('p_type') ;

        $this->get_my_share_detail($data) ;
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']= "分享编辑" ;
        if(isset($_SESSION['userinfo']['level']) && ($_SESSION['userinfo']['level'])){
            $data['agent'] = true;
        }else{
            $data['agent'] = false;
        }
        $this->load_view('product/myshare/my_share_edit',$data);
    }

    private function get_my_share_detail(&$data) {
        $params = $this->input->get() ;
        $this->load->library('request') ;
        $this->request->add_default_request_params($params) ;
        $this->request->add_token_from_session($params) ;

        //请求接口
        $url=URL_API.'product_spread/get_detail';
        $s=h_curl($url,$params);

        $detail = json_decode($s,true) ;
        if($detail['result']['err'] === 0) {
            $data=$detail['content'];
        }
    }


}