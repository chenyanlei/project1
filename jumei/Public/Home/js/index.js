/* Date: 2015-05-28T14:51:11Z Path: js/bin/home/index.js */
define("home_astotal.tpl",function(){return Handlebars.template({compiler:[6,">= 2.0.0-beta.1"],main:function(){return'<div id="J_ASTotalContainer_mask" class="J_ASTotalContainer_mask ie6fixedTL"></div><div id="J_ASTotalContainer" class="ie6fixedTL J_ASTotalContainer eric_clearboth"><div class="J_ASTotalContainer_searchBar"><form action="http://search.jumei.com" method="get" pos="top" class="J_ASTotalContainer_searchBox" onsubmit="return mall_search_validate(this)"><input name="filter" type="hidden" value="0-11-1"><input type="text" id="J_search_box" class="J_search_box" default_val="芙优润" autocomplete="off" x-webkit-speech="" x-webkit-grammar="builtin:search" lang="zh" name="search"  /><input name="from" type="hidden"><input name="cat" type="hidden"><button type="submit" class="J_search_submit">搜美妆</button></form><div id="J_search_pop_div"></div></div><p class="J_ASTotalContainer_rightMenu">美妆商品分类</p></div>\n'},useData:!0})}),
define("setSite",function(){"use strict";var t={init:function(){this.bindEvent()},get_cur_location:function(){var t=Jumei.util.cookie.get("default_site_25")||"";return""===t&&$.getJSON("http://www."+JM.SITE_MAIN_TOPLEVELDOMAINNAME+"/i/ajax/getsite?callback=?",function(e){t=e.site}),t},get_host:function(){var t=window.location.host,e=t.slice(0,window.location.host.indexOf(".")),n=this.get_cur_location();return("bj"==e||"sh"==e||"gz"==e||"cd"==e)&&e!=n&&(Jumei.util.cookie.set("default_site_25",e,{exp:"forever",domain:JM.SITE_MAIN_TOPLEVELDOMAINNAME,path:"/"}),n=e),n},bindEvent:function(){var t,e,n,i,a,o,r=$("body"),l=this;r.on("click","a,area",function(){if(t=l.get_host()||"www",e=$(this).attr("href")||"",a=/http:\/\/([^\.]+)\..*/,n=e.match(a),n&&(i=n[1]),o=""!==i&&"www"!==i&&"cart"!==i&&"bj"!==i&&"cd"!==i&&"gz"!==i&&"sh"!==i&&"ajax"!==i,o&&e.indexOf("site")<=0){var r,s=e.split("#"),u="";void 0!==s[1]&&(u="#"+s[1]),r=e.indexOf("?")>0?"&":"?",$(this).attr("href",s[0].replace(/(^\s+)|(\s+$)/g,"")+r+"site="+t+u)}})}};t.init()}),
define("others",function(t,e,n){function i(){var t=Jumei.ui.Lazyload,e=$("#ongoingAlreadyList .big_img img,#ongoingFutureList .big_img img");new t(e,{attrName:"original"})}function a(){i()}n.exports={init:a}}),
define("ongoing_jrsx",function(t,e,n){function i(t,e){function n(t){return new Date(1e3*t).toLocaleString().split(" ")[0]}return n(t)===n(e)?!0:!1}function a(){var t=$(".ongoing_already_list .J_todayNew");$.each(t,function(t,e){var n=$(e).attr("data-time");i(n,JM.SERVER_TIME)&&$(e).show()})}function o(){a()}n.exports={init:o}}),
define("ongoing_tabbar",function(t,e,n){function i(){var t=$(window).scrollTop();f>=t?$("#J_tabbar_left").addClass("tabbar_left_display_none").removeClass("tabbar_left_display_block"):t>f&&m>=t?$("#J_tabbar_left").addClass("tabbar_left_display_block").removeClass("tabbar_left_display_none"):$("#J_tabbar_left").addClass("tabbar_left_display_none").removeClass("tabbar_left_display_block"),l(t>=h-20?!1:!0)}function a(t,e){t.scrollTop(e)}function o(){a($(window),g)}function r(){a($(window),h)}function l(t){t?($("#J_tabbar_left").removeClass("tabbar_left_bottom").addClass("tabbar_left_top"),$("#J_tabbar_left_up").addClass("tarbar_left_hover"),$("#J_tabbar_left_down").removeClass("tarbar_left_hover")):($("#J_tabbar_left").removeClass("tabbar_left_top").addClass("tabbar_left_bottom"),$("#J_tabbar_left_down").addClass("tarbar_left_hover"),$("#J_tabbar_left_up").removeClass("tarbar_left_hover"))}function s(){var t=document.documentElement.clientWidth>1266?!1:!0;t&&$("#tabbar_left").css("display","none !important")}function u(){var t=$(".ongoing_already_list .ongoing_area").length,e=$(".ongoing_future_list .ongoing_area").length,n=0===t&&e>0?0:0===e&&t>0?1:2;return n}function _(){var t=u();switch(t){case 0:return $(".ongoing_already_list,#J_tabbar_top,#J_tabbar_left,#mall_ongoing_already").hide(),void $("#mall_ongoing_future").addClass("ongoing_future_title_301");case 1:return void $(".ongoing_future_list,#J_tabbar_top,#J_tabbar_left,#mall_ongoing_future").hide();case 2:}s(),$(window).bind("scroll",i),$(".J_mall_ongoing_already").bind("click",o),$(".J_mall_ongoing_future").bind("click",r)}var c=$("#J_tabbar_top"),f=c.offset().top+c.outerHeight()-50,d=$("#mall_ongoing_future"),h=d.offset().top+d.outerHeight()-88,g=c.offset().top+c.outerHeight()-184,m=$(".newmall_ongoing").offset().top+$(".newmall_ongoing").outerHeight()+290;n.exports={init:_}}),
define("ongoing_countTime",function(t,e,n){function i(){var t=$("#ongoingAlreadyList .count_time");t.each(function(){var t=$(this),e=t.attr("diff");e=Number(e)-JM.SERVER_TIME,t.attr("diff",e),0>=e&&t.text("已结束")}),new Jumei.ui.TimeCounter(t,{format:"距活动结束 DD天 HH时 MM分 SS秒",onStart:function(){this.$target.html(this.html)},onEnd:function(){this.$target.siblings().html(""),this.$target.html("已结束")}})}n.exports={init:i}}),
define("ongoing_future",function(t,e,n){function i(){var t=$(".J_sale_date_time");$.each(t,function(t,e){if(/^\d+$/.test($(e).html())===!1)return void a($(e));var n=parseInt($(e).html()),i=o(n);i===!1?$($(e).parent().parent().parent()).remove():$(e).html(i)})}function a(t){var e=t.html();e=e.replace(/(.*\D+)(\d+\:\d+)/g,"$1&nbsp;$2开售"),t.html(e)}function o(t){var e=new Date;e.setTime(1e3*JM.SERVER_TIME);var n=new Date;return n.setTime(1e3*t),e.getTime()-n.getTime()>0?!1:n.getMonth()===e.getMonth()&&n.getDate()===e.getDate()?"今天&nbsp;"+(n.getHours()>=10?n.getHours():"0"+n.getHours())+":"+(n.getMinutes()>=10?n.getMinutes():"0"+n.getMinutes())+"开售":n.getMonth()===e.getMonth()&&n.getDate()===e.getDate()+1?"明天&nbsp;"+(n.getHours()>=10?n.getHours():"0"+n.getHours())+":"+(n.getMinutes()>=10?n.getMinutes():"0"+n.getMinutes())+"开售":n.getMonth()===e.getMonth()&&n.getDate()===e.getDate()+2?"后天&nbsp;"+(n.getHours()>=10?n.getHours():"0"+n.getHours())+":"+(n.getMinutes()>=10?n.getMinutes():"0"+n.getMinutes())+"开售":n.getMonth()+1+"月"+n.getDate()+"日 "+(n.getHours()>=10?n.getHours():"0"+n.getHours())+":"+(n.getMinutes()>=10?n.getMinutes():"0"+n.getMinutes())+"开售"}function r(){i()}n.exports={init:r}}),
define("ongoing_cuxiaoFormat",function(t,e,n){function i(t){$.each(t,function(t,e){var n=$(e).html();n=n.replace(/(\d+)/g,"<em>$1</em>"),$(e).html(n)})}function a(){var t=$(".J_cuxiao_desc");i(t)}n.exports={init:a}}),
define("j_ASTotal",["home_astotal.tpl"],function(t,e,n){var i=t("home_astotal.tpl"),a={init:function(){this.insertDom(),$("#J_search_box").JumeiSearch("J_search_pop_div"),this.bindEvent()},template:window.Handlebars.compilePlus(i,{}),insertDom:function(){$("body").append(this.template)},bindEvent:function(){var t=$("#mtsCategory"),e=t.offset().top+t.outerHeight(),n=function(){var t=$(window).scrollTop();t>=e?$(".J_ASTotalContainer_mask,.J_ASTotalContainer").slideDown(400):$(".J_ASTotalContainer_mask,.J_ASTotalContainer").slideUp(400)};$(window).bind("scroll",n)}};n.exports={init:function(){a.init()}}}),
define("tuijianAd",function(t,e,n){"use strict";function i(t,e,n,i){$(e).mouseenter(function(){r[t]===!1&&(r[t]=!0,$(e).animate({left:"-"+n+"px"},i,function(){$(e).animate({left:n+"px"},i,function(){$(e).animate({left:"0px"},i,function(){r[t]=!1})})}))})}function a(){if(!($("#J_left_tuijianAd_tpl").length<=0)){var t=$("#J_left_tuijianAd_tpl a").attr("href"),e=$("#J_left_tuijianAd_tpl img").attr("src");$("#J_left_tuijianAd a").attr("href",t),$("#J_left_tuijianAd img").attr("src",e),$("#J_left_tuijianAd").show()}}function o(){a();var t=6,e=200;$(".tuijianAd,.left_tuijianAd,.eric_small_product_img").each(function(n,a){r.push(!1),i(n,a,t,e)})}var r=[];n.exports={init:o}}),
define("brandWall",function(t,e,n){"use strict";var i={hover:function(){var t=$("#brandWallSwitchable .sc_container"),e=$("#brandWallSwitchable"),n=$("#brandWallSwitchable .brand_wall_left,#brandWallSwitchable .brand_wall_right a");n.on("mouseenter",function(){t.css({overflow:"visible","z-index":"3"}),e.css({"z-index":"4"})}).on("mouseleave",function(){t.css({overflow:"hidden","z-index":""}),e.css({"z-index":""})})},currentAnimation:function(t){var e=$("#brandWallSwitchable .arrow_line"),n=$("#brandWallSwitchable .sc_index"),i=$("#brandWallSwitchable .sc_index a"),a=!1,o=function(){var t=n.offset().left,a=i.filter(".current").offset().left-t;e.stop(!0,!0).animate({left:a+"px"},200,"doubleSqrt")};t&&!a?o():(i.on("mouseover",function(){var t=$(this),i=n.offset().left,o=t.offset().left,r=o-i;a=!0,e.stop(!0,!0).animate({left:r+"px"},200,"doubleSqrt")}),i.on("click",function(){return!1}),n.on("mouseleave",function(){a=!1,o()}))},switchable:function(){var t,e=this;t=new Jumei.ui.Switchable("#brandWallSwitchable",{auto:!1,nav:!1,customIndex:!0,indexClickTrigger:!1}),t.on("change",function(){e.currentAnimation(!0)})},init:function(){this.switchable(),this.currentAnimation(),this.hover()}};n.exports=i}),
define("banner",function(t,e,n){"use strict";function i(){new Jumei.ui.Switchable(".J_new_admall_adBanner")}function a(){$.each($(".J_new_admall_adBanner .new_admall_content li"),function(t,e){var n=$(e).attr("lazyload");$(e).find(".banner_main_con a").html('<img src="'+n+'">')})}function o(){a(),i()}n.exports={init:o}}),
define("sideNav",function(t,e,n){"use strict";function i(){a.init()}var a={init:function(){function t(t){var e=$(t),o=e.index(),r=$(i[o]);e.addClass("hover"),r.show();var l=a.height()+o*e.outerHeight()-10;n.css({display:"block",top:l,left:e.outerWidth()-2})}function e(t){var e=$(t),a=$(i[e.index()]);e.removeClass("hover"),a.hide(),n.hide(),e=null}var n=$(".subCategory"),i=n.children(),a=$(".new_admall_eric_menu"),o=$(".new_admall_menu_content");Jumei.ui.menuAim(o,{activate:t,deactivate:e}),$.each(i,function(t,e){var n=$(e).children();n.length<3&&$(e).append(n[0].value)}),$(".mtsCategory-con").mouseenter(function(){}).mouseleave(function(){n.hide(),$(".new_admall_menu_li0").removeClass("hover")})}};n.exports={init:i}}),
define("underline_animate",function(t,e,n){function i(t,e){this.target=$(t),this.mall_nav_list=this.target.find(".mall_nav_list"),this.current=this.target.find(".current"),this.li=this.target.find("li"),this.step=e,this.mallLine=$(".mall_line")}function a(){var t=new i("#mall_nav_box",26);t.init()}i.prototype={init:function(){this.current.length>0&&(this.setDefault(),this.mouseEvent())},setDefault:function(t){var e=this.current.index(),n=void 0===arguments[0]?e:t,i=this.li.eq(n).find("a").innerWidth(),a=this.getLineLeft(n);this.mallLine.stop(!1,!0).animate({width:i+"px",left:a+"px"},200)},getLineLeft:function(t){var e=0;if(0===n)return void(e=0);for(var n=0;t>n;n++)e+=this.li.eq(n).outerWidth(!0);return e+this.step},mouseEvent:function(){var t=this,e=this.current,n=this.li,i=this.mallLine,a=this.step;this.li.bind("mouseenter",function(){var e=$(this).index();$(this).addClass("hover"),t.getLineLeft(e),t.setDefault(e)}).bind("mouseleave",function(){$(this).removeClass("hover")}),this.mall_nav_list.bind("mouseleave",function(){if(e.length<=0){var o=n.eq(0).width();i.stop(!1,!0).animate({left:a+"px",width:o+"px"},200)}else{var r=e.index();t.setDefault(r)}})}},n.exports={init:a}}),
define("main",["underline_animate","sideNav","banner","brandWall","tuijianAd","j_ASTotal","ongoing_cuxiaoFormat","ongoing_future","ongoing_countTime","ongoing_tabbar","ongoing_jrsx","others","setSite"],function(t){t("underline_animate").init(),t("sideNav").init(),t("banner").init(),t("brandWall").init(),t("tuijianAd").init(),t("j_ASTotal").init(),t("ongoing_cuxiaoFormat").init(),t("ongoing_future").init(),t("ongoing_countTime").init(),t("ongoing_tabbar").init(),t("ongoing_jrsx").init(),t("others").init(),t("setSite")}),
$(function(){seajs.use(["app","main"],function(){new localhost.app.iBar})});