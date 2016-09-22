<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/6/7
 * Time: 上午10:52
 */
class Notify_model extends CI_Model
{

    private $m_to_phone ;
    private $m_sms_content ;
    private $m_sms_type = Ptype::SMS_TYPE_NONE;
    private $m_to_email ;
    private $m_email_title ;
    private $m_email_content ;
    private $m_notify_type ;

    public function __construct()
    {
        parent::__construct();
    }

    public function set_phone($phone) {
        $this->m_to_phone = $phone ;
    }

    public function set_sms_content($content) {
        $this->m_sms_content = $content ;
    }
    public function set_sms_type($sms_type) {
        $this->m_sms_type = $sms_type ;
    }

    public function set_to_email($email) {
        $this->m_to_email = $email ;
    }

    public function set_email_title($title) {
        $this->m_email_title = $title ;
    }

    public function set_email_content($content) {
        $this->m_email_content = $content ;
    }

    public function set_notify_type($notify_type) {
        $this->m_notify_type = $notify_type ;
    }

    public function notify() {
        // 短消息通知
        if($this->m_notify_type & Ptype::NOTIFY_TYPE_SMS) {
            $this->_notify_by_sms($this->m_to_phone, $this->m_sms_content) ;
        }

        // email通知
        if($this->m_notify_type & Ptype::NOTIFY_TYPE_EMAIL) {
            $this->_notify_by_email($this->m_to_email, $this->m_email_title, $this->m_email_content) ;
        }
    }

    private function _notify_by_sms($phone, $msg) {
        // TODO 添加短消息通知
        $this->load->model('sms_model') ;

        $rst = $this->sms_model->send_sms($msg, $phone, $channel=Ptype::SEND_SMS_CHANNEL_HUAXING) ;

        if($rst != null) {
            $smsid = $rst['smsid'] ;
            $status = $rst['result'];
            if($status == 0) {
                $status = Ptype::SMS_STATUS_SENDING ;
                $status_msg = $rst['message'];
                $status_msg = '短消息发送中';
                $this->sms_model->set_msg($phone, $smsid, 0, $msg, $this->m_sms_type, $status_msg, $status, $channel) ;
                return Ecode::OK ;
            } else {
                $status = Ptype::SMS_STATUS_SEND_FAILURE ;
                $status_msg = "短消息发送失败" ;
                $this->sms_model->set_msg($phone, $smsid, 0, $msg, $this->m_sms_type, $status_msg, $status, $channel) ;
                // TODO 走其他渠道发送
                return Ecode::SMS_SEND_RESULT_ERR  ;
            }
        } else {
            // TODO 走其他渠道发送
            return Ecode::SMS_SEND_RESULT_ERR  ;
        }
    }

    private function _notify_by_email($email, $email_title, $email_content) {
        // TODO 添加邮件通知

//        echo "<br/>$email<br/>" ;
//        echo "<br/>$email_title<br/>" ;
//        echo "<br/>$email_content<br/>" ;

        $this->load->library('mail_send') ;
        $this->mail_send->send_mail($email, $email_title, $email_content) ;
    }


}