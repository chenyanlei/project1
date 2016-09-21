<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/14
 * Time: 下午12:36
 */
class Product_edit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_login();
    }

    public function oneday() {
        $this->lang->load('info',$GLOBALS['language']) ;
        $data['tip_title']=$this->lang->line('product_mng',FALSE) ;
        $data['p_type'] = PType::ONE_DAY ;      // 添加产品类型

        $pages = array('product/header') ;
        array_push($pages,"product/edit/oneday") ;
        array_push($pages,"product/footer");

        // 获取洲信息
        $this->get_continent($data) ;

        $pid = $this->input->get('id') ;

        // 获取一日游详情
        $this->get_detail_by_id($data, $pid, PType::ONE_DAY) ;

        $this->load_views($pages,$data);
    }

    public function commit(){
        $params = $this->input->post() ;

//        var_dump($params) ;

//        return ;
//        echo json_encode($params,JSON_UNESCAPED_UNICODE) ;

//        die() ;

//        $this->load->library('commen') ;
//        $params[''] = $this->commen->toUnixTimestamp($var) ;

        //通用参数
        $this->add_default_params($params,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'product/modify';
        $rst = h_curl($url,$params);
//        $detail = json_decode($s,true) ;
//        var_dump($rst) ;
        h_echo_json($rst) ;
    }

    private function get_detail_by_id(&$data, $id,$p_type) {
        $params=array();
        //通用参数
        $this->add_default_params($params,$_SESSION['token']) ;

        $params['p_type'] = $p_type ;
        $params['id'] = $id ;
        //请求接口
        $url=URL_API.'product/detail';
        $s=h_curl($url,$params);
        $detail = json_decode($s,true) ;
        if($detail['result']['err'] === 0) {
            $data['detail']=$detail['content'];
//            var_dump($data);
        }
    }

    private function get_continent(&$data) {
        $params=array();
        //通用参数
        $this->add_default_params($params,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'destination/get_all_list';
        $s=h_curl($url,$params);
//        var_dump($s);
        $data['continent']=$s;
    }



}