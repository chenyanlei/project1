<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/29
 * Time: 下午4:47
 */

class Product_model extends CI_Model /*implements IProduct*/
{
    public function __construct()
    {
        parent::__construct();
    }

    // 列表
    public function get_list($u_type,$uid,$pn,$rn,$p_type=0,$p_status=-1) {
        $this->load_sub_model($p_type) ;

        $rst = $this->sub_product_model->get_list($u_type,$uid,$pn,$rn,$p_type,$p_status) ;

        return $rst;
    }

    public function get_a_product_list($aid, $rn, $pn) {
        $p_type = Ptype::ONE_DAY ;
        $this->load_sub_model($p_type) ;

        $rst = $this->sub_product_model->get_a_product_list($aid, $rn, $pn) ;

        return $rst;
    }

    public function query_filter($rn,$pn,$continent, $country, $city, $tag,$uid,$classify=Ptype::PRODUCT_CLASSIFY_GROUP) {
        $p_type = Ptype::ONE_DAY ;
        $this->load_sub_model($p_type) ;
        $rst = $this->sub_product_model->query_filter($rn,$pn,$continent, $country, $city, $tag,$uid,$classify) ;
        return $rst;
    }


    public function get_product_list_by_ids($ids,$uid=NULL, $remove_invalidate=false) {
        $p_type = Ptype::ONE_DAY ;
        $this->load_sub_model($p_type) ;
        return $this->sub_product_model->get_product_list_by_ids($ids,$uid,$remove_invalidate) ;
    }

    public function detail($pid, $uid, $aid, $p_type=Ptype::ONE_DAY, $travel_info=true) {
        $this->load_sub_model($p_type) ;
        $rst = $this->sub_product_model->detail($pid, $uid, $aid,  $travel_info) ;

        return $rst;
    }

    public function admin_detail($pid, $p_type) {
        $this->load_sub_model($p_type) ;
        $rst = $this->sub_product_model->admin_detail($pid) ;

        return $rst;
    }

    // 添加
    public function add(&$id, $data=null) {
        $p_type = $data['p_type'] ;
        $this->load_sub_model($p_type) ;
        return $this->sub_product_model->add($id , $data) ;
    }

    // 添加一个价格
    public function add_calendar_price($data) {
        $this->load->model('atomic/pd_calendar_prices_atomic_model', 'calendar_prices_atomic_model') ;
        return $this->calendar_prices_atomic_model->add_calendar_prices($data) ;
    }

    // 添加一个价格
    public function remove_calendar_price($p_type, $id) {
        $this->load->model('atomic/pd_calendar_prices_atomic_model', 'calendar_prices_atomic_model') ;
        return $this->calendar_prices_atomic_model->remove_calendar_price($p_type, $id) ;
    }

    // 修改
    public function modify($data=null) {
        $p_type = $data['p_type'] ;
        $this->load_sub_model($p_type) ;
        return $this->sub_product_model->modify($data) ;
    }

    // 删除
    public function del($data=null) {
        $p_type = $data['p_type'] ;
        $this->load_sub_model($p_type) ;
        return $this->sub_product_model->del($data) ;
    }

    public function del_img($uid, $p_type, $id, $pid) {
        $this->load_sub_model($p_type) ;
        return $this->sub_product_model->del_img($uid, $id, $pid) ;
    }

    public function add_img($p_type, $pid, $fkey){
        $this->load_sub_model($p_type) ;
        return $this->sub_product_model->add_img($pid, $fkey) ;
    }

    public function chang_status($pid, $p_type ,$to_status) {
        $this->load_sub_model($p_type) ;
        return $this->sub_product_model->chang_status($pid, $to_status) ;
    }

    public function change_a_status($uid,$pid, $p_type ,$to_status) {

        $this->load->model('atomic/a_p_travels_atomic_model', 'a_p_travels_atomic_model');
        $where = array('uid' => $uid, 'pid' => $pid) ;
        $arr = array('status' => $to_status) ;
        $rst = $this->a_p_travels_atomic_model->upd($arr,$where) ;
        if(empty($rst)) {
            return false ;
        }
        return true ;
    }

    public function find($data=null) {    // 查找
        $p_type = $data['p_type'] ;
        $this->load_sub_model($p_type) ;
        return $this->sub_product_model->find($data) ;
    }

    private function load_sub_model($p_type) {     // 添加
        if($p_type < Ptype::MIN || $p_type > Ptype::MAX) {
            die(h_echo_json(Ecode::C2S_ARG_ERR)) ;
        }

        // 加载model
        if($p_type == Ptype::ONE_DAY) {
            $this->load->model('product/travels_model' , 'sub_product_model') ;
        } else if($p_type == Ptype::ONE_DAY_IN) {
            $this->load->model('product/travels_model' , 'sub_product_model') ;
        } else if($p_type == Ptype::LOCAL_GROUP) {
            $this->load->model('product/travels_model' , 'sub_product_model') ;
        } else if($p_type == Ptype::GROUP_TRAVEL) {
            $this->load->model('product/travels_model' , 'sub_product_model') ;
        } else if($p_type == Ptype::GROUP_TRAVEL_IN ) {
            $this->load->model('product/travels_model' , 'sub_product_model') ;
        } else if($p_type == Ptype::HOTEL) {
            $this->load->model('product/ads_model' , 'sub_product_model') ;
        } else if($p_type == Ptype::MARKET) {
            $this->load->model('product/ads_model' , 'sub_product_model') ;
        } else if($p_type == Ptype::SCENIC_AREA) {
            $this->load->model('product/ads_model' , 'sub_product_model') ;
        } else if($p_type == Ptype::DINING_ROOM) {
            $this->load->model('product/ads_model' , 'sub_product_model') ;
        } else if($p_type == Ptype::GOODS) {
            $this->load->model('product/goods_model' , 'sub_product_model') ;
        } else if($p_type == Ptype::CUSTOM_ONE_DAY) {
            $this->load->model('product/travels_model' , 'sub_product_model') ;
        }
    }
}