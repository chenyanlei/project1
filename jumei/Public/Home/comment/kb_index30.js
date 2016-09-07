/*简易模板机制*/
(function($) {
    /**
     * 简易模板机制
     * @param {String} tmpl HTML模板
     * @param {Object} datas JSON模板数据
     * @param {String} em  临时参数，用于匹配二级菜单中需要重点突出的项
     * @param {String} hide  临时参数，用于匹配二级菜单中需要隐藏的项
     * @return {String} HTML
     */
    $.tmpl = function (datas, tmpl, em, hide){
        var html = "",
            hide = hide ? hide : '';
        $.each(datas, function(i, data){
            if(hide.indexOf(data['title']) < 0){
                html += tmpl.replace(/\{(\w+)\}/ig, function(i, name){
                    if(em && name === 'em'){
                        return (em.indexOf(data['title']) > -1 ? 'class="em"' : '');
                    }else{
                        return (name in data ? data[name] : i);
                    }
                });
            }
        });
        return html;
    };
    /**
     * 简易模板机制
     * @param {String} tmpl HTML模板
     * @param {Object} data JSON模板数据
     * @return {Object} jQuery对象
     */
    $.fn.tmpl = function (data, tmpl){
        return this.each(function(){
            var me = $(this);
            if(!tmpl){
                tmpl = me.data("tmpl") || (function(){
                    var html = me.html();
                    me.data("tmpl", html);
                    return html;
                })();
            }
            me.html($.tmpl(data, tmpl));
        });
    };
})(jQuery);

(function($){
    /**
     * 模板数据持久化，写入数据
     * @param {String} key 数据键
     * @param {Object} data 要储存的json字符串
     */
    var setDataCache = window.localStorage ? function(key, data) {
        if(data){
            localStorage.setItem(key, data);
        }
    } : $.noop;

    /**
     * 模板数据持久化，读出数据
     * @param {String} key 数据键
     * @param {function} call 要拿数据的函数
     */
    var getDataCache = window.localStorage ? function(key, call) {
        key = localStorage.getItem(key);
        if(key){
            try{
                call($.parseJSON(key).data);
                return true;
            }catch(ex){}
        }
    } : $.noop;

    //ajaxTmpl所需的数据缓存，不刷新页面时使用本缓存
    var tplDataCache = {};

    /**
     * 异步json获取,并调用自定义模板函数方法（缓存）
     * @param {String} url json的url地址
     * @param {Object} cont 需要模板方式填充的jQuery对象、选择器 Element
     * @param {Function} tplFn 回调函数，传入值为cont，如果返回html代码则自动填充cont
     */
    function ajaxTmpl(url, cont, tplFn){
        var data = tplDataCache[url];
        cont = $(cont);
        cont.data("ajaxJsonUrl", url);
        function fill(data){
            if(tplFn){
                cont.html(tplFn.call(cont, data));
            }else{
                cont.tmpl(data);
            }
            cont.removeClass("loading");
        }
        if(data){
            fill(data);
        } else {
            if(!getDataCache(url, fill)){
                cont.addClass("loading");
            }
            $.getJSON(url, function(json, s, obj){
                tplDataCache[url] = json.data;
                fill(tplDataCache[cont.data("ajaxJsonUrl")]);
                setDataCache(url, obj.responseText);
            });
        }
    };

    /**
     * 异步json获取,并调用自定义模板函数方法（缓存）
     * @param {String} url json的url地址
     * @param {Function} tplFn 回调函数，传入值为cont，如果返回html代码则自动填充cont
     * @return {Object} jQuery对象
     */
    $.fn.ajaxTmpl = function(url, tplFn){
        return this.each(function(){
            ajaxTmpl(url, this, tplFn);
        });
    };
})(jQuery);
/*!
 * jquery.scrollLoading.js
 * 图片/非图片滚动加载、懒加载，图片地址异常处理
 * 二次调用会直接加载图片和触发回调
 * by zhangxinxu  http://www.zhangxinxu.com
 * 2010-11-19 v1.0
 * 2012-01-13 v1.1 偏移值计算修改 position → offset
 * 2012-09-25 v1.2 增加滚动容器参数, 回调参数
 * 2013-05-10	对象或图片按需动态加载，为图片提供error时回调接口
 * @param {Object} options
 * options.attr
 * options.container {Object} 滚动条所在容器Element或jQuery对象或选择器，默认window
 * options.callback Element滚入视界时的回调，回调中this为Element
 * options.error 图片地址错误时回调，回调中this为Image
 * @return {Object} jQuery对象
 */
