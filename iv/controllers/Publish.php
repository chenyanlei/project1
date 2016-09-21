<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/10
 * Time: 下午5:56
 */
class Publish extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_login();
    }

    // 一日游
    public function oneday() {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $pages = array('product/header') ;
        array_push($pages,"product/publish/tp_oneday") ;
        array_push($pages,"product/footer");

        $sdata=array();

        //接受参数
        $this->add_default_params($sdata,$_SESSION['token']) ;

        //请求接口
        $url=URL_API.'destination/get_all_list';

        $s=h_curl($url,$sdata);

        $data['continent']=$s;
        $data['p_type'] = Ptype::ONE_DAY ;      // 添加产品类型
        $this->load_views($pages,$data);
    }

    // 定制一日游
    public function onday_customer() {

        $data['p_type'] = Ptype::CUSTOM_ONE_DAY ;      // 添加产品类型


    }

    // 组团游
    public function group_travel() {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $pages = array('product/header') ;
        array_push($pages,"product/publish/template_tradation") ;
        array_push($pages,"product/footer");

        $sdata=array();

        //接受参数
        $this->add_default_params($sdata,$_SESSION['token']) ;

        //请求接口
        $url=URL_API.'destination/get_all_list';

        $s=h_curl($url,$sdata);
        $data['continent']=$s;

        $data['p_type'] = Publish::LOCAL_GROUP ;      // 添加产品类型
        $this->load_views($pages,$data);
    }

    //用户产品管理页
    public function product_mng($page=0) {
        $this->session->current_page = 2;
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $pages = array('product/header') ;

        if($page == 0) {
            array_push($pages,"product/mng_page_all") ;
            $data['p_status'] = -1;
            $data['cur_menu'] = 0;
            $this->session->product_mng_menu_id=0;
        } else if($page == 1) {
           array_push($pages,"product/mng_page_all") ;
            $data['p_status'] = 0;
            $data['cur_menu'] = 1;
            $this->session->product_mng_menu_id=4;
        } else if($page == 2) {
           array_push($pages,"product/mng_page_all") ;
            $data['p_status'] = 1;
            $data['cur_menu'] = 2;
            $this->session->product_mng_menu_id=2;
        } else if($page == 3) {
           array_push($pages,"product/mng_page_delete") ;
        } else if($page == 4) {
            array_push($pages,"product/publish/template_tradation") ;
        }
        $this->session->prodct_mng_current = $page ;
        array_push($pages,"product/footer") ;
        $sdata=array();
        //接受参数
        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'destination/get_all_list';

        $s=h_curl($url,$sdata);
        $data['continent']=$s;

        $data['aid'] = $this->session->user_id;

        $this->load_views($pages,$data);

    }

    //选择上传产品的类型
    public function product_select() {

        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        // 1地接社 2购物商店 3餐厅 4景区 5酒店


        $sdata=array();
        //接受参数
        // $this->add_default_params($sdata,true) ;
        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'user/get_user_s_type';
        $s=h_curl($url,$sdata);
        $json_obj = json_decode($s) ;

        // var_dump($json_obj) ;

        $this->session->current_page = 10;
        $data['s_type']=$json_obj->content->user_s_type;
        $this->load_view("product/publish/select_class",$data);
    }

    //添加产品
    public function add_product(){
        $sdata = $this->input->post();

        $country = $this->input->post('country');
        if(!$country){
           $this->load_view_errors(null);
            return false;
        }


        $sdata['country'] = $country;

        $title= $this->input->post('title');
        if(!$title){
           $this->load_view_errors(null);
            return false;
        }

        $sdata['title'] = $title;

         $lang= $this->input->post('lang');
        if(!$lang){
           $this->load_view_errors(null);
            return false;
        }
        $sdata['lang'] = $lang;

        $price_type = $this->input->post('price_type');
        $sdata['price_type'] = $price_type;
        $calendar_type = $this->input->post('calendar_type');
        $sdata['calendar_type'] = $calendar_type;

        if($price_type === '0'){

             $same_price = $this->input->post('same_price');
             if(!$same_price){
               $this->load_view_errors(null);
                 return false;
             }
            $advise_price = $this->input->post('advise_price');
             if(!$advise_price){
               $this->load_view_errors(null);
                 return false;
             }

             if($calendar_type === '1'){
                $date_start = $this->input->post('date_start');
                if(!$date_start){
                   $this->load_view_errors(null);
                    return false;
                }

                $date_end = $this->input->post('date_end');
                if(!$date_end){
                   $this->load_view_errors(null);
                    return false;
                }

                 $price_item = array('price1' => $same_price,
                     'price2' => $advise_price,
                     'calendar_from' => $this->toUnixTimestamp($date_start),
                     'calendar_to' => $this->toUnixTimestamp($date_end)) ;
                 $prices = array($price_item) ;
                 $sdata['prices']= json_encode($prices,JSON_UNESCAPED_UNICODE) ;
            }else {

                 $price_item = array('price1' => $same_price,
                     'price2' => $advise_price) ;
                 $prices = array($price_item) ;
                 $sdata['prices']= json_encode($prices,true);
             }

        }else{
             $sale_price = $this->input->post('sale_price');
             if(!$sale_price){
               $this->load_view_errors(null);
               return false;
             }
             $commission = $this->input->post('commission');
            if(!$commission){
               $this->load_view_errors(null);
                return false;
            }
             if($calendar_type === '1'){
                $date_start = $this->input->post('date_start');
                if(!$date_start){
                $this->load_view_errors(null);
                 return false;
                }
                $date_end = $this->input->post('date_end');
                if(!$date_end){
                   $this->load_view_errors(null);
                    return false;
                }
                 $price_item = array('price1' => $sale_price,
                     'price2' => $commission,
                     'calendar_from' => $this->toUnixTimestamp($date_start),
                     'calendar_to' => $this->toUnixTimestamp($date_end)) ;
                 $prices = array($price_item) ;
                 $sdata['prices']= json_encode($prices,JSON_UNESCAPED_UNICODE) ;
             }else{

                 $price_item = array('price1' => $sale_price,
                     'price2' => $commission) ;
                 $prices = array($price_item) ;
                 $sdata['prices']= json_encode($prices,true);
             }

        }

        $min_num = $this->input->post('min_num');
        if(!$min_num){
           $this->load_view_errors(null);
            return false;
        }
//        $imgs_id = $this->input->post('imgs_id');
//        if(!$imgs_id){
//           $this->load_view_errors(null);
//            return false;
//        } else {
//            $imgs = explode(',' ,$imgs_id) ;
//            $sdata['imgs_id'] = json_encode($imgs, JSON_UNESCAPED_UNICODE) ;
//        }

        $p_type = $this->input->post('p_type');
        if(!$p_type){
           $this->load_view_errors(null);
            return false;
        }
        $sdata['p_type'] = $p_type;

        $face_img = $this->input->post('face_img');
        if(!$face_img){
           $this->load_view_errors(null);
            return false;
        }
        $sdata['face_img'] = $face_img;

        $p_status = $this->input->post('p_status');
        if(!$p_status){
           $this->load_view_errors(null);
            return false;
        }
        $sdata['p_status'] = $p_status;

        $tagname = $this->input->post('tagname');
        if($tagname){
           $sdata['tagname'] = ltrim($tagname,',');
           $sdata['tagname'] = $tagname;
        }

       $min_num = $this->input->post('min_num');
       if(!$min_num){
           $this->load_view_errors(null);
            return false;
        }
        $sdata['min_num'] =  $min_num;

        $travel_intro = $this->input->post('travel_intro');
       if(!$travel_intro){
           $this->load_view_errors(null);
            return false;
        }
        $sdata['travel_intro'] =$travel_intro;
//            $_POST['feature']='ddd';
        $sdata['is_customer']=0;
        $sdata['city']='北京';

        $this->add_default_params($sdata,$_SESSION['token']) ;

       

        //请求接口
        $url=URL_API.'product/add';

        $s=h_curl($url,$sdata);

 
     
        $productinfo=json_decode($s,true);

        if($productinfo['result']['err'] == 0){

            if($p_status === '1'){
               redirect('/publish/product_select');
            }else{
                header('location:/product/product_detail?pid='.$productinfo['content']['id'].'&p_type='.$p_type);
            }
        } else {
           $msg = $productinfo['result']['err'].':'.$productinfo['result']['msg'];
          $this->load_view_errors($msg);
        }
    }

        private function toUnixTimestamp($var) {
//            $ary = explode('/',$var) ;
//
//            if(sizeof($ary) > 0) {
//                date_default_timezone_set('UTC') ;
//                return mktime(0,0,0,$ary[1],$ary[2],$ary[0]) ;
//            }
//            return $var;
            $this->load->library('commen') ;
            return $this->commen->toUnixTimestamp($var) ;
        }
        
}