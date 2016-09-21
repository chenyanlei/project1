<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/11
 * Time: 下午12:38
 */
class Publish_product_oneday extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_login();
    }

    public function index() {
        $this->load->view("product/publish/oneday/tp_oneday.html") ;
    }

    public function edit_page() {
        $pid = $this->input->get_post('id');

        $this->load->view("product/publish/oneday/tp_oneday_edit.html") ;
    }

    public function edit_commit() {

    }

    public function commit() {
        $params = $this->input->post() ;

        $params['p_type']=Ptype::ONE_DAY;
        $params['is_customer']=0;
        $params['imgs_id']=json_encode($params['imgs']);

//        var_dump($params) ;
//        return ;

        $price_arr = array() ;
        foreach($params['date_prices'] as $price_item) {
            $one_price = json_decode($price_item, true) ;
//            var_dump($price_item) ;
//            var_dump($params['calendar_type']) ;
//            return;
            $calendar_type = intval($params['calendar_type']) ;

            if($calendar_type === Ptype::CALENDAR_TYPE_A_PERIOD) {
                $one_price['calendar_from'] = strtotime($one_price['calendar_from']) ;//60 * 60 * 12;
                $one_price['calendar_to'] = strtotime($one_price['calendar_to']) ;//60 * 60 * 12;
            } elseif($calendar_type === Ptype::CALENDAR_TYPE_DATE) {
                $one_price['calendar_from'] = strtotime($one_price['start_date']) ;//60 * 60 * 12;
            }

//            unset($one_price['start_date']) ;
            $price_arr[] = $one_price ;
        }
        $params['prices']=json_encode($price_arr) ;//$params['date_prices'];
        $params['p_status']=Ptype::PRODUCT_STATUS_ON_SALE;

//        var_dump($params) ;
//        return ;

        unset($params['date_prices']) ;
        unset($params['imgs']) ;

        $this->load->library('request') ;
        if( !$this->request->add_token_from_session($params) ) {
            h_echo_json_ex(-1, array(), 'token expired') ;
            return ;
        }
        $this->request->add_default_request_params($params) ;
        $url=URL_API.'product/add';
        $s= h_curl($url,$params);

        echo $s ;
    }
}