(function($) {
    //寄存错误的URL
    var urlErrs = {};

    //获取元素所在页面位置
    var getOffset = function(o){
        o = o.closest(":visible");
        if(o.length){
            return $.extend(o.offset(), {h: o.height()});
        }
    };

    //参数默认值声明
    var defaults = {
        attr: "data-url",
        container: $(window),
        callback: $.noop,
        error: function(){
            //onImgError为整站全局声明的图片异常处理
            onImgError(this);
        }
    };

    $.fn.scrollLoading = function(options) {
        var params = $.extend({}, defaults, options || {});
        params.cache = [];

        //触发回调函数
        var callback = function(call) {
            if ($.isFunction(params.callback)) {
                params.callback.call(call.get(0));
            }
        };

        //触发图片URL错误回调并记录URL
        var callerror = function(img, url) {
            if ($.isFunction(params.error)) {
                params.error.call(img.get(0));
            }
            if(url){
                urlErrs[url] = true;
            }
        };

        //检查图片url正确与否
        var waitImg = function(img, url){
            if(!url){
                url = img.attr("src");
                if(img.get(0).complete){
                    var newimg = new Image();
                    newimg.src = url;
                    if(!newimg.width){
                        callerror(img, url);
                    }
                    return;
                }
            }
            $(new Image()).error(function(){
                callerror(img, url);
            }).attr("src", url);
        };

        //动态显示数据
        var load = function(cache) {
            //查找视界位置
            var contHeight = params.container.height();
            if ($(window).get(0) === window) {
                contop = $(window).scrollTop();
            } else {
                contop = params.container.offset().top;
            }


            //检查元素是否在视界内
            $.each(cache, function(i, data) {
                var o = data.obj, tag = data.tag, url, post, posb, offset;
                if (o) {
                    url = o.attr(params["attr"]);
                    if(urlErrs[url]){
                        callerror(o);
                    } else if(offset = getOffset(o)){
                        post = offset.top - contop, posb = post + offset.h;
                        if ((post >= 0 && post < contHeight) || (posb > 0 && posb <= contHeight)) {
                            //在浏览器窗口内
                            data.obj = null;
                            if (tag === "img") {
                                if (url) {
                                    //图片，改变src
                                    o.attr("src", url);
                                    waitImg(o, url);
                                } else if(o.attr("src")){
                                    waitImg(o);
                                }
                            }else{
                                if (url) {
                                    o.load(url, {}, function() {
                                        callback(o);
                                    });
                                    return;
                                }
                            }
                            // 触发回调
                            callback(o);
                        }
                    }
                }
            });
        };

        var loading = function(){
            load(params.cache);
        };

        this.each(function() {
            var node = this.nodeName.toLowerCase();
            var me = $(this);

            //重组
            var data = {
                obj: me,
                tag: node
            };
            var loadFn = me.data("scrollLoading");
            if(loadFn){
                loadFn([data]);
            } else {
                me.data("scrollLoading", load);
                params.cache.push(data);
            }
        });

        //事件触发
        //加载完毕即执行
        if(params.cache.length){
            $(loading);
            //滚动执行
            params.container.bind("scroll resize", loading);
        }
        return this;
    };
})(jQuery);
/*
 * 图片轮循
 * @param {Object} opt
 * opt.play {Boolean} 是否自动播放
 * opt.pagin {Object} jQueryObj导航节点
 * opt.opt.playTime {Int} 切换时间间隔，毫秒
 * opt.opt.aniTime {Int} 动画时间，毫秒
 * opt.opt.aniFn {String} 动画样式“opacity”为渐隐或者“left”为横向滚动
 * @return {Object} jQuery对象
 */
