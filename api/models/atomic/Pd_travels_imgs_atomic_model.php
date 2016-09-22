<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/29
 * Time: 下午5:53
 */
class Pd_travels_imgs_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'p_travels_imgs_0';
        $this->real_del = false;
    }

    /**
     * 添加图片
     *
     * @param $pid
     * @param array $imgs_id
     *
     */
    public function add_imgs($pid , array $imgs_id=array()) {
        if(is_array($imgs_id)) {
            foreach($imgs_id as $img_id) {
                $where = array('id' => $img_id) ;
                $data = array('pid' => $pid);
                $this->upd($data,$where) ;
            }
        }
    }

    // 添加一张图片
    public function add_img($pid, $key) {
        $data = array('url' => $key);
        if($pid != -1) {
            $data['pid'] = $pid ;
        }

        $rst = $this->ins($data) ;
        if(empty($rst)) {
            return false ;
        }
        return $rst['insert_id'] ;
    }

    public function remove_img($id) {
        $where = array('id' => $id) ;
        return $this->del($where) ;
    }

    public function get_img_by_id($id) {
        $where = array('id' => $id) ;
        $select = 'pid,id' ;
        return $this->slt_row_arr($where, $select);
    }

    public function get_imgs_by_pid($pid) {
        $where = array('pid' => $pid) ;
        $select = 'url,id' ;
        return $this->slt_res_arr($where, $select) ;
    }
}