<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/24
 * Time: 下午11:35
 */
class Qsc_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('atomic/qsc_atomic_model', 'qsc_atomic');
    }

    public function get_qsc_record($rn, $pn) {
        $total = $this->qsc_atomic->cnt() ;
        if($pn * $rn >= $total) {
            return Ecode::NO_RESULT;
        }

        $select = 'id,mc_type, country, city, chn_name, eng_name, primary_contact, primary_contact_email, other_contact,
            other_contact_email, more_contact, qsc_id, invalid_from, review_desc, remark, qualification_level, spread,
            address, sponsor,score' ;
        $result = $this->qsc_atomic->slt_res_arr(null, $select, $rn, $pn * $rn) ;

        $rst['total'] = $total;
        $rst['page_num'] = intval(($total+$rn -1) / $rn) ;
        $rst['cur_page'] = intval($pn) ;
        $rst['data'] = $result;


        return $rst ;
    }

    /**
     * 查找qsc证书编号是否已经认证
     *
     * @param $qsc
     * @return bool
     */
    public function is_exist($qsc) {
        $slt = 'qsc_id' ;
        $where = array('qsc_id' => $qsc) ;
        $result = $this->qsc_atomic->slt_row_arr($where , $slt) ;

        return isset($result['qsc_id']) ;
    }

    /**
     * qsc详情
     *
     * @param $qsc
     * @return mixed
     */
    public function get_qsc_detail($qsc) {
        $slt = 'mc_type, country, city, chn_name, eng_name, primary_contact, primary_contact_email, other_contact,
            other_contact_email, more_contact, qsc_id, invalid_from, review_desc, remark, qualification_level, spread,
            address, sponsor,score' ;
        $where = array('qsc_id' => $qsc) ;
        $result = $this->qsc_atomic->slt_row_arr($where , $slt) ;

        return $result ;
    }

    /**
     * 增加一条记录
     *
     */
    public function insert_item($item) {
        return $this->qsc_atomic->ins($item) ;
    }

    /**
     * 更新一条记录
     *
     * @param $qsc_id
     * @param $name
     * @param $country
     * @param $reg_time
     * @param $invalid_time
     * @return bool
     */
    public function upd_qsc_detail($qsc_id, $name, $country, $reg_time, $invalid_time) {
        $arr = array('qsc_id'=>$qsc_id,
            'name'=>$name,
            'country'=>$country,
            'reg_time'=>$reg_time,
            'validate_time'=>$invalid_time) ;

        $result = $this->qsc_atomic->upd($arr) ;

        return isset($result) ;
    }

    public function upd($data) {
        $where = array('qsc_id' => $data['qsc_id']) ;

        $arr = array('mc_type'=>$data['mc_type'],
            'qsc_id'=>$data['qsc_id'],
            'country'=>$data['country'],
            'city'=>$data['city'],
            'chn_name'=>$data['chn_name'],
            'eng_name'=>$data['eng_name'],
            'primary_contact'=>$data['primary_contact'],
            'primary_contact_email'=>$data['primary_contact_email'],
            'other_contact'=>$data['other_contact'],
            'other_contact_email'=>$data['other_contact_email'],
            'more_contact'=>$data['more_contact'],
            'invalid_from'=>$data['invalid_from'],
            'review_desc'=>$data['review_desc'],
            'remark'=>$data['remark'],
            'qualification_level'=>$data['qualification_level'],
            'spread'=>$data['spread'],
            'address'=>$data['address'],
            'sponsor'=>$data['sponsor'],
            'score'=>empty($data['score'])?'0':$data['score']) ;

        echo "===============================" ;
        var_dump($arr) ;
        $rst = $this->qsc_atomic->upd($arr, $where) ;
        if( isset($rst) ) {
            return true ;
        } else {
            return false ;
        }
    }

    public function del_by_qsc_id($qsc_id) {
        $where = array('qsc_id' => $qsc_id) ;
        $rst = $this->qsc_atomic->del($where) ;

        return isset($rst['affected_rows']) ;
    }

}