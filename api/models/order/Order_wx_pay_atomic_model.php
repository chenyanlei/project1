<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/21
 * Time: 下午4:12
 */
class Order_wx_pay_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'order_pay_wx_0';
    }


}