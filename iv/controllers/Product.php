<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/11
 * Time: 下午12:38
 */
class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    //获取产品列表
    public function get_list() {
        $params = $this->input->get(null) ;

        //接受参数
        $this->add_default_params($params,$_SESSION['token']) ;

        //请求接口
        $url=URL_API.'product/get_list';


        $data = h_curl($url,$params);

         h_echo_json($data);
    }

    //产品详情
    public function product_detail(){
       $id =$this->input->get('pid');
//       $p_type =$this->input->get('p_type');
       $aid =$this->input->get('aid');
       if(!isset($aid)) {
           $aid = "0" ;
       }

        if(!$id){
           $this->load_view_errors(null);
            return false;
        }


//       $sdata['p_type'] = $p_type;
       $sdata['aid'] = $aid;
       $sdata['id'] = $id;
       $url=URL_API.'product/detail';
       $this->load->library('request') ;
       $this->request->add_default_request_params($sdata) ;
       $this->request->add_token_from_session($sdata) ;
       $content= h_curl($url,$sdata);
       $datainfo=json_decode($content,true);
//        var_dump($_SESSION['token']);
//       var_dump($datainfo['content']);
       if($datainfo['result']['err'] === 0){

            $data = $datainfo['content'];
           $data['continent_zh']=$this->change($data['continent']);
            $data['pid'] = $id;
            //$data['p_type'] = $p_type;
            $data['aid'] = $aid;

            $data['edit_url'] = '/product_edit/oneday?id='.$id;
            $this->lang->load('info',$GLOBALS['language']) ;
            $data['tip_title']=$this->lang->line('product_mng',false) ;

            $this->_get_product_detail_qr_url($data, $id, $aid, $data['p_type']) ;
            $this->load_view('product/publish/product_detail',$data);
       } else {
            $msg = $datainfo['result']['err'].':'.$datainfo['result']['msg'];
             $this->load_view_errors($msg);
       }
    }

    public function _get_product_detail_qr_url(&$data,$pid, $aid, $p_type) {
        $url = URL.'webapp_product/product_detail?pid='.$pid.'&aid='.$aid.'&p_type='.$p_type ;
        $encode_url = urlencode($url) ;

        $params = array('url' => $encode_url) ;
        $this->load->library('request') ;
        $this->request->add_default_request_params($params) ;
        $this->request->add_token_from_session($params) ;

        $url=URL_API.'qrcode_creator/get_qr_code';
        $s = h_curl($url,$params);
        $detail = json_decode($s,true) ;
        if($detail['result']['err'] === 0) {
            $data['qr_url']=$detail['content']['qr_url'];
        }

    }

    // 我的分享
    public function my_share() {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $data['cur_menu'] = 6 ;
        $this->session->product_mng_menu_id=6;

        $pages = array() ;
        array_push($pages,"product/header") ;
        array_push($pages,"product/myshare/my_share") ;
        array_push($pages,"product/footer");

        $this->_get_my_share_list($data) ;

//        var_dump($data) ;
        $this->load_views($pages,$data);
    }

    public function get_share_detail() {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $data['cur_menu'] = 6 ;
        $this->get_my_share_detail($data) ;

        if(isset($_SESSION['userinfo']['level']) && ($_SESSION['userinfo']['level'])){
            $data['agent'] = true;
        }else{
            $data['agent'] = false;
        }
        $data['aid']=$this->input->get_post('aid') ;
        $this->_get_myshare_qr_code($data) ;
        $data['tip_title']=$data['data']['title'] ;
        $data['is_ibar'] = 1;

        $this->load_view("product/myshare/share_detail",$data);
    }
    public function get_share_iframe() {
      
        //        var_dump($data) ;
        $this->get_my_share_detail($data) ;

        $data['aid']=$this->input->get_post('aid') ;
        $this->_get_myshare_qr_code($data) ;
        $data['tip_title']=$data['data']['title'] ;


        $data['is_ibar'] = 0;
        $this->load->view("product/myshare/share_detail",$data);
    }

    private function _get_myshare_qr_code(&$data) {
        $id = $this->input->get_post('id') ;
        $p_type = $this->input->get_post('p_type') ;
        $aid=$this->input->get_post('aid') ;
        $url = URL.'/product/get_share_detail?&id='.$id.'&p_type='.$p_type.'&aid='.$aid ;
        $url = urlencode($url) ;

        $params = array('url' => $url) ;
        $url=URL_API.'qrcode_creator/get_qr_code';

        $s=h_curl($url,$params);
        $detail = json_decode($s,true) ;
        if($detail['result']['err'] === 0) {
            $data['qr_url']=$detail['content']['qr_url'];
        }
    }

    private function get_my_share_detail(&$data) {
        $params = $this->input->get() ;
        $this->load->library('request') ;

        $this->request->add_default_request_params($params) ;
        $this->request->add_token_from_session($params) ;

        //请求接口
        $url=URL_API.'product_spread/get_detail';
//        var_dump($params) ;
        $s=h_curl($url,$params);
        $detail = json_decode($s,true) ;

//        var_dump($params) ;
//        var_dump($s) ;

        if($detail['result']['err'] === 0) {
            $data['data']=$detail['content'];
//            $data['p_type']=$detail['content']['p_detail']['p_type'];
        }
    }

    private function _get_my_share_list(&$data) {
        $params = $this->input->get() ;
        $this->load->library('request') ;
        $this->request->add_default_request_params($params) ;
        $this->request->add_token_from_session($params) ;

        //请求接口
        $url=URL_API.'product_spread/get_list';
        $s=h_curl($url,$params);
        $detail = json_decode($s,true) ;
        if($detail['result']['err'] === 0) {
            $data['data']=$detail['content'];
        }
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

    public function edit() {
        $p_type = $this->input->get_post('p_type') ;
        $id = $this->input->get_post('id') ;
        switch($p_type) {
            case PType::ONE_DAY:
                header('location:/product_edit/oneday?id='.$id) ;
                break ;
            case PType::LOCAL_GROUP:
                break ;
            case PType::GROUP_TRAVEL:
                break ;
            case PType::HOTEL:
                break ;
            case PType::MARKET:
                break ;
            case PType::SCENIC_AREA:
                break ;
            case PType::DINING_ROOM:
                break ;
            case PType::GOODS:
                break ;
            case PType::CUSTOM_ONE_DAY:
                break ;
            default:
                break ;
        }
    }

    // 操作 上线、下线
    public function operation() {
        $this->operation_request() ;
    }

    private function operation_request() {
        $params = $this->input->get(null) ;
        if($params['p_status'] == 0) {   // 销售中 -> 下线
            $params['to_status'] = 1;
        } else if($params['p_status'] == 1) { // 下线 -> 销售中
            $params['to_status'] = 0;
        } else {
            //
            $params['to_status'] = 0;
        }

        $this->load->library('request') ;
        if( !$this->request->add_token_from_session($params) ) {
            header('location:/user/login') ;
            exit() ;
//            h_echo_json_ex(-1, array(), 'token expired') ;
//            return ;
        }

        $this->request->add_default_request_params($params) ;

        $url=URL_API.'product/change_status';
        $content= h_curl($url,$params);

        h_echo_json($content) ;
    }

    public function product_lib_oneday_travel() {

        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $pages = array('product/header') ;

        array_push($pages,"product/mng_page_all") ;
        $data['p_status'] = Ptype::ONE_DAY;
        $data['cur_menu'] = 0;
        $this->session->product_mng_menu_id=0;
        $this->session->prodct_mng_current = 0 ;

        array_push($pages,"product/footer") ;
        $sdata=array();
        //接受参数
        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'destination/get_all_list';

        $s=h_curl($url,$sdata);
        $data['continent']=$s;

        $data['aid'] = $this->session->user_id;
        $data['p_type'] = Ptype::ONE_DAY ;

        $this->load_views($pages,$data);
    }

    public function product_lib_group_travel() {
        $this->session->current_page = 2;
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $pages = array('product/header') ;

        array_push($pages,"product/mng_page_all") ;
        $data['p_status'] = Ptype::GROUP_TRAVEL;
        $data['cur_menu'] = 1;
        $this->session->product_mng_menu_id=0;
        $this->session->prodct_mng_current = 0 ;

        array_push($pages,"product/footer") ;
        $sdata=array();
        //接受参数
        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'destination/get_all_list';

        $s=h_curl($url,$sdata);
        $data['continent']=$s;

        $data['aid'] = $this->session->user_id;

        $data['p_type'] = Ptype::GROUP_TRAVEL ;

        $this->load_views($pages,$data);
    }


    public function product_on_sale() {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $data['cur_menu'] = 4 ;
        $this->session->product_mng_menu_id=$data['cur_menu'];

        $pages = array() ;
        array_push($pages,"product/header") ;
        array_push($pages,"product/mng_page_on_sale") ;
        array_push($pages,"product/footer");
        $data['p_status'] = 1;
        $data['aid'] = $this->session->user_id;

//        $this->_get_product_list($data) ;
        $this->load_views($pages,$data);
    }

    public function product_offline() {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $data['cur_menu'] = 5 ;
        $this->session->product_mng_menu_id=$data['cur_menu'];

        $pages = array() ;
        array_push($pages,"product/header") ;
        array_push($pages,"product/mng_page_offline") ;
        array_push($pages,"product/footer");

//        $this->_get_product_list($data) ;
        $data['p_status'] = 0;
        $data['aid'] = $this->session->user_id;
        $this->load_views($pages,$data);
    }

    private function _get_product_list(&$data) {
        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        $p_status = $this->input->get_post('p_status') ;

        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'destination/get_all_list';

        $s=h_curl($url,$sdata);
        $data['continent']=$s;

    }

    private function change($continent){
        switch($continent){
            case 'asia':
                    $continent="亚洲";
                    return  $continent;
            case 'europe':
                    $continent="欧洲";
                    return  $continent;
            case 'north_america':
                    $continent="北美洲";
                    return  $continent;
            case 'africa':
                    $continent="非洲和中东";
                    return  $continent;
            case 'oceania':
                    $continent="大洋洲";
                    return  $continent;
        }
    }
}