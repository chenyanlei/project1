<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/21
 * Time: 下午4:12
 */
class Captcha_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'user_captcha_0';
    }

    /**
     * 删除超过2个小时的记录
     */
    public function delete_expired_record() {
        $expiration = time() - 7200 ;
        $sql = "delete from ".$this->table_name. " where time < " . $expiration ;
        $this->db->query($sql) ;
    }
}