<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/26
 * Time: 下午5:16
 *
 * qsc 数据管理表
 */
class Qsc extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("qsc_model") ;
    }

    /**
     * 获取qsc数据记录
     */
    public function get_list() {
        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;

        if(! isset($rn) || $rn < 1) {
            $rn = 10 ;
        }

        if(! isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $rst = $this->qsc_model->get_qsc_record($rn, $pn) ;

        if( is_int($rst) && $rst !== Ecode::OK) {
            h_echo_json($rst) ;
            return ;
        }

        h_echo_json(Ecode::OK, $rst) ;
    }

    /**
     * 查找qsc数据记录
     */
    public function get_detail() {
        $qsc_id = $this->input->get_post('qsc_id',TRUE) ;
        $rst = $this->qsc_model->get_qsc_detail($qsc_id) ;
        if( isset($rst) ) {
            h_echo_json(Ecode::OK, $rst) ;
        } else {
            h_echo_json(Ecode::NO_RESULT) ;
        }
    }

    /**
     * 添加数据
     */
    public function add() {
        $data = $this->input->get_post(NULL,TRUE) ;
        $rst = $this->qsc_model->insert_item($data) ;
        if( isset($rst) ) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::INSERT_FAIL) ;
        }
    }

    /**
     * 删除数据
     */
    public function del() {
        $qsc_id = $this->input->get_post('qsc_id',TRUE) ;
        $rst = $this->qsc_model->del_by_qsc_id($qsc_id) ;
        if( $rst ) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::DELETE_FAIL) ;
        }
    }

    /**
     * 修改数据
     */
    public function modify() {
        $data = $this->input->get_post(NULL,TRUE) ;
        unset($data['token']) ;
        unset($data['from']) ;
        unset($data['type']) ;

        $rst = $this->qsc_model->upd($data) ;
        if( $rst ) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::INSERT_FAIL) ;
        }
    }

    // 导入表
    public function import_xls() {

        if(false) {
            h_echo_json(Ecode::OK,array("tips"=>"can not operate")) ;
            return ;
        }
        require_once APPPATH.'libraries/phpexcel/PHPExcel.php';
        require_once APPPATH.'libraries/phpexcel/PHPExcel/IOFactory.php';
        require_once APPPATH.'libraries/phpexcel/PHPExcel/Reader/Excel2007.php';

        //以上三步加载phpExcel的类
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');//use excel2007 for 2007 format
        $filename="/alidata/data/qsc_members.xlsx";//指定excel文件
        $objPHPExcel = $objReader->load($filename); //$filename可以是上传的文件，或者是指定的文件
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumn = $sheet->getHighestColumn(); // 取得总列数


//        $k = 0;
//        echo 'row:'.$highestRow.'\n' ;
//        echo 'colum:'.$highestColumn.'\n' ;

        for($i=2; $i<$highestRow; $i++) {
            $v_a = $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();//获取A列的值
            $v_b = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();//获取B列的值
            $v_c = $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();//获取C列的值
            $v_d = $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();//获取D列的值
            $v_e = $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();//获取E列的值
            $v_f = $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();//获取F列的值
            $v_g = $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();//获取G列的值
            $v_h = $objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue();//获取H列的值
            $v_i = $objPHPExcel->getActiveSheet()->getCell("I".$i)->getValue();//获取I列的值
            $v_j = $objPHPExcel->getActiveSheet()->getCell("J".$i)->getValue();//获取J列的值
            $v_k = $objPHPExcel->getActiveSheet()->getCell("K".$i)->getValue();//获取K列的值
            $v_l = $objPHPExcel->getActiveSheet()->getCell("L".$i)->getFormattedValue();//获取L列的值
            $v_m = $objPHPExcel->getActiveSheet()->getCell("M".$i)->getValue();//获取M列的值
            $v_n = $objPHPExcel->getActiveSheet()->getCell("N".$i)->getValue();//获取N列的值
            $v_o = $objPHPExcel->getActiveSheet()->getCell("O".$i)->getValue();//获取O列的值
            $v_p = $objPHPExcel->getActiveSheet()->getCell("P".$i)->getValue();//获取P列的值
            $v_q = $objPHPExcel->getActiveSheet()->getCell("Q".$i)->getValue();//获取Q列的值
            $v_r = $objPHPExcel->getActiveSheet()->getCell("R".$i)->getValue();//获取R列的值
            $v_s = $objPHPExcel->getActiveSheet()->getCell("S".$i)->getValue();//获取S列的值

            $arr = explode('-',$v_l) ;
            if(sizeof($arr) == 3) {
                $v_l = date("Y-m-d",mktime(1,0,0,$arr[0],$arr[1],$arr[2]));
            }
//            $v_l = date("m-d-Y",strtotime($v_l));



            if(!empty($v_k)) {
                $arr = array('mc_type' => $v_a, 'country' => $v_b, 'city' => $v_c, 'chn_name' => $v_d, 'eng_name' => $v_e,
                             'primary_contact' => $v_f, 'primary_contact_email' => $v_g, 'other_contact' => $v_h,
                             'other_contact_email' => $v_i, 'more_contact' => $v_j, 'qsc_id' => $v_k, 'invalid_from' => $v_l,
                             'review_desc' => $v_m, 'remark' => $v_n, 'qualification_level' => $v_o, 'spread' => $v_p,
                             'address' => $v_q, 'sponsor' => $v_r, 'score' => $v_s) ;

                $rst = $this->qsc_model->insert_item($arr) ;


                $insert = false ;
                if(isset($rst['insert_id'])) {
                    $insert = true ;
                }
                echo ($insert ? $rst['insert_id']:"-1").",$i ,$v_a,$v_b,$v_c,$v_d,$v_e,$v_f,$v_g,$v_h,$v_i,$v_j,$v_k,llll:$v_l,$v_m,$v_n,$v_o,$v_p,$v_q,$v_r,$v_s <br />" ;
            }
        }
    }




}