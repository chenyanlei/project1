!function(a){"use strict";function b(a){return"[object Function]"===Object.prototype.toString.call(a)}if(!a.define){var c,d={},e=null,f=a.document.getElementsByTagName("script");for(c=0;c<f.length&&!e;c++)e=f[c].getAttribute("data-main");if(!e)throw new Error("No data-main attribute in script tag.");var g,h=function(a){var c={},e=d[a];if(b(d[a].factory)){var f=d[a].factory.apply(void 0,[g,c,void 0]);e.ret=void 0===f?c:f}else e.ret=d[a].factory;e.inited=!0};g=function(a){if(!d[a])throw new Error("Module "+a+" is not defined.");var b=d[a];return b.inited===!1&&h(a),b.ret};var i=function(a,c,f){if(d[a])throw new Error("Module "+a+" has been defined already.");b(c)&&(f=c),d[a]={factory:f,inited:!1},a===e&&h(a)};a.define=i}}(window),function(){function a(){l=new Date,jQuery.ajax({url:"http://c.jumei.com/time",dataType:"jsonp",type:"get",success:function(a){a&&"number"==typeof(1*a)&&l.setTime(1e3*a),b()},error:function(){b()}})}function b(){var a=$("body [data-adid]");a.each(function(a,b){c($(b).attr("data-adid"),$(b))})}function c(a,b){a&&(b||(b=$("[data-adid="+a+"]")),d(a,function(c){var d=g(a,b,c);d?b.empty().append(d):b.hide()}))}function d(a,b){var c=e(a);$.getScript(c,function(){seajs.use("ads/"+a,function(a){b&&b(a)})})}function e(a){var b=location.host||"";return b.match(/(jumeicd)|(jumeird)|(jmrd)|(jumeiglobalrd)|(localhost)|(test\.jumei)/)?"http://p"+m.get_current()+".jmstatic.com/dev_test/html_code_img/js/"+a+".js":"http://p"+m.get_current()+".jmstatic.com/html_code_img/js/"+a+".js"}function f(a){var b=l.getTime(),c=1e3*a.start_time,d=1e3*a.end_time;return c>b||b>d?!1:!0}function g(a,b,c){var d=$('<iframe src="about:blank" vspace="0" hspace="0" allowtransparency="true" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" style="border:0; vertical-align:bottom; margin:0; display:block;"></iframe>');return d.css({border:0,overflow:"hidden",width:b.width(),height:b.height()}),d.attr("id","ads_"+a),d.bind("load",function(){var a=function(){return d[0].contentWindow?$(d[0].contentWindow.document.body):void 0}();if(c.list&&c.list.length){for(var e=[],g=0;g<c.list.length;g++){var i,j,k=c.list[g],l=$(k.html);$.browser.msie&&1*$.browser.version<=8?l.each(function(a){"<theme>"==this.outerHTML.toLowerCase()&&(i=l[a+1].outerHTML),"<template>"==this.outerHTML.toLocaleLowerCase()&&(j=l[a+1].outerHTML)}):(i=l.closest("theme").html(),j=l.closest("template").html()),l.remove(),f(k)&&(e.length||e.push(i),e.push(j))}if(e.length){a.append(h()+"<div>"+e.join("")+"</div>"),c.after_init&&"function"==typeof c.after_init&&c.after_init.call(null,a,c);var m=a.height();if($.browser.msie&&1*$.browser.version<=7)try{var n=d[0].contentWindow.document.body.scrollHeight,o=d[0].contentWindow.document.documentElement.scrollHeight;m=Math.max(n,o)}catch(p){}d.css({height:m})}else b.hide()}else b.hide()}),d}function h(){return"<style>                    * {padding:0;margin:0;font-family:Tahoma, Geneva, sans-serif;font-size:12px;}                </style>"}if(window.seajs)a();else{var i="";if(!window.Zepto&&navigator.userAgent.match(/(android)|(iphone)|(ipad)/gi)&&(i="http://f0.jmstatic.com/static_lib/dist/20150601/mobile.min.js"),i=window.jQuery?"http://f0.jmstatic.com/static_lib/dist/20150601/sea.min.js":"http://f0.jmstatic.com/static_lib/dist/20150601/website.min.js"){var j=document.createElement("script");j.async=!0,j.type="text/javascript",j.charset="utf-8",j.src=i,document.body&&document.body.appendChild(j)}document.createElement("template"),document.createElement("theme");var k=setInterval(function(){window.seajs&&(window.jQuery||window.Zepto)&&(clearInterval(k),a())},50)}var l,m=function(){var a=function(){this.count=0};return a.prototype.get_current=function(){var a=this.count;return this.count=(this.count+1)%5,a},new a}()}();