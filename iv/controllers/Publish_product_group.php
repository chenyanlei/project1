<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/11
 * Time: 下午12:38
 */
class Publish_product_group extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_login();
    }

    public function index() {
        $this->load->view("product/publish/group/tp_group.html") ;
    }

    public function edit_page() {
        $pid = $this->input->get_post('id');
        $params = array('id' => $pid) ;
        $this->load->library('request') ;
        if( !$this->request->add_token_from_session($params) ) {
            h_echo_json_ex(-1, array(), 'token expired') ;
            return ;
        }
        $this->request->add_default_request_params($params) ;
        $url=URL_API.'product/detail';
        $s= h_curl($url,$params);
        $data = json_decode($s, true) ;
        if($data['result']['err'] != Ecode::OK) {
            echo "内部错误" ;
        } else {
            $this->load->view("product/publish/group/tp_group_edit.html", $data['content']) ;
        }
    }

    public function commit() {
        $params = $this->input->post() ;

        $params['p_type']=Ptype::GROUP_TRAVEL;
        $params['price_type']=Ptype::PRICE_TYPE_0;
        $params['calendar_type']=Ptype::CALENDAR_TYPE_DATE;
        $params['is_customer']=0;
        $params['imgs_id']=json_encode($params['imgs']);

        $price_arr = array() ;
        foreach($params['date_prices'] as $price_item) {
            $one_price = json_decode($price_item, true) ;
            $one_price['calendar_from'] = strtotime($one_price['start_date']) + 43200;//60 * 60 * 12;
            unset($one_price['start_date']) ;
            $price_arr[] = $one_price ;
        }
        $params['prices']=json_encode($price_arr) ;//$params['date_prices'];
        $params['p_status']=Ptype::PRODUCT_STATUS_ON_SALE;

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