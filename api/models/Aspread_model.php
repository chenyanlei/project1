<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/25
 * Time: 下午8:27
 */
class Aspread_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('atomic/a_spread_atomic_model', 'a_spread_atomic_model');
        $this->load->model('atomic/a_spread_material_atomic_model', 'a_spread_material_atomic_model');
    }

    public function create(&$id, $uid, $pid, $mid) {
        $rst = $this->a_spread_atomic_model->is_exist($uid, $pid, $mid) ;
        if($rst) {
            return 1 ;  //已经存在啦
        } else {
            $arr = array(
                "uid" => $uid,
                "pid" => $pid,
                "mid" => $mid,
            );
            $rst = $this->a_spread_atomic_model->ins($arr) ;
            if(empty($rst)){
                return -1 ;
            } else {
                $id = $rst['insert_id'] ;
                return 0;
            }
        }
    }

    public function modify($uid, $sid, $mid, $face_img, $title,  $content) {
        $where = array('id'=>$mid) ;
        $select = "uid" ;

        $this->load->model('aspread_material_model') ;
        $rst = $this->a_spread_material_atomic_model->slt_row_arr($where, $select) ;
        if(isset($rst['uid']) && $rst['uid'] == $uid) {
            $rst = $this->aspread_material_model->upd_item($sid, $uid, $title, $face_img, $content) ;
            return !empty($rst) ;
        } else {
            $ins_rst = $this->aspread_material_model->add_item($uid, $title, $face_img, $content) ;
            if(!empty($ins_rst)) {
                $new_mid = $ins_rst['insert_id'] ;
                return $this->_modify_spread_mid_by_id($sid, $new_mid) ;
            } else {
                return false ;
            }
        }
    }

    public function get_list($uid, $rn ,$pn) {
        $where1 = array('uid'=>$uid) ;
        $cnt = $this->a_spread_atomic_model->cnt($where1) ;
        if($cnt <= 0 || $rn * $pn > $cnt) {
            return null ;
        }
        $sql = "select a_spread_0.id,a_spread_0.pid,a_spread_0.read, a_spread_material_0.title, a_spread_material_0.face_img,
                a_spread_material_0.p_type from a_spread_0,a_spread_material_0
                where a_spread_0.mid=a_spread_material_0.id and a_spread_0.uid=".$uid." order by a_spread_0.id"." limit ".$rn * $pn.",".$rn ;

        $rst =  $this->a_spread_material_atomic_model->query($sql) ;
        if($rst == null) {
            return null;
        }
        $data = $rst->result_array();
        if(empty($data)) {
            return null ;
        }
        $arr = array(
            "aid" => $uid,
            "rn" => $rn,
            "pn" => $pn,
            "total" => $cnt,
            "page_num" => intval(($cnt + $rn -1) / $rn) ,
            "img_url" => URL_IMG,
            "data" => $data
        ) ;
        return $arr ;
    }

    public function get_detail($id) {
        $sql = "select a_spread_0.id,a_spread_0.mid, a_spread_0.pid,a_spread_0.read, a_spread_material_0.title, a_spread_material_0.face_img,
                a_spread_material_0.content from a_spread_0,a_spread_material_0
                where a_spread_0.mid=a_spread_material_0.id and a_spread_0.id=".$id ;

        $rst =  $this->a_spread_material_atomic_model->query($sql) ;
        if($rst == null) {
            return null;
        }
        $data = $rst->row_array();

        return $data ;
    }

    private function _modify_spread_mid_by_id($id, $new_mid) {
        $where = array('id' => $id) ;
        $upd = array('mid' => $new_mid) ;
        $rst = $this->a_spread_atomic_model->upd($upd, $where) ;
        return !empty($rst) ;
    }

}