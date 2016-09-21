
<style>
    .face_img {
        width: 300px;
        height: 200px;

    }
    .title_txt {
        position: absolute;
        bottom: 0px;
        width: 300px;
        color: white;
        background: #000000;
        opacity: 0.5;
        height: 40px;
        font-size: 14px;
        line-height: 40px;
        text-align: center;
        text-overflow : clip | ellipsis;
    }
    .item {
        position: relative;
        float: left;
        margin-top: 40px;
        margin-right: 40px;
    }

    .title {
        margin: 20px 0 0px;
        font-size: 18px;
        font-weight:bold;
    }
    .title a{
        color:#585858
    }
    .destination,.validate{

        font-size: 14px;
        color: #585858;
    }

    .destination{
        margin-top: 10px;
    }

    .price {
        margin-top: 0px;
        font-size: 28px;
        color: #ff9500;
        font-weight:bold;
    }
    .price1 {
        font-size: 20px;
        color: #333;
    }
    .detail>a{
        color: #ffffff;
        text-decoration: none;
    }

    .detail1 {
        width: 100%;
        font-size: 26px;
        background: #00d8ff;
        margin-top: 10px;
        margin-bottom: 10px;
        height: 60px;
        text-align: center;
        color: #ffffff;
        border:solid transparent 1px;

    }


    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
        position: relative;
        min-height: 1px;
        padding-right: 3px;
        padding-left: 3px;
    }

    #detail img {
        width: 100%;
    }
    a:link,a:hover,a:active,a:visited{
        text-decoration: none !important;
    }
    .line_d{
        background-color:#ccc;
        height:1px;
        margin:10px 0 20px
    }
</style>

<?php
    $CI = & get_instance() ;
    $CI->load->library('commen') ;
    if($is_ibar){
    if(!$CI->commen->is_weixin()) {
        sleep(2);
        $share_data = array('qr_url' => $qr_url, 'edit_url' => "/product_spread/spread_edit?id=".$data['id'].'&p_type='.$data['p_detail']['p_type']) ;
        $CI->load->view('product/components/com_share', $share_data) ;
?>


<div style="padding-bottom:200px">
<?php }else{?>
 <meta name="viewport" content="width=640,user-scalable=no,target-densityDpi=device-dpi">
<?php }
}
    require_once 'libraries/commen_user.php' ;
                $sale=get_sale_price($data['p_detail']['display_prices']);
                $same=get_same_price($data['p_detail']['display_prices']);

?>    
<div style="max-width: 1000px;width: 100%;position: relative;margin:0 auto;background-color:#fff;font-size:16px">
    <div class="col-sm-12" style="margin-top: 20px">
        <div>
            <div style="font-size: 28px;color: #585858;padding-top:20px"><?=$data['title']?></div>
        </div>
        <div class="line_d"></div>

        <div class="col-sm-12" id="detail">
            <?php echo $data['content'];
            $detail = $data['p_detail'];
            ?>
            <div style="clear: both"></div>
        </div>

        <div class="col-sm-12" style="margin-top: 50px;margin-bottom: 10px">
           
            <label class="col-sm-2 control-label" style="font-size:30px;text-align: left;font-weight: bold;margin-top:20px" for="travel_introduction">产品推荐</label>
        </div>
        <div class="line_d"></div>
        <div class="col-sm-12" style="margin-bottom: 50px;text-align: center">

          
            <img style="width:100%" src="<?php echo $detail['face_img'] ;?>">
            


            <div class="col-sm-12 title" style="text-align: left">
                <a href="/product/product_detail?pid=<?php echo $detail['id'] ;?>&p_type=<?php echo $detail['p_type'] ;?>"><?php echo $detail['title'] ;?></a>
            </div>
            <div class="col-sm-12" style="text-align: left">

                        <?php
                        if($agent){
                           ?>
                        <div class="price">同行销售价:￥<?=$same?></div>
                        <div class="price1">建议零售价:￥<?=$sale?></div>

                            <?php
                          }else {
                            ?>
                            <div class="price1">建议零售价:￥<?=$sale?></div>
                         <?php
                           }
                         ?>

                <div class="destination">
                    目的地：<?php 
                    switch($detail['continent']){
                        case 'asia':
                               $continent="亚洲";
                               break;
                        case 'europe':
                               $continent="欧洲";
                               break; 
                        case 'north_america':
                               $continent="北美洲";
                               break;
                        case 'south_america':
                               $continent="南美洲";
                               break;       
                        case 'africa':
                                $continent="非洲和中东";
                                break;
                        case 'oceania':
                                $continent="大洋洲";
                                break;        
                    }



                    $country = implode('-',json_decode($detail['country'],true));

                    echo $continent.'/'.$country;

                    ?>
                </div>

            </div>
            <div class="col-sm-12 ">
                <a class="btn" href="/webapp_product/product_detail?pid=<?php echo $detail['id'] ;?>&aid=<?=$aid?>&p_type=<?php echo $detail['p_type'] ;?>"><button class="detail1">查看详情</button></a>
<!--                <a class="btn detail1" href="/product/product_detail?pid=--><?php //echo $detail['id'] ;?><!--&aid=--><?//=$aid?><!--&p_type=--><?php //echo $detail['p_type'] ;?><!--">详情</a>-->
            </div>

        </div>
    </div>

    <div style="clear: both"></div>
</div>
<?php 
 if(!$CI->commen->is_weixin()) {
?>
</div>
<?php } ?>