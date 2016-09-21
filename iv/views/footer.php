<?php
$CI = & get_instance() ;
    $CI->load->library('commen') ;
    if(!$CI->commen->is_weixin()) {
?>
<style>
a:link,a:hover,a:active,a:visited{
  text-decoration: none ;
}
</style>
    <div style="height:200px;"></div>
    <div class="main-footer">
        <div class="footer-cont">
          <div class="footer-kefu">
            <p class="footer-title">客服</p>
            <div class="fo-mar-b"><img src="/Public/images/footer-tel.png" alt="" style="vertical-align:middle"><span class="footer-contact">010-62238287</span></div>
            <div class="fo-mar-b"><img src="/Public/images/footer-qq.png" alt="" style="vertical-align:middle"><span class="footer-contact">3481486609</span></div>
          </div>
          <div class="footer-xinxi">
            <p class="footer-title">信息</p>
              <a href="/footer/about" class="fo-mar-b" target="_blank">关于我们</a>
              <a href="/footer/contact" class="fo-mar-b" target="_blank">联系我们</a>
              <a href="/footer/join" target="_blank">人才招聘</a>
          </div>
          <div class="footer-fuwu">
            <p class="footer-title">服务</p>
             <a href="/footer/server" class="fo-mar-b" target="_blank">服务协议</a>
             <a href="" class="fo-mar-b" target="_blank">使用帮助</a>
          </div>
          <div class="footer-yuyan">
              <div class="footer-lang">
                <div class="btn-lang" id="lang">
                  <span class="lang-name " style="color:#fff">中文(简体)</span>
                  <span class="footer-caret"></span>
                </div>
                <div class="lang-menu">
                  <div><a href="javascript:;" class="lang-active">中文(简体)</a></div>
                  <div ><a href="javascript:;" style="border:none">English</a></div>
                </div>
              </div>
          </div>
        </div>
        <div class="travel-name">逍品旅行 版权所有 Copyright&copy;2016-2020</div>
        <div class="police-num">北京市公安备案编号：京ICP12035470号-3</div>
    </div>
</div>
</body>
</html>
<?php } ?>
    <script>
     $(".btn-lang").click(function(e) {
        e.stopPropagation() ; 
       $(".footer-lang").toggleClass('menu-border');
       $(".lang-menu").toggle();
     });
     $(".lang-menu div a").click(function() {
       $(".lang-menu div a").removeClass('lang-active');
       $(this).addClass('lang-active');
       $(".footer-lang").toggleClass('menu-border');
       var name = $(this).text();
       $(".lang-name").text(name);
       $(".lang-menu").toggle();
     });
     $("body").bind('click',  function() {
       $(".lang-menu").hide();
       $(".footer-lang").removeClass('menu-border');
     });
    </script>
           