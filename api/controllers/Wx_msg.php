<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/25
 * Time: 下午4:52
 */
class Wx_msg extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model') ;
        $this->TOKEN="qsctrip";
    }

    public function index() {
//        $this->_valid();
        $this->responseMsg();
    }


    private function _valid()
    {
        $echoStr = $this->input->get_post("echostr");

        //valid signature , option
        if($this->_checkSignature()){
            echo $echoStr;
            exit;
        } else {
            echo 'false';
        }
    }

    public function responseMsg() {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){
            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
               the best way is to check the validity of xml by yourself */
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $this->load->model('wx_msg_model') ;
            echo $this->wx_msg_model->wx_msg($postObj) ;
        }else {
            echo "";
            exit;
        }
    }

    public function responseMsg1()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){
            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
               the best way is to check the validity of xml by yourself */
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
//            $msgType = $postObj->MsgType;
//            $Event = $postObj->Event;
//            $EventKey = $postObj->EventKey;

            $time = time();
            $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
            if(!empty( $keyword ))
            {
                $msgType = "text";
                $contentStr = "欢迎使用逍品旅行，逍品旅行志在为中国中小旅行社和中国游客提供优质的出境游服务，详情登录qsctrip.com!";
//                $contentStr = "fromUsername:$fromUsername, toUsername:$toUsername, keyword:$keyword";

                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
            else{
                echo "Input something...";
            }

        }else {
            echo "";
            exit;
        }
    }

    private function _checkSignature()
    {
        $signature = $this->input->get_post("signature");
        $timestamp = $this->input->get_post("timestamp");
        $nonce = $this->input->get_post("nonce");

        $token = $this->TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}