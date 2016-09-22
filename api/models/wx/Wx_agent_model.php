<?php

/**
 * 微信用户关注操作
 * User: yake
 * Date: 16/07/28
 * Time: 下午6:55
 */
class Wx_agent_model extends CI_Model
{
    public $access_token = '';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('wx/wx_access_token_model', 'wx_access_token_model') ;
        $this->load->helper('curl') ;
    }

    public function transfer_to_agent($obj_msg) {
        $content = trim($obj_msg->Content) ;
        $params = array(
            "touser" => "ofqfxvhD16MP2hGlA5nj5-Xye2t0", //测试用户
            "msgtype" => "text",
            "text" => array(
                "content" => $content
            )
        ) ;
        $msg_content = json_encode($params, JSON_UNESCAPED_UNICODE) ;

        $rst = $this->_transfer_to_agent($msg_content) ;

//        $this->_wx_test_msg($obj_msg, $rst) ;

//        $fromUsername = $obj_msg->FromUserName;
//        $toUsername = $obj_msg->ToUserName;
//        $content_from = trim($obj_msg->Content);
//        $content_to = "transfer:$rst,$msg_content,$obj_msg->Content,欢迎使用逍品旅行，逍品旅行志在为中国中小旅行社和中国游客提供优质的出境游服务，详情登录http://qsctrip.com!";
////        $this->insert_to_db($fromUsername, $toUsername, $obj_msg->MsgType, $obj_msg->Event, $obj_msg->CreateTime, $content_from, $content_to) ;
//
//        $time = time();
//        $textTpl = "<xml>
//							<ToUserName><![CDATA[%s]]></ToUserName>
//							<FromUserName><![CDATA[%s]]></FromUserName>
//							<CreateTime>%s</CreateTime>
//							<MsgType><![CDATA[%s]]></MsgType>
//							<Content><![CDATA[%s]]></Content>
//							<FuncFlag>0</FuncFlag>
//							</xml>";
//        if(!empty( $content_from ))
//        {
//            $msgType = "text";
//            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $content_to);
//            echo $resultStr;
//        }
//        else{
//            $msgType = "text";
//            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $content_to);
//            echo $resultStr;
//        }

    }

    public function kf_msg($touser, $content) {
        $params = array(
            "touser" => $touser, //测试用户
            "msgtype" => "text",
            "text" => array(
                "content" => $content
            )
        ) ;
        $msg_content = json_encode($params, JSON_UNESCAPED_UNICODE) ;
        $this->_transfer_to_agent($msg_content) ;
    }

    private function _transfer_to_agent($msg_content, $force_access_token=false) {
        $this->wx_access_token_model->get_access_token($this->access_token, $force_access_token) ;
        $url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=$this->access_token" ;
        $result = '';

        $rst_data = h_curl($result, $url, $msg_content);


        if($rst_data == Ecode::OK) {
            $rst = json_decode($result, true) ;
            if(isset($rst['errcode']) && $rst['errcode'] == Wx_access_token_model::TOKEN_INVALID) {
                if($force_access_token) {
                    return null;
                }
                $this->_transfer_to_agent($msg_content, true) ;
                die();
            }
            return $result;
        }

        return null ;
    }

    // 测试接口
    private function _wx_test_msg($obj_msg, $rst) {
        $fromUsername = $obj_msg->FromUserName;
        $toUsername = $obj_msg->ToUserName;
        $content_from = trim($obj_msg->Content);
        $time = time();
        $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";

        $content_to = "test: msgtype:".$obj_msg->MsgType.",event:".$obj_msg->Event.",content:". $content_from.".rst".$rst;
        $msgType = "text";
        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $content_to);
        echo $resultStr;

    }



}