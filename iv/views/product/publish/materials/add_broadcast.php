<!DOCTYPE html>
<html lang="en">
<link>
<meta charset="UTF-8">
<title>qsc商户信息提交</title>
<script src="/Public/js/jquery-1.11.3.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css">
<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.all.min.js"></script>
<script src="/Public/js/layer.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/third_party/ueditor/lang/zh-cn/zh-cn.js"></script>

<script src="/Public/js/plupload/plupload.full.min.js"></script>
<script src="/Public/js/qiniu/qiniu.js"></script>

<style>
    body,div,h1,h2,h3,h4,h5,h6,p,ul,li,select,input,a{
        margin: 0;
        padding:0;
    }
    body{
        font-size: 14px;
        font-family:"Microsoft YaHei";
        background-color: #f5f5f5;
    }
    /*重置初始样式--end*/
    .broad_content{
        padding:50px 150px;
    }
    .sele{
        outline:none;
        height:34px;
        width:105px;
        border-radius:4px;
        border:1px solid #ccc;
        font-size:14px;
        color:#555;
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    }
   div.list{
    max-width:80%;
    margin-left:15px !important;
   }
</style>
<body>
<?php
    $data['tip_title'] = "qsc商户信息提交";
    $CI = & get_instance() ;
    $CI->load->view("header_new", $data) ;
    $user_s_type=$CI->session->user_s_type;
?>
<div style="text-align: center;font-size: 26px;margin-bottom:10px">添加商户</div>
<div class="container" style="background:#fff">
    <div class="broad_content">
        <form class="form-horizontal" style="">
            <!-- s_type以后还需判定，目前定位死的1 -->
            <input type="hidden" value="<?php echo $user_s_type?>" name="s_type" id="s_type">         
            <div class="form-group">
                <label class="col-md-2 control-label" for="name">商户名称：</label>
                <div class="col-md-8 col-offset-2">
                    <input class="form-control" id="name" type="text" placeholder="请输入商户的全称" name="name"/>
                </div>
            </div>
            <div class="form-group list">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-6 control-label">洲：</label>
                        <div class="col-md-6">
                            <select  class="sele" id="des_continent">
                                <option value="0">-请选择洲-</option>
                                <option value="asia">亚洲</option>
                                <option value="europe">欧洲</option> 
                                <option value="north_america">北美洲</option> 
                                <option value="africa">非洲</option> 
                                <option value="oceania">大洋洲</option>                                 
                            </select>
                        </div>
                    </div>                
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-6 control-label">国家：</label>
                        <div class="col-md-6" >
                            <select class="sele" id="des_country">
                                <option value="0">-请选择国家-</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-6 control-label" >城市:</label>
                        <div class="col-md-6">
                            <select  class="sele" id="city">
                                <option value="0">-请选择城市-</option>                              
                            </select>
                        </div>
                    </div>
                </div>               
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="addr" >详细地址：</label>
                <div class="col-md-8 col-offset-2">
                    <input class="form-control"  type="text" placeholder="请输入商户的详细地址" 
                    id="addr" name="addr"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="tel">电话：</label>
                <div class="col-md-8 col-offset-2">
                    <input class="form-control" id="tel" type="text" 
                    placeholder="请输入商户的联系电话" name="tel"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="fax">传真：</label>
                <div class="col-md-8 col-offset-2">
                    <input class="form-control" id="fax" type="text" 
                    placeholder="请输入商户的传真" name="fax"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="web">网址链接：</label>
                <div class="col-md-8 col-offset-2">
                    <input class="form-control" id="web" type="text" 
                    placeholder="请输入商户的网址" name="web"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="feature">特色点评：</label>
                <div class="col-md-8 col-offset-2" >
                    <textarea class="form-control" placeholder="请输入商户的特色点评" 
                    id="feature"  name="feature"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="introduce">商户介绍与服务：</label>
                <div class="col-md-8 col-offset-2">
                    <textarea class="form-control" placeholder="请输入商户的服务与介绍" id="introduce"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="">商户图片：</label>
                <div class="col-md-10 ">
                        <?php
                             $data_imgs['p_type'] = PType::GROUP_TRAVEL ;
                             $data_imgs['pid'] = -1 ;
                             $CI->load->view('product/components/com_image_upload', $data_imgs) ;
                        ?>
                </div>
            </div> 
            <div class="form-group" style="text-align:center">
                 <input class="btn btn-primary" type="button" value="提交" style="width:100px; 
                  margin-top:20px" id="upload"/>
            </div>

        </form>
    </div>   
<?php
    $CI->load->view("footer") ;
?>
</body>
<script>
     var continents={};
    //页面刚加载的时候就ajax请求所有的国家
    $(function(){
         $.get('/destination/get_all_list',
               {d_type:2},
               function(data){
               continents=JSON.parse(data);
               //console.log(continents);   
         });
    });
   //洲的选项改变时，请求所对应的国家（暂时未做国家改变时的城市值）
    $('#des_continent').change(function(){     
          select_contient=this.value;         
          if(select_contient==0){
             $('#des_country').html('<option value="0">-请选择国家-</option>');
             return;
          };
          var continents_cou=continents.content;         
          if(continents.result.err==0){
               for(var key in continents_cou){
                    var country=continents_cou[key];
                    if(key==select_contient){ 
                        $('#des_country').html('<option value="0">-请选择国家-</option>');
                        append_country(country);
                        return;
                    }
               }
          }
    });
    function  append_country(country){
         //console.log(country);
         for(var i=0;i<country.length;i++){
            $('#des_country').append('<option value="country">'+
                country[i].name+'</option>');
         }       
    }
   //点击提交按钮时
   $('#upload').click(function(){
        //先检查每一项是否都填写完毕
        var s_type=$('#s_type').val();
        var name=$('#name').val();
        var continent=$('#des_continent').find("option:selected").text();
        var country=$('#des_country').find("option:selected").text();     
        var city=$('#city').val();
        if(city=="0"){
           city="";  
        }
        var addr=$('#addr').val();
        var tel=$('#tel').val();
        var fax=$('#fax').val();
        var web=$('#web').val();
        var feature=$('#feature').val();
        var brief=$('#introduce').val();
        //var upload_img=com_image_upload_get_img_ids();  图片对应的id
        var imgs=com_image_upload_get_img_keys();  //图片路径
        var arr_img=[];
        for(var i=0;i<imgs.length;i++){
            var img="http://img.qsctrip.com/"+imgs[i];
            arr_img.push(img);
        }

         // if(!s_type){
         //     alert("请填写商户类型");
         //     return;
         // }

        if(!name){
            alert("请填写商户的名称");
            return;
        }
        if($('#des_continent').val()=="0"){
            alert("请选择所在洲");
            return;
        }
       if($('#des_country').val()=="0"){
            alert("请选择所在国家");
            return;
       }
       if(!com_image_upload_is_validate()){
            alert("请上传图片");
            return;
       }

        //ajax提交
         $.ajax({
             type:'POST',
             url:'/merchant/add',
             data:{
                    s_type:s_type,
                    type:1,
                    name:name,
                    continent:continent,
                    country:country,
                    city:city,
                    addr:addr,
                    tel:tel,
                    fax:fax,
                    web:web,
                    feature:feature,
                    brief:brief,
                    imgs:JSON.stringify(arr_img)
                  },
             success:function(data){
                    //console.log(data);
                    if(data.result.err==0){
                        window.location.href="/publish/product_select";
                    }
             },
         })
   });
</script>
</html>
