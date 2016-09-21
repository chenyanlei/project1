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
    
</style>
</head>
<body>
 <?php
     $data['tip_title'] = "商户详情";
     $CI = & get_instance() ;
     $CI->load->view("header_new", $data) ;
?> 
<style>
    *{
       font-family: "ff-tisa-web-pro-1","ff-tisa-web-pro-2","Lucida Grande","Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","Microsoft YaHei UI","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif; 
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
     .detail{
        margin:0px 70px;
        background: #fff; 
        padding:20px 20px;
     }
     .top{
        padding:30px 20px;
        overflow:hidden;
     }
     .left{
        float:left;
        width:400px;
        overflow:hidden;
    }
    .left img{
        width:400px;
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
    .divide{
        margin:0px 20px 20px 20px;
        border-top:1px solid #ccc;
    } 
    ul,li,h5,h6,p{
      padding:0px;
      margin:0px;
      list-style:none;
    } 
    .detail_top{
      padding-top:10px;
    }
    .detail_top>p{
      color:#0097d6;
      font-size: 20px;
    }
    .detail_from{
      font-size:14px;
      color:#666;
      padding:20px;
      padding-bottom:10px;
      padding-left:0px;
    }
    .country{
      padding-left:50px;
    }
    .detail_other>li{
      line-height:35px;
      font-size:14px;
      color:#666;
      overflow: hidden;
    }
    .detail_other>li>p{
      float:left;
      font-weight: bold;

    }
    .detail_other>li>span{
      float:left;
      padding-left:20px;
    }
    .feature{
      border:1px solid #ccc;
      margin:0px 20px 10px 20px;
      border-radius:4px;
       box-shadow:0px 0px 5px #ddd;
    }
    .brief{
      border:1px solid #ccc;
      margin:0px 20px 20px 20px;
      border-radius:4px;
      box-shadow:0px 0px 5px #ddd;
    }
    .feature>p,.brief>p{
      padding-left:15px;
      padding-top:5px;
      padding-bottom:10px;
      line-height:30px;
      letter-spacing:1px;
      text-indent:2em;
    }   
    h5{
      height:30px;
      line-height:30px;
      background-color:#149bdf;
      font-size:14px;
      font-weight:bold;
      padding-left:15px;
      border-radius:4px;
      color:#fff;   
    }
</style>
    <div class="title">
        <span>我的商户 &nbsp;></span>
        <span style="color:#999">&nbsp;商户详情</span>
    </div>
    <div class="detail">
        <div class="top">            
                <div class="left" style="border:1px solid #ddd">
                    <img src="" alt="">
                </div>
                <div class="right" > 
                    <div class="detail_top">
                          <!-- <h6>ID</h6>
                          <p></p>
                          <div class="detail_from">
                              <span></span>
                              <span class="country"></span>
                          </div> -->
                    </div>                                            
                    <ul class="detail_other">
                        <li class="addr">
                            <p>地址:</p>
                            <!-- <span></span> -->
                        </li>
                        <li class="tel">
                            <p>电话:</p>
                            <!-- <span></span> -->
                        </li>
                        <li class="fax">
                            <p>传真:</p>
                            <!-- <span></span> -->
                        </li>
                        <li class="web">
                            <p>网址:</p>
                            <!-- <span></span> -->
                        </li>
                </ul>                                         
        </div>
    </div>
    <div class="divide"></div>
    <div class="feature">
      <h5>特色介绍：</h5>
      <p></p>
    </div>
    <div class="brief">
       <h5>商户介绍：</h5>
       <p></p>
    </div>
<script>
    var id= GetQueryString('id');   
    var type= GetQueryString('type');
    console.log(type);
    $(function(){
        if(id!=null &&type!=null &&id.toString().length>0&&type.toString().length>0){
        $.get(
        '/merchant/get_detail_data',
        {
            id:id,
            type:type
        },
         function(data){
          console.log(data);
          if(data.result.err=="0"){
              if(data.content!=null){
                  update_detail(data.content);
              }
          }else{
            alert("成功");
          }
         }
      );
    }
    });
     
     function update_detail(content){
        console.log(content);
        //图片部分
        $('.left>img').attr('src',content.imgs[0].img);
        //右侧上半部分
        var p_name=document.createElement("p");
        p_name.innerHTML=content.name;
        $('.detail_top').append(p_name);
        var div_from=document.createElement("div");
        div_from.setAttribute("class","detail_from");
        var span_continent=document.createElement("span");
        span_continent.innerHTML=content.continent;
        div_from.appendChild(span_continent);
        var span_country=document.createElement("span");
        span_country.setAttribute("class","country");
        span_country.innerHTML=content.country;
        div_from.appendChild(span_country);
        $('.detail_top').append(div_from);

        //右侧下半部分
        var addr_span=document.createElement("span");
        addr_span.innerHTML=content.addr;
        $('.addr').append(addr_span);

        var tel_span=document.createElement("span");
        tel_span.innerHTML=content.tel;
        $('.tel').append(tel_span);

        var fax_span=document.createElement("span");
        fax_span.innerHTML=content.fax;
        $('.fax').append(fax_span);

        var web_span=document.createElement("span");
        web_span.innerHTML=content.web;
        $('.web').append(web_span);  

        //特色与服务
        $('.feature>p').html(content.feature);
        $('.brief>p').html(content.brief);
   }     
     function GetQueryString(name)
    {
      var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
      var r = window.location.search.substr(1).match(reg);
      if(r!=null)return  decodeURI(r[2]); return null;
    }    
</script>
</body>
</html>
