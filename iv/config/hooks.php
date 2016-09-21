<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

//
//$hook['pre_controller'][] = array(
//    'class' => 'request_filter',
//    'function' => 'token_destructor',
//    'filename' => 'request_filter.php',
//    'filepath' => 'hooks',
//    'params' => array()
//);
//
$hook['post_controller_constructor'][] = array(
   'class' => 'Language_filter',
   'function' => 'language_destructor',
   'filename' => 'Language_filter.php',
   'filepath' => 'hooks',
   'params' => array()
);