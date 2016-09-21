<?php
/**
 * Created by PhpStorm.
 * User: chenj
 * Date: 2016/8/10
 * Time: 20:12
 */
class Webapp_public extends MY_Controller
{
    public function get_config(){
        $url = $this->input->get('share_url');
        $this->load->library('weixin_js');
        $data['config'] = $this->weixin_js->getSignPackage($url);
        $s = json_encode($data);
        h_echo_json($s);
    }
}