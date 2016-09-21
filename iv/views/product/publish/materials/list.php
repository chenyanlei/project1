<?php
require_once 'libraries/commen_user.php' ;
function format_status_material($status) {
    switch($status) {
        case Ptype::MATERIAL_STATUS_CHECK_FAILED:
            return '审核不通过';
            break;
        case Ptype::MATERIAL_STATUS_CHECK_PASS:
            return '审核通过';
            break;
        case Ptype::MATERIAL_STATUS_COMMIT:
            return '待审核';
            break ;
        default:
            return '参数错误';
            break;
    }
}


function status_checked($cur, $status) {
    if($cur == $status) {
        echo 'checked' ;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<link>
<meta charset="UTF-8">
<title>商户信息</title>
<link href="/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="/Public/js/jquery-1.9.0.min.js"></script>
<style>
    .y-margin-bottom-10px {
        margin-bottom: 10px;
    }

    .y-margin-bottom-50px {
        margin-bottom: 50px;
    }

    .td_style {
        word-wrap:break-word;
    }

    .td_width_60 {
        width:200px;
    }
    .td_width_100 {
        width:150px;
    }
    .red_text{
        color: red;
    }

    .green_text{
        color: green;
    }
    th{
        height: 30px;
    }

    th{
        text-align: center;

    }
    td{
        text-align: center;
    }
    .li_item {
        display: block; float: left; margin-left: 20px
    }
</style>
</head>
<body>
<?php
    $data1['tip_title'] = "商户信息";
    $CI = & get_instance() ;
    $CI->load->view("header_new", $data1) ;
?>

<div style="margin: 0 auto;font-size: 26px;margin-bottom: 20px;margin-top: 30px" class="text-center">商户信息</div>

<div style="height: 50px"></div>
<div style="height: 40px">
  
</div>
<?php
if(!empty($data)) { ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>标题</th>
            <th>状态</th>
            <th>详情</th>
        </tr>
        </thead>

        <tbody>
        <?php
        echo sizeof($data) ; 
        foreach($data as $item) { 
            var_dump($item);
            ?>
            <tr>
                <td class="td_style td_width_100"><?php echo $item['id']; ?></td>
                <td class="td_style "><a href="#"><?php echo $item['title']; ?></a></td>
                <td class="td_style td_width_60"><?php echo format_status_material($item['status']);?></td>
                <td class="td_style td_width_60"><a href="/publish_product_add_material/detail?&id=<?php echo $item['id']; ?>">详情</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php if($page_num>0) { ?>
        <div>
            <ul class="pagination">
                <li><a href="/Publish_product_add_material/lists?pn=0&token=<?php echo get_token();?>">首页</a></li>
                <?php if($pn > 0) { ?>
                    <li><a href="/Publish_product_add_material/lists?pn=<?php echo $pn -1;?>">上一页</a></li>
                <?php } ?>
                <?php if($page_num < 10) {
                    for($index=0;$index<$page_num;$index++) { ?>
                        <li <?php if($index == $pn) echo 'class="active"';?>><a href="/Publish_product_add_material/lists?pn=<?php echo $index;?>"><?php echo $index+1;?></a></li>
                    <?php }
                } else {
                    if($page_num - $pn < 10) {
                        for($index=10;$index>0;$index--) { ?>
                            <li <?php if($page_num-$index == $pn) echo 'class="active"';?>><a href="/Publish_product_add_material/lists?pn=<?php echo $page_num-$index;?>"><?php echo $page_num-$index+1;?></a></li>
                        <?php }
                    } else {
                        for($index=0;$index<4;$index++) { ?>
                            <li <?php if($pn + $index == $pn) echo 'class="active"';?>><a href="/Publish_product_add_material/lists?pn=<?php echo $pn + $index;?>"><?php echo $cur + $index + 1;?></a></li>
                        <?php } ?>

                        <li><a href="/Publish_product_add_material/lists?pn=<?php echo $pn + $index;?>">...</a></li>
                        <?php for($index=4;$index>0;$index--) { ?>
                            <li <?php if($page_num - $index == $pn) echo 'class="active"';?>><a href="/Publish_product_add_material/lists?pn=<?php echo $page_num - $index;?>"><?php echo $page_num - $index + 1;?></a></li>
                        <?php }
                    }
                } ?>
                <?php if($pn < $page_num) { ?>
                    <li><a href="/Publish_product_add_material/lists?pn=<?php echo $pn +1;?>">下一页</a></li>
                <?php } ?>
                <li><a href="/Publish_product_add_material/lists?pn=<?php echo $page_num-1;?>">末页</a></li>
            </ul>
        </div>
    <?php }  ?>

<?php } else {  ?>
    <div class="margin-top-50px">
        没有更多的商户了
    </div>
<?php } ?>

<?php
    $CI->load->view("footer") ;
?>
</body>
</html>