<?php


class Statistics extends MY_Controller
{   
    private $m_page ;
    private $m_controller ;
    
	public function __construct()
    {
        parent::__construct();
    }
    //首页
    public function detail(){
    	$this->load_view('statistics/statistics.html');
    }
}	