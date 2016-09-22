<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/7/28
 * Time: 下午4:52
 */
class Wx_admin_menu extends CI_Controller
{
    public $access_token = '' ;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('wx/wx_access_token_model', 'wx_access_token_model') ;
        $this->load->helper('curl') ;
    }

//    public function set($force_access_token=false) {
//        $menu1 = array(
//            "name"=>"产品服务",
//            "sub_button" => array(
//                array(
//                    "type" => "view" ,
//                    "name" => "产品列表" ,
//                    "url" => "http://a.qsctrip.com/webapp_product/product_service"
//                ),
//                array(
//                    "type" => "view" ,
//                    "name" => "定制需求" ,
//                    "url" => "http://a.qsctrip.com/custom" ,
//                ),
//            )
//        ) ;
//        $menu2 = array(
//            "name"=>"QSC商户",
//            "sub_button" => array(
//                array(
//                    "type" => "view" ,
//                    "name" => "全球购物" ,
//                    "url" => "http://a.qsctrip.com/webapp_global/merchant_list?act=s"
//                ),
//                array(
//                    "type" => "view",
//                    "name" => "特色酒店",
//                    "url"  => "http://a.qsctrip.com/webapp_global/merchant_list?act=h"
//                ),
//                array(
//                    "type" => "view",
//                    "name" => "全球美食",
//                    "url"  => "http://a.qsctrip.com/webapp_global/merchant_list?act=f"
//                ),
//                array(
//                    "type" => "view",
//                    "name" => "关于QSC",
//                    "url"  => "http://a.qsctrip.com/webapp_about/aboutus"
//                )
//            )
//        ) ;
//        $menu3 = array(
//            "type" => "view",
//            "name" => "我的",
//            "url"  => "http://a.qsctrip.com/webapp_user/mycenter"
//        ) ;
//
//        $menu = array(
//            "button"=> array(
//                $menu1, $menu2, $menu3
//            )
//        ) ;
//
//        $this->wx_access_token_model->get_access_token($this->access_token, $force_access_token) ;
//        $json_data = json_encode($menu, JSON_UNESCAPED_UNICODE) ;
//        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$this->access_token ;
//        $result = '';
//        $rst_data = h_curl($result, $url, $json_data);
//
//
//        if($rst_data == Ecode::OK) {
//            $rst_set = json_decode($result, true) ;
//            if($rst_set['errcode'] == 0) {
//                h_echo_json(Ecode::OK) ;
//                die();
//            } else if(Wx_access_token_model::TOKEN_INVALID === $rst_set['errcode']) {
//                if($force_access_token) {
//                    die();
//                }
//                $this->set(true) ;
//                die();
//            }
//        }
//
//        h_echo_json(Ecode::S2S_ARG_ERR) ;
//    }

    public function set($force_access_token=false) {
        $menu1 = array(
            "name"=>"海外游玩",
            "sub_button" => array(
                array(
                    "type" => "view" ,
                    "name" => "线路推荐" ,
                    "url" => "http://a.qsctrip.com/webapp_product/product_service"
                ),
                array(
                    "type" => "view" ,
                    "name" => "跟团游" ,
                    "url" => "http://a.qsctrip.com/webapp_product/group_travel?act=z"
                ),
                array(
                    "type" => "view" ,
                    "name" => "自助游" ,
                    "url" => "http://a.qsctrip.com/webapp_product/group_travel?act=y"
                ),
//                array(
//                    "type" => "view" ,
//                    "name" => "购物" ,
//                    "url" => "http://a.qsctrip.com//webapp_global/introduce_shopping"
//                ),
                array(
                    "type" => "view",
                    "name" => "特色酒店",
                    "url"  => "http://a.qsctrip.com/webapp_global/introduce_hotel"
                )
            )
        ) ;
        $menu2 = array(
            "type" => "view" ,
            "name" => "VIP定制" ,
            "url" => "http://a.qsctrip.com/custom"
        ) ;
        $menu3 = array(
            "type" => "view",
            "name" => "我的",
            "sub_button" => array(
                array(
                    "type" => "view" ,
                    "name" => "我的信息" ,
                    "url" => "http://a.qsctrip.com/webapp_user/mycenter"
                ),
//                array(
//                    "type" => "view" ,
//                    "name" => "关于我们" ,
//                    "url" => "http://a.qsctrip.com/webapp_about/aboutus"
//                )
//                ,
//                array(
//                    "type" => "view",
//                    "name" => "美食",
//                    "url"  => "http://a.qsctrip.com/webapp_global/merchant_list?act=f"
//                )
            )
        ) ;

        $menu = array(
            "button"=> array(
                $menu1, $menu2, $menu3
            )
        ) ;

        $this->wx_access_token_model->get_access_token($this->access_token, $force_access_token) ;
        $json_data = json_encode($menu, JSON_UNESCAPED_UNICODE) ;
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$this->access_token ;
        $result = '';
        $rst_data = h_curl($result, $url, $json_data);


        if($rst_data == Ecode::OK) {
            $rst_set = json_decode($result, true) ;
            if($rst_set['errcode'] == 0) {
                h_echo_json(Ecode::OK) ;
                die();
            } else if(Wx_access_token_model::TOKEN_INVALID === $rst_set['errcode']) {
                if($force_access_token) {
                    die();
                }
                $this->set(true) ;
                die();
            }
        }

        h_echo_json(Ecode::S2S_ARG_ERR) ;
    }

    public function get($force_access_token=false) {
        $this->wx_access_token_model->get_access_token($this->access_token, $force_access_token) ;
        $url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$this->access_token ;
        $result = '';
        $rst = h_curl($result, $url);
        if($rst == Ecode::OK) {
            $menu = json_decode($result, true) ;
            if(isset($menu['errcode']) && $menu['errcode'] == Wx_access_token_model::TOKEN_INVALID) {
                if($force_access_token) {
                    die();
                }
                $this->get(true) ;
                die();
            }
            h_echo_json(Ecode::OK, $menu) ;
            return ;
        }
        h_echo_json(Ecode::NO_RESULT) ;
    }

    public function del($force_access_token=false) {
        $this->wx_access_token_model->get_access_token($this->access_token, $force_access_token) ;
        $url = "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".$this->access_token ;
        $result = '';
        $rst = h_curl($result, $url);
        if($rst == Ecode::OK) {
            $menu = json_decode($result, true) ;
            if(isset($menu['errcode']) && $menu['errcode'] == Wx_access_token_model::TOKEN_INVALID) {
                if($force_access_token) {
                    die();
                }
                $this->del(true) ;
                die();
            }
            h_echo_json(Ecode::OK, $menu) ;
            return ;
        }
        h_echo_json(Ecode::NO_RESULT) ;
    }

    /*
    {
    "button": [
        {
            "name": "产品服务",
            "sub_button": [
                {
                    "type": "click",
                    "name": "产品列表",
                    "key": "rselfmenu_0_0"
                },
                {
                    "type": "click",
                    "name": "定制需求",
                    "key": "rselfmenu_0_1"
                }
            ]
        },
        {
            "name": "QSC商户",
            "sub_button": [
                {
                    "type": "click",
                    "name": "全球购物",
                    "key": "rselfmenu_1_0"
                },
                {
                    "type": "click",
                    "name": "特色酒店",
                    "key": "rselfmenu_1_1"
                },
                {
                    "type": "click",
                    "name": "全球美食",
                    "key": "rselfmenu_1_2"
                },
                {
                    "type": "click",
                    "name": "关于QSC",
                    "key": "rselfmenu_1_3"
                }
            ]
        },
        {
            "name": "我的",
            "type": "location_select",
            "key": "rselfmenu_2_0"
        }
    ]
}

     */
}