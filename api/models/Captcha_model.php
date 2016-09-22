<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/21
 * Time: 下午4:14
 */
class Captcha_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('atomic/captcha_atomic_model', 'captcha_atomic');
    }

    /**
     * 设置id标记所对应的word
     *
     * @param $id_tag
     * @param $word
     *
     * @return bool
     */
    public function set_captcha($tag_id, $word) {
        //删除所有tag_id 对应的记录
        $this->captcha_atomic->del(array('user_tag_id'=> $tag_id)) ;

        $time = time() ;
        $item = array("user_tag_id"=>$tag_id, "word"=> $word, "time" => $time) ;
        $result = $this->captcha_atomic->ins($item) ;
        return isset($result['insert_id']) ;
    }

    /**
     * 根据id标记取出word
     *
     * @param $id_tag
     *
     * @return fixed
     *
     */
    public function get_captcha($tag_id) {
        $this->captcha_atomic->delete_expired_record() ;

        // 根据user_tag_id获取captcha信息
        $where = array("user_tag_id" =>$tag_id )  ;
        $select = "word" ;
        $result = $this->captcha_atomic->slt_row_arr($where, $select) ;

        if(!empty($result['word'])) {
            return $result['word'] ;
        }

        return null ;
    }

    public function check_captcha_is_success($tag_id, $captcha) {
        $word = $this->get_captcha($tag_id)  ;
        if(!isset($word)) {
            return false ;
        }

        return $captcha === $word;
    }



}