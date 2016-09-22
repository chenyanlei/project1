<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/24
 * Time: 上午11:37
 */
class Product_check_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_list($rn, $pn, $status) {
        $this->load->model('product/travels_model', 'travels_model') ;

        switch($status) {
            case -1:
                $rst = $this->travels_model->get_check_product_by_status($rn, $pn) ;
                break ;
            case Ptype::PRODUCT_STATUS_COMMITED: // 待审核
                $rst = $this->travels_model->get_will_check_product($rn, $pn) ;
                break;
            case Ptype::PRODUCT_STATUS_ON_SALE:
                $rst = $this->travels_model->get_check_product_by_status($rn, $pn, $status) ;
                break ;
            default:
                $rst = $this->travels_model->get_check_product_by_status($rn, $pn, $status) ;
                break ;
        }

        return $rst ;
    }

    public function check_pass($pid) {
        $this->load->model('product/travels_model', 'travels_model') ;

        $rst = $this->travels_model->chang_status($pid, Ptype::PRODUCT_STATUS_ON_SALE) ;

        return $rst ;
    }

    public function check_failed($pid) {
        $this->load->model('product/travels_model', 'travels_model') ;

        $rst = $this->travels_model->chang_status($pid, Ptype::PRODUCT_STATUS_REVIEW_FAILED) ;

        return $rst ;
    }

    public function detail($pid) {
        $this->load->model('product/travels_model', 'travels_model') ;

        $rst = $this->travels_model->admin_detail($pid) ;

        return $rst ;
    }

    public function fill_prices($data) {
        $this->load->model('product/travels_model', 'travels_model') ;
        $rst = $this->travels_model->admin_fill_prices($data) ;
        return $rst ;
    }


    public function search() {

    }

}