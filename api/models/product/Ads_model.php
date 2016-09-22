<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/29
 * Time: 下午5:03
 *
 * 宣传类产品
 *      商店
 *      酒店
 *      餐厅
 *      购物商店
 */
class Ads_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('atomic/ads/pd_ads_atomic_model', 'pd_ads_atomic_model');
    }

    public function get_list($uid,$pn,$rn,$p_type=0) {

        return array() ;
    }

    public function add(&$id,$data=null) {     // 添加

        if(!isset($data['type'])) {
            return Ecode::C2S_ARG_ERR;
        }
        if(!isset($data['name'])) {
            return Ecode::C2S_ARG_ERR;
        }
        if(!isset($data['continent'])) {
            return Ecode::C2S_ARG_ERR;
        }
        if(!isset($data['country'])) {
            return Ecode::C2S_ARG_ERR;
        }

        $arr = array(
            "type"=>$data['type'],
            "name"=>$data['name'],
            "continent"=>$data['continent'],
            "country"=>$data['country'],
            ) ;

        if(isset($data['city'])) {
            $arr['city'] = $data['city'];
        }
        if(isset($data['addr'])) {
            $arr['addr'] = $data['addr'];
        }
        if(isset($data['tel'])) {
            $arr['tel'] = $data['tel'];
        }
        if(isset($data['web'])) {
            $arr['web'] = $data['web'];
        }
        if(isset($data['fax'])) {
            $arr['fax'] = $data['fax'];
        }
        if(isset($data['feature'])) {
            $arr['feature'] = $data['feature'];
        }
        if(isset($data['brief'])) {
            $arr['brief'] = $data['brief'];
        }

        $rst = $this->pd_ads_atomic_model->ins($arr) ;
        if(!empty($rst)) {
            $id = $rst['insert_id'] ;
            return Ecode::OK;
        } else {
            return Ecode::INSERT_FAIL;
        }
    }

    public function modify($data=null) {  // 修改

    }

    public function del($data=null) {     // 删除

    }

    public function find($data=null) {    // 查找

    }



}