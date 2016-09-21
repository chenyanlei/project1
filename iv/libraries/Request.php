<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/28
 * Time: 下午4:17
 */
class Request
{
    public function add_default_request_params(&$data) {
        $data['type'] = '2' ;
        $data['from'] = 'web' ;
    }

    public function add_token_from_session(&$data) {
        if(!isset($_SESSION['token'])) {
            return false ;
        }
        $data['token']=$_SESSION['token'];
        return true ;
    }

}