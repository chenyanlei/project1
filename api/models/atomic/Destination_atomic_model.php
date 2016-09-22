<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/21
 * Time: 下午4:12
 *
 * 目的地表
 */
class Destination_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'destination_0';
    }

    /**
     * 添加一个目的地
     *
     * @param $name
     * @param int $code_country
     * @param int $code_continent
     * @param int $code_area
     * @param int $weight
     * @param int $d_type
     * @param string $en_name
     *
     * @return mixed
     */
    public function add($name,$d_type=3, $code_country=-1, $code_continent=-1, $code_area=-1, $weight=-1,$en_name='') {
        $ary = array('name' => $name, 'd_type' => $d_type) ;

        // 查找name和d_type相同的记录是否存在，如果存在，则不插入
//        $rst = $this->slt_res_arr($ary) ;
//        if(!empty($rst)) {
//            echo "exist" ;
//            var_dump($rst) ;
//            return ;
//        }

        if($code_country !== -1) {
            $ary['code_country'] = $code_country;
        }

        if($code_continent !== -1) {
            $ary['code_continent'] = $code_continent;
        }

        if($code_area !== -1) {
            $ary['code_area'] = $code_area;
        }

        if($weight !== -1) {
            $ary['weight'] = $weight;
        }

        if(!empty($en_name)) {
            $ary['en_name'] = $en_name;
        }

        return $this->ins_or_upd($ary, array('name' => $name, 'd_type' => $d_type)) ;
    }

    public function upd_by_id($id, $name, $en_name='', $d_type=3, $code_country=-1, $code_continent=-1, $code_area=-1, $weight=-1) {
        $ary = array('name' => $name, 'd_type' => $d_type) ;

        if($code_country !== -1 && !empty($code_country)) {
            $ary['code_country'] = $code_country;
        }

        if($code_continent !== -1 && !empty($code_continent)) {
            $ary['code_continent'] = $code_continent;
        }

        if($code_area !== -1 && !empty($code_area)) {
            $ary['code_area'] = $code_area;
        }

        if($weight !== -1 && !empty($weight)) {
            $ary['weight'] = $weight;
        }

        if(!empty($en_name)) {
            $ary['en_name'] = $en_name;
        }

        $where  = array('id' => $id) ;

        $rst = $this->upd($ary, $where) ;
        return isset($rst['affected_rows']) ;
    }


    public function upd_code_country($id, $code) {
        $ary = array('code_country' => $code) ;
        $where = array('id' => $id) ;
        return $this->upd($ary, $where) ;
    }

    public function upd_code_continent($id, $code) {
        $ary = array('code_continent' => $code) ;
        $where = array('id' => $id) ;
        return $this->upd($ary, $where) ;
    }

    public function upd_code_area($id, $code) {
        $ary = array('code_area' => $code) ;
        $where = array('id' => $id) ;
        return $this->upd($ary, $where) ;
    }

    public function upd_weight($id, $weight) {
        $ary = array('weight' => $weight) ;
        $where = array('id' => $id) ;
        return $this->upd($ary, $where) ;
    }


}