<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/14
 * Time: 下午12:42
 */
class Ptype
{
    const SECRIT_KEY                        = "qsctrip*2016" ;

//    const TYPE_S                            = 0 ; // 对应供应商端
//    const TYPE_P                            = 1 ; // 对应批发商端
    const TYPE_S                            = 1 ; // 对应供应商端
    const TYPE_A                            = 2 ; // 对应代理商端
    const TYPE_PERSONAL                     = 3 ; // 对应个人顾问、玩家
    const TYPE_TOURISM                      = 4 ; // 对应游客

    const TYPE_S_LOCAL_TRAVEL               = 1 ; // 境外地接社
    const TYPE_S_SHOP                       = 2 ; // 境外购物商店
    const TYPE_S_DINING_ROOM                = 3 ; // 境外餐厅
    const TYPE_S_SCENIC_AREA                = 4 ; // 境外景点
    const TYPE_S_HOTEL                      = 5 ; // 境外酒店
    const TYPE_S_PFS                        = 6 ; // 境内批发商

    const MIN                               = 1 ;
    const MAX                               = 12 ;

    const CAPTCHA_LEN                       = 4 ; // 图形验证码的长度

    // 产品类型
    const ONE_DAY                           = 1 ;   // 一日游
    const LOCAL_GROUP                       = 2 ;   // 当地成团
    const GROUP_TRAVEL                      = 3 ;   // 组团游（批发商）
    const HOTEL                             = 4 ;   // 酒店
    const MARKET                            = 5 ;   // 商店
    const SCENIC_AREA                       = 6 ;   // 景点
    const DINING_ROOM                       = 7 ;   // 餐厅
    const GOODS                             = 8 ;   // 商品
    const CUSTOM_ONE_DAY                    = 9 ;   // 定制一日游
    const GROUP_TRAVEL_IN                   = 10 ;   // 国内组团游
    const ONE_DAY_IN                        = 11 ;   // 国内一日游
    const LOCAL_GROUP_IN                    = 12 ;   // 国内多日游
    public function is_validate($p_type) {
        if($p_type > Ptype::MAX || $p_type < Ptype::MIN) {
            return false ;
        }
        return true ;
    }

    // 产品状态
    const PRODUCT_STATUS_WILL_COMMIT        = 0 ;   // 未提交
    const PRODUCT_STATUS_COMMITED           = 1 ;   // 已提交
    const PRODUCT_STATUS_BEING_REVIEW       = 2 ;   // 审核中
    const PRODUCT_STATUS_REVIEW_FAILED      = 3 ;   // 审核失败
    const PRODUCT_STATUS_ON_SALE            = 4 ;   // 销售中
    const PRODUCT_STATUS_OFFLINE            = 5 ;   // 已下线

    // 语言服务
    const PRODUCT_LANG_SERVICE_CN           = 1;    // 能够提供中文服务
    const PRODUCT_LANG_SERVICE_EN           = 2;    // 能够提供英文服务
    const PRODUCT_LANG_SERVICE_L            = 3;    // 仅提供本地语言服务
    const PRODUCT_LANG_SERVICE_OTHER        = 4;    // 其他语言服务

    // 价格类型
    const PRICE_UNIFORM                     = 0 ;   // 统一价
    const PRICE_CUSTOM                      = 1 ;   // 定制价

    // 价格类型
    const PRICE_TYPE_0                      = 0 ;   // 同行价
    const PRICE_TYPE_1                      = 1 ;   // 销售价

    // 日历类型
    const CALENDAR_TYPE_FULL_YEAR           = 1;   // 全年可接待
    const CALENDAR_TYPE_A_PERIOD            = 2;   // 指定时间段可接待
    const CALENDAR_TYPE_DATE                = 3;   // 指定日期可接待

    const REGISTER_SUCCESS                  = 0;   // 注册成功

