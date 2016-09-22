<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/7/21
 * Time: 下午8:10
 */
class Product_recommend_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // 根据产品id获取推荐
    public function get_recommend_data_by_pid($pid, $uid) {
        $this->load->model("atomic/pd_travels_atomic_model", "pd_travels_atomic_model") ;
        $type_rst = $this->pd_travels_atomic_model->slt_row_arr(array('id' => $pid), "p_type") ;
        if(empty($type_rst)) {
            return null;
        }

        $p_type = $type_rst['p_type'];

        $cur_time = time() ;
        $sql_where_condation =  " p_type=$p_type and p_calendar_prices_0.pid=p_travels_0.id
        and (p_travels_0.calendar_type=1
            or (p_calendar_prices_0.calendar_from>".$cur_time."
            or p_calendar_prices_0.calendar_to>".$cur_time."))
        and p_status=".Ptype::PRODUCT_STATUS_ON_SALE ;

        $sql_select = "select ";
        $sql_from = " from ";
        $sql_field = " distinct p_travels_0.id " ;
        $sql_table = " p_travels_0 ";
        $limit = " limit 0, 12" ;
        $sql_list = $sql_select. $sql_field. $sql_from .$sql_table.", p_calendar_prices_0 ". ' where '. $sql_where_condation .' '.$limit ;

        $rst_list = $this->travels_atomic_model->query($sql_list) ;
        $list = $rst_list->result_array() ;

        $index = rand(10) ;
        $pids[] = $list[$index]["id"] ;
        $pids[] = $list[$index+1]["id"] ;

        $list = $this->get_product_list_by_ids($pids, $uid) ;

        return $list ;
    }

}