
<?php
require_once 'libraries/commen_user.php' ;
?>
<!DOCTYPE html>
<html lang="en">
<link>
<meta charset="UTF-8">
<title>商户详情</title>
<link href="/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<style>
    .y-margin-bottom-10px {
        margin-bottom: 10px;
    }

    .y-margin-bottom-50px {
        margin-bottom: 50px;
    }

    .y-margin-top-50px {
        margin-top: 50px;
    }
     .detail{
        margin:0px 70px;
        background: #fff; 
        padding:20px 20px;
     }
     .top{
        padding:30px 20px;
        overflow: hidden;
     }
     .left{
        float:left;
        width:650px;
        overflow:hidden;
    }
    .left img{
        width:650px;
        height:300px;
    }
    .right{
        float:left;
        margin-left:30px;
    }
    .right>h6{
        color:#585858;    
        font-size: 28px;
        margin:30 0px;
    }
    .right>p{
        color:#0097d6;
        font-size:28px;      
    }
    .divide{
        margin:0px 20px 20px 20px;
        border-top:1px solid #ccc;
    }
    .met_title{
        margin:0px 20px;
        color:#585858;
    }
    .title{
        padding:0px 0px 20px 70px;
    }
    .title>span{
        color:#0097d6;
        font-size: 14px;
        text-decoration: none;
    }
</style>
</head>
<body>
<?php
    $data['tip_title'] = "qsc商户信息提交";
    $CI = & get_instance() ;
    $CI->load->view("header_new", $data) ;
?>
<div class="title">
    <span>我的商户 &nbsp;></span>
    <span style="color:#999">&nbsp;商户详情</span>
</div>
<div class="detail">
  <div class="top">
      <div class="left">
          <span><img src="<?=$img_url.$face_img?>"  alt=""></span>
      </div>
      <div class="right">
          <h6><?php echo $title;?></h6>
          <p>
              <span>ID:</span>
              <span> <?php echo $id;?></span>
          </p>
      </div>
  </div>
  <div class="divide"></div>
  <div class="met_title">
      <?php echo $content;?>
  </div>
</div>
<?php
    $CI->load->view("footer") ;
?>
</body>
<ml>
