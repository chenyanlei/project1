<?php

/**
 * 需求定制
 * User: yake
 * Date: 16/5/23
 * Time: 下午14:47
 */
class Custom extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $user_agent = $_SERVER['HTTP_USER_AGENT'];//获取浏览器信息
        if (strpos($user_agent, 'MicroMessenger')) {
            if (!isset($_SESSION['openid'])) {
                $this->load->library('request_openid');
                $this->request_openid->get_return(URL . $_SERVER['REQUEST_URI']);
            }
            if (!isset($_SESSION['token'])) {
                $this->load->library('request_openid');
                $this->request_openid->band_openid();
            }
        }
    }

    public function index() {
       $this->load->view("custom/custom") ;
    }

    public function commit() {
        $data = $this->input->post(null) ;
        $preference = $data['preference'] ;
        unset($data['preference']) ;
        $data['preference'] = json_encode($preference, JSON_UNESCAPED_UNICODE) ;
        $this->load->library('request') ;
        $this->request->add_default_request_params($data);
        $this->request->add_token_from_session($data);
        $data['platform'] = "wx" ;

        $url=URL_API.'custom/commit';
        $content= h_curl($url,$data);
        h_echo_json($content);

    }

    public function customize_list(){
        $this->load->view("/custom/customization.html");
    }

    public function customize_data(){
        $page = (int)($this->input->get('pn'));
        if($page){
            $sdata['pn'] = $page;
        }
        $rn = (int)($this->input->get('rn'));
        if($rn){
            $sdata['rn'] = $rn;
        }
        $this->load->library('request') ;
        $this->request->add_default_request_params($sdata);
        $this->request->add_token_from_session($sdata);
        $url=URL_API.'custom/get_my_custom';
        $content= h_curl($url,$sdata);

        h_echo_json($content);
    }
    public function customize_detail(){
        $data = $this->input->get(null);
        $this->load->library('request') ;
        $this->request->add_default_request_params($data);
        $this->request->add_token_from_session($data);

        $url=URL_API.'/custom/get_custom_detail';
        $content= h_curl($url,$data);
        $rst = json_decode($content, true) ;
        if($rst['result']['err'] == Ecode::OK) {
            $data = $rst['content'];
            $this->load->view("custom/customize_detail.html", $data) ;
        } else {
            $data['msg'] = $rst['result']['err'].':'.$rst['result']['msg'];
            $this->load->view('/webapp/error/other_error.html',$data);
        }
    }

}   