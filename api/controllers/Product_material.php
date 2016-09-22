<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/24
 * Time: 上午11:35
 */
class Product_material extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('aspread_material_model') ;
    }

    public function add() {
        $title = $this->input->post("title") ;
        $face_img = $this->input->post("face_img") ;
        $content = $this->input->post("content") ;
        $uid = $GLOBALS['user_id'] ;
        $rst = $this->aspread_material_model->add_item($uid, $title, $face_img, $content) ;
        h_echo_json(Ecode::OK, $rst) ;
    }

    public function modify() {
        $title = $this->input->post("title") ;
        $face_img = $this->input->post("face_img") ;
        $content = $this->input->post("content", false) ;
        $uid = $GLOBALS['user_id'] ;
        $id = $this->input->post('id') ;
        if(!isset($id) || $id < 1) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        $rst = $this->aspread_material_model->upd_item($id, $uid, $title, $face_img, $content) ;
        h_echo_json(Ecode::OK, $rst) ;
    }

    public function get_my_list() {
        $uid = $GLOBALS['user_id'] ;
        $rn = $this->input->get_post("rn") ;
        $pn = $this->input->get_post("pn") ;

        if(!isset($rn) || $rn < 1) {
            $rn = 20 ;
        }
        if(!isset($pn) || $pn < 1) {
            $pn = 0 ;
        }

        $rst = $this->aspread_material_model->get_list($uid, $rn ,$pn,-1) ;
        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }

        h_echo_json(Ecode::OK, $rst) ;
    }

    public function get_my_list_by_pid() {
        $uid = $GLOBALS['user_id'] ;
        $rn = $this->input->get_post("rn") ;
        $pn = $this->input->get_post("pn") ;
        $pid = $this->input->get_post("pid") ;
        if(!isset($pid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        if(!isset($rn) || $rn < 1) {
            $rn = 20 ;
        }
        if(!isset($pn) || $pn < 1) {
            $pn = 0 ;
        }

        $this->load->model('atomic/a_spread_product_atomic_model', 'a_spread_product_atomic_model') ;
        $sql_cnt = "select count(mid)
                    from a_spread_product_0
                    where id not in
                                (select mid from a_spread_0 where pid=".$pid." and uid=".$uid.")" ;

        $cnt_rst = $this->a_spread_product_atomic_model->query($sql_cnt) ;
        $data_cnt = $cnt_rst->row_array() ;
        $cnt = $data_cnt['count(mid)'];

        $offset = $rn * $pn ;
        if($offset > $cnt) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }

        $sql = "select id, id as mid, title, face_img
                from a_spread_material_0
                where id in
                        (select mid from a_spread_product_0 where pid=".$pid." and mid not in
                            (select mid from a_spread_0 where pid=".$pid." and uid=".$uid."))
                order by id"." limit ".$rn * $pn.",".$rn ;

        $this->load->model('atomic/a_spread_atomic_model', 'a_spread_atomic_model');
        $rst =  $this->a_spread_atomic_model->query($sql) ;
        if($rst == null) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        $data = $rst->result_array();
        if(empty($data)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        $arr = array(
            "rn" => $rn,
            "pn" => $pn,
            "total" => $cnt,
            "img_url" => URL_IMG,
            "data" => $data
        ) ;
        h_echo_json(Ecode::OK, $arr) ;

    }

    public function get_list_by_pid() {
        $uid = $GLOBALS['user_id'] ;
        $rn = $this->input->get_post("rn") ;
        $pn = $this->input->get_post("pn") ;
        $pid = $this->input->get_post("pid") ;

        if(!isset($pid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        if(!isset($rn) || $rn < 1) {
            $rn = 20 ;
        }
        if(!isset($pn) || $pn < 1) {
            $pn = 0 ;
        }

//        $where = array("pid" => $pid) ;
//        $cnt = $this->a_spread_product_atomic_model->cnt($where) ;

        $this->load->model('atomic/a_spread_product_atomic_model', 'a_spread_product_atomic_model') ;
        $sql_cnt = "select count(mid)
                    from a_spread_product_0
                    where pid=".$pid."
                            and mid not in
                                (select mid from a_spread_0 where pid=".$pid." and uid=".$uid.")" ;

        $cnt_rst = $this->a_spread_product_atomic_model->query($sql_cnt) ;
        $data_cnt = $cnt_rst->row_array() ;
        $cnt = $data_cnt['count(mid)'];

        $offset = $rn * $pn ;
        if($offset > $cnt) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }

        $sql = "select a_spread_product_0.id, a_spread_product_0.mid, a_spread_material_0.title, a_spread_material_0.face_img
                from a_spread_product_0,a_spread_material_0
                where a_spread_product_0.pid=".$pid."
                    and a_spread_product_0.mid=a_spread_material_0.id
                    and a_spread_material_0.id in
                        (select mid from a_spread_product_0 where pid=".$pid." and mid not in
                            (select mid from a_spread_0 where pid=".$pid." and uid=".$uid."))
                order by a_spread_product_0.id"." limit ".$rn * $pn.",".$rn ;

        $this->load->model('atomic/a_spread_atomic_model', 'a_spread_atomic_model');
        $rst =  $this->a_spread_atomic_model->query($sql) ;
        if($rst == null) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        $data = $rst->result_array();
        if(empty($data)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        $arr = array(
            "rn" => $rn,
            "pn" => $pn,
            "total" => $cnt,
            "img_url" => URL_IMG,
            "data" => $data
        ) ;
        h_echo_json(Ecode::OK, $arr) ;
    }

    public function get_detail() {
        $id = $this->input->get_post('id') ;

        $rst = $this->aspread_material_model->get_detail($id) ;
        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        $rst['img_url'] = URL_IMG ;

        $this->load->model('product_model') ;

        $ptype = Ptype::ONE_DAY ;

        $rst['p_detail'] = $this->product_model->detail($rst['pid'], '', '', $ptype) ;
        unset($rst['p_detail']['travel_intro']) ;
        h_echo_json(Ecode::OK, $rst) ;
    }

    public function create_relation() {
        $pid = $this->input->get_post("pid") ;
        $mid = $this->input->get_post("mid") ;
        $mids = $this->input->get_post("mids") ;

        if(!isset($pid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $arr_mids = null;
        if(!isset($mid)) {
            if(!isset($mids)) {
                h_echo_json(Ecode::C2S_ARG_ERR) ;
                return ;
            }

            $arr_mids = json_decode($mids, true) ;
        }

        if($mid) {
            $arr = array("pid" => $pid, "mid"=>$mid) ;
            $this->load->model("atomic/a_spread_product_atomic_model", "a_spread_product_atomic_model") ;
            $rst = $this->a_spread_product_atomic_model->ins_or_upd($arr,$arr) ;
            if($rst < 0) {
                h_echo_json(Ecode::INSERT_FAIL) ;
            } else if($rst == 1) {
                h_echo_json(Ecode::OK,array(), "更新成功") ;
            } else if($rst == 2) {
                h_echo_json(Ecode::OK,array(), "插入成功") ;
            }
        } else {
            foreach($arr_mids as $mid) {
                $arr = array("pid" => $pid, "mid"=>$mid) ;
                $this->load->model("atomic/a_spread_product_atomic_model", "a_spread_product_atomic_model") ;
                $this->a_spread_product_atomic_model->ins_or_upd($arr,$arr) ;
            }

            h_echo_json(Ecode::OK) ;
        }
    }

    public function remove_relation() {
        $pid = $this->input->get_post("pid") ;
        $mid = $this->input->get_post("mid") ;

        if(!isset($pid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        if(!isset($mid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $arr = array("pid" => $pid, "mid"=>$mid) ;
        $this->load->model("atomic/a_spread_product_atomic_model", "a_spread_product_atomic_model") ;
        $rst = $this->a_spread_product_atomic_model->del($arr) ;
        if(empty($rst)) {
            h_echo_json(Ecode::DELETE_FAIL) ;
        } else {
            h_echo_json(Ecode::OK) ;
        }
    }


}