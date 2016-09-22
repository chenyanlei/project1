<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/29
 * Time: 下午5:01
 *
 * 旅游类产品，包含如下几类：
 *     组团游
 *     当地成团
 *     一日游
 *     定制一日游
 */
class Travels_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function get_list($utype, $uid,$pn,$rn,$p_type,$p_status=-1){
        if($utype == Ptype::TYPE_S || $utype == Ptype::TYPE_P) {
            return $this->get_s_list($uid,$pn,$rn,$p_type,$p_status) ;
        } else if($utype == Ptype::TYPE_A) {
            return $this->get_a_list($uid, $pn,$rn,$p_type,$p_status) ;
        }
    }

    public function get_product_list_by_ids($ids, $uid = NULL, $remove_invalidate=false) {
        $where = array('#in#'=>'id', '#arr#' => $ids, 'p_status' => Ptype::PRODUCT_STATUS_ON_SALE) ;

        $select = 'id, title,country,city,lang,tagname,min_num,p_type,p_status,is_customer,price_type,calendar_type,face_img' ;
        $this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');
        $rst = $this->travels_atomic_model->slt_res_arr($where, $select) ;

        // TODO 优化
        $this->load->model('atomic/a_p_travels_atomic_model', 'a_p_travels_atomic_model');
        $this->load->model('atomic/a_spread_atomic_model', 'a_spread_atomic_model');
        $this->load->model('atomic/pd_calendar_prices_atomic_model', 'pd_calendar_prices_atomic_model');
        if(sizeof($rst) > 0) {
            for($index=sizeof($rst)-1; $index>=0;$index--) {
                $prices = $this->pd_calendar_prices_atomic_model->get_prices_by_pid($rst[$index]['id'], $rst[$index]['calendar_type'],$uid) ;

                if(!empty($prices)) {
                    $rst[$index]['prices'] = $prices ;
                } else {
                    if($remove_invalidate) {
                        unset($rst[$index]) ;
                        continue ;
                    } else {
                        $rst[$index]['p_status'] = ''.Ptype::PRODUCT_STATUS_OFFLINE ;
                    }
                }
                $display_prices = $this->pd_calendar_prices_atomic_model->get_display_prices_by_pid($rst[$index]['id'], $uid) ;
                $rst[$index]['display_prices'] = $display_prices ;

                if($uid) {
                    // 是否在销售中
                    $rst[$index]['is_onsale'] = $this->a_p_travels_atomic_model->is_onsale($rst[$index]['id'], $uid)  ;
                    // 是否做过推广
                    $rst[$index]['is_spread'] = $this->a_spread_atomic_model->is_spread($uid, $rst[$index]['id'])  ;
                }
            }
        }


        return $rst ;
    }

    /**
     *
     * 1. 全年有效的产品
     * 2. 起始时间有效
     * 3. 终止时间有效
     *
     * @param $rn
     * @param $pn
     * @param null $continent
     * @param null $country
     * @param null $city
     * @param null $tag
     * @param null $uid
     * @return mixed
     */
    public function query_filter($rn,$pn,$continent=NULL, $country=NULL, $city=NULL, $tag=NULL,$uid=NULL,$classify) {
        $this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');
        $sql_select = "select ";
        $sql_from = " from ";
        $sql_count_field = " count(distinct p_travels_0.id)  " ;
        $sql_table = " p_travels_0 ";
        $sql_where = "";
        $and = "" ;
        $up = array() ;
        if($continent) {
            $sql_where .= " continent=".'"'.$continent.'" ' ;
            $and = " and " ;
            $up['continent'] = $continent;
        }
        if($country) {
            $sql_where .= $and." country like ".'\'%'.$country.'%\' ' ;
            $and = " and " ;
            $up['country'] = $country;
        }
        if($city) {
            $sql_where .= $and."city like".'\'%'.$city.'%\' ' ;
            $and = " and " ;
            $up['city'] = $city;
        }
        if($tag) {
            $sql_where .= $and." tagname like ".'\'%'.$tag.'%\'' ;
            $and = " and " ;
            $up['tag'] = $tag;
        }
        if($classify == Ptype::PRODUCT_CLASSIFY_GROUP) {
            $sql_where .= $and . " p_travels_0.p_type=".Ptype::GROUP_TRAVEL." " ;
        } elseif($classify == Ptype::PRODUCT_CLASSIFY_FREE) {
            $sql_where .= $and . " (p_travels_0.p_type=".Ptype::ONE_DAY." or p_travels_0.p_type=".Ptype::LOCAL_GROUP.") " ;//出境自由行包含一日游和多日游（当地成团）
        } elseif($classify == Ptype::PRODUCT_CLASSIFY_GROUP_IN) {
            $sql_where .= $and . " p_travels_0.p_type=".Ptype::GROUP_TRAVEL_IN." " ;
        } elseif($classify == Ptype::PRODUCT_CLASSIFY_FREE_IN) {
            $sql_where .= $and . " (p_travels_0.p_type=".Ptype::ONE_DAY_IN. " or p_travels_0.p_type=".Ptype::LOCAL_GROUP_IN.") " ;
        } else {
        }
        $and = " and " ;

        $cur_time = time() ;
        $sql_where_condation =  " p_calendar_prices_0.pid=p_travels_0.id
        and (p_travels_0.calendar_type=1
            or (p_calendar_prices_0.calendar_from>".$cur_time."
            or p_calendar_prices_0.calendar_to>".$cur_time."))
        and p_travels_0.p_status=".Ptype::PRODUCT_STATUS_ON_SALE ;

        $sql_count = $sql_select. $sql_count_field. $sql_from .$sql_table.", p_calendar_prices_0 ". ' where '. $sql_where . $and. $sql_where_condation ;

//        echo $sql_count ;
        $rst_cnt = $this->atomic_model->query($sql_count) ;

//        echo $sql_count;
        $list = array();

        if($rst_cnt != null) {
            $count = $rst_cnt->row_array()['count(distinct p_travels_0.id)'] ;

            $offset = $rn * $pn ;
            $rst['total'] = intval($count) ;
            $rst['pns'] = intval(($rst['total'] -1 )/ $rn + 1) ;

            $order_by = ' order by id DESC ' ;
            $sql_field = " distinct p_travels_0.id " ;

            if($offset >= $rst['total']) {
                $recommend = true ;
                $limit = " limit 0, 12" ;
                $sql_list = $sql_select. $sql_field. $sql_from .$sql_table.", p_calendar_prices_0 ". ' where '. $sql_where_condation . $order_by.$limit ;
            } else {
                $recommend = false ;
                $limit = " limit $offset,$rn" ;
                $sql_list = $sql_select. $sql_field. $sql_from .$sql_table.", p_calendar_prices_0 ". ' where '. $sql_where. $and. $sql_where_condation . $order_by.$limit ;
            }

//            echo $sql_list ;
            $rst_list = $this->travels_atomic_model->query($sql_list) ;
            $list = $rst_list->result_array() ;

            $pids = array();
            foreach($list as $list_item) {
                $pids[] = $list_item["id"] ;
            }

            if(sizeof($pids) > 0) {
                $list = $this->get_product_list_by_ids($pids, $uid) ;
            } else {
                $list = array() ;
            }
        }

        $rst['up'] = $up ;
        if($recommend) {
            $rst['recommend'] = $list;
        } else {
            $rst['list'] = $list;
        }

        return $rst ;
    }


    // 获取代理商销售中的所有产品
    public function get_a_product_list($aid, $rn, $pn) {
        $this->load->model('atravel_model') ;
//        $p_status = Ptype::PRODUCT_STATUS_ON_SALE ;
        $p_status = 1 ;
        $rst_pid = $this->atravel_model->get_pids_by_uid($aid, '', $rn, $rn * $pn, $p_status) ;
        $total = $this->atravel_model->get_pids_count($aid, '') ;

        if(empty($rst_pid)) {
            return array() ;
        }

        foreach($rst_pid as $pid) {
            $pids[] = $pid['pid'] ;
        }

        $where['#in#']='id' ;
        $where['#arr#']=$pids ;

        $select = 'id, title,country,city,lang,tagname,min_num,p_type,p_status,is_customer,price_type,calendar_type,face_img' ;
        $this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');
        $rst = $this->travels_atomic_model->slt_res_arr($where, $select, $rn, $pn*$rn) ;

        $this->load->model('atomic/pd_calendar_prices_atomic_model', 'pd_calendar_prices_atomic_model');
        for($index=0; $index<sizeof($rst);$index++ ) {
            $rst[$index]['a_status'] = $rst_pid[$index]['status'] ;
            $prices = $this->pd_calendar_prices_atomic_model->get_prices_by_pid($rst[$index]['id'], $rst[$index]['calendar_type'], $aid) ;
            if(!empty($prices)) {
                $rst[$index]['prices'] = $prices ;
            } else {
                $rst[$index]['p_status'] = ''.Ptype::PRODUCT_STATUS_OFFLINE ;
            }
            $display_prices = $this->pd_calendar_prices_atomic_model->get_display_prices_by_pid($rst[$index]['id'],  $aid) ;
            $rst[$index]['display_prices'] = $display_prices ;
        }

        $content =  array('total' => $total , 'page_num' => intval(($total+$rn -1 ) / $rn) ,'data' => $rst);

        return $content;
    }

    // 用户看到的商铺产品，代理商产品列表
    public function get_a_list($uid, $pn,$rn,$p_type,$p_status=-1) {
        if($p_type !== 0) {
            $where['p_type'] = $p_type ;
        }

        if($p_status != -1) {
            $where['status'] = $p_status ;
        }

        if($rn <= 0) {
            $rn = 10 ;
        }

        if($pn <= 0) {
            $pn = 0 ;
        }

        $this->load->model('atravel_model') ;
        $rst_pid = $this->atravel_model->get_pids_by_uid($uid, $p_type, $rn, $rn * $pn,$p_status) ;
        $total = $this->atravel_model->get_pids_count($uid, $p_type) ;

        if(empty($rst_pid)) {
            return array() ;
        }

        foreach($rst_pid as $pid) {
            $pids[] = $pid['pid'] ;
        }

        $where['#in#']='id' ;
        $where['#arr#']=$pids ;

        $select = 'id, title,country,city,lang,tagname,min_num,p_type,p_status,is_customer,price_type,calendar_type,face_img' ;
        $this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');
        $rst = $this->travels_atomic_model->slt_res_arr($where, $select, $rn, $pn*$rn) ;

        $this->load->model('atomic/pd_calendar_prices_atomic_model', 'pd_calendar_prices_atomic_model');
        for($index=0; $index<sizeof($rst);$index++ ) {
            $rst[$index]['a_status'] = $rst_pid[$index]['status'] ;
            $prices = $this->pd_calendar_prices_atomic_model->get_prices_by_pid($rst[$index]['id'], $rst[$index]['calendar_type'], $uid) ;
//            if(!empty($prices)) {
//                $rst[$index]['prices'] = $prices ;
//            }
            if(!empty($prices)) {
                $rst[$index]['prices'] = $prices ;
            } else {
                $rst[$index]['p_status'] = ''.Ptype::PRODUCT_STATUS_OFFLINE ;
            }
            $display_prices = $this->pd_calendar_prices_atomic_model->get_display_prices_by_pid($rst[$index]['id'], $uid) ;
            $rst[$index]['display_prices'] = $display_prices ;
        }

        $content =  array('total' => $total , 'page_num' => intval(($total+$rn -1 ) / $rn) ,'data' => $rst);

        return $content;
    }

    // 供应商列表
    public function get_s_list($uid,$pn,$rn,$p_type,$p_status=-1) {
        // 1.基本信息
        $where = array('uid' => $uid) ;
        if($p_type !== 0) {
            $where['p_type'] = $p_type ;
        }

        if($p_status != -1) {
            $where['p_status'] = $p_status ;
        }

        if($rn <= 0) {
            $rn = 10 ;
        }

        if($pn <= 0) {
            $pn = 0 ;
        }

        $select = 'id, title,country,city,lang,tagname,min_num,p_type,p_status,is_customer,price_type,calendar_type,face_img' ;
        $this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');

        $total = $this->travels_atomic_model->cnt($where) ;
        $rst = $this->travels_atomic_model->slt_res_arr($where, $select, $rn, $pn*$rn) ;

        $this->load->model('atomic/pd_calendar_prices_atomic_model', 'pd_calendar_prices_atomic_model');
        for($index=0; $index<sizeof($rst);$index++ ) {
            $prices = $this->pd_calendar_prices_atomic_model->get_prices_by_pid( $rst[$index]['id'], $rst[$index]['calendar_type'], $uid) ;
//            if(!empty($prices)) {
//                $rst[$index]['prices'] = $prices ;
//            }
            if(!empty($prices)) {
                $rst[$index]['prices'] = $prices ;
            } else {
                $rst[$index]['p_status'] = ''.Ptype::PRODUCT_STATUS_OFFLINE ;
            }
            $display_prices = $this->pd_calendar_prices_atomic_model->get_display_prices_by_pid($rst[$index]['id'], $uid) ;
            $rst[$index]['display_prices'] = $display_prices ;
        }

        $content =  array('total' => $total , 'page_num' => intval(($total+$rn -1 ) / $rn) ,'data' => $rst);

        return $content;
    }

    public function detail( $pid, $uid, $aid='', $travel_intro=true) {
        $this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');
        $rst = $this->travels_atomic_model->detail( $pid, $uid, $travel_intro) ;

        if(empty($rst)) {
            return null ;
        }

        if($uid) {
            $this->load->model('atomic/a_p_travels_atomic_model','a_p_travels_atomic_model')  ;
            $this->load->model('atomic/a_spread_atomic_model','a_spread_atomic_model')  ;
            // 是否在销售中
            $rst['is_onsale'] = $this->a_p_travels_atomic_model->is_onsale($pid, $uid)  ;
            // 是否做过推广
            $rst['is_spread'] = $this->a_spread_atomic_model->is_spread($uid, $pid)  ;
        }

        // 价格
        $this->load->model('atomic/pd_calendar_prices_atomic_model', 'pd_calendar_prices_atomic_model');
        $prices = $this->pd_calendar_prices_atomic_model->get_prices_by_pid( $pid, $rst['calendar_type'], $uid) ;

        if(isset($prices)) {
            if(sizeof($prices) == 0){
                $rst['p_status'] = ''.Ptype::PRODUCT_STATUS_OFFLINE;
            }
            $rst['prices'] = $prices ;
        } else {
            $rst['p_status'] = ''.Ptype::PRODUCT_STATUS_OFFLINE;
        }

        $display_prices = $this->pd_calendar_prices_atomic_model->get_display_prices_by_pid($pid, $uid) ;
        $rst['display_prices'] = $display_prices ;

        // 图片
        $this->load->model('atomic/pd_travels_imgs_atomic_model', 'pd_travels_imgs_atomic_model');
        $imgs = $this->pd_travels_imgs_atomic_model->get_imgs_by_pid($pid) ;

        if(isset($imgs)) {
            $rst['imgs_url'] = URL_IMG ;
            $rst['imgs'] = $imgs ;
        }

        // 代理信息
        if($aid != '') {
            $agent = $this->_get_agent_info($aid) ;
            if( $agent != null ) {
                $rst['agent'] = $agent ;
            }
        }

//        $this->loa->model("product_recommend_model") ;
//        $this->product_recommend_model->get_recommend_data_by_pid($pid, $uid) ;

        return $rst ;
    }

    // 如果是普通用户，获取产品的代理信息
    private function _get_agent_info($aid) {
        $this->load->model('user_model') ;
        $user_infor = $this->user_model->get_user_infor_by_uid($aid) ;
        return array(
            'aid' => $user_infor['id'],
            'email'=> $user_infor['email'],
            'mobile'=> $user_infor['mobile'],
            'name'=> $user_infor['name'],
        ) ;
    }

    // 添加
    public function add(&$id, $data=null) {
        $uid = $GLOBALS['user_id'] ;

        //p_status
        $p_status = $data['p_status'] ;
        if($p_status == Ptype::PRODUCT_STATUS_ON_SALE) {
//            $p_status = Ptype::PRODUCT_STATUS_COMMITED ;
        } else if($p_status != Ptype::PRODUCT_STATUS_WILL_COMMIT && $p_status != Ptype::PRODUCT_STATUS_COMMITED) {
            $p_status = Ptype::PRODUCT_STATUS_COMMITED ;
        }

        $this->db->trans_start() ;

        //1. 添加产品基本属性
        $ins_arr = array(
            'uid' => $uid,
            'p_type' => $data['p_type'],
            'p_status' => $p_status,
            'title' => $data['title'] ,
            'continent' => $data['continent'],
            'country' => $data['country'],
            'province' => isset($data['province']) ? $data['province'] : '',
            'city' => $data['city'],
            'county' => isset($data['county']) ? $data['county'] : '',
            'lang' => $data['lang'],
            'tagname' => isset($data['tagname'])?$data['tagname']:'',
            'min_num' => $data['min_num'],
            'is_customer' => $data['is_customer'],
            'price_type' => $data['price_type'],
            'calendar_type' => $data['calendar_type'],
            'face_img' => $data['face_img'],
            'visa'=>$data['visa'],
            'fee_desc'=>$data['fee_desc'],
            'booking_policy'=>$data['booking_policy'],
            'start_city' => isset($data['start_city'])?$data['start_city']:''
        ) ;

        $this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');
        $ins_ret = $this->travels_atomic_model->ins($ins_arr) ;
        if(!isset($ins_ret['insert_id'])) {
            Ecode::logs(Ecode::INSERT_FAIL, __METHOD__) ;
            return Ecode::INSERT_FAIL ;
        }

        //2. 添加行程
        $travel_intro = $data['travel_intro'] ;
        $this->load->model('atomic/pd_travels_detail_atomic_model', 'travels_detail_atomic_model');
        $this->travels_detail_atomic_model->add_detail($ins_ret['insert_id'], $travel_intro, $data['p_type']) ;

        //3. 添加价格、日历
        // 价格id、 pid
        $this->load->model('atomic/pd_calendar_prices_atomic_model', 'calendar_prices_atomic_model') ;
        $prices_str = $data['prices'] ;
        $pricesObj = json_decode($prices_str, true) ;
        if(is_array($pricesObj)) {
            $prices_id = array() ;
//            var_dump($pricesObj) ;
            for($index=0;$index<sizeof($pricesObj);$index++){
                $prices_id_rst = $this->calendar_prices_atomic_model->add_calendar_prices($data['p_type'] ,$pricesObj[$index],$ins_ret['insert_id']) ;
//                if(!empty($prices_id_rst)) {
//                    array_push($prices_id , $prices_id_rst['insert_id']) ;
//                }
            }
        } else if(is_object($pricesObj)) {
            $prices_id_rst = $this->calendar_prices_atomic_model->add_calendar_prices($data['p_type'] , $pricesObj,$ins_ret['insert_id']) ;
            if(!empty($prices_id_rst)) {
                $prices_id = array($prices_id_rst['insert_id']) ;
            }
        } else {
            $prices_id=$data['prices_id'] ;
        }

        if(is_array($prices_id)) {
            $this->load->model('atomic/pd_calendar_prices_atomic_model', 'calendar_prices_atomic_model');
            $this->calendar_prices_atomic_model->attach_pid($ins_ret['insert_id'], $prices_id) ;
        }

        //4. 添加图片
        $imgs = json_decode($data['imgs_id'], true) ;
        if($imgs != NULL && is_array($imgs)) {
            $this->load->model('atomic/pd_travels_imgs_atomic_model', 'travels_imgs_atomic_model');
            $this->travels_imgs_atomic_model->add_imgs($ins_ret['insert_id'], $imgs) ;
        }

        $id = $ins_ret['insert_id'] ;

        $this->db->trans_complete();

        if($this->db->trans_status()  === FALSE) {
            return Ecode::INSERT_FAIL;
        }

        //4.返回插入成功
        return Ecode::OK ;
    }

    // 添加图片
    public function add_img($pid, $fkey) {
        $this->load->model('atomic/pd_travels_imgs_atomic_model', 'pd_travels_imgs_atomic_model') ;
        return $this->pd_travels_imgs_atomic_model->add_img($pid, $fkey) ;
    }

    // 修改
    public function modify($data=null) {
        $uid = $GLOBALS['user_id'] ;

        $this->load->library('commen') ;
//        $continent = $this->commen->continent_to_ch_name($data['continent']) ;
        $continent = $this->commen->continent_to_en_name($data['continent']) ;
//        echo $data['continent'];
//        return ;

        $this->db->trans_start() ;

        //1. 修改产品基本属性
        $ins_arr = array(
//            'uid' => $uid,
            'p_type' => $data['p_type'],
            'continent' => $continent ,
            'country' => $data['country'],
            'city' => $data['city'],
            'title' => $data['title'] ,
            'lang' => $data['lang'],
            'tagname' => $data['tagname'],
            'is_customer' => $data['is_customer'],
            'price_type' => $data['price_type'],
            'calendar_type' => $data['calendar_type']
        ) ;

        if(isset($data['face_img'])) {
            $ins_arr['face_img'] = $data['face_img'] ;
        }

        if(isset($data['min_num'])) {
            $ins_arr['min_num'] = $data['min_num'] ;
        }

        $this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');
        $where = array('id' => $data['id']) ;
        $ins_ret = $this->travels_atomic_model->upd($ins_arr, $where) ;
        if(!isset($ins_ret['affected_rows'])) {
            Ecode::logs($this->ERC_INSERT_FAIL, __METHOD__) ;
            return $this->ERC_INSERT_FAIL ;
        }

        //2. 修改行程
        $travel_intro = $data['travel_intro'] ;
        $this->load->model('atomic/pd_travels_detail_atomic_model', 'travels_detail_atomic_model');
        $this->travels_detail_atomic_model->modify_detail($data['id'], $travel_intro) ;

        //3. 添加价格、日历
        // 价格id、 pid
        $str_prices = $data['prices'] ;
        $prices = json_decode($str_prices, true) ;
        $this->load->model('atomic/pd_calendar_prices_atomic_model', 'calendar_prices_atomic_model') ;
        $this->calendar_prices_atomic_model->modify_or_add_price($data['id'], $data['p_type'], $prices) ;

        //4. 添加图片
//        $imgs = $data['imgs'] ;
//        if($imgs != NULL && is_array($imgs)) {
//            $this->load->model('atomic/pd_travels_imgs_atomic_model', 'travels_imgs_atomic_model');
//            $this->imgs_atomic_model->add_imgs($ins_ret['insert_id'], P_LINK_TABLE_TYPE_TRAVEL, $imgs) ;
//        }

        $this->db->trans_complete();

        if($this->db->trans_status()  === FALSE) {
            return Ecode::INSERT_FAIL;
        }

        //4.返回修改成功
        return Ecode::OK ;
    }

    // 删除图片
    public function del_img($uid, $id, $pid) {
        $this->load->model('atomic/pd_travels_imgs_atomic_model', 'pd_travels_imgs_atomic_model') ;
        $rst = $this->pd_travels_imgs_atomic_model->get_img_by_id($id) ;

        // 只有关联产品或者尚未关联产品的图片可以删除，不能删除其他的图片
        if($rst['pid'] != -1 && $rst['pid'] != $pid ) {
            die(h_echo_json(Ecode::C2S_ARG_ERR)) ;
        }

        // 添加删除权限
        // TODO

        return  $this->pd_travels_imgs_atomic_model->remove_img($id) ;
    }

    // 删除
    public function del($data=null) {
        $upd_data = array('is_del' => true) ;
        $where = array('id' => $data['id']) ;
        $this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');
        $rst = $this->travels_atomic_model->upd($upd_data, $where) ;
        if(isset($rst['affected_rows'])) {
            return true ;
        }
        return false ;
    }

    public function chang_status($pid, $to_status) {
        $upd_data = array('p_status' => $to_status) ;
        $where = array('id' => $pid) ;
        $this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');
        $rst = $this->travels_atomic_model->upd($upd_data, $where) ;
        if(isset($rst['affected_rows'])) {
            return true ;
        }
        return false ;
    }

    public function get_will_check_product($rn, $pn) {
        $where = array('p_status' => Ptype::PRODUCT_STATUS_COMMITED) ;
        $this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');
        $rst['total'] = $this->travels_atomic_model->cnt($where) ;
        if($rn * $pn < $rst['total']) {
            $select = 'id, title,continent,country,city,lang,tagname,min_num,p_type,is_customer,price_type,calendar_type,p_status,face_img' ;
            $order_by = '' ;
            $rst['page_num'] = intval($rst['total'] / $rn )+ 1; ;
            $rst['data'] = $this->travels_atomic_model->slt_res_arr($where, $select, $rn, $rn*$pn, $order_by) ;
            $rst['cur'] = $pn ;
            $rst['rn'] = $rn ;
            return $rst ;
        }

        return null ;
    }

    public function get_check_product_by_status($rn, $pn, $status=-1) {

        $where = array() ;
        if($status != -1) {
            $where['p_status'] = $status ;
        }

        $this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');
        $rst['total'] = $this->travels_atomic_model->cnt($where) ;
        if($rn * $pn < $rst['total']) {
            $select = 'id, title,continent,country,city,lang,tagname,min_num,p_type,is_customer,price_type,calendar_type,p_status,face_img' ;
            $order_by = '' ;
            $rst['page_num'] = intval($rst['total'] / $rn )+ 1; ;
            $rst['data'] = $this->travels_atomic_model->slt_res_arr($where, $select, $rn, $rn*$pn, $order_by) ;
            $rst['cur'] = $pn ;
            $rst['rn'] = $rn ;
            return $rst ;
        }

        return null ;
    }

    public function get_can_push_product($rn, $pn) {
        $where = array('p_status' => Ptype::PRODUCT_STATUS_ON_SALE) ;
        $this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');
        $rst['total'] = $this->travels_atomic_model->cnt($where) ;
        if($rn * $pn < $rst['total']) {
            $select = 'id, title,continent,country,city,lang,tagname,min_num,p_type,is_customer,price_type,calendar_type,p_status,face_img' ;
            $order_by = '' ;
            $rst['page_num'] = intval($rst['total'] / $rn )+ 1; ;
            $rst['data'] = $this->travels_atomic_model->slt_res_arr($where, $select, $rn, $rn*$pn, $order_by) ;
            $rst['cur'] = $pn ;
            return $rst ;
        }

        return null ;
    }

    // 查找
    public function find($data=null) {

    }

    public function admin_detail($pid) {
        $this->load->model('atomic/pd_travels_atomic_model', 'travels_atomic_model');
        $rst = $this->travels_atomic_model->detail( $pid ) ;

        // 价格
        $this->load->model('atomic/pd_calendar_prices_atomic_model', 'pd_calendar_prices_atomic_model');
        $prices = $this->pd_calendar_prices_atomic_model->get_admin_prices_by_pid( $pid ) ;

        if(isset($prices)) {
            $rst['prices'] = $prices ;
        }

        // 图片
        $this->load->model('atomic/pd_travels_imgs_atomic_model', 'pd_travels_imgs_atomic_model');
        $imgs = $this->pd_travels_imgs_atomic_model->get_imgs_by_pid($pid) ;

        if(isset($imgs)) {
            $rst['imgs_url'] = URL_IMG ;
            $rst['imgs'] = $imgs ;
        }

        return $rst ;
    }

    public function admin_fill_prices($data) {
        $this->load->model('atomic/pd_calendar_prices_atomic_model', 'pd_calendar_prices_atomic_model');
        return $this->pd_calendar_prices_atomic_model->admin_fill_prices( $data ) ;
    }



}