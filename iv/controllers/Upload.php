<?php
/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/15
 * Time: 下午11:45
 */
class Upload extends MY_Controller {

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

//        $json_data =json_decode($content,true) ;

//        h_echo_json($json_data['content']['token']) ;
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


}