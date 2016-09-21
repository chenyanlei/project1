<?php
/**
 * Created by PhpStorm.
 * User: chenj
 * Date: 2016/8/5
 * Time: 15:10
 */

class Webapp_about extends MY_Controller
{
    //关于我们
    public function aboutus()
    {
        $this->load->view('webapp/aboutus.html');
    }
}