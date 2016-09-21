<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/17
 * Time: 下午7:22
 */


class Order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function order_mng() {

        $this->session->current_page = 3;
        $this->session->order_menu_select = Constant::ORDER_MENU_TRAVEL;

        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $data['role']  = $_SESSION['userinfo']['privilige'];
        // var_dump($_SESSION['userinfo']);
        $this->load_view("order/order_travel_page",$data);
    }

    public function detail() {

        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
   

        $rst = $this->get_order_detail() ;

        $data['detail'] = $rst ;
        $this->load_view('order/order_detail.html',$data);
    }

    private function get_order_detail() {
        $data = $this->input->get(null) ;
        if(!isset($data)) {
            $data = $this->input->post(null) ;
        }
        $url=URL_API.'order/get_order_detail';
        $this->load->library('request') ;
        $this->request->add_default_request_params($data);
        $this->request->add_token_from_session($data);

        $content= h_curl($url,$data);
        $rst = json_decode($content,true);
        if($rst['result']['err'] === 0){
            return $rst['content'];    
        } else {
            $msg = $rst['result']['err'].':'.$rst['result']['msg'];
            $this->load_view_errors($msg);
        }
        
    }

    //修改旅客信息

    public function get_order_list() {
        $data = $this->input->get(null) ;
       
        if($_SESSION['userinfo']['privilige'] !== '0'){
            $data['aid'] = intval($_SESSION['userinfo']['id']);
        }else{
            $aid = $this->input->get('aid');
            if($aid){
                $data['aid'] = $aid;
            }else{
                unset($data['aid']);
            }

        }
        
        $url=URL_API.'order/get_a_order_list';
        $this->load->library('request') ;
        $this->request->add_default_request_params($data);
        $this->request->add_token_from_session($data);
        $content= h_curl($url,$data);
//        $rst = json_decode($content,true);
//        return $rst['content'];
        h_echo_json($content) ;
    }

    public function export_excel(){
        $this->load->library('phpexcel/phpexcel');
        $excelobj = $this->phpexcel;
        $excelobj->getProperties()->setTitle("export_text");
        $excelobj->setActiveSheetIndex(0)->setCellValue('A1', '订单号');
        $excelobj->setActiveSheetIndex(0)->setCellValue('B1','出行日期');
        $excelobj->setActiveSheetIndex(0) ->setCellValue('C1','总金额');
        $excelobj->setActiveSheetIndex(0)->setCellValue('D1','价格');
        $excelobj->setActiveSheetIndex(0)->setCellValue('E1','人数');
        $excelobj->setActiveSheetIndex(0)->setCellValue('F1','下单时间');
        $excelobj->setActiveSheetIndex(0)->setCellValue('G1','产品名称');
        $excelobj->setActiveSheetIndex(0)->setCellValue('H1','订单状态');

        $excelobj->getActiveSheet()->getColumnDimension('G')->setWidth(80);
        $excelobj->getActiveSheet()->getColumnDimension('A')->setWidth(25);
        $excelobj->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $excelobj->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $col = 0;
        $sdata = $this->input->get(null) ;

        if($_SESSION['userinfo']['privilige'] !== '0'){
            $sdata['aid'] = intval($_SESSION['userinfo']['id']);
        }else{
            $aid = $this->input->get('aid');
            if($aid){
                $sdata['aid'] = $aid;
            }else{
                unset($sdata['aid']);
            }

        }
        $url=URL_API.'order/get_order_import_list';
        $this->load->library('request') ;
        $this->request->add_default_request_params($sdata);
        $this->request->add_token_from_session($sdata);
        $content= h_curl($url,$sdata);

        $res=json_decode($content,true);



        $row = 2;

        $data1 = $res['content']['data'];



        foreach($data1 as $val){
            unset($val['id']);
            unset($val['pid']);
            unset($val['p_type']);
            $val['status'] = $this->order_status($val['status']);

            $col = 0;
            $val['travel_date'] = date('Y-m-d',$val['travel_date']);
            $val['order_id'] = strval($val['order_id']);
            foreach ($val as $k=>$field){
                $excelobj->getActiveSheet()->setCellValueByColumnAndRow($col, $row, ' '.$val[$k]);
                $col++;
            }
            $row++;
        }


        $objWriter = PHPExcel_IOFactory::createWriter($excelobj, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Oder'.date('ymdHis').'.xls"');
        header('Cache-Control: max-age=0');

        $objWriter->save('php://output');
    }
    //取消定单

    private function order_status($status){
        switch ($status)
        {
            case Ptype::ORDER_STATUS_WILL_PAY:
                $status_txt="待支付";
                break;
            case Ptype::ORDER_STATUS_PAYED:
                $status_txt="已支付";
                break;
            case Ptype::ORDER_STATUS_CANCELING:
                $status_txt="取消中";
                break;
            case Ptype::ORDER_STATUS_CANCELED:
                $status_txt="已取消";
                break;
            case Ptype::ORDER_STATUS_AGREE:
                $status_txt="已同意";
                break;
            case Ptype::ORDER_STATUS_REJECT:
                $status_txt="已拒绝";
                break;
            case Ptype::ORDER_STATUS_REFUND_CHECHING:
                $status_txt="退款审核中";
                break;
            case Ptype::ORDER_STATUS_REFUNDING:
                $status_txt="退款中";
                break;
            case Ptype::ORDER_STATUS_REFUNDED:
                $status_txt="退款完成";
                break;
            case Ptype::ORDER_STATUS_REFUND_FAILED:
                $status_txt="退款失败";
                break;
            case Ptype::ORDER_STATUS_CLOSED:
                $status_txt="已关闭";
                break;
            case Ptype::ORDER_STATUS_END:
                $status_txt="已完成";
                break;
        }
        return $status_txt;
    }
    //退单

    public function modify_user(){

        $data = $this->input->post(null) ;
        $url=URL_API.'order/modify_customer_info';
        $this->load->library('request') ;
        $this->request->add_default_request_params($data);
        $this->request->add_token_from_session($data);
        $content= h_curl($url,$data);
        h_echo_json($content) ;
    }

    public function cancel_order(){
       $data = $this->input->post(null) ;
        $url=URL_API.'order/cancel';
        $this->load->library('request') ;
        $this->request->add_default_request_params($data);
        $this->request->add_token_from_session($data);
        $content= h_curl($url,$data);
        h_echo_json($content) ;
    }

    public function refund_order(){
        $data = $this->input->post(null) ;
        $url=URL_API.'order/chargeback';
        $this->load->library('request') ;
        $this->request->add_default_request_params($data);
        $this->request->add_token_from_session($data);
        $content= h_curl($url,$data);
        h_echo_json($content) ;
    }

    //填写订单信息

    public function shop_mng() {
        $this->session->order_menu_select = Constant::ORDER_MENU_SHOP;
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;

        $pages = array('order/header') ;
        array_push($pages,"order/mng_page") ;
        array_push($pages,"order/footer") ;


        $this->load_views($pages,$data);
    }

    //生成订单

    public function fillorder(){
        $data = $this->input->get(null);
        $data['title'] =  urldecode($this->input->get('title'));;
        $data['pnum'] =intval($this->input->get('pnum')) > 10 ? 10 : intval($this->input->get('pnum'));
         
        $data['tip_title']=$data['title'];
        $this->load_view('/product/publish/fillorder',$data);

    }

    //未完成订单处理

    public function addorder(){

    	$p_type = $this->input->post('p_type');
        if(!$p_type){
            $this->load_view_errors(null);
            return false;
        }
        $sdata['p_type'] = $p_type;

        $aid = $this->input->post('aid');
        if(!$aid){
            $aid = '0' ;
        }
        $sdata['aid'] = $aid;

        $date = $this->input->post('date');
        if(!$date){
            $this->load_view_errors(null);
            return false;
        }
        
        $sdata['date'] = $date;	
    	$pid = $this->input->post('pid');
        if(!$pid){
            $this->load_view_errors(null);
            return false;
        }
        $sdata['pid'] = $pid;

        $num = $this->input->post('num');
        if(!$num){
            $this->load_view_errors(null);
            return false;
        }

        $sdata['num'] = $num;
        $email = $this->input->post('email');
        if(!$email){
            $this->load_view_errors(null);
            return false;
        }

         $phone = $this->input->post('phone');
        if(!$phone){
            $this->load_view_errors(null);
            return false;
        }

        $nameo = $this->input->post('nameo');
        if(!$nameo){
            $this->load_view_errors(null);
            return false;
        }
       
        $arr1 = array('name'=>$nameo,'is_contact'=>1,'phone'=>$phone[0],'email'=>$email[0]);
        $sdata['contact'][0]=$arr1;
       
       
        $name = $this->input->post('name');
        if(!$name){
            $this->load_view_errors(null);
            return false;
        }
       
        $id_card = $this->input->post('id_card');
        if(!$id_card){
            $this->load_view_errors(null);
            return false;
        }
        $passport = $this->input->post('passport');
        if(!$passport){
            $this->load_view_errors(null);
            return false;
        }
       
        for($i=0;$i<$num;$i++){
            $sex = $this->input->post('sex'.($i+1));
        	$v['name']=$name[$i];
        	$v['sex']=$sex;
        	$v['id_card']=$id_card[$i];
        	$v['passport']=$passport[$i];
        	$v['is_contact']=0;
        	array_push($sdata['contact'],$v);
        }

        $sdata['contact'] = json_encode($sdata['contact']);

        $url=URL_API.'order/create_order';
        $this->add_default_params($sdata,$_SESSION['token']);
   
        $content= h_curl($url,$sdata);
//        echo $content  ;
//        die();
        $datainfo=json_decode($content,true);


        if($datainfo['result']['err'] === 0){

       		$order_id=$datainfo['content']['order_id'];
          	$data['tip_title']='支付页面';
        	header('location:/order/order_pay?order_id='.$order_id);
        } else {
            $msg = $datainfo['result']['err'].':'.$datainfo['result']['msg'];
            $this->load_view_errors($msg);
        }

    }

    //订单完成

    public function order_pay(){
    	$order_id= $this->input->get('order_id');
        if(!$order_id){
            $this->load_view_errors(null);
            return false;
        }

       $sdata['order_id']=$order_id;
       $url=URL_API.'order/get_order_detail';
       $this->add_default_params($sdata,$_SESSION['token']);
       $content= h_curl($url,$sdata);
   
       $datainfo=json_decode($content,true);
  
       if($datainfo['result']['err'] === 0){

       		$data=$datainfo['content'];
          	$data['tip_title']='支付页面';
        	$this->load_view('/order/pay',$data);
       } else {
           $msg = $datainfo['result']['err'].':'.$datainfo['result']['msg'];
           $this->load_view_errors($msg);
       }
    }

    public function pay_success(){
    	 $trade_status = $this->input->get('trade_status');
    	 if($trade_status != 1){
    	 	 $this->load_view_errors(null);
             return false;
    	 }
    	$order_id = $this->input->get('order_id');
    	 if(!$order_id){
            $this->load_view_errors(null);
            return false;
        }
        $data['order_id'] = $order_id;

        $total_fee = $this->input->get('total_fee');
    	 if(!$total_fee){
            $this->load_view_errors(null);
            return false;
        }
        $data['total_fee'] = $total_fee;
       

    	$data['tip_title']='支付成功';
        $this->load_view('/order/pay_success',$data);

    }
}