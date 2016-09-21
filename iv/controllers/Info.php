<?php

/**
 * Created by IntelliJ IDEA.
 * User: junlei
 * Date: 16/5/23
 * Time: 下午14:47
 */
class Info extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function info() {


       $this->load_view('info/info.html');

    }

   


}   