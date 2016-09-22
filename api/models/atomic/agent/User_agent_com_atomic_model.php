<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/22
 * Time: 下午2:52
 */
class User_agent_com_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'user_agent_com_0';
    }

    public function get_list($agents_id, $rn, $pn) {
        $where = array("#in#"=>'uid', "#arr#" =>$agents_id) ;
        $select = 'id, uid,name, address, contact_phone, contact' ;
        $data['total'] = $this->cnt($where) ;
        $data['page_num'] = intval($data['total'] / $rn) + 1  ;
        $data['cur'] = intval($pn) ;
        $data['rn'] = intval($rn) ;

        if($rn * $pn < $data['total']) {
            $data['list'] = $this->slt_res_arr($where, $select,$rn, $rn*$pn)  ;
        }
        return $data ;
    }
    
}