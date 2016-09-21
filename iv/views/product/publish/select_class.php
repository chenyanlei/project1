<link href="/Public/css/sc1.css" rel="stylesheet" type="text/css">
<div class="col-sm-12">   
    <div class="center">
        <div id="div_classes">
             <div class="up_title">请选择您要上传的产品类型
             </div>
            <?php
                $ci = & get_instance() ;
                switch($s_type) {
                    case Ptype::TYPE_S_LOCAL_TRAVEL:
                        $ci->load->view('product/classes/local_travel') ;
                        break;
                    case Ptype::TYPE_S_SHOP:
                        $ci->load->view('product/classes/shop') ;
                        break;
                    case Ptype::TYPE_S_DINING_ROOM:
                        $ci->load->view('product/classes/shop') ;
                        break;
                    case Ptype::TYPE_S_SCENIC_AREA:
                        $ci->load->view('product/classes/local_travel') ;
                        break;
                    case Ptype::TYPE_S_HOTEL:
                        $ci->load->view('product/classes/local_travel') ;
                        break;
                    case Ptype::TYPE_S_PFS:
                        $ci->load->view('product/classes/pfs') ;
                        break ;
                    default;
                        break;
                }
            ?>
           
            <div style="clear: both"></div>
        </div>
    </div>

</div>