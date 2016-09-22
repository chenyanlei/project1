<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/21
 * Time: 下午4:14
 */
class Wx_msg_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('wx/wx_account_atomic_model', 'wx_account_atomic');
        $this->load->library("wxtype") ;
    }

    public function wx_msg($obj_msg) {
        if($obj_msg->MsgType == Wxtype::MSG_TYPE_TEXT) {
            return $this->_wx_text_msg($obj_msg);
//            return $this->_wx_kf_msg($obj_msg) ;
        } else if($obj_msg->MsgType == Wxtype::MSG_TYPE_EVENT){
            return $this->_wx_event_msg($obj_msg);
        }
    }

    private function _wx_text_msg($obj_msg) {
        $this->load->model("wx/wx_agent_model", "wx_agent_model") ;
        $this->wx_agent_model->transfer_to_agent($obj_msg) ;
//        $this->_wx_test_msg($obj_msg) ;
        $this->_wx_auto_msg($obj_msg);
    }

    // 微信客服消息
    private function _wx_kf_msg($obj_msg) {
        $fromUsername = $obj_msg->FromUserName;
        $toUsername = $obj_msg->ToUserName;
        $createTime = $obj_msg->CreateTime;

        $textTpl ="<xml>
                 <ToUserName><![CDATA[%s]]></ToUserName>
                 <FromUserName><![CDATA[%s]]></FromUserName>
                 <CreateTime>%s</CreateTime>
                 <MsgType><![CDATA[transfer_customer_service]]></MsgType>
             </xml>";

        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $createTime);
        echo $resultStr;

    }

    private function _wx_event_msg($obj_msg) {
        if($obj_msg->Event == Wxtype::EVENT_CLICK) {              //  事件点击
            $this->_wx_event_click_msg($obj_msg) ;
        } elseif($obj_msg->Event == Wxtype::EVENT_VIEW) {        //  url链接
            $this->_wx_event_view_msg($obj_msg) ;
        } elseif(Wxtype::EVENT_SUBSCRIBE == $obj_msg->Event) {    //  用户关注
            // 进入订阅流程处理
            $this->load->model("wx/wx_msg_subscribe_model","wx_msg_subscribe_model") ;
            $this->wx_msg_subscribe_model->subscribe($obj_msg) ;

            // 返回欢迎词
            $this->_wx_auto_msg($obj_msg) ;
        } else if($obj_msg->Event == Wxtype::EVENT_UNSUBSCRIBE) { //  用户取消关注
            $this->unsubscribe($obj_msg) ;
        } else {                                     //  其他
            $this->_wx_auto_msg($obj_msg);
        }
    }

    private function _wx_test_msg($obj_msg) {
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

        $content_to = "test: msgtype:".$obj_msg->MsgType.",event:".$obj_msg->Event.",content:". $content_from;
        $msgType = "text";
        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $content_to);
        echo $resultStr;

    }

    private function _wx_auto_msg($obj_msg) {
        $fromUsername = $obj_msg->FromUserName;
        $toUsername = $obj_msg->ToUserName;
        $content_from = trim($obj_msg->Content);
        if($content_from == "代理商") {
            $content_to = "申请逍品旅行代理商，请发送邮件到service@qsctrip.com,或者拨打电话010-62238287";
        } else if($content_from == "供应商") {
            $content_to = "申请逍品旅行产品供应商，请先通过中国出境旅游优质供应商认证，认证网址http://qualitytourism.com";
        } else {
            $content_to = "欢迎使用逍品旅行，逍品旅行志在为中国中小旅行社和中国游客提供优质的出境游服务，详情登录http://a.qsctrip.com/webapp_about/aboutus";
        }
        $this->insert_to_db($fromUsername, $toUsername, $obj_msg->MsgType, $obj_msg->Event, $obj_msg->CreateTime, $content_from, $content_to) ;

        $time = time();
        $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
        if(!empty( $content_from ))
        {
            $msgType = "text";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $content_to);
            echo $resultStr;
        }
        else{
            $msgType = "text";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $content_to);
            echo $resultStr;
        }
    }

    private function _wx_event_view_msg($obj_msg) {
        $fromUsername = $obj_msg->FromUserName;
        $toUsername = $obj_msg->ToUserName;
        $content_from = trim($obj_msg->EventKey);
        $this->insert_event_view_to_db($fromUsername, $toUsername,$obj_msg->MsgType, $obj_msg->Event, $obj_msg->CreateTime, $content_from) ;
    }

    private function _wx_event_click_msg($obj_msg){
        $fromUsername = $obj_msg->FromUserName;
        $toUsername = $obj_msg->ToUserName;
        $content_from = trim($obj_msg->EventKey);
        $content_to = "欢迎使用逍品旅行，逍品旅行志在为中国中小旅行社和中国游客提供优质的出境游服务，详情登录qsctrip.com!";
        $this->insert_to_db($fromUsername, $toUsername, $obj_msg->MsgType, $obj_msg->Event, $obj_msg->CreateTime, $content_from, $content_to) ;

        $time = time();
        $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                    </xml>";

        $msgType = "text";
        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $content_to);
        echo $resultStr;
    }

    private function insert_to_db($from, $to, $msg_type, $event, $create_time, $content_from='', $content_to='') {
        $msg_user_tag = $from."-".$to;
        $msg1 = array(
            'msg_user_tag' => $msg_user_tag ,
            'FromUserName' => $from ,
            'ToUserName' => $to ,
            'MsgType' => $msg_type ,
            'Event' => $event,
            'CreateTime' => $create_time ,
            'Content' =>$content_from
        ) ;

        $msg2 = array(
            'msg_user_tag' => $msg_user_tag ,
            'FromUserName' => $to ,
            'ToUserName' => $from ,
            'Event' => $event,
            'MsgType' => $msg_type ,
            'CreateTime' => time() ,
            'Content' => $content_to
        ) ;

        $data = array($msg1, $msg2);
        $this->load->model("wx/wx_user_msg_atomic_model", "wx_user_msg_atomic_model") ;
        $this->wx_user_msg_atomic_model->ins_batch($data) ;
    }

    private function insert_event_view_to_db($from, $to, $msg_type, $event, $create_time, $content_from='') {
        $msg_user_tag = $from."-".$to;
        $msg1 = array(
            'msg_user_tag' => $msg_user_tag ,
            'FromUserName' => $from ,
            'ToUserName' => $to ,
            'MsgType' => $msg_type ,
            'Event' => $event ,
            'CreateTime' => $create_time ,
            'Content' =>$content_from
        ) ;

        $this->load->model("wx/wx_user_msg_atomic_model", "wx_user_msg_atomic_model") ;
        $this->wx_user_msg_atomic_model->ins($msg1) ;
    }



}