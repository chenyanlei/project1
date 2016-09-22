<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/25
 * Time: 下午8:27
 */
class Aspread_material_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('atomic/a_spread_material_atomic_model', 'a_spread_material_atomic_model');
    }

    public function add_item($uid, $title, $face_img, $content) {
        $arr = array('uid' => $uid, 'title' => $title, 'face_img' => $face_img,
            'content' => $content, "p_type"=>Ptype::ONE_DAY) ;

        return $this->a_spread_material_atomic_model->ins($arr) ;
    }

    public function get_list($uid=-1, $rn=20, $pn=0, $status=Ptype::MATERIAL_STATUS_CHECK_PASS) {
        if($uid != -1){
            $where = array('uid'=>$uid) ;
        } else {
            $where = null ;
        }

        if($status != -1) {
            $where = array('status'=>$status) ;
        }

        $cnt = $this->a_spread_material_atomic_model->cnt($where) ;
        if($cnt < $rn * $pn) {
            return null ;
        }

        $select = "id, id as mid, destination, classify, title, face_img, status" ;
        $list = $this->a_spread_material_atomic_model->slt_res_arr($where, $select, $rn, $rn * $pn) ;
        if(empty($list)) {
            return null ;
        }
        $rst = array(
            "total" => $cnt,
            "rn" => $rn,
            "pn" => $pn,
            "page_num" => intval( ($cnt + $rn - 1) / $rn ),
            "img_url" => URL_IMG,
            "data" => $list
        ) ;

        return $rst ;
    }

    public function get_detail($id) {
        $where = array('id' => $id) ;
        $select = "id,title, face_img,pid, content, status" ;
        return $this->a_spread_material_atomic_model->slt_row_arr($where, $select) ;
    }

    public function upd_item($id, $uid, $title, $face_img, $content) {
        $where = array('id' => $id) ;
        $arr = array('uid' => $uid, 'title' => $title, 'face_img' => $face_img,
            'content' => $content) ;

        return $this->a_spread_material_atomic_model->upd($arr, $where) ;
    }

}