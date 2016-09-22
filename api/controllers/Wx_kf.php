<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/25
 * Time: 下午4:52
 */
class Wx_kf extends MY_Controller
{
    public $access_token;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('wx/wx_access_token_model', 'wx_access_token_model') ;
        $this->load->helper('curl') ;
    }

    /**
     * 添加客服账号
     */
    public function add($force_access_token=false) {
        $nickname = $this->input->get_post("nickname") ;
        $password = $this->input->get_post("password") ;
        $kf_account = $this->input->get_post("kf_account") ;
        $acount = array(
            "kf_account" => $kf_account,
            "nickname" => $nickname,
            "password" => $password
        ) ;

        $this->wx_access_token_model->get_access_token($this->access_token,$force_access_token) ;
        $json_data = json_encode($acount, JSON_UNESCAPED_UNICODE) ;
        $result = '';
        $url = "https://api.weixin.qq.com/customservice/kfaccount/add?access_token=".$this->access_token;
        var_dump($url) ;
        var_dump($json_data) ;
        $rst = h_curl($result, $url, $json_data);

        var_dump($result) ;

        if($rst == Ecode::OK) {
            $json_obj = json_decode($result, true);
            if($json_obj['errcode'] == Wx_access_token_model::OK) {
                h_echo_json(Ecode::OK) ;
                die() ;
            } else if($json_obj['errcode'] == Wx_access_token_model::TOKEN_INVALID){
                if($force_access_token) {
                    die() ;
                }
                $this->add(true) ;
                die() ;
            }
        }
        h_echo_json(Ecode::S2S_ARG_ERR) ;

        //url
//        https://api.weixin.qq.com/customservice/kfaccount/add?access_token=ACCESS_TOKEN
        //data
//        {
//              "kf_account" : "test1@test",
//              "nickname" : "客服1",
//              "password" : "pswmd5",
//        }



        //返回

//        {
//             "errcode" : 0,
//             "errmsg" : "ok",
//        }
    }

    public function update() {
        //url
        //https://api.weixin.qq.com/customservice/kfaccount/update?access_token=ACCESS_TOKEN
        //data
        //        {
        //              "kf_account" : "test1@test",
        //              "nickname" : "客服1",
        //              "password" : "pswmd5",
        //        }

        //返回
        //        {
        //             "errcode" : 0,
        //             "errmsg" : "ok",
        //        }
    }

    public function del() {
        //url
        //https://api.weixin.qq.com/customservice/kfaccount/del?access_token=ACCESS_TOKEN
        //data
        //        {
        //              "kf_account" : "test1@test",
        //              "nickname" : "客服1",
        //              "password" : "pswmd5",
        //        }

        //返回
        //        {
        //             "errcode" : 0,
        //             "errmsg" : "ok",
        //        }
    }

    public function uploadheadimg() {
//          http请求方式: POST/FORM
//          http://api.weixin.qq.com/customservice/kfaccount/uploadheadimg?access_token=ACCESS_TOKEN&kf_account=KFACCOUNT
//          调用示例：使用curl命令，用FORM表单方式上传一个多媒体文件，curl命令的具体用法请自行了解
    }

    public function getkflist() {
//        http请求方式: GET
//https://api.weixin.qq.com/cgi-bin/customservice/getkflist?access_token=ACCESS_TOKEN
    }

    public function send() {

    }



}