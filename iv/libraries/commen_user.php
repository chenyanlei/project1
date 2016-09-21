<?php
/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/9
 * Time: 下午5:55
 */

date_default_timezone_set('UTC') ;

function get_user_type($user_type) {
    switch($user_type) {
        case 0:
            return '供应商';
            break;
        case 1:
            return '批发商';
            break;
        case 2:
            return '代理商';
            break;
        case 3:
            return '个人顾问、玩家';
            break;
        default:
            return 'error';
            break ;
    }
}


function get_user_role($privilige) {
    switch($privilige) {
        case 0:
            return '超级用户';
            break;
        case 1:
            return '系统管理员用户';
            break;
        case 2:
            return '商户管理员用户';
            break;
        case 3:
            return '商户成员';
            break;
        default:
            return 'error';
            break ;
    }
}

function format_time($time) {
    return date("Y-m-d H:i:s" , intval($time+3600*8)) ;
}




// 代理商信息状态
function format_status($status) {
    switch($status) {
        case Ptype::REGISTER_SUCCESS:
            return '注册成功';
            break;
        case Ptype::SUPPLIER_STATUS_INFO_COMMIT:
            return '供应商信息已提交，待审核';
            break;
        case Ptype::SUPPLIER_STATUS_WILL_SIGN:
            return '供应商待签协议';
            break;
        case Ptype::SUPPLIER_STATUS_SIGNING:
            return '供应商协议签订中';
            break;
        case Ptype::SUPPLIER_STATUS_SIGN_FINISHED:
            return '供应商协议签订完成';
            break;
        case Ptype::AGENT_STATUS_INFO_COMMIT:
            return '代理商信息已提交';
            break;
        case Ptype::AGENT_STATUS_SLT_DES:
            return '代理商选择目的地';
            break;
        case 11:
            return '代理商选择产品类别';
            break;
        case 12:
            return '代理商提交信息待审核';
            break;
        case 13:
            return '代理商信息审核中';
            break;
        case 14:
            return '代理商信息审核通过';
            break;
        case 15:
            return '代理商信息审核不通过';
            break;
        case 16:
            return '代理商账号被冻结';
            break;
        case 100:
            return '账号注销';
            break;
        default:
            return 'error';
            break ;
    }
}

function get_token() {
    if(isset($_SESSION['token'])) {
        return $_SESSION['token'] ;
    } else if(isset($_REQUEST['token'])) {
        return $_REQUEST['token'] ;
    }
}

function get_p_type_txt($p_type) {
    switch($p_type) {
        case Ptype::ONE_DAY:
            return '一日游';
            break;
        case Ptype::LOCAL_GROUP:
            return '当地成团';
            break;
        case Ptype::GROUP_TRAVEL:
            return '组团游';
            break;
        case Ptype::HOTEL:
            return '酒店';
            break;
        case Ptype::MARKET:
            return '商店';
            break ;
        case Ptype::SCENIC_AREA:
            return '景点';
            break ;
        case Ptype::DINING_ROOM:
            return '餐厅';
            break ;
        case Ptype::GOODS:
            return '商品';
            break ;
        case Ptype::CUSTOM_ONE_DAY:
            return '定制一日游';
            break ;
        default:
            return 'err' ;
    }
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
            $status_txt = '退款审核通过,退款中' ;
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



function get_product_status_txt($status) {
    switch($status) {
        case Ptype::PRODUCT_STATUS_WILL_COMMIT:
            return "未提交" ;
            break ;
        case Ptype::PRODUCT_STATUS_COMMITED:
            return "已提交，待审核" ; //已提交
            break ;
        case Ptype::PRODUCT_STATUS_BEING_REVIEW:
            return "审核中" ;
            break ;
        case Ptype::PRODUCT_STATUS_REVIEW_FAILED:
            return "审核失败" ;
            break ;
        case Ptype::PRODUCT_STATUS_ON_SALE:
            return "审核通过，销售中" ;
            break ;
        case Ptype::PRODUCT_STATUS_OFFLINE:
            return "已下线" ;
            break ;
        default:
            return "状态错误" ;
            break ;
    }
}

function get_sale_price($prices){
    return $prices['price2'];
}

function get_same_price($prices){
    return $prices['price1'];
}