<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/17
 * Time: 上午10:57
 */
class Commen
{

    public function toUnixTimestamp($var) {
        if(!isset($var) || !is_string($var)) {
            return $var ;
        }
        $ary = explode('/',$var) ;

        if(sizeof($ary) > 2) {
            return mktime(0,0,0,$ary[1],$ary[2],$ary[0]) ;
        } else {
            $ary = explode('-',$var) ;
            if(sizeof($ary) > 2) {
                return mktime(0,0,0,$ary[1],$ary[2],$ary[0]) ;
            }
        }
        return $var;
    }

    function continent_to_en_name($chn) {
        switch($chn) {
            case '亚洲':
                return 'asia' ;
            case '欧洲':
                return 'europe' ;
            case '北美洲':
                return 'north_america' ;
            case '南美洲':
                return 'south_america' ;
            case '非洲':
                return 'africa' ;
            case '大洋洲':
                return 'oceania' ;
            case '南极洲':
                return 'antarctica' ;
        }
        return $chn ;
    }

    function continent_to_ch_name($en) {
        switch($en) {
            case 'asia':
                return '亚洲' ;
            case 'europe':
                return '欧洲' ;
            case 'north_america':
                return '北美洲' ;
            case 'south_america':
                return '南美洲' ;
            case 'africa':
                return '非洲' ;
            case 'oceania':
                return '大洋洲' ;
            case 'antarctica':
                return '南极洲' ;
        }

        return "$en" ;
    }

}