    // 供应商信息状态
    const SUPPLIER_STATUS_INFO_COMMIT       = 1 ;  // 供应商信息已提交，待审核
    const SUPPLIER_STATUS_WILL_SIGN         = 2 ;  // 供应商待签协议
    const SUPPLIER_STATUS_SIGNING           = 3 ;  // 供应商协议签订中
    const SUPPLIER_STATUS_SIGN_FINISHED     = 4 ;  // 供应商协议签订完成
    const SUPPLIER_STATUS_FAILED_CHECK      = 5 ;  // 供应商审核不通过
    const SUPPLIER_STATUS_FROZEN            = 6 ;  // 供应商账号被冻结

    // 代理商信息状态
    const AGENT_STATUS_INFO_COMMIT          =  9 ;  // 代理商信息已提交
    const AGENT_STATUS_SLT_DES              = 10 ;  // 代理商选择目的地
    const AGENT_STATUS_SLT_CLASSIFY         = 11 ;  // 代理商选择产品类别
    const AGENT_STATUS_WILL_CHECK           = 12 ;  // 代理商提交信息待审核
    const AGENT_STATUS_CHECKING             = 13 ;  // 代理商信息审核中
    const AGENT_STATUS_PASS_CHECK           = 14 ;  // 代理商信息审核通过
    const AGENT_STATUS_FAILED_CHECK         = 15 ;  // 代理商信息审核不通过
    const AGENT_STATUS_FROZEN               = 16 ;  // 代理商账号被冻结

    const AGENT_TYPE_PERSONAL               = 0 ;   // 个人代理
    const AGENT_TYPE_COM                    = 1 ;   // 企业代理

    // 订单状态
    // 待支付 -> 已支付 -> 已完成
    // 待支付 -> 已取消 -> 已关闭
    // 待支付 -> 已支付 -> 取消中 ->  已取消 -> 退款中 -> 退款完成 -> 已关闭
    // 待支付 -> 已支付 -> 取消中 ->  已同意 -> 已取消 -> 退款中 -> 退款完成 -> 已关闭
    // 待支付 -> 已支付 -> 取消中 ->  已拒绝 -> 退款失败
    // 待支付 -> 已支付 -> 已拒绝 ->  退款中 -> 退款失败
    const ORDER_STATUS_WILL_PAY             = 0;   // 待支付
    const ORDER_STATUS_PAYED                = 1;   // 已支付
    const ORDER_STATUS_CANCELING            = 2;   // 取消中
    const ORDER_STATUS_CANCELED             = 3;   // 已取消
    const ORDER_STATUS_AGREE                = 4;   // 已同意
    const ORDER_STATUS_REJECT               = 5;   // 已拒绝
    const ORDER_STATUS_REFUND_CHECHING      = 6;   // 退款审核中
    const ORDER_STATUS_REFUNDING            = 7;   // 退款中
    const ORDER_STATUS_REFUNDED             = 8;   // 退款完成
    const ORDER_STATUS_REFUND_FAILED        = 9;   // 退款失败
    const ORDER_STATUS_CLOSED               = 10;  // 已关闭
    const ORDER_STATUS_END                  = 11;  // 已完成

    //支付方式
    const ORDER_PAYMENTS_NONE               = 0 ;  //未支付
    const ORDER_PAYMENTS_ALIPAY             = 1 ;  //支付宝支付
    const ORDER_PAYMENTS_WXPAY              = 2 ;  //微信支付


    // 短消息模板
    const SMS_TYPE_MIN                      = 1;
    const SMS_TYPE_MAX                      = 7;
    const SMS_TYPE_NONE                     = 0;   // 订单取消
    const SMS_TYPE_REGISTER                 = 1;   // 注册
    const SMS_TYPE_LOGIN                    = 2;   // 登录
    const SMS_TYPE_FIND_PWD                 = 3;   // 找回密码
    const SMS_TYPE_BOOKING                  = 4;   // 预订产品
    const SMS_TYPE_PAYED                    = 5;   // 支付
    const SMS_TYPE_ORDER_CANCEL             = 6;   // 订单取消
    const SMS_TYPE_ORDER_MODIFY             = 7;   // 订单修改
    const SMS_TYPE_REGISTER_SUCCSESS        = 8;   // 注册成功通知


