function callback_fav_product(){}window.Jumei||(window.Jumei=new Object),Jumei.Search={init:function(){function a(){function a(){$(".products_wrap .item").each(function(){var a=Number($(this).find(".search_list_price").find("span").eq(0).text());a>1e4&&(a=a/1e4+"",$(this).find(".search_list_price").find("span").eq(0).text(a.substring(0,a.indexOf(".")+2)+"万"))})}var b,c,d=$(".search_list_head_fiex").offset(),e=d.top,f=window.location.hostname.split("."),f=f.slice(-2),c=f.join(".");$(".search_list_head_fiex li a").click(function(a){a||window.event,a.preventDefault(),b=$(this).attr("href"),document.cookie="isFixed=1;domain="+c+";path=/","1"==getCookie("isSellCheck")?(b=b.replace(/\d{1}/,1),window.location=b):(b=b.replace(/\d{1}/,0),window.location=b)}),$(".page-nav li").click(function(){document.cookie="isFixed=1;domain="+c+";path=/"}),"1"==getCookie("isFixed")&&($(window).scrollTop(e),document.cookie="isFixed=0;domain="+c+";path=/"),"1"===Jumei.Search.parseUrl().filter[0]?$(".search_list_head ul").append('<li><a class="show_checked">只看特卖</a></li>'):$(".search_list_head ul").append('<li><a class="show_check">只看特卖</a></li>'),$(".show_check,.show_checked").click(function(){"show_checked"===$(this).attr("class")?(b=location.href.replace(/1(-\d+-\d+)/,"0$1"),location.href.indexOf("filter=")<0&&(b+=/\/\?.*=/.test(location.href)===!0?"&filter=0-11-1":"?filter=0-11-1"),window.location=b,document.cookie="isSellCheck=0;domain="+c+";path=/",document.cookie="isFixed=1;domain="+c+";path=/"):(b=location.href.replace(/0(-\d+-\d+)/,"1$1"),location.href.indexOf("filter=")<0&&(b+=/\/\?.*=/.test(location.href)===!0?"&filter=1-11-1":"?filter=1-11-1"),window.location=b,document.cookie="isSellCheck=1;domain="+c+";path=/",document.cookie="isFixed=1;domain="+c+";path=/")}),a()}$(".products_wrap img").lazyload({threshold:100,placeholder:RM_IMGDIR+"/transparent.gif",effect:"fadeIn"}),Jumei.Search.cart_url="http://cart."+RM_SITE_MAIN_TOPLEVELDOMAINNAME+"/i/cart/new_items/","Search"==RM_CONTROL&&"view"==RM_ACTION&&(Jumei.Search.async_qijiandian_rukou(),Jumei.Search.filter_multi(),Jumei.Search.search_brands(),Jumei.Search.bread_init(),Jumei.Search.change_for_301(),$(".search_list_head ul li a").click(function(){var a=$(this).text();_gaq.push(["_trackEvent",""+a,"clicked"]);try{var b=$(this).attr("href"),c=b.match(new RegExp("[?&]filter=[0-9]+-([0-9]+)-[0-9]+"));null==c&&(c=[0,0]),b+="&"==b.charAt(b.length-1)?"bid=2_s":"&bid=2_s",$(this).attr("href",b)}catch(d){}}),$(".search_list_head_fiex").length>0&&a(),$(window).scroll(function(){var a=$(".search_list_head"),b=$(".search_list_head_fiex").offset();if(!b)return!0;var c=b.top-40;$(window).scrollTop()>c?($.browser.msie&&"6.0"==$.browser.version?(a.css("top",$(window).scrollTop()),a.css("position","absolute")):(a.css("position","fixed"),a.css("top",0),a.addClass("fiexd")),screen_wide?a.css("width","1090px"):a.css("width","960px")):(a.css("position","static"),a.css("top","auto"),a.css("width","100%"),a.removeClass("fiexd"))})),Jumei.Search.enableCountTime(),Jumei.Search.fav_pro(),$("#browse_history").length>0&&(Jumei.Search.browser_history(),Jumei.Search.final_buy());try{$("div .search_filter ul li a").click(function(){var a=$(this).attr("href"),b=$(this).attr("name"),c=new RegExp("[?&]([^=]+)="+b),d=a.match(c);null==d&&(d=[0,0]),b=d[1],b="string"==typeof b?b.charAt(0):0,a="&"==a.charAt(a.length-1)?a+"bid=2"+"_"+b:a+"&bid=2"+"_"+b,$(this).attr("href",a)})}catch(b){}},enableCountTime:function(){for(var a,b=$(".search_deal_buttom_bg .time_countdown"),c=[],d=[],e="Search"==RM_CONTROL&&"view"==RM_ACTION,f=function(a,b,c,d,f){var g,h,i,j,k,l;a=parseInt(1e3*a),h=a,d=!1,h>0?(g=parseInt(h/864e5).toString(),g=g.length>1?g:"0"+g,d&&(h%=864e5),i=parseInt(h/36e5).toString(),i=i.length>1?i:"0"+i,h%=36e5,j=parseInt(h/6e4).toString(),j=j.length>1?j:"0"+j,e?(k=parseInt(h%6e4/100),h=parseInt(k/10),l=k-10*h,h=h.toString().length>1?h:"0"+h):(h=parseInt(h%6e4/1e3),h=h.toString().length>1?h:"0"+h),"00"==g&&(d=!1),d&&!f?html=g+"<span> </span> "+'<span class="time_countdown_black">天</span>'+"<span> </span> "+i+"<span> </span> "+'<span class="time_countdown_black">时</span>'+"<span> </span> "+j+"<span> </span> "+'<span class="time_countdown_black">分</span>':d||f?!d&&f&&(html=i+"<span> </span> "+'<span class="time_countdown_black">时</span>'+"<span> </span> "+j+"<span> </span> "+'<span class="time_countdown_black">分</span>'+"<span> </span> "+h+"."+l+'<span class="time_countdown_black">秒</span>'):html=i+"<span> </span> "+'<span class="time_countdown_black">时</span>'+"<span> </span> "+j+"<span> </span> "+'<span class="time_countdown_black">分</span>'+"<span> </span> "+h+"<span> </span> "+'<span class="time_countdown_black">秒</span>',c.html(html)):c.html("已结束")},g=0;g<b.length;g++)c.push($(b[g]));var h=c.length;if(h>0){for(var g=0;h>g;g++)d.push(c[g].attr("diff"));var i=$(window);setInterval(function(){a=(new Date).getTime();for(var b=0;h>b;b++)d[b]=d[b]-1;for(var e=i.scrollTop(),g=e+i.height(),b=0;h>b;b++){var j=c[b].offset();j.top+30>e&&j.top<g&&f(d[b],a,c[b],!0,!1)}},1e3)}},multiSku:function(){$(".search_list_button a[u_nos]").click(function(a){var b,c=$(this),d=c.parent("div.search_list_button"),e=d.parents("li.item"),f=d.find(".select_box p"),g=c.attr("u_nos"),h=e.find("a img").attr("src"),i=e.find(".s_l_pic a"),j=i[0].search.match(/from=([^&]+)/),k="";if(j&&(k=j[1]+"_ac"),g=g.split(","),b={elem:this,img:h,hashid:0,from:k,which_cart:"all",num:1},1==g.length)return Jumei.Core.ga_event("addtocart",RM_CONTROL+"_"+RM_ACTION,g[0]),!0;if(!f.length){var l='<div class="select_box"><div count="0">',m=$(this).attr("u_as");m=m.split(",");for(var n=0;n<g.length;n++)l+='<p value="'+g[n]+'">'+m[n].slice(0,8)+"</p>";l+="</div></div>",d.prepend(l),f=d.find(".select_box p")}"0"==$(this).parent().find(".select_box div").attr("count")?$(this).parent().find(".select_box div").attr("count","1"):($(this).parent().find("div").show(),$(this).parent().find("div").mouseleave(function(){$(this).hide()})),$(this).css({"background-position":"0 -97px"}),$(this).parents(".item_wrap").hover(function(){$(this).find(".select_box").hide()}),f.bind("click",function(){var a=this.getAttribute("value");$(this).parent().parent().parent().find(".btn_addcart").css({cursor:"pointer"}).parent().find("div").hide(),a&&(b.sku=a,b.elem=f[0],Jumei.Core.ga_event("addtocart",RM_CONTROL+"_"+RM_ACTION,a),Jumei&&Jumei.app&&Jumei.app.iBar?Jumei.app.iBar.addCart(b):window.location=Jumei.Search.cart_url+a+",,1")}),a.preventDefault()})},filter_multi:function(){var a=($(".search_filter"),$(".filter_attrs"));$(".btn_fliter_expan"),$(".J_btn_fliter_multi").click(function(){var a=$(this);a.parent().addClass("multi"),a.parent().find(".filter_attrs").addClass("expand").addClass("expand_multi"),a.parent().find(".placeholder_line").show().css("borderBottom","solid 1px #f2f2f2"),$(a.parent().find(".bottom_multi_selecteds")).show(),a.hide(),a.prev().hasClass("btn_fliter_expan")&&a.prev().hide()}),a.each(function(){var a=$(this),b=a.next(),c=$(this).find("ul").height();c>68?(b.show(),b.click(function(){a.hasClass("expand")?a.parent().parent().hasClass("multi")||(b.removeClass("expand").attr("title","展开").html("展开").toggleClass("expand_bg"),a.removeClass("expand"),$("#filter_search_brand").val(""),$(".multi_letters a").eq(0).trigger("click"),a.find(".placeholder_line").show().css("borderBottom","solid 1px #f2f2f2")):(a.addClass("expand"),b.addClass("expand").attr("title","收起").html("收起").toggleClass("expand_bg"),a.find(".placeholder_line").show().css("border","none"))})):($(this).css("height","auto"),b.remove())}),$(".filter_con.multi .filter_attrs li a").live("click",function(){var a=$(this).parent().parent().parent().attr("id"),b=$(this).parent().parent().parent().find(".bms_container"),c=$(this).text(),d=$(this).attr("name");if($(this).hasClass("selected"))$(this).removeClass("selected"),$('a[name="'+d+'"]',b).remove();else{if(b.find("a").length>4)return alert("每个属性最多同时选5个选项!"),!1;$(this).addClass("selected"),b.append("<a href='javascript:;' name="+d+">"+c+"</a>"),_gaq.push(["_trackEvent",""+a+"_"+c,"clicked"])}var e=$(this).parent().parent(),f=e.parent().parent().find(".btn_multi_submit");return e.find("a.selected").length>0?f.hasClass("enter_active")||f.addClass("enter_active"):f.hasClass("enter_active")&&f.removeClass("enter_active"),!1}),$(".bms_container").delegate("a","click",function(){var a=$(this).parent(),b=a.parent().parent().parent().find("#btn_multi_submit"),c=$(this).attr("name"),d=$(this).parent().parent().prev(),e=$(this).parent().find(".search_current_item").html(),f="#item_"+e+"_"+c;$(f).removeClass("selected"),$('a[name="'+c+'"]',d).removeClass("selected"),$(this).remove(),0===a.find("a").length&&b.hasClass("enter_active")&&b.removeClass("enter_active")}),$(".J_btn_multi_reset").click(function(){var a=$(this).parent().parent().parent();return a.removeClass("multi"),a.find(".filter_attrs").removeClass("expand").removeClass("expand_multi"),a.find(".placeholder_line").hide(),a.find(".J_btn_fliter_multi").show(),a.find(".btn_fliter_expan").show(),a.find(".bottom_multi_selecteds").hide(),$(this).parent().parent().parent().find(".btn_fliter_expan").removeClass("expand").attr("title","展开").html("展开").toggleClass("expand_bg"),!1}),$(".btn_multi_submit").click(function(){if(!$(this).hasClass("enter_active"))return!1;var a=parseInt($(this).attr("name")),b=Jumei.Search.parseUrl().origin+"/?",c="filter=0-11-1",d="&search="+_search_word,e="",f=new Array,g=new Array,h=new Array,i=new Array;switch(_gaq.push(["_trackEvent","multi_submit","clicked"]),""!=url_brand&&0!=url_brand&&(d+="&brand="+url_brand),""!=url_category&&0!=url_category&&(d+="&cat="+url_category),""!=url_function&&0!=url_function&&(d+="&func="+url_function),""!=url_price&&0!=url_price&&(d+="&price="+url_price),a){case 0:$("#filter_brand .bms_container a").each(function(){f.push($(this).attr("name"))}),f.length>0&&(e+="&brand="+f.join(",")),""!=url_brand&&0!=url_brand&&(e+=url_brand);break;case 1:$("#filter_cat .bms_container a").each(function(){g.push($(this).attr("name"))}),g.length>0?e+="&cat="+g.join(","):""!=url_category&&0!=url_category&&(e+="&cat="+url_category);break;case 2:$("#filter_fun .bms_container a").each(function(){h.push($(this).attr("name"))}),h.length>0&&(e+="&func="+h.join(",")),""!=url_function&&0!=url_function&&(e+=url_function);break;case 3:$("#filter_price ul li a.selected").each(function(){i.push($(this).attr("name"))}),i.length>0&&(e+="&price="+i.join(",")),""!=url_price&&0!=url_price&&(e+=url_price)}b+=c+d+e;try{b+="&"==b.charAt(b.length-1)?"bid=2_m":"&bid=2_m"}catch(j){}return location.href=b,!1})},search_brands:function(){$("#filter_search_brand").watermark("搜索品牌");var a=_search_word+":"+RM_SITE;0==url_brand.length&&(url_brand=0),0==url_category.length&&(url_category=0),0==url_function.length&&(url_function=0),0==url_price.length&&(url_price=""),a+=":"+url_brand+":"+url_category+":"+url_function+":"+url_price,$("#filter_search_brand").keyup(function(){var a=$(this).val(),b=$("#filter_brand ul");$("li",b).hide();var c=$("li[pinyin*="+a+"],li[title*="+a+"]",b);c.length>0?($("#none_brand",b).remove(),c.show()):b.append('<li id="none_brand">抱歉没有找到相关品牌!</li>')}).focus(function(){$(".multi_letters a").eq(0).trigger("click")}),$(".multi_letters a").click(function(){$(this).addClass("selected").siblings().removeClass("selected"),$("#filter_search_brand").val("");var a=$(this).attr("k");""!=a?($("#filter_brand ul li").hide(),$('#filter_brand ul li[rel="'+a+'"]').show()):$("#filter_brand ul li").show()})},bread_init:function(){function renderDom(ajaxData){function callback(data){function renderData(data){function joinLink(a,b,c){return'<a href="'+a.origin+"/?filter=0-11-1"+(void 0===a.search?"":"&search="+a.search)+"&cat="+b+"&from=search_brother_category_"+c+'">'+tempData[b]+"</a>"}var tempData=eval("("+data+")"),count=1,tempTpl="",urlObj=Jumei.Search.parseUrl();for(var i in tempData){switch(count%5){case 1:widthCount++,tempTpl+='<ul class="clearfix"><li>'+joinLink(urlObj,i,count)+"</li>";break;case 0:tempTpl+="<li>"+joinLink(urlObj,i,count)+"</li></ul>";break;default:tempTpl+="<li>"+joinLink(urlObj,i,count)+"</li>"}count++}return tempTpl+"</ul>"}try{if("object"==typeof data&&"string"==typeof data.status&&"success"===data.status){var tempData=data.brother_category;if(tempData=renderData(tempData),0===widthCount)return;var sub_width=121*widthCount+"px";$renderDom.prepend(tempData).css("width",sub_width),$(".bread_container_con .hover_mask").css("width",sub_width),$renderDom.find("ul:last").addClass("ul_border_none"),isAjaxed=!0}else $renderDom.remove()}catch(e){console.log("ajax_get_brother_category的数据接口有问题")}}callback(ajaxData)}function search_handler(){var a=encodeURIComponent($("#J_bread_search_input").attr("value"));$("#J_bread_search_title").html(),location.href=handler_searchstring_to_server(a)}function handler_searchstring_to_server(a){var b=Jumei.Search.parseUrl(),c="http://search.jumei.com";return"undefined"!=typeof b.filter&&(c+=c.indexOf("?")>=0?"filter=0-11-1":"?filter=0-11-1"),c+=c.indexOf("?")>=0?"&search="+a+"&from="+"search_condition_"+a:"?search="+a+"&from="+"search_condition_"+a,"undefined"!=typeof b.func&&(c+="&func="+b.func),"undefined"!=typeof b.cat&&(c+="&cat="+b.cat),"undefined"!=typeof b.brand&&(c+="&brand="+b.brand),"undefined"!=typeof b.price&&(c+="&price="+b.price),c}var $renderDom=$("#J_sub_selected_panel"),catId=$("#cat_id").html(),isAjaxed=!1,isSendJsonRequest=!1,widthCount=0,bread_panel_keywords=Jumei.Search.parseUrl().search;$(".selected_panel").length>0&&$(".selected_panel").hover(function(){isAjaxed?($(".sub_selected_panel").show(),$(this).addClass("selected_panel_hover")):parseInt(catId)>0&&isSendJsonRequest===!1&&(isSendJsonRequest=!0,$.ajax({type:"get",url:RM_SITE_SEARCH_WEBBASEURL+"ajax_get_brother_category?"+("undefined"==typeof bread_panel_keywords?"":"search="+bread_panel_keywords)+"&cat="+catId,dataType:"jsonp",success:function(a){renderDom(a),$(".sub_selected_panel").show()}}))},function(){isAjaxed&&($(".sub_selected_panel").hide(),$(this).removeClass("selected_panel_hover"))});var bread_obj={init:function(){var a=this.getBreadLength();a>1070&&($("#bread_prev").show(),screen_wide?$(".bread_container_con").addClass("bread_container_con_clip_end").css("left",1045-a+"px"):$(".bread_container_con").addClass("bread_container_con_clip_end").css("left",915-a+"px"),this.bindEvent(a))},getBreadLength:function(){var a=$("#bread_container .bread_ul").outerWidth()+$("#bread_container .selected_panel").outerWidth()+$("#bread_container .filter_choosed_item_wrap").outerWidth()+$("#J_bread_search").outerWidth();return a},bindEvent:function(a){$("#bread_prev").bind("click",function(){$(".bread_container_con").removeClass("bread_container_con_clip_end").addClass("bread_container_con_clip_start").css("left","0"),$(this).hide(),$("#bread_next").show()}),$("#bread_next").bind("click",function(){screen_wide?$(".bread_container_con").removeClass("bread_container_con_clip_start").addClass("bread_container_con_clip_end").css("left",1045-a+"px"):$(".bread_container_con").removeClass("bread_container_con_clip_start").addClass("bread_container_con_clip_end").css("left",915-a+"px"),$(this).hide(),$("#bread_prev").show()})}};bread_obj.init();var is_in=!1,origin_search_content=decodeURIComponent($("#J_bread_search_input").attr("value"));$("#J_bread_search").bind("click",function(){is_in===!1&&($("#J_bread_search_title").length>0&&$("#J_bread_search_title").hide(),$("#J_bread_search_input").trigger("focus"))}),""!==origin_search_content&&is_in===!1&&$("#J_bread_search_title").html(""),$("#J_bread_search_input").bind("blur",function(){var a=$("#J_bread_search_input").attr("value");""===a&&($("#J_bread_search_title").length>0?$("#J_bread_search_title").show():$("#J_bread_search_input").attr("value",origin_search_content)),is_in=!1}).bind("focus",function(){is_in=!0,$("#J_bread_search_title").length>0&&$("#J_bread_search_title").hide()}).keyup(function(a){return 13===a.which&&$("#J_right_search_submit").trigger("click"),!1}),$("#J_right_search_submit").bind("click",function(){return search_handler(),!1})},parseUrl:function(){var a=location.href,b=location.origin||location.href;a=a.slice(a.indexOf("?")+1).split("&");for(var c=a.length,d={origin:b},e=0;c>e;e++){var f=a[e].split("=");d[f[0]]=f[1]}return"undefined"==typeof d.filter&&(d.filter="0-11-1"),d},fav_pro:function(){$(".products_wrap").delegate(".btn_fav","click",function(){var a=$(this).attr("pid"),b=$(this);return $.getJSON("http://www.jumei.com/i/product/ajax_fav_product?product_id="+a+"&callback=?",function(a){if("yes"==a.isOk)if("no"==a.isLogin)alert("登录后才能收藏商品!");else{alert("收藏成功");var c=$(b).parents("li"),d=$(b).parent().parent().find(".s_l_name a").attr("href");try{"function"==typeof setSearch.setBrowseValue&&setSearch.setBrowseValue(c,2,d)}catch(e){}}else alert("收藏失败")}),!1})},browser_history:function(){function a(a){var b=$("#br_slide"),c=b.find("ul");if(a&&a.length){var d="";for(var e in a){var f=parseInt(a[e].product_reports_number)||0,g=parseInt(a[e].deal_comments_number)||0,h=f+g?f+g+"篇评价":"新品上市",i=parseInt(e)+1;d+='<li><a href="'+a[e].url+"?from=r_s_f_0_1-"+i+'" title="'+a[e].short_name+'" target="_blank">',d+='<img src="'+a[e].image_200+'" class="pic" width="160" height="160" alt="'+a[e].short_name+'"/></a>',d+='<p class="tit"><a href="'+a[e].url+"?from=r_s_f_0_1-"+i+'" title="'+a[e].short_name+'" target="_blank">'+a[e].short_name+"</a></p>",d+='<p class="price">¥'+a[e].mall_price+'</p><p class="count">'+h+"</p>"}c.html(d);var j=c.children("li"),k=1,l=b.prev(),m=b.next(),n=Math.ceil(j.length/4),o=parseInt(640);$("#browse_history").hasClass("browse_history_wide")&&(n=Math.ceil(j.length/5),o=parseInt(784));var p=$("#br_curpage"),q=$("#br_pagecount");p.text(k),q.text(n),l.bind("click",function(){return c.is(":animated")?void 0:(1==k?(c.animate({left:"-="+o*(n-1)},500),k=n,p.text(n)):(c.animate({left:"+="+o},500),k--,p.text(k)),!1)}),m.bind("click",function(){return c.is(":animated")?void 0:(k==n?(c.animate({left:"0px"},500),k=1,p.text(k)):(c.animate({left:"-="+o},500),k++,p.text(k)),!1)})}else $(".slidearrow").hide(),b.html('<p style="text-align:center;margin-top:120px;">对不起，暂时没有数据！</p>')}try{$.getJSON(RM_SITE_MAIN_WEBBASEURL+"i/ajax/get_view_history?callback=?",null,function(a){var b=$("#browse_history .browse_list");if(a&&a.length){var c="";for(var d in a){var e=parseInt(a[d].product_reports_number)||0,f=parseInt(a[d].deal_comments_number)||0,g=e+f?e+f+"篇评价":"新品上市";c+='<div><a href="'+a[d].url+"?from=search_list_foot_history_null_pos"+d+'" title="'+a[d].short_name+'" target="_blank">',c+='<img src="'+a[d].image_60+'" class="pic" width="60" height="60" alt="'+a[d].short_name+'"/></a>',c+='<a href="'+a[d].url+"?from=search_list_foot_history_null_pos"+d+'" title="'+a[d].short_name+'" target="_blank" class="tit">',c+=a[d].short_name+'</a><span class="price">¥'+a[d].discounted_price+"</span>",c+='<span class="buycount">'+g+"</span></div>"}b.html(c)}else b.html('<p style="text-align:center;margin-top: 120px;">你最近没有浏览过聚美商品，<br>快去逛逛吧~</p>')})}catch(b){console.log("get_view_history ajax接口有问题在jumei.search.js1046行")}$.ajax({type:"get",url:"http://www.jumei.com/i/ajax/get_recommend_by_history?callback=?",dataType:"jsonp",success:function(b){a(b)},error:function(){}}),$("#browse_history").show()},final_buy:function(){Jumei.Core.global_ajax&&$(".head_pagecount span").html()>15&&$.ajax({type:"get",url:RM_SITE_MAIN_WEBBASEURL+"i/ajax/get_keyword_pro?callback=?&keyword="+$(".search_filter_top span").html()+"&num=5",dataType:"jsonp",success:function(a){if(a&&a.length){var b='<div class="products_wrap"><h2 class="lastbuy_title">搜索“'+$(".search_last_buy").attr("search")+'”的用户最终购买</h2><ul></ul><div class="clear"></div></div>';$(".search_last_buy").html(b);var c="",d=1,e="",f=0;for(var g in a)f=a[g].reports_number<5?"新品上线":a[g].reports_number+"篇评价",c+='<li class="formall item" pid="'+a[g].product_id+'"><a href="'+a[g].url+"?from=r_s_s_"+$(".search_last_buy").attr("search")+"_1-"+d+'" target="_blank" title="'+a[g].short_name+'"></a><div class="item_wrap"><div class="s_l_pic"><span class="sale_sign "></span><a href="'+a[g].url+"?from=r_s_s_"+$(".search_last_buy").attr("search")+"_1-"+d+'" target="_blank"><img alt="'+a[g].short_name+'" src="'+a[g].image+'" width="200" height="200"/></a></div><div class="s_l_name"><a href="'+a[g].url+"?from=r_s_s_"+$(".search_last_buy").attr("search")+"_1-"+d+'" target="_blank" >'+a[g].short_name+'</a><div class="saleinfos"></div></div><div class="search_list_price"><label>¥</label><span>'+a[g].mall_price+"&nbsp;</span><del>¥"+a[g].market_price+"</del>&nbsp;"+e+'</div><div class="buyerinfo"><span class="buyericon"></span><span>'+f+"</span></div></div></li>",d++;$(".search_last_buy .products_wrap ul").html(c)}else $(".search_last_buy").hide()}})},change_for_301:function(){RM_SERVER_TIME>1424361600&&1425398399>RM_SERVER_TIME&&$(".J_body_301").addClass("body_301")},async_qijiandian_rukou:function(){function a(a){a.store_url="http://"+a.store_url;var b='<div class="s_i_top_pic"><a href="@1@" target="_blank"><img alt="@2@" src="@3@" style="margin-left:-55px"></a></div><a href="@1@" target="_blank" class="s_i_into png"></a>',c=b.replace("@1@",a.store_url).replace("@2@",a.store_title).replace("@3@",a.store_logo_url).replace("@1@",a.store_url);$("#J_search_info").html(c)}var b=$("#search_keywords").html(),c=$("#brand_id").html();if(null!==b||null!==c){var d=RM_SITE_SEARCH_WEBBASEURL+"ajax_get_flagship_strom?"+(null!==c?"brand_id="+c:"")+(null!==b?"&search="+b:"");$.ajax({type:"get",url:d,dataType:"json",success:function(b){b&&1===b.status&&(a(b.data),$("#J_search_info").show())},error:function(){}})}}},function(){RM_DEBUG&&seajs.config({base:RM_STATIC_DOMINNAME+"ibar"}),seajs.use("ibar",function(){new Jumei.app.iBar;var count=0;$(".products_wrap").delegate(".btn_notice","click",function(){var a=$(this).parents("li"),b=$(this).parents(".item_wrap").find(".s_l_name a").attr("href");try{"function"==typeof setSearch.setBrowseValue&&setSearch.setBrowseValue(a,5,b)}catch(c){}}),$(".products_wrap ul li.item .btn_addcart").bind("click",function(){var pid=$(this).parents("li.item").attr("h_p_m_id"),href=$(this).parents("li.item").find(".s_l_pic a").attr("href"),that=$(this);type=$(this).parents("li.item").attr("product_type"),$.getJSON(RM_SITE_MAIN_WEBBASEURL+"i/Mall/getSkuByHashIdOrProductId?callback=?",{id:pid,type:type},function(data){var product=eval(data),sku=product.count;"0"==sku&&($(that).parent().parent().find(".time_countdown").remove(),$(that).parent().find(".btn_fav").before('<a target="_blank" class="btn_guang" title="加入购物车"></a>'),$(that).remove())})}),$(".products_wrap").delegate(".btn_addcart","click",function(e){var that=$(this),type=that.parent().parent().parent().parent().attr("product_type"),pid=that.parent().parent().parent().parent().attr("h_p_m_id"),animImg=that.parents(".item_wrap").find(".s_l_pic img")[0].src,$btnBox=that.parent("div.search_list_button"),$item=$btnBox.parents("li.item"),$select=$btnBox.find(".select_box p"),$link=$item.find(".s_l_pic a"),matches=$link[0].search.match(/from=([^&]+)/),from="",ajaxParam;matches&&(from=matches[1]+"_ac"),ajaxParam={elem:that,img:animImg,hashid:"",num:1,from:from,which_cart:"all"},("global_deal"==type||"deal"==type)&&(ajaxParam.hashid=pid),e.preventDefault(),$.getJSON(RM_SITE_MAIN_WEBBASEURL+"i/Mall/getSkuByHashIdOrProductId?callback=?",{id:pid,type:type},function(data){var product=eval(data),sku=product.count;if("1"==sku){var skus=[];for(var o in product)skus.push(product[o].sku_no);ajaxParam.sku=skus[0],Jumei.app.iBar.addCart(ajaxParam),Jumei.Core.ga_event("addtocart",RM_CONTROL+"_"+RM_ACTION,ajaxParam.sku);var li=$(that).parents("li"),p_url=$(that).parents(".item_wrap").find(".s_l_name a").attr("href");try{"function"==typeof setSearch.setBrowseValue&&setSearch.setBrowseValue(li,1,p_url)}catch(e){}}else if("0"==sku)$(that).attr("class","btn_notice");else{if(!$select.length){var options='<div class="select_box"><div count="0">';for(var o in product)"undefined"!=typeof product[o].sku_no&&(options+='<p value="'+product[o].sku_no+'">'+product[o].attribute+"</p>");options+="</div></div>",$btnBox.append(options),$select=$btnBox.find(".select_box p"),$select.bind("click",function(){var a=this.getAttribute("value");if($(that).parent().parent().parent().find(".btn_addcart").css({cursor:"pointer"}),a){ajaxParam.sku=a,ajaxParam.elem=$select[0],Jumei.app.iBar.addCart(ajaxParam),Jumei.Core.ga_event("addtocart",RM_CONTROL+"_"+RM_ACTION,a);var b=$(that).parents("li"),c=$(that).parents(".item_wrap").find(".s_l_name a").attr("href");try{"function"==typeof setSearch.setBrowseValue&&setSearch.setBrowseValue(b,1,c)}catch(d){}}})}$(that).parents("li.item").css("z-index","299"),$(that).parent().find("div").show(),$(that).parents("li.item").mouseleave(function(){$(this).find(".select_box div").hide(),$(that).css({"background-position":"0 0"}),$(that).parents("li.item").css("z-index","auto")}),$(that).parent().find("div").mouseleave(function(){$(this).hide(),$(that).css({"background-position":"0 0"}),$(that).parents("li.item").css("z-index","auto")}),$(that).css({"background-position":"0 -97px"}),$(that).parents(".item_wrap").hover(function(){$(that).find(".select_box").hide()})}})})})}(),$(function(){var a=document.documentElement.clientWidth<=960?!0:!1,b=$(".header");a&&b.removeClass("header_wide_lv2").addClass("header_wide_lv1")}),$(function(){if($(".s_i_top_pic img").length>0)switch($(".s_i_top_pic img").width()){case 1200:$(".s_i_top_pic img").css("marginLeft","-55px");break;case 960:$(".s_i_top_pic img").css("marginLeft","-120px")}});