(function($) {
    $.fn.jmslides = function(opt){
        opt = $.extend({play: 1}, opt);
        return this.each(function() {
            var me = $(this),
                index = 0,
                pagin = $(opt.pagin || "<ul>"),
                slides = me.children().not(pagin),
                pagins,
                direction = 1,//1 表示正向，0 表示逆向
                paginWidth = 0,
                timer;
            if(slides.length<2){
                return;
            }

            function loadimg(i){
                if($.fn.scrollLoading){
                    slides.eq(i || index).find("img").scrollLoading();
                }
            }

            function loop() {
                if(index >=slides.length){
                    index = 0;
                }else if(index < 0){
                    index = slides.length - 1;
                }
                loadimg(index);
                pagins.not(pagins.eq(index).addClass("curr").width(paginWidth)).removeClass("curr").removeAttr('style');
                var tager = slides.eq(index),
                    other = slides.not(tager),
                    aniFn = opt.aniFn || "opacity",
                    aniTime = opt.aniTime || "slow",
                    dftCss = {
                        opacity : "",
                        bottom : "",
                        zIndex: "",
                        right: "",
                        left: "",
                        top: ""
                    },
                    startCss = {left: {left: "100%"}, opacity: {opacity: 0}}[aniFn],
                    endCss = {left: {left: 0}, opacity: {opacity: 1}}[aniFn],
                    startOtherCss = {left: {left: 0}}[aniFn] || {};
                endOtherCss = {left: {left: "-100%"}}[aniFn] || {};
                tager.css({zIndex: 2}).css(startCss).animate(endCss, aniTime, function(){
                    tager.css({zIndex: 1});
                    other.css(dftCss);
                });
                other.css(startOtherCss).animate(endOtherCss, aniTime);
                if(direction){
                    index++;
                }else{
                    index = index - 1 < 0 ? (slides.length - 1) : (index - 1);
                }
                loadimg(index);
            }

            opt.prev && $(opt.prev).click(function(){
                index = direction ? index - 2 : index;
                direction = 0;
                loop();
            });
            opt.next && $(opt.next).click(function(){
                index = direction ? index : index + 2;
                direction = 1;
                loop();
            });

            function calWidth(){
                var len = pagin.children().length,
                    ulW = pagin.width(),
                    liW = pagin.children().not('.curr').eq(0).outerWidth(true);
                paginWidth = ulW - liW * (len - 1) - 21;
            }

            function start(){
                stop();
                if(opt.play){
                    timer = setInterval(loop, opt.playTime || 3000);
                }
                loadimg();
            }

            function switchHandle(e){
                if(!$(this).hasClass('curr')){
                    stop();
                    index = $(this).data("index");
                    start();
                    loop();
                }
            }

            function stop(){
                clearInterval(timer);
            }

            if(!opt.pagin){
                slides.each(function(i) {
                    $("<li>").data("index", i).appendTo(pagin);
                });
                me.append(pagin);
            }else{
                pagin.children().each(function(i){
                    $(this).data("index", i);
                });
            }
            me.hover(stop,start);
            calWidth();
            pagins = pagin.children();
            pagins.mouseenter(switchHandle);
            slides.eq(index).css({zIndex: 1});
            pagins.eq(index).addClass("curr").width(paginWidth);
            start();
            if(direction){
                index++;
            }else{
                index = slides.length - 1;
            }
            loadimg(index);
        });
    };
})(jQuery);

