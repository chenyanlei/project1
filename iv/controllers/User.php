<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 15/12/26
 * Time: 下午9:59
 *
 * 登录
 * 注册
 * 校验码
 * 当前语言
 *
 */
class User extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //注册页 
    public function register(){
    	$this->load->view('user/register');
    }
    //登录页
    public function login(){
        $this->load->view('user/login');
    }
    //邮件确认页
    public function verify(){
        if(!$this->session->active_sign){
             header('location:/user/login');
        }
        $data['setway']='';
        //接受参数
        if(!$this->input->post('email')){
            // header('location:/user/login');
        }
        $data['email']=$this->input->post('email');
        if(!$this->input->post('email_encode')){
            // header('location:/user/login');
        }
        $data['email_encode']=$this->input->post('email_encode');
        
        $this->load->view('user/verify',$data);
    }
    //邮箱验证验证码是否正确
    public function verify_code(){
        $email = $this->input->post('email');
        $register_code = $this->input->post('register_code');
         $url=URL_API.'user/register_confirm_by_code';

        $sdata['email'] = $email;
        $sdata['register_code'] = trim($register_code);
         $s=h_curl($url,$sdata);
        //返回数据给客户端

        $userinfo=json_decode($s,true);
        if($userinfo['result']['err']==0){
            $_SESSION['token']=$userinfo['content']['token'];
           unset($userinfo['content']);
           $s = json_encode($userinfo);
           $this->session->code_sign = '';
           $sign = md5(time().rand(10000,99999));
           $this->session->code_sign = $sign;
           unset($_SESSION['active_sign']);
        }else{
            $this->session->code_sign = '';
        }
        h_echo_json($s);
    }
    //验证用户是否存在
    public function check_user_exists(){
        //接受参数
        $uname=$this->input->post('uname');
        $utype=$this->input->post('utype');
        if(!$uname){
            return false;
        }

        if(!$utype){
            return false;
        }
        //请求接口
        $url=URL_API.'user/check_user_name';
        $sdata['uname'] = $uname;
        $sdata['utype'] = $utype;
         $s=h_curl($url,$sdata);
        //返回数据给客户端
        h_echo_json($s);
    }
    //验证码
    public function check_captcha(){
        //接受参数
        $uname=$this->input->ip_address();
        $captcha=$this->input->post('captcha');
        if(!$uname){
            return false;
        }

        if(!$captcha){
            return false;
        }
        //请求接口
        $url=URL_API.'captcha/check_captcha';
        $sdata['uname'] = $uname;
        $sdata['captcha'] = $captcha;

        $s=h_curl($url,$sdata);
        //返回数据给客户端
        h_echo_json($s);
    }
    //手机注册短信验证码
    public function send_sms_code(){
        $captcha=$this->input->post('captcha');
        $uname=$this->input->post('uname');
         
        //请求接口
        $url=URL_API.'sms/send_regiter_sms';
        $sdata['phone'] = $uname;
        $sdata['captcha'] = $captcha;
        $sdata['sms_type'] = 1;
        $this->add_default_params($sdata) ;
        $s=h_curl($url,$sdata);
        //返回数据给客户端
        h_echo_json($s);
    }
    //手机登录动态短信验证码
    public function send_sms_login_code(){
        $uname=$this->input->post('phone');
        //请求接口
        $url=URL_API.'sms/send_login_sms_ex';
        $sdata['phone'] = $uname;
        $this->add_default_params($sdata) ;
        $s=h_curl($url,$sdata);
        //返回数据给客户端
        h_echo_json($s);
    }
    //手机动态密码登录
    public function phone_login(){
        $uname=$this->input->post('phone');
        $code=$this->input->post('code');
        //请求接口
        $url=URL_API.'user/login_by_sms';
        $sdata['phone'] = $uname;
        $sdata['code'] = $code;
        $this->add_default_params($sdata) ;
        $s=h_curl($url,$sdata);
        $userinfo=json_decode($s,true);
        if($userinfo['result']['err']==0){
             $_SESSION['token']=$userinfo['content']['token'];
             $_SESSION['begin_use'] = $userinfo['content']['begin_use'];
            $this->session->user_id = $userinfo['content']['id'];
            $s1['result'] = $userinfo['result'];
            $s1['content']['name'] = $userinfo['content']['name'];
            $s1['content']['status'] = $userinfo['content']['status'];
            if( $userinfo['content']['begin_use'] === '0'){
                $s1['content']['msg'] = $userinfo['content']['status_msg']['msg'];
            }
            $s1['content']['backto'] = $userinfo['content']['begin_use'];
            $s = json_encode($s1);
        }else{
            //TODO
        }
        //返回数据给客户端
        h_echo_json($s);
    }
    //密码找回发送验证码
    public function send_find_sms_code(){
        $uname=$this->input->post('uname');
        //请求接口
        $url=URL_API.'sms/send_find_pwd_sms';
        $sdata['phone'] = $uname;

        $this->add_default_params($sdata) ;

        $s=h_curl($url,$sdata);
        //返回数据给客户端
        h_echo_json($s);
    }
    //验证手机码
    public function find_sms_by_smscode(){
         $uname=$this->input->post('code');
         $mobile=$this->input->post('mobile');
        //请求接口
        $url=URL_API.'user/find_pwd_by_mobile';
        $sdata['code'] = $uname;
        $sdata['mobile'] = $mobile;

        $this->add_default_params($sdata) ;

        $s=h_curl($url,$sdata);
        $returninfo = json_decode($s,true);

         if($returninfo['result']['err']==0){
            $_SESSION['token']=$returninfo['content']['token'];
         }
        //返回数据给客户端
        h_echo_json($s);
    }
    //处理注册find_
    public function doregister(){
        //接受参数
        $code=$this->input->post('iczryn');
        $pwd=$this->input->post('orlzne');
        $reg_type=$this->input->post('daeewc');
        $phone=$this->input->post('krecjde');
       
   

        //格式化参数
        $sdata['code']=$code;
        $sdata['mobile']=$phone;
        $sdata['pwd']=$pwd;
        $sdata['reg_type']=$reg_type;

        $this->add_default_params($sdata) ;
        //请求接口
        $url=URL_API.'user/register';
        $s=h_curl($url,$sdata);
         $returninfo = json_decode($s,true);
         if($returninfo['result']['err']==0){
            $_SESSION['token']=$returninfo['content']['token'];
            $this->session->active_sign = '';
            $sign = md5(time().rand(10000,99999));
            $this->session->active_sign = $sign;
            unset($returninfo['content']['token']);
            $s= json_encode($returninfo);
         }else{
            $this->session->active_sign = '';
         }
        //返回数据给客户端
        h_echo_json($s);
    }
     //处理登录
     public function dologin(){

        //接受参数
        // $verify=$this->input->post('iczryn');
        $pwd=$this->input->get_post('orlzne');
        $name=$this->input->get_post('krecjde');
        $uname=$this->input->ip_address();
     
        // if(!$verify){
        //     return false;
        // }

        if(!$pwd){
            return false;
        }

        if(!$name){
            return false;
        }

        if(!$uname){
            return false;
        }
        //格式化数据
        // $sdata['captcha']=$verify;
        $sdata['name']=$name;
        $sdata['pwd']=$pwd;
        $sdata['uname']=$uname;

        $this->add_default_params($sdata) ;
//         $this->request->add_default_request_params($sdata);
        //请求接口
        $url=URL_API.'user/login';

        $s=h_curl($url,$sdata);

//         echo $s ;
        $userinfo=json_decode($s,true);
        if($userinfo['result']['err']==0){
             $_SESSION['userinfo'] = $userinfo['content'];
             $_SESSION['token']=$userinfo['content']['token'];
             $_SESSION['begin_use'] = $userinfo['content']['begin_use'];
            $this->session->user_id = $userinfo['content']['id'];
            $s1['result'] = $userinfo['result'];
            $s1['content']['name'] = $userinfo['content']['name'];
            $s1['content']['status'] = $userinfo['content']['status'];
            if( $userinfo['content']['begin_use'] === '0'){
                $s1['content']['msg'] = $userinfo['content']['status_msg']['msg'];
            }
            if($userinfo['content']['status'] === '0'){
                $this->session->active_sign = '';
                $sign = md5(time().rand(10000,99999));
                $this->session->active_sign = $sign;
            }
            $s1['content']['backto'] = $userinfo['content']['begin_use'];
            $s = json_encode($s1);
        }else{
            //TODO
        }

        //返回数据给客户端
        h_echo_json($s);
    }
    //邮箱确认
    public function register_confirm(){
        //接受数据
        $code=$this->input->get('confirm_code');
        //请求接口
        $sdata['confirm_code']=$code;
        $url=URL_API.'user/register_confirm';
        $data['info']=json_decode(h_curl($url,$sdata),true);
        $this->load->view('user/verifyinfo',$data);

    }

    //重新发送邮箱
    public function re_email(){
        //接受数据
        $email=$this->input->post('email');
     
        //格式化数据
        $sdata['email']=$email;
        //接受参数
        $this->add_default_params($sdata) ;
        //请求接口
        $url=URL_API.'user/re_verify_email';
        $s=h_curl($url,$sdata);
        //返回数据给客户端
        h_echo_json($s);
    }

    //忘记密码
    public function forgot_pwd(){
        $this->load->view('user/forgot_pwd');
    }

    //处理忘记密码
    public function doforgot_pwd(){
        //接受数据
        $email=$this->input->post('email');
         if(!$email){
            $this->load_view_errors(null);
            return false;
       }
        $captcha=$this->input->post('captcha');
         if(!$captcha){
            $this->load_view_errors(null);
            return false;
       }
        //格式化数据
        $sdata['email']=$email;
        $sdata['captcha']=$captcha;
        $this->add_default_params($sdata) ;
        //请求接口
        $url=URL_API.'user/find_pwd_by_email';
        $s=h_curl($url,$sdata);

        $emailinfo=json_decode($s,true);

        if($emailinfo['result']['err']==0){
              $data['setway']='';
              $data['email_encode']=$emailinfo['content']['email_encode'];
              $this->load->view('user/login',$data);
        }else{
            $msg =$emailinfo['result']['err'].':'.$emailinfo['result']['msg'];
             $this->load_view_errors($msg);
        }
    }

    //设置密码
    public function reset_pwd(){
        $confirm_code=$this->input->get('confirm_code');
        if(!$confirm_code){
            return false;
        }
        $data['confirm_code']=$confirm_code;
        $this->load->view('user/reset_pwd',$data);
    }

    //处理设置密码
    public function doreset_pwd(){
       $confirm_code=$this->input->post('confirm_code');
       $pwd=$this->input->post('pwd');
       $repwd=$this->input->post('repwd');
       if(!$confirm_code){
            $this->load_view_errors(null);
            return false;
       }

       if(!$pwd){
            $this->load_view_errors(null);
            return false;
       }

       if(!$repwd){
            $this->load_view_errors(null);
            return false;
       }

        $sdata['confirm_code'] = $confirm_code;
        $sdata['pwd'] = $pwd;
        $sdata['repwd'] = $repwd;
        //请求接口
        $url=URL_API.'user/reset_pwd_by_code';
        $s=h_curl($url,$sdata);

        $emailinfo=json_decode($s,true);

        if($emailinfo['result']['err']==0){
              $data['setway']=1;
              $this->load->view('user/login',$data);
        }else{
           $msg =$emailinfo['result']['err'].':'.$emailinfo['result']['msg'];
           $this->load_view_errors($msg);
        }
    }

    //处理设置密码
    public function doreset_pwd_phone(){
       $pwd=$this->input->post('pwd');
       $repwd=$this->input->post('repwd');

        $sdata['pwd'] = $pwd;
        $sdata['repwd'] = $repwd;
        //请求接口
        $url=URL_API.'user/reset_pwd';
        $this->add_default_params($sdata,$_SESSION['token']);

        $s=h_curl($url,$sdata);

        $emailinfo=json_decode($s,true);
        // var_dump($sdata);
        if($emailinfo['result']['err']==0){
                header('location:/user/login'); 
        }else{
           $msg =$emailinfo['result']['err'].':'.$emailinfo['result']['msg'];
           $this->load_view_errors($msg);
        }
    }

    //认证页面
    public function verifyqsc(){
        $this->load->view('user/verifyqsc');
    }

    //完成注册
    public function passqsc(){
        $this->load->view('user/passqsc');
    }

    //查看qsc编号是否已经绑定用户
    public function check_qsc_exists(){
        //接受参数
        $qsc_code=$this->input->post('qsc_code');
        if(!$qsc_code){
            return false;
        }
        $sdata['qsc'] = $qsc_code;
        //请求接口
        $url=URL_API.'user/check_qsc';
        $this->add_default_params($sdata,$_SESSION['token']);
        $s=h_curl($url,$sdata);
        //返回数据给客户端
        h_echo_json($s);
    }   

    //用户退出
    public function logout(){
        $this->session->unset_userdata('token');
         header('location:/user/login');
    } 

    //信息认证
    public function info_verify(){
         if(!$this->session->active_sign){
            header('location:/user/login');
         }
        $this->load->view('user/info');
    }

    //代理商感兴趣产品的设置
    public function classify(){
        if(!$this->session->dest_sign){
            header('location:/user/login');
        }
        $sdata=array();

        //接受参数
        $this->add_default_params($sdata,$_SESSION['token']) ;

        //请求接口
        $url=URL_API.'product_tags/get_all_tags';

        $s=h_curl($url,$sdata);

        $classify=json_decode($s,true);
        $data['cate']=$classify['content'];
        $this->load->view('user/classify',$data);
    }

    //设置代理商感兴趣的产品
    public function set_cate(){
        $product_classifies_type = $this->input->post('product_classifies_type');
        if($product_classifies_type === "1"){
            $sdata['product_classifies_type'] = $product_classifies_type;
            $product_classifies_id = $this->input->post('product_classifies_id');
            if(!$product_classifies_id){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['product_classifies_id'] =  $product_classifies_id;
        }else{
            $sdata['product_classifies_type'] = $product_classifies_type;
        }

        $this->add_default_params($sdata,$_SESSION['token']) ;

        //请求接口
        $url=URL_API.'user_agent/set_agent_classify';

        $s=h_curl($url,$sdata);

        $agentinfo=json_decode($s,true);

        if($agentinfo['result']['err'] == 0){
            $this->session->classify_sign = '';
            $sign = md5(time().rand(10000,99999));
            $this->session->classify_sign = $sign;
            unset($_SESSION['dest_sign']);
            header('location:/user/verify_status');
        } else {
           $this->session->classify_sign = '';
           $msg = $agentinfo['result']['err'].':'.$agentinfo['result']['msg'];
           $this->load_view_errors($msg);
        }
    }

    //审核结果
    public function verify_status(){
        
        $sdata= array();
        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'user/get_user_last_status_msg';
       
        $s=h_curl($url,$sdata);


        $info=json_decode($s,true);
        
    
        if($info['result']['err'] == 0){
            $data = $info['content'];
            $this->load->view('user/verify_result',$data);
            $this->session->active_sign =1;
        } else {
           $msg = $info['result']['err'].':'.$info['result']['msg'];
           $this->load_view_errors($msg);
        }
    }
    //代理商目的地设置
    public function destinate(){
         
        if(!$this->session->info_sign){
            header('location:/user/login');
        }
        $sdata=array();

        //接受参数
        $this->add_default_params($sdata,$_SESSION['token']) ;

        //请求接口
        $url=URL_API.'destination/get_all_list';

        $s=h_curl($url,$sdata);

        $desti=json_decode($s,true);
        $data=$desti['content'];
        $this->load->view('user/destination',$data);
    }

    //设置代理商选择目的地
    public function set_destinate(){
        $product_destinations_type = $this->input->post('product_destinations_type');
        if($product_destinations_type === "1"){
            $sdata['product_destinations_type'] = $product_destinations_type;
            $product_destinations_id = $this->input->post('product_destinations_id');
            if(!$product_destinations_id){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['product_destinations_id'] =  $product_destinations_id;
        }else{
             $sdata['product_destinations_type'] = $product_destinations_type;
        }

         $this->add_default_params($sdata,$_SESSION['token']) ;

       

        //请求接口
        $url=URL_API.'user_agent/set_agent_product_destination';

        $s=h_curl($url,$sdata);

 
     
        $agentinfo=json_decode($s,true);

        if($agentinfo['result']['err'] == 0){
           $this->session->dest_sign = '';
           $sign = md5(time().rand(10000,99999));
           $this->session->dest_sign = $sign;
           unset($_SESSION['info_sign']);
          header('location:/user/classify');
        } else {
           $this->session->dest_sign = '';
           $msg = $agentinfo['result']['err'].':'.$agentinfo['result']['msg'];
           $this->load_view_errors($msg);
        }
    }
    //邀请码验证
    public function recommend_code(){
     
        $recommend_code=$this->input->post('recommend_code');  
        $sdata['recommend_code'] =   $recommend_code; 
         
        $this->add_default_params($sdata,$_SESSION['token']) ;

        //请求接口
        $url=URL_API.'user_agent/check_recommend_code';
        

         $s=h_curl($url,$sdata);

        //返回数据给客户端
        h_echo_json($s);
    }
    //设置代理信息
    public function add_agent_info(){
        $agent_type = $this->input->post('agent_type');
        if($agent_type === '0'){
            $recommend_code1 = $this->input->post('recommend_code1');
            if(!$recommend_code1){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['recommend_code'] = $recommend_code1;
            $name = $this->input->post('username');
            if(!$name){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['name'] = $name;

            $contact = $this->input->post('usercontact');
            if(!$contact){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['contact'] = $contact;
            $id_card_0 = $this->input->post('id_card_0');
            if(!$id_card_0){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['id_card_0'] = $id_card_0;
             $id_card_1 = $this->input->post('id_card_0');
            if(!$id_card_1){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['id_card_1'] = $id_card_1;
             $id_card_2 = $this->input->post('id_card_2');
            if(!$id_card_2){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['agent_type'] = $agent_type; 
            $sdata['id_card_2'] = $id_card_2;
            $sdata['sex'] = $this->input->post('sex');
            $sdata['address'] = $this->input->post('address');
            $sdata['employer'] = $this->input->post('employer');
            $sdata['is_tourism_practitioners'] = $this->input->post('travel');

        }else{
            $recommend_code2 = $this->input->post('recommend_code2');
            if(!$recommend_code2){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['recommend_code'] = $recommend_code2;
             $name = $this->input->post('company');
            if(!$name){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['name'] = $name;
            $bussiness_licence_img = $this->input->post('bussiness_licence');
            if(!$bussiness_licence_img){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['bussiness_licence_img'] = $bussiness_licence_img;

            $orgnization_code_img = $this->input->post('orgnization_code');
            if(!$orgnization_code_img){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['orgnization_code_img'] = $orgnization_code_img;

            $address = $this->input->post('caddress');
            if(!$address){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['address'] = $address;

            $bussiness_licence = $this->input->post('ccode');
            if(!$bussiness_licence){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['bussiness_licence'] = $bussiness_licence;

            $orgnization_code = $this->input->post('ocode');
            if(!$orgnization_code){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['orgnization_code'] = $orgnization_code;

            $corporate = $this->input->post('legal');
            if(!$corporate){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['corporate'] = $corporate;

            $corporate_card_id = $this->input->post('idcard');
            if(!$corporate_card_id){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['corporate_card_id'] = $corporate_card_id;

            $contact = $this->input->post('contact');
            if(!$contact){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['contact'] = $contact;

            $contact_phone = $this->input->post('contact_phone');
            if(!$contact_phone){
               $this->load_view_errors(null);
                return false;
            }
            $sdata['contact_phone'] = $contact_phone;
            $sdata['agent_type'] = $agent_type;
        }

        $this->add_default_params($sdata,$_SESSION['token']) ;

        //请求接口
        $url=URL_API.'user_agent/set_agent_info';
        $s=h_curl($url,$sdata);

        $agentinfo=json_decode($s,true);
        if($agentinfo['result']['err'] == 0){
            header('location:/user/verify_status');
            unset($_SESSION['active_sign']);
        } else {
           $msg = $agentinfo['result']['err'].':'.$agentinfo['result']['msg'];
           $this->load_view_errors($msg);
        }
    }

    //开始使用qsc系统
    public function begin(){
        $sdata = array();
        $this->add_default_params($sdata,$_SESSION['token']) ;

        //请求接口
        $url=URL_API.'/user/begin_use_platfrom';

        $s=h_curl($url,$sdata);

 
     
        $agentinfo=json_decode($s,true);
        if($agentinfo['result']['err'] == 0){
            $_SESSION['begin_use'] = "1";
        } else {
           $msg = $agentinfo['result']['err'].':'.$agentinfo['result']['msg'];
           $this->load_view_errors($msg);
        }
        // var_dump($s);
        h_echo_json($s);
    }

    public function doadd_user(){
        //接受参数
        $pwd=$this->input->post('password');
        $phone=$this->input->post('mobile');

        //格式化参数
        $sdata['mobile'] = $phone;
        $sdata['pwd'] = $pwd;
        $sdata['reg_type'] = 2;

        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'user_member/add';
        $s=h_curl($url,$sdata);

        //返回数据给客户端
        h_echo_json($s);
    }

    public function doset_agent_info(){
        $name=$this->input->post('name');
        $contact_phone = $this->input->post('contact_phone');
        $contact = $this->input->post('contact');
        $address = $this->input->post('address');
        $level = $this->input->post('level');
        $uid = $this->input->post('uid');

        //格式化参数
        $sdata['name'] = $name;
        $sdata['corporate'] = $name;
        $sdata['contact_phone'] = $contact_phone;
        $sdata['contact'] = $contact;
        $sdata['address'] = $address;
        $sdata['level'] = $level;
        $sdata['uid'] = $uid;
        $sdata['reg_type'] = 2;
        $sdata['agent_type'] = 1;
        $sdata['bussiness_licence'] = $uid;
        $sdata['orgnization_code'] = $uid;
        $sdata['bussiness_licence_img'] = 'http://img.qsctrip.com/khlogo_01.jpg';
        $sdata['orgnization_code_img'] = 'http://img.qsctrip.com/khlogo_01.jpg';

        $this->add_default_params($sdata,$_SESSION['token']) ;
//        var_dump($sdata);die;
        //请求接口
        $url=URL_API.'user_member/set_agent_info';
        $s=h_curl($url,$sdata);

        //返回数据给客户端
        h_echo_json($s);
    }
}    