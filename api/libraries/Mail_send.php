<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/25
 * Time: 下午4:24
 */
class Mail_send
{
    private $CI ;

    public function __construct()
    {
        $this->CI = & get_instance() ;
    }

    /**
     * 发送邮件方法
     *  邮件发送成功返回true,发送失败返回false
     */
    public function send_mail($to,$title,$content)
    {
        $this->CI->load->library('email');
//        $config['protocol'] = 'smtp';
////        $config['smtp_host'] = 'ssl://smtp.qq.com';
////        $config['smtp_user'] = '2915521805@qq.com';
////        $config['smtp_pass'] = 'nlfwtyzmxsbidhdg';
//        $config['smtp_host'] = 'smtp.exmail.qq.com';
//        $config['smtp_user'] = 'sys_notify@qsctrip.com';
//        $config['smtp_pass'] = 'Qsc@2016';
//        $config['smtp_port'] = '25';
//        $config['smtp_timeout'] = '10';
//        $config['mailtype'] = 'html';
//        $config['newline'] = "\r\n";
//        $config['crlf'] = "\r\n";

        $config = array(
            'crlf'          => "\r\n",
            'newline'       => "\r\n",
            'charset'       => 'utf-8',
            'protocol'      => 'smtp',
            'mailtype'      => 'html',
            'smtp_host'     => 'smtp.exmail.qq.com',
            'smtp_port'     => '25',
            'smtp_user'     => 'sys_notify@qsctrip.com',
            'smtp_pass'     => 'Qsc@2016'
        );

//        $this->CI->load->library('email',$config);
        $this->CI->email->initialize($config);
        $this->CI->email->set_newline("\r\n");
//        $this->CI->email->from('2915521805@qq.com');
        $this->CI->email->from('sys_notify@qsctrip.com');
//        $this->email->to('345432757@qq.com');
//        $this->CI->email->subject('用户提交了新内容');
//        $this->CI->email->message('用户：test');
        $this->CI->email->to($to);
        $this->CI->email->subject($title);
        $this->CI->email->message($content);
        if(!$this->CI->email->send() ) {
            echo $this->CI->email->print_debugger();//打开调试器，可以看到详细内容   ;
            return true ;
        }

        return true ;
    }



}