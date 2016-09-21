<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('user_model') ;
	}

	public function md5test() {
		echo md5('body=即时到账测试&buyer_email=yakejiao@gmail.com&buyer_id=2088102113422363&exterface=create_direct_pay_by_user&is_success=T¬ify_id=RqPnCoPT3K9%2Fvwbh3InXShbnoUYdHvnQIoyu8JVAc4KIjURobFhMGstyiLETzCr5%2BeVV¬ify_time=2016-05-21 11:37:51¬ify_type=trade_status_sync&out_trade_no=test20160521113706&payment_type=1&seller_email=2680412302@qq.com&seller_id=2088221899732061&subject=test商品123&total_fee=0.01&trade_no=2016052121001004360286588587&trade_status=TRADE_SUCCESSzx6bohz18i3twwq77wjv5krm9nv46ktr') ;
	}

	public function index(){
		   var_dump($_SESSION['token']);
		// $this->lang->load('info',$GLOBALS['language']) ;
		// $data['username']=$this->lang->line('txt_username',FALSE) ;
		// $data['password']=$this->lang->line('txt_password',FALSE) ;
		// $data['login_title']=$this->lang->line('txt_login_title',FALSE) ;
		// $data['title']=$this->lang->line('txt_login_title',FALSE) ;
		// $data['page_foget_password']=base_url()."welcome/page_foget_password";
		// $data['page_register']=base_url()."welcome/page_register";
		// $data['login_url']=base_url()."welcome/login" ;
		// $data['mainpage']=base_url()."welcome/mainpage" ;
		// $this->load_view('/login/page_login');
	}

	public function upload_test() {
		$this->load->view('product/mng_page_on_sale');
	}


}

/* vim: set ts=4 sw=4 sts=4 noet: */
