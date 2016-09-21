<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/17
 * Time: 上午10:57
 */
class Commen
{
    function is_weixin(){
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
            return true;
        }
        return false;
    }

    // 转换服务语言和文字
    public function get_lang_txt($lang) {
        switch($lang) {
            case Ptype::PRODUCT_LANG_SERVICE_CN:
                return "能够提供中文服务";
                break;
            case Ptype::PRODUCT_LANG_SERVICE_EN:
                return "能够提供英文服务";
                break;
            case Ptype::PRODUCT_LANG_SERVICE_L:
                return "仅提供本地语言服务";
                break;
            case Ptype::PRODUCT_LANG_SERVICE_OTHER:
                return "其他语言服务";
                break;
            default:
                return "能够提供中文服务";
                break;
        }
    }

    public function get_share_qr_code_url($url){
        $url = urlencode($url) ;
        $params = array('url' => $url);
        $this->load->library('request') ;
        $this->request->add_default_request_params($params) ;
        $url=URL_API.'qrcode_creator/get_my_qr_code';
        $s=h_curl($url,$params);
        $detail = json_decode($s,true) ;
        if($detail['result']['err'] === 0) {
            $data['data']=$detail['content'];
        }
    }


    public function toUnixTimestamp($var) {
        $ary = explode('/',$var) ;

        if(sizeof($ary) > 0) {
//            date_default_timezone_set('UTC') ;
            return mktime(0,0,0,$ary[1],$ary[2],$ary[0]) ;
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

        return "err" ;
    }

    function get_order_status_txt($status) {
        $i_s = intval($status) ;
        $status_txt = '待支付' ;
        switch($i_s) {
            case PType::ORDER_STATUS_WILL_PAY:
                $status_txt = '待支付' ;
                break ;
            case PType::ORDER_STATUS_PAYED:
                $status_txt = '已支付' ;
                break ;
            case PType::ORDER_STATUS_CANCELING:
                $status_txt = '取消中' ;
                break ;
            case PType::ORDER_STATUS_CANCELED:
                $status_txt = '已取消' ;
                break ;
            case PType::ORDER_STATUS_AGREE:
                $status_txt = '已同意' ;
                break ;
            case PType::ORDER_STATUS_REJECT:
                $status_txt = '已拒绝' ;
                break ;
            case PType::ORDER_STATUS_REFUND_CHECHING:
                $status_txt = '退款审核中' ;
                break ;   
            case PType::ORDER_STATUS_REFUNDING:
                $status_txt = '退款中' ;
                break ;
            case PType::ORDER_STATUS_REFUNDED:
                $status_txt = '退款完成' ;
                break ;
            case PType::ORDER_STATUS_REFUND_FAILED:
                $status_txt = '退款失败' ;
                break ;    
            case PType::ORDER_STATUS_CLOSED:
                $status_txt = '已关闭' ;
                break ;
            case PType::ORDER_STATUS_END:
                $status_txt = '已完成' ;
                break ;
            default:
                break ;
        }

        return $status_txt ;
    }


}

