<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/7/14
 * Time: 上午11:09
 */
class Destination extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_list(){
        $this->load->library('request') ;
        $params = $this->input->get() ;
        $this->request->add_default_request_params($params) ;
        $this->request->add_token_from_session($params) ;

        //请求接口
        $url=URL_API.'destination/get_all_list';

        $s=h_curl($url,$params);

        echo $s ;
    }
}