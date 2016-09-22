<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/4
 * Time: 下午7:23
 *
 *
 * 8位
 * -洲  0
 *  --国家  000
 *    --城市 0000
 *
 */
class Destination extends MY_Controller
{
    const ASIA              = 1 ;   // 亚洲
    const Europe            = 2 ;   // 欧洲
    const North_America     = 3 ;   // 北美洲
    const South_America     = 4 ;   // 南美洲
    const Africa            = 5 ;   // 非洲
    const Oceania           = 6 ;   // 大洋洲
    const Antarctica        = 7 ;   // 南极洲

    const D_TYPE_CONTINENT  = 0 ;   // 洲
    const D_TYPE_AREA       = 1 ;   // 地区
    const D_TYPE_COUNTRY    = 2 ;   // 国家
    const D_TYPE_CITY       = 3 ;   // 城市

    public function __construct()
    {
        parent::__construct();
        $this->load->model('atomic/destination_atomic_model', 'destination_atomic_model');
    }

    // 从qsc表生成目的地
    public function generate_from_qsc() {
        $this->load->model('atomic/qsc_atomic_model', 'qsc_atomic');

        // 添加洲信息
        $this->_generate_convertation() ;

        echo "<br/>1<br/><br/>" ;

        // 添加国家
        $this->_generate_country_from_qsc() ;
        echo "<br/>2<br/><br/>" ;

        // 添加城市
        $this->_generate_city_from_qsc() ;

        echo "<br/>3<br/><br/>" ;

        h_echo_json(Ecode::OK) ;
    }

    private function _generate_convertation() {
        $this->destination_atomic_model->add("亚洲",Destination::D_TYPE_CONTINENT,-1,Destination::ASIA,-1,-1,'ASIA') ;
        $this->destination_atomic_model->add("欧洲",Destination::D_TYPE_CONTINENT,-1,Destination::Europe,-1,-1,'Europe') ;
        $this->destination_atomic_model->add("北美洲",Destination::D_TYPE_CONTINENT,-1,Destination::North_America,-1,-1,'North America') ;
        $this->destination_atomic_model->add("南美洲",Destination::D_TYPE_CONTINENT,-1,Destination::South_America,-1,-1,'South America') ;
        $this->destination_atomic_model->add("非洲",Destination::D_TYPE_CONTINENT,-1,Destination::Africa,-1,-1,'Africa') ;
        $this->destination_atomic_model->add("大洋洲",Destination::D_TYPE_CONTINENT,-1,Destination::Oceania,-1,-1,'Oceania') ;
        $this->destination_atomic_model->add("南极洲",Destination::D_TYPE_CONTINENT,-1,Destination::Antarctica,-1,-1,'Antarctica') ;


        // 亚洲地区
        $this->destination_atomic_model->add("东亚",Destination::D_TYPE_AREA,-1,Destination::ASIA,101,-1,'ASIA') ;
        $this->destination_atomic_model->add("东南亚",Destination::D_TYPE_AREA,-1,Destination::ASIA,102,-1,'ASIA') ;
        $this->destination_atomic_model->add("南亚",Destination::D_TYPE_AREA,-1,Destination::ASIA,103,-1,'ASIA') ;
        $this->destination_atomic_model->add("中亚",Destination::D_TYPE_AREA,-1,Destination::ASIA,104,-1,'ASIA') ;
        $this->destination_atomic_model->add("西亚",Destination::D_TYPE_AREA,-1,Destination::ASIA,105,-1,'ASIA') ;
        $this->destination_atomic_model->add("北亚",Destination::D_TYPE_AREA,-1,Destination::ASIA,106,-1,'ASIA') ;
    }

    private function _generate_country_from_qsc() {
        $rst = $this->qsc_atomic->query('SELECT distinct(country) FROM qsc_0') ;
        foreach($rst->result_array() as $item) {
            $this->destination_atomic_model->add($item['country'],Destination::D_TYPE_COUNTRY) ;
        }
    }

    private function _generate_city_from_qsc() {
        $this->load->model('atomic/qsc_atomic_model', 'qsc_atomic');
        $rst = $this->qsc_atomic->query('SELECT distinct(city),country FROM qsc_0') ;
        foreach($rst->result_array() as $item) {
            if(isset($item['city']) && !empty($item['city']) ) {
                $country_id = null;
                if(isset($item['country'])) {
                    $country_id = $this->_get_id_by_name($item['country']) ;
                }
                if($country_id != null) {
                    $this->destination_atomic_model->add($item['city'],Destination::D_TYPE_CITY, $country_id) ;
                } else {
                    $this->destination_atomic_model->add($item['city'],Destination::D_TYPE_CITY) ;
                }
            }
        }
    }

    private function _get_id_by_name($country) {
        $where = array("name" => $country) ;
        $select = "id";
        $rst = $this->destination_atomic_model->slt_row_arr($where, $select) ;
        if(empty($rst)) {
            return null ;
        }

        return $rst['id'] ;
    }

    public function get_all_list() {

        //
        $select='id,d_type,name,en_name,code_continent,code_area,code_country';
//        $group = "code_continent";
//        $where = array('d_type' => Destination::D_TYPE_COUNTRY);
//        $rst = $this->destination_atomic_model->slt_res_arr($where,$select,null, null, null, $group) ;

        $where = array('d_type' => Destination::D_TYPE_COUNTRY, 'code_continent'=> Destination::ASIA);
        $asia = $this->destination_atomic_model->slt_res_arr($where,$select) ;
        $rst['asia'] = $asia ;

        $where = array('d_type' => Destination::D_TYPE_COUNTRY, 'code_continent'=> Destination::Europe);
        $europe = $this->destination_atomic_model->slt_res_arr($where,$select) ;
        $rst['europe'] = $europe ;

        $where = array('d_type' => Destination::D_TYPE_COUNTRY, 'code_continent'=> Destination::North_America);
        $north_america = $this->destination_atomic_model->slt_res_arr($where,$select) ;
        $rst['north_america'] = $north_america ;

        $where = array('d_type' => Destination::D_TYPE_COUNTRY, 'code_continent'=> Destination::South_America);
        $south_america = $this->destination_atomic_model->slt_res_arr($where,$select) ;
        $rst['south_america'] = $south_america ;

        $where = array('d_type' => Destination::D_TYPE_COUNTRY, 'code_continent'=> Destination::Africa);
        $africa = $this->destination_atomic_model->slt_res_arr($where,$select) ;
        $rst['africa'] = $africa ;

        $where = array('d_type' => Destination::D_TYPE_COUNTRY, 'code_continent'=> Destination::Oceania);
        $oceania = $this->destination_atomic_model->slt_res_arr($where,$select) ;
        $rst['oceania'] = $oceania ;

        $where = array('d_type' => Destination::D_TYPE_COUNTRY, 'code_continent'=> Destination::Antarctica);
        $antarctica = $this->destination_atomic_model->slt_res_arr($where,$select) ;
        $rst['antarctica'] = $antarctica ;

        h_echo_json(Ecode::OK, $rst) ;
    }

    public function get_list() {
        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        $d_type = $this->input->get_post('d_type') ;
        $code_continent = $this->input->get_post('code_continent') ;
        $code_area = $this->input->get_post('code_area') ;
        $code_country = $this->input->get_post('code_country') ;

        if(!isset($rn) || $rn <= 0) {
            $rn = 10 ;
        }

        if(!isset($pn) || $pn <= 0) {
            $pn = 0 ;
        }

        if(!isset($d_type)) {
            $d_type = 0 ;
        }

        $where = array('d_type' => $d_type);

        if(isset($code_country)) {
            $where['code_country'] = $code_country ;
        } elseif(isset($code_area)) {
            $where['code_area'] = $code_area ;
        } elseif(isset($code_continent)) {
            $where['code_continent'] = $code_continent ;
        }

        // 查询总个数
        $total = $this->destination_atomic_model->cnt($where) ;

        $limit=$rn;
        $offset=$pn*$rn;
        if($offset >= $total) {
            exit(h_echo_json(Ecode::NO_RESULT)) ;
        }

//        if($d_type == Destination::D_TYPE_CONTINENT) {   //洲
//            $select='id,d_type,name,en_name,code_continent';
//        } elseif($d_type == Destination::D_TYPE_AREA) {
//            $select='id,d_type,name,en_name,code_continent,code_area';
//        } elseif($d_type == Destination::D_TYPE_COUNTRY) {
//            $select='id,d_type,name,en_name,code_continent,code_area,code_country';
//        } elseif($d_type == Destination::D_TYPE_CITY) {
//            $select='id,d_type,name,en_name,code_continent,code_area,code_country';
//        }

        $select='id,d_type,name,en_name,code_continent,code_area,code_country';

        $rst = $this->destination_atomic_model->slt_res_arr($where,$select,$limit,$offset) ;

        if(!isset($rst)) {
            exit(h_echo_json(Ecode::NO_RESULT)) ;
        }

        if($d_type == Destination::D_TYPE_CITY) {
            $where_country = array('d_type' => Destination::D_TYPE_COUNTRY);
            $select_country = "id, name" ;
            $order_by = "id" ;
            $contry_rst = $this->destination_atomic_model->slt_res_arr($where_country,$select_country, null, null, $order_by) ;

            $min = $contry_rst[0]['id'];
            $index = 0 ;

//            var_dump($contry_rst) ;
//            echo "<br/><br/><br/><br/><br/>" ;
//            var_dump("min:".$min) ;
//            echo "<br/><br/><br/><br/><br/>" ;

            foreach($rst as $country_item) {

//                echo "<br/><br/><br/><br/><br/>" ;
//                var_dump( "id:".$country_item['code_country']) ;
//                echo "<br/><br/><br/><br/><br/>" ;

                if(isset($country_item['code_country'])) {
                    $rst[$index]['country_name'] = $contry_rst[intval($country_item['code_country']- $min)]['name'] ;
                } else{
                    $rst[$index]['country_name'] = null ;
                }

                $index++ ;
            }
        }

        $page_num = intval(($total+$rn -1) / $rn) ;
        $data = array('total' => $total , 'page_num' =>$page_num , 'cur_page' => intval($pn)
        , 'data' => $rst) ;

        h_echo_json(Ecode::OK,$data) ;
    }

    public function get_detail() {
        $id = $this->input->get_post('id',TRUE) ;

        $select='id,d_type,name,en_name,code_continent,code_area,code_country,weight';
        $where = array('id' => $id) ;
        $rst = $this->destination_atomic_model->slt_row_arr($where,$select) ;
        if( isset($rst) ) {
            h_echo_json(Ecode::OK, $rst) ;
        } else {
            h_echo_json(Ecode::NO_RESULT) ;
        }
    }

    public function add() {
        $name = $this->input->get_post('name') ;
        $d_type=$this->input->get_post('d_type') ;
        $code=$this->input->get_post('code') ;
        $code_country=$this->input->get_post('code_country');
        $code_continent=$this->input->get_post('code_continent');
        $weight=$this->input->get_post('name') ;
        $rst =  $this->destination_atomic_model->add($name,$d_type,$code, $code_country, $code_continent,$weight) ;
        if($rst > 0) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::INSERT_FAIL) ;
        }
    }

    public function modify() {
        $name = $this->input->post('name') ;
        $d_type=$this->input->post('d_type') ;
        $en_name=$this->input->post('en_name') ;
        $code_area=$this->input->post('code_area');
        $code_continent=$this->input->post('code_continent');
        $weight=$this->input->post('weight') ;
        $id=$this->input->post('id') ;

        $rst = $this->destination_atomic_model->upd_by_id($id, $name, $en_name, $d_type, -1, $code_continent,$code_area ,$weight) ;

        $rst ? h_echo_json(Ecode::OK):h_echo_json(Ecode::UPDATE_FAIL) ;
    }

    public function upd_code_country($id, $code) {
        return $this->destination_atomic_model->upd_code_country($id, $code) ;
    }

    public function upd_code_continent($id, $code) {
        return $this->destination_atomic_model->upd_code_continent($id, $code) ;
    }

    public function upd_code_area($id, $code) {
        return $this->destination_atomic_model->upd_code_area($id, $code) ;
    }

    public function upd_weight($id, $weight) {
        return $this->destination_atomic_model->add_weight($id, $weight) ;
    }

}