var kb_index = (function(){
    var delay = 200;

    function enableAccordion(){
        $('.recommend_accordion').on('mouseenter', 'li', function(){
            var $this = $(this);
            $this.closest('.accordion').find('.accordion_content').hide().closest('.hover').removeClass('hover');
            $this.addClass('hover').find('.accordion_content').show();
        });

        $.each($('.contribution_accordion'),function(key,accordion){
            accordion = $(accordion);
            var liItem = accordion.find("li");
            if(liItem.length){
                liItem.mouseenter(function(){
                    var $this = $(this),
                        from = $this.attr("tag");
                    $this.closest('.accordion').find('.accordion_content').hide().closest('.hover').removeClass('hover');
                    var conWrap = $this.addClass('hover').find('.accordion_content').show();
                    if(conWrap.hasClass('loading')){
                        $.getJSON($this.attr("data-url"),function(result){
                            if(result.data.report && result.data.report.length){
                                var _con = conWrap.find(".con"),_info = result.data.report[0];
                                _con.find(".new_share a").html(_info.product_short_name).attr("href","/product_reviews_"+_info.product_id+".html" + from);
                                _con.find(".ns_tit").html(_info.title).attr("href","/review_"+_info.report_id+".html" + from);
                                var _imgHtml = "";
                                if(result.data.photo && result.data.photo.length){
                                    $.each(result.data.photo,function(k,imgSrc){
                                        _imgHtml+="<img width='64' height='64' src='"+imgSrc+"'>";
                                    });

                                    _con.find(".ns_img").html('<a target="_blank" href="/review_'+ _info.report_id +'.html'+ from +'">' + _imgHtml + '</a>').find('img').scrollLoading();
                                }
                                _con.show();
                            }else{
                                conWrap.hide();
                            }
                            conWrap.removeClass('loading');
                        });
                    }
                });
                liItem.eq(0).trigger("mouseover");
            }
        });
    }

    function showMsg(){
        var timer,
            $user_msg =  $('.user_msg');
        $user_msg.on('mouseenter mouseleave', function(){
            var $this = $(this);
            $this.hasClass('msg_hover') ? $this.removeClass('msg_hover') && $this.find('.hover').removeClass('hover') : $this.addClass('msg_hover');
        }).on('mouseenter', 'li', function(){
            var $this = $(this);
            timer = setTimeout(function(){
                $this.addClass('hover').siblings('li').removeClass('hover');
            }, delay);
        }).on('mouseleave', 'li', function(){
            clearTimeout(timer);
        }).on('click', 'a', function(){
            $(this).find('span').remove();
            if(!$user_msg.find('span').length){
                $user_msg.removeClass('has_user_msg');
            }
        });
    }

    function showMenu(){
        var $menu = $(".col_left").find('.menu'),
            timer, 
            em = '乳液爽肤水洁面乳眼部精华防晒霜BB霜/CC霜隔离乳/霜唇彩/唇蜜润肤乳护肤霜/乳女士香水Q版香水彩妆工具护发美甲香氛清洁祛痘眼部造型美白防晒保湿补水美宝莲欧莱雅雅诗兰黛倩碧兰蔻阿芙佰草集芙优润比度克我的美丽日志美妆菲诗小铺姬芮资生堂',
            hide = '水洗面膜撕拉面膜基础精油单方精油复方精油药膏卸妆油卸妆液卸妆霜卸妆洁面彩妆套装粉底液遮瑕笔粉饼眉膏眼线膏/胶唇线笔身体护理套装媒体美胸体膜/按摩霜牙刷牙膏/牙粉干洗喷雾颈膜' +
        '卫生用品情趣用品其他护理用品美发造型其他美容工具瘦腿蓬松防冻裂去头屑温和嫩肤改善肤质杀菌修饰防护斯佳唯婷雅芳波斯顿CYCLAX阿迪达斯高田贤三美体小铺圣罗兰三宅一生古琦' +
        '爱这茶语安美拉汤臣倍健薇风浪莎康比特聚美优品兰缪养生堂足倍健朵而诺曼诺兰凤凰涅槃FANCY CHIC朵牧圣马可珂珂肌言堂同仁堂舒友阁柏卡姿美塑飞兰蔻韩都衣舍玛萨玛索阿札宝菲尔麦琪杰西简音乐盒蓝色多瑙河自然堂宝易购那沃七格格婷美力士茶颜魅可自然晨露魔法森林SKIN79欧薇丝柯莉UTU珊娜芳柯JUJU娜丽丝奇士美';
        $('.pro_nav').on('mouseenter', 'li', function(){
            var $this = $(this);
            timer = setTimeout(function(){
                var isLoad = $this.find('.menu').length,
                    i_menu = isLoad ? $this.find('.menu') : $menu.html('').prependTo($this);
                $this.addClass('hover');
                if(!isLoad){
                    var h4 = $this.find('h4'),
                        top = -$this.position().top + 'px',
                        track = h4.attr("track-tag");

                    i_menu.ajaxTmpl(h4.attr("data-url"), function(json){
                        var html = "";
                        for(var i in json) {
                            html += "<dl>";
                            html += "<dt>" + i + "</dt>";
                            html += "<dd>" + $.tmpl(json[i], '<a {em} href="/products_{url}.html' + track + '" target="_blank">{title}</a>', em, hide) + "</dd>";
                            html += "</dl>";
                        }
                        return html;
                    });

                    i_menu.css('top', top).show();
                }else{
                    i_menu.show();
                }
            }, delay);
        }).on('mouseleave', 'li', function(){
            clearTimeout(timer);
            $(this).removeClass('hover').find('.menu').hide();
        });
    }

    function enableHover(){
        if(!("XMLHttpRequest" in window)){
            $(".activity_top a, .show_right a, .avatar a, .show_left a").on('mouseover', function(){
                $(this).addClass("ie6hover").find('.opacity_tit').width($(this).width());
            }).on('mouseout', function(){
                $(this).removeClass("ie6hover").find('.opacity_tit').width(0);
            });

            $('.opacity_tit').hover(function(){
                $(this).addClass('opacity_tit_hover');
            }, function(){
                $(this).removeClass('opacity_tit_hover');
            });
        }
    }

    function enableTabs(){
        function enableTabsSlider(){
            var $wrapper = $('.best_inner');
            $('.products_wrapper', $wrapper).jcarousel();
            $('.prev', $wrapper)
                .on('jcarouselcontrol:active', function() {
                    $(this).removeClass('inactive');
                })
                .on('jcarouselcontrol:inactive', function() {
                    $(this).addClass('inactive');
                })
                .jcarouselControl({target: '-=5'});
            $('.next', $wrapper)
                .on('jcarouselcontrol:active', function() {
                    $(this).removeClass('inactive');
                })
                .on('jcarouselcontrol:inactive', function() {
                    $(this).addClass('inactive');
                })
                .jcarouselControl({target: '+=5'});
        }

        function beautyTpl(json){
            var from = this.closest('.best_inner').find('.curr_tab').attr('tag'),
                tpl = '<li>' +
                        '<a href="/product_reviews_{pid}.html{from}" target="_blank" rel="nofollow">' +
                            '<img src="{image}" width="170" height="170">' +
                            '<p class="products_name">{name}</p>' +
                        '</a>' +
                        '<div class="products_kb clearfix">' +
                            '<a class="avatar_img fl" target="_blank" href="/user/{uid}{from}" rel="nofollow"><img src="{photo}" width="35" height="35"></a>' +
                            '<a class="pkb_tit fl" target="_blank" href="/review_{report_id}.html{from}" rel="nofollow">{title}</a>' +
                        '</div>' +
                      '</li>';
            $.each(json.products, function(i, v){
                v.from = from + (i + 1);
            });
            this.find(".best_products").tmpl(json.products, tpl);
            this.find("img").scrollLoading({
                error: function(){
                    onImgError(this, 0, $(this).is(".avatar_img img"));
                }
            });
            this.data('jcarousel') ? this.jcarousel('reload').jcarousel('scroll', 0, false) : enableTabsSlider();
        }

        $('.best_tabs').on('mouseenter', 'li', function(){
            var tab = $(this);
            tab.addClass('curr_tab').siblings('li').removeClass('curr_tab');
            tab.closest('.best_inner').find('.products_wrapper').ajaxTmpl(tab.data("href"), beautyTpl);
        }).find('.curr_tab').mouseenter();
    }

    function enableRecommendSlider(){
        /*var $wrapper = $('.rc_wrapper'),
            $tit = $('.recommend_tit', $wrapper);
        $('.recommend_carousel', $wrapper)
            .on('jcarousel:create', function(event, carousel){
                var $this = $(this);
                $this.find('ul').prepend($this.find('li').last());
            })
            .jcarousel({wrap: 'circular', center: true})
            .on('jcarousel:targetin', 'li', function(event, carousel){
                var $this = $(this);
                $this.addClass('curr_recommend');
                $tit.find('a').attr('href', $this.data('href')).text($this.data('title'));
            })
            .on('jcarousel:targetout', 'li', function(event, carousel){
                $(this).removeClass('curr_recommend');
            });

        $('.prev', $wrapper).jcarouselControl({target: '-=1'});
        $('.next', $wrapper).jcarouselControl({target: '+=1'}).click();*/

        var wrap = $(".rc_wrapper"),
            moveWrap = wrap.find("ul"),
            w = wrap.width(),
            liItems = moveWrap.find("li"),
            itemW = liItems.eq(0).outerWidth(true),
            splitW = ( w-itemW)/ 2,
            dLeft = itemW - splitW,
            recommend_tit = $(".recommend_tit a");

        var moveSpeed = 400;

        liItems.eq(1).find(".opacity").show();
        liItems.last().prependTo(moveWrap);
        moveWrap.css("left",-dLeft);

        var animateIng = false;
        wrap.find('.next').click(function(){ //向左边滑动
            if(animateIng){return;}animateIng = true;
            var showItem = moveWrap.find("li:eq(2)");
            recommend_tit.html(showItem.attr("data-title")).attr("href",showItem.attr("data-href"));

            moveWrap.find("li:eq(1) .opacity").show();
            showItem.find(".opacity").hide();
            moveWrap.animate({
                left: -dLeft-itemW
            }, moveSpeed,function(){
                moveWrap.css("left",-dLeft).find("li:first").appendTo(moveWrap);
                animateIng = false;
            });
        });
        wrap.find('.prev').click(function(){//向右边边滑动
            if(animateIng){return;}animateIng = true;
            moveWrap.css("left",-dLeft-itemW).find("li:last").prependTo(moveWrap);

            var showItem = moveWrap.find("li:eq(1)");
            recommend_tit.html(showItem.attr("data-title")).attr("href",showItem.attr("data-href"));
            moveWrap.find("li:eq(2) .opacity").show();
            showItem.find(".opacity").hide();

            moveWrap.animate({
                left: -dLeft
            }, moveSpeed,function(){
                animateIng = false;
            });
        });

    }

    function reportMasonry(){
        var from = $('.look_wrapper').attr('tag');
        /*API SETTING VAR*/
        var pageSize = 90;
        var pageLoadCount = 3;

        /*center content instance*/
        var i = 0;
        /*计算 TAB被执行的次数*/
        var itemListWrap = $("#reportMasonry"),isInitMasonry;
        /*列表BOX*/
        var conLoading = $("#con_loading");
        /*加载中*/

        /*传统分页+滚动分页联合参数*/
        var page = 1, pageStart, pageTotal, pageLimit = pageSize / pageLoadCount, scrollLoaded = false/*加载完数据，新的滚动事件加载数据才执行*/;
        var category_id,brand_id,function_id,report_type;
        /*加新内容 该函数不执行清空内容操作*/
        var addContent = function () {
            var url = '/Report/ReportIndex?_ajax_=List&from=index' + '&limit=' + pageLimit + '&start=' + pageStart;
            if(category_id){
                url+=('&category='+category_id);
            }
            if(brand_id){
                url+=('&brand='+brand_id);
            }
            if(function_id){
                url+=('&function='+function_id);
            }
            if(report_type){
                url+=('&report_type='+report_type);
            }
            conLoading.show();

            $.getJSON(url, function (data) {
                if (data.error == 0) {
                    conLoading.hide();
                    if (!data.list.length && !pageStart) {
                        /*第一页第一次加载 数据为空*/
                        //itemListWrap.height(200);
                        //itemListWrap.html('<div class="null_info w960" /></div>');
                    } else {
                        for(var key in data.list){
                            var item = data.list[key];
                            data.list[key].height = Math.floor(224/item.width*item.height);
                            data.list[key].width = 224;
                            data.list[key].url += from;
                            data.list[key].home_url += from;
                            data.list[key].product_url += from;
                            data.list[key].report_list_url += from;
                        }
                        if(!isInitMasonry){
                            /*instance 瀑布流*/
                            itemListWrap.masonry({itemSelector:'.rp_item_warp', columnWidth:236, isAnimated:false, isFitWidth:false});
                            isInitMasonry = true;
                        }
                        var htmlContent = template.render('conTemp', data);
                        var content = $($.trim(htmlContent));
                        content.appendTo(itemListWrap);
                        content.find('.useful_btn').usefulBtn();
                        itemListWrap.masonry("reload");
                    }
                    pageTotal = data.total;
                    if (pageStart + pageLimit >= pageTotal) {
                        $("#pageSplit").show();
                        //globalPage.refactoringPage(page, Math.ceil(pageTotal / pageSize));
                    }
                } else {
                    $.tipCommon(data.msg || '网络错误', 'error', 1500);
                }
                scrollLoaded = true;
            });
        };

        /*刷新列表内容*/
        var refreshContent = function () {
            scrollLoaded = false;
            $("#pageSplit").hide();
            //$(globalPage.opts.pageWrap).hide();
            itemListWrap.find(".rp_item_warp:not(:first)").remove();
            itemListWrap.height(itemListWrap.find(".rp_item_warp:eq(0)").height());
            addContent();
        };

        /*添加滚动分页内容*/
        var addScrollContent = function () {
            scrollLoaded = false;
            pageStart += pageLimit;
            if ((pageStart + pageLimit) > (page * pageSize) && (pageTotal / pageSize) > 1) {
                $("#pageSplit").show();
                //.refactoringPage(page, Math.ceil(pageTotal / pageSize));
                return;
            } else if (pageStart < pageTotal) {
                addContent();
            }
        };
        var onPageChange = function (curPage) {
            page = curPage;
            pageStart = (page - 1) * pageSize;
            refreshContent();
        };
        /*下面开始整业务的初始化操作*/

        /*init page*/
        //globalPage.initPage({'infoTotal':0, 'initUpdate':false, 'callback':onPageChange, 'curPage':0});

        /*滚动条分页事件*/
        var el = $(window);
        el.bind('scroll', function () {
            if (scrollLoaded) {
                if (el.scrollTop() + ($("#footer,#footer_container").height() || 70) - 50 >= $(document).height() - el.height()) {
                    addScrollContent();
                }
            }
        });
        var kb_nav = itemListWrap.find(".kb_nav a");
        kb_nav.click(function(e){
            kb_nav.removeClass("curr_kb");
            brand_id = $(this).addClass("curr_kb").attr("brand_id");
            category_id = $(this).addClass("curr_kb").attr("category_id");
            function_id = $(this).addClass("curr_kb").attr("function_id");
            report_type = $(this).addClass("curr_kb").attr("report_type");
            onPageChange(1);
            return false;
        });
        onPageChange(1);
    }

    function enableOpacity(){
        $('.show_right').on('mouseenter', 'a', function(){
            var $this = $(this);
            $this.find('.opacity').fadeOut(100);
            $this.siblings('a').find('.opacity').fadeIn(100);
        }).on('mouseleave', function(){
            $(this).find('.opacity').fadeOut(100);
        });

        $('.activity_top').find('.opacity_tit').find('span').hover(function(){
            $(this).addClass('hover');
        }, function(){
            $(this).removeClass('hover');
        });
    }

    return {
        init: function(){
            //手风琴效果
            enableAccordion();
            //导航二级菜单
            showMenu();
            //个人消息展开与隐藏
            showMsg();
            //使 IE6 支持 hover
            enableHover();
            //热门商品 tabs 切换
            enableTabs();
            //头部的轮播
            $(".slides").jmslides({pagin: '.pagin'});
            //小美推荐的轮播
            enableRecommendSlider();
            //图片延迟加载
            $('.recommend_carousel img, .accordion_content img, .avatar_img img, .reg_user img').scrollLoading({
                error: function(){
                    onImgError(this, 0, $(this).is(".avatar_img img, .reg_user img"));
                }
            });
            //达人秀场opacity
            enableOpacity();
            reportMasonry();
            $(".sr_wrapper ul img").layerTips();
        }
    };
})();

$(function(){
    kb_index.init();
});