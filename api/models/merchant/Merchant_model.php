<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/08/03
 * Time: 下午5:03
 *
 * 商户信息
 *      商店
 *      酒店
 *      餐厅
 *      购物商店
 */
class Merchant_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'merchant_0';
        $this->load->model("merchant/merchant_img_model", "merchant_img_model") ;
    }

    public function get_list($pn,$rn,$s_type=0) {
        $order_by = "weight desc" ;
        if($s_type != 0) {
            $where = array("type" => $s_type) ;
        } else {
            $where = null ;
        }

//        var_dump($where) ;

        $cnt = $this->cnt($where) ;
        if($rn * $pn < $cnt) {
            $select = "id, name, type, continent, country, city, addr, tel, web, fax, feature, brief" ;
            $rst = $this->slt_res_arr($where, $select, $rn , $rn * $pn , $order_by) ;

            $index = 0 ;
            foreach($rst as $rst_item) {
                $imgs_rst = $this->merchant_img_model->get_imgs($rst_item['id'] ) ;
                if(!empty($imgs_rst)) {
                    $rst[$index]['imgs'] = $imgs_rst;
                    $index ++ ;
                }
            }
            return array(
                "rn"=>$rn,
                "pn"=>$pn,
                "total"=>intval($cnt),
                "data"=>$rst
            ) ;
        }

        return array() ;
    }

    public function get_detail($id) {
        $where = array("id"=>$id) ;
        $select = "id, name, continent, country, city, addr, tel, web, fax, feature, brief" ;
        $rst = $this->slt_row_arr($where, $select) ;
        $imgs_rst = $this->merchant_img_model->get_imgs($rst['id'] ) ;
        $rst['imgs'] = $imgs_rst;
        return $rst;
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

        $imgs_json = $data["imgs"] ;
        $imgs = json_decode($imgs_json, true) ;
        if(sizeof($imgs) == 0) {
            return Ecode::C2S_ARG_ERR;
        }

        $arr = array(
            "uid"=>$data['uid'],
            "type"=>$data['type'],
            "name"=>$data['name'],
            "continent"=>$data['continent'],
            "country"=>$data['country'],
            "create_time"=>time()
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
        $rst = $this->ins($arr) ;

        //添加图片数据
        if(!empty($rst)) {
            $id = $rst['insert_id'] ;
            $this->merchant_img_model->add($id, $imgs) ;
            return Ecode::OK;
        } else {
            return Ecode::INSERT_FAIL;
        }
    }

}