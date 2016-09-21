<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/17
 * Time: 下午7:22
 */
class Image extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_qiniu_uptoken() {
        $params = $this->input->get(null) ;
        $this->load->library('request') ;
        if( !$this->request->add_token_from_session($params) ) {
            h_echo_json_ex(-1, array(), 'token expired') ;
            return ;
        }
        $this->request->add_default_request_params($params) ;
        $url=URL_API.'image/get_qiniu_uptoken';

        $content= h_curl($url,$params);
        h_echo_json($content) ;
    }

    public function get_private_qiniu_uptoken() {
        $params = $this->input->get(null) ;
        $this->load->library('request') ;
        if( !$this->request->add_token_from_session($params) ) {
            h_echo_json_ex(-1, array(), 'token expired') ;
            return ;
        }
        $this->request->add_default_request_params($params) ;
        $url=URL_API.'image/get_private_qiniu_uptoken';

        $content= h_curl($url,$params);
        h_echo_json($content) ;
    }

    public function get_general_qiniu_uptoken() {
        $params = $this->input->get(null) ;
        $this->load->library('request') ;
        if( !$this->request->add_token_from_session($params) ) {
            h_echo_json_ex(-1, array(), 'token expired') ;
            return ;
        }
        $this->request->add_default_request_params($params) ;
        $url=URL_API.'image/get_general_qiniu_uptoken';

        $content= h_curl($url,$params);
        h_echo_json($content) ;
    }

    public function get_upload_key() {
        $params = $this->input->get(null) ;
        $this->load->library('request') ;
        if( !$this->request->add_token_from_session($params) ) {
            h_echo_json_ex(-1, array(), 'token expired') ;
            return ;
        }
        $this->request->add_default_request_params($params) ;
        $url=URL_API.'image/get_upload_key';
        $content= h_curl($url,$params);
        h_echo_json($content) ;
    }

    public function del_img() {
        $params = $this->input->get(null) ;
        if($params == null) {
            $params = $this->input->post(null) ;
        }

        //通用参数
        $this->add_default_params($params,$_SESSION['token']) ;

        //请求接口
        $url=URL_API.'image/del_img';
        $rst = h_curl($url,$params);
        h_echo_json($rst) ;
    }



}