    const SMS_STATUS_SENDING                = 0;   // 短消息发送中
    const SMS_STATUS_SEND_SUCCESS           = 1;   // 短消息发送成功
    const SMS_STATUS_SEND_FAILURE           = 2;   // 短消息发送失败
    const SMS_STATUS_SEND_FAILURE_RESEND    = 3;   // 短消息发送失败,通过其他通道发送

    const NOTIFY_TYPE_SMS                   = 0x00000001;   // sms 通知
    const NOTIFY_TYPE_EMAIL                 = 0x00000002;   // email 通知
    const NOTIFY_TYPE_STATION_LETTER        = 0x00000004;   // 站内信
    // const NOTIFY_TYPE_SMS_EMAIL             = Ptype::NOTIFY_TYPE_SMS | Ptype::NOTIFY_TYPE_EMAIL ;  // sms email一起通知
    // const NOTIFY_TYPE_ALL                   = Ptype::NOTIFY_TYPE_SMS | Ptype::NOTIFY_TYPE_EMAIL | Ptype::NOTIFY_TYPE_STATION_LETTER;   //所有通道

    // 站内信的状态
    const STATION_LETTER_STATUS_NEW         = 0;   // 新消息
    const STATION_LETTER_STATUS_READED      = 1;   // 已读

    // 站内信的类型
    const STATION_LETTER_TYPE_ORDER         = 0;   // 订单
    const STATION_LETTER_TYPE_NOTIFY        = 1;   // 通知

    // 用户角色
    const LEVEL_USER_GENERAL                = 0;    // 普通用户

    // 供应商
    const LEVEL_SUPLIYER_LEVEL_1             = 1;    // 供应商1级
    const LEVEL_SUPLIYER_LEVEL_2             = 2;    // 供应商2级
    const LEVEL_SUPLIYER_LEVEL_3             = 3;    // 供应商3级
    const LEVEL_SUPLIYER_LEVEL_4             = 4;    // 供应商4级

    // 个人代理
    const LEVEL_AGENT_PERSON_LEVEL_1         = 5;    // 个人代理1级
    const LEVEL_AGENT_PERSON_LEVEL_2         = 6;    // 个人代理2级
    const LEVEL_AGENT_PERSON_LEVEL_3         = 7;    // 个人代理3级

    // 公司代理
    const LEVEL_AGENT_COM_LEVEL_1            = 8;    // 公司代理1级
    const LEVEL_AGENT_COM_LEVEL_2            = 9;    // 公司代理2级
    const LEVEL_AGENT_COM_LEVEL_3            = 10;   // 公司代理3级

    const COMMITION_TYPE_MY_SALE            = 1;    // 个人卖的产品的所有佣金
    const COMMITION_TYPE_MY_AGENT           = 2;    // 我作为代理获取的二级代理的所有佣金

    // 短消息通道
    const SEND_SMS_CHANNEL_HUAXING          = 0 ;   // 华兴软通
    const SEND_SMS_CHANNEL_RONGLIAN         = 1 ;   // 容联
    const SEND_SMS_CHANNEL_DAYU             = 2 ;   // 阿里大鱼

    // 产品素材状态
    const MATERIAL_STATUS_COMMIT            = 0 ;   // 已提交
    const MATERIAL_STATUS_CHECK_PASS        = 1 ;   // 审核通过
    const MATERIAL_STATUS_CHECK_FAILED      = 2 ;   // 审核不通过

    const PRODUCT_CLASSIFY_GROUP            = 1 ;  // 分类组团游
    const PRODUCT_CLASSIFY_FREE             = 2 ;  // 分类自由行
    const PRODUCT_CLASSIFY_ALL              = 3 ;  // 所有产品，暂不提供
    const PRODUCT_CLASSIFY_GROUP_IN         = 4 ;  // 国内组团游
    const PRODUCT_CLASSIFY_FREE_IN          = 5 ;  // 国内自由行

    const WX_PRODUCT_TYPE_AGENT_LIST        = 1 ;  // 代理商列表
    const WX_PRODUCT_TYPE_AGENT_PRODUCT     = 2 ;  // 代理商产品列表
    const WX_PRODUCT_TYPE_SUPPLIER_PRODUCT  = 3 ;  // 供应商产品列表

}