//文本区域自动扩展
jQuery.fn.TextAreaExpander = function (minHeight, maxHeight) {
    // 初始化 return 确保返回当前目标项
    return this.each(function () {
        // 判断是否为文本域 textarea
        if (this.nodeName.toLowerCase() != 'textarea') return;
        // 重置 padding-top 与 padding-bottom
        //$(this).css('padding-top', 0).css('padding-bottom', 0);
        // 初始载入便调整
        ResizeTextarea(this);
        // 绑定事件
        var eventType = document.all ? 'propertychange' : 'input';
        $(this).bind(eventType, ResizeTextarea);
    });
    // 调整方法
    function ResizeTextarea(e) {
        e = e.target || e;
        if (!document.all) e.style.height = '0px';
        var h = Math.max(minHeight || 0, Math.min(e.scrollHeight, maxHeight || 99999)); // 限定高度范围
        e.style.overflow = (e.scrollHeight > h) ? 'auto' : 'hidden'; // 超过限定高度，出现滚动条
        e.style.height = h + 'px';
    }
};


/*
 * jQuery插件-自动隐藏层
 * 描述：当鼠标点击指定容器外时，隐藏指定的容器
 * 用法：
 * $("#div1").autoHide(); //点击id为 div1 的容器外，隐藏div1
 * $("#div2").autoHide('a','b','c'); //点击id为 div2、a 、b、c 的容器 外，隐藏div2
 */
$.fn.extend({
    autoHide:function () {
        var thisObj = this;
        var div_hide_ids = arguments;

        function autoHideObj() {
            thisObj.fadeOut(100);
        }

        $(document).bind("mousedown", function (e) {
            var ids = div_hide_ids;
            var ids_len = ids.length;
            var obj = thisObj;
            var objPos = obj.offset();
            var objHeight = obj.height();
            var objWidth = obj.width();

            var objOther;
            var objPosOther;
            var objHeightOther;
            var objWidthOther;

            e = e || window.event;
            var x = e.pageX || (e.clientX +
                (document.documentElement.scrollLeft
                    || document.body.scrollLeft));
            var y = e.pageY || (e.clientY +
                (document.documentElement.scrollTop
                    || document.body.scrollTop));
            if ((x > objPos.left && x < objPos.left + objWidth && y > objPos.top && y < objPos.top + objHeight)) {
                return true;
            }
            for (var i = 0; i < ids_len; i++) {
                objOther = $("#" + ids[i]);
                if (objOther.length) {
                    objPosOther = objOther.offset();
                    objHeightOther = objOther.height();
                    objWidthOther = objOther.width();
                    if (objOther.css('display') != 'none' && (x > objPosOther.left && x < objPosOther.left + objWidthOther && y > objPosOther.top && y < objPosOther.top + objHeightOther)) {
                        return true;
                    }
                }
            }
            autoHideObj();
            return true;
        });
    }
});

function parseTreeChkValue(treePanelId) {
    var s = "";
    var nodes = $(treePanelId).tree('getChecked');
    for (var i = 0; i < nodes.length; i++) {
        if($("span[class='tree-checkbox checkbox-uncheck tree-checkbox1']",nodes[i].target).length == 0)
            s += nodes[i].id + ",";
    }
    return  s.substr(0, s.length - 1);
}

function parseTreeCheckedNames(treePanelId) {
    var s = "";
    var nodes = $(treePanelId).tree('getChecked');
    for (var i = 0; i < nodes.length; i++) {
        if($("span[class='tree-checkbox checkbox-uncheck tree-checkbox1']",nodes[i].target).length == 0)
            s += nodes[i].text + ",";
    }
    return  s.substr(0, s.length - 1);
}


function checkAllTree(treePanelId, checked) {
    checkUncheckWholeTree($(treePanelId), checked);
}

var PerfTimer = function(name) {
    this.name = name;
    this.totalTime = 0;
}

PerfTimer.prototype.start = function() {
    this.startTime = Date.now();
}

PerfTimer.prototype.stop = function() {
    this.totalTime += (Date.now() - this.startTime);
}

PerfTimer.prototype.tell = function(msg) {
    console.log("" + msg + ": " + (this.totalTime) + " milliseconds.");
}

function checkUncheckWholeTreeImpl(treeObj, op, nodes) {
    console.log("checkUncheckWholeTreeImpl called.")


    var clos = function() {
        var count = 0;
        comboTreeOnCheckHandler.skipHandler = true;
        while (count < 5 && nodes.length > 0) {
            var thisNode = nodes.shift();
            treeObj.tree(op, thisNode);
            ++count;
        }
        comboTreeOnCheckHandler.skipHandler = false;
        //console.log("checkUncheckWholeTreeImpl.clos(): len of nodes: " + nodes.length);
        if (nodes.length != 0) {
            setTimeout(clos, 1);
        }
    }

    clos();
}

function checkUncheckWholeTree(treeObj, checked, node) {
    console.log("checkUncheckWholeTree executed.")
    var pt = new PerfTimer("checkUnCheckWholeTree");
    pt.start();
    comboTreeOnCheckHandler.skipHandler = true;
    var roots = treeObj.tree('getRoots');
    var nodesArr = [];
    for (var i = 0; i < roots.length; i++) {
        if (node != undefined && node.id != roots[i].id) {
            continue;
        }
        //treeObj.tree(checked ? 'check' : 'uncheck', roots[i].target);
        nodesArr.push(roots[i].target);
        var nodes = treeObj.tree('getChildren', roots[i].target);
        for (var j = 0; j < nodes.length; j++) {
            //treeObj.tree(checked ? 'check' : 'uncheck', nodes[j].target);
            nodesArr.push(nodes[j].target);
        }
    }
    var op = checked ? 'check' : 'uncheck';
    checkUncheckWholeTreeImpl(treeObj, op, nodesArr);
    comboTreeOnCheckHandler.skipHandler = false;
    pt.stop();
    pt.tell("checkUncheckWholeTree");
}

function changeRootCheckedState(treeObj, makeItChecked) {
    var roots = treeObj.tree('getRoots');
    if (makeItChecked) {
        treeObj.tree('check', roots[0].target);
    }
    else {
        treeObj.tree('uncheck', roots[0].target);
    }
}

function otherOptionCheckedStateChanged(treeObj, checked) {
    if (checked) {
        var checkedNodes = treeObj.tree('getChecked');
        var allNodes = treeObj.tree('getChildren', $(this).target);
        var allChildrenChecked = (allNodes.length - 1 == checkedNodes.length);
        if (allChildrenChecked) {
            changeRootCheckedState(treeObj, true);
        }
    }
    else {
        // 任何其他选项被取消，同时取消“全选”节点的勾选状态
        changeRootCheckedState(treeObj, false)
    }
}

function comboTreeOnCheckHandler(node, checked) {
    if (comboTreeOnCheckHandler.skipHandler) {
        console.log("onCheckHandler: skipped.");
        return;
    }

    comboTreeOnCheckHandler.skipHandler = true;
    console.log("onCheckHandler: executed.");
    if (node.id == "-1") {
        // 用户改变了“全选”节点的勾选状态
        checkUncheckWholeTree($(this), checked);
    }
    else {
        checkSubTree($(this),node, checked);
    }
    comboTreeOnCheckHandler.skipHandler = false;
}
function  checkSubTree(tree,treeObj, checked) {

    if (checked) {
        var allNodes = tree.tree('getChildren', treeObj.target);
        for(var i=0;i<allNodes.length;i++){
            tree.tree('check', allNodes[i].target)
        }

    }

}
function checkNumber(event) {
    if (!$.browser.mozilla) {
        if (event.keyCode && (event.keyCode < 48 || event.keyCode > 57) && event.keyCode != 46) {
            // ie6,7,8,opera,chrome管用
            event.preventDefault();
        }
    } else {
        if (event.charCode && (event.charCode < 48 || event.charCode > 57) && event.keyCode != 46) {
            // firefox管用
            event.preventDefault();
        }
    }
}
function validateNumber(elem) {
    var input = $(elem);
    var v = $.trim(input.val());
    //alert("输入值：" + v);
    var reg = new RegExp("^[0-9]+(.[0-9]{2})?$", "g");
    if (!reg.test(v)) {
        input.val("")
    }
}

//根据uri和参数名得到值，例如从"?a=1&b=2&c=3"中取出a的值
function getParameterByName(name, uri) {
    var match = RegExp('[?&]' + name + '=([^&]*)').exec(uri);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
}

// 终端冒泡，防止触发父标签的事件
function interruptBubble(e) {
    if (e && e.stopPropagation)
        e.stopPropagation();
    else
        window.event.cancelBubble = true;
}

jQuery.validator.addMethod("phone", function (value, element, param) {
    var reg = new RegExp("^\\+[0-9]{1,4}\\([0-9]{3,4}\\)[0-9]{6,8}(\\-?[0-9]{1,5})?$", "g");
    return this.optional(element) || reg.test(value);
}, "号码格式错误！");

jQuery.validator.addMethod("mobile", function (value, element) {
    var reg = new RegExp("^[0-9]{11}$", "g");
    return this.optional(element) || reg.test(value);
}, "号码格式错误!");

jQuery.validator.addMethod("positiveinteger", function (value, element) {
    if (value == "")
        return true;
    var aint = parseInt(value);
    return aint >= 0 && (aint + "") == value;
}, "该项只能为大于等于0的整数！");

jQuery.validator.addMethod("greaterzerointeger", function (value, element) {
    if (value == "")
        return true;
    var aint = parseInt(value);
    return aint > 0 && (aint + "") == value;
}, "该项只能为大于0的整数！");

jQuery.validator.addMethod("requiredWithDefault", function (value, element) {
    if ($(element).attr("defaultText") != undefined) {
        if (value == $(element).attr("defaultText")) {
            value = ""
        }
    }
    return value != "";
}, "不可以为空！");

jQuery.validator.addMethod("positivenumber", function (value, element) {
    if (value == "")
        return true;
    var aint = parseFloat(value);
    return aint >= 0;
}, "不可为负数");

// 内容位数字时，必须大于0的校验（和数据校验同时使用）
jQuery.validator.addMethod("greaterZero", function (value, element) {
    if (value == "")
        return true;
    var aint = parseFloat(value);
    return aint > 0;
}, "该项数字必须大于0！");

jQuery.validator.addMethod("towPointNumber", function (value, element) {
    var reg = new RegExp("^[0-9]+(.[0-9]{1,2})?$", "g");
    return reg.test(value);
}, "该项只能为数字且最多两位小数");

// 不可以为空，内容只能位数字（可以为负数），且最多两位小数校验
jQuery.validator.addMethod("towPointNumberCanNeg", function (value, element) {
    var reg = new RegExp("^\-?[0-9]+(.[0-9]{1,2})?$", "g");
    return reg.test(value);
}, "该项只能为数字且最多两位小数");

// 可以为空，但内容只能为数字（不可为负数），且最多两位小数的校验
jQuery.validator.addMethod("blankOrTowPointNumber", function (value, element) {
    if (value == null || value == "")
        return true
    else {
        var reg = new RegExp("^[0-9]+(.[0-9]{1,2})?$", "g");
        return reg.test(value);
    }
}, "该项只能为数字且最多两位小数");

// 校验邮箱后缀为指定值
jQuery.validator.addMethod("emailSuffix", function (value, element, targetSuffix) {
    if(targetSuffix == "") {
        return true;
    } else {
        if (value.indexOf(targetSuffix)>=0 && value.substring(value.indexOf(targetSuffix))==targetSuffix) {
            return true;
        } else {
            return false;
        }
    }
}, "请使用指定后缀的邮箱！");
//有结束流程权限，不需要校验
jQuery.validator.addMethod("hasInterruptPerm", function (value, element, endId) {
    var endRemark = $("#"+endId).val();

    if(endRemark != "") {
        return true;
    } else {
        if(value!=''){
            return true
        }
        return false
    }
}, "下一个办理人不能为空！");

//String 转Date
function parseDate(obj) {
    var startDate = $(obj).val();
    if (null != startDate && undefined != startDate && "" != startDate) {
        var dates = startDate.split("-");
        if (null != dates && dates.length == 2) {
            return new Date(dates[0], dates[1] - 1, 1, 0, 0, 0);
        }
        if (null != dates && dates.length > 2) {
            return new Date(dates[0], dates[1] - 1, dates[2], 0, 0, 0);
        }
    }
    return new Date();
}
//加入进度条
function createProgresser(mainEL) {
    var lay = $(" <div id='progressLayPanel' style='position: absolute; text-align: center;vertical-align: middle;background-color: #12141e;opacity: 0.1;filter:alpha(opacity=10);z-index:9999'></div>");
//                lay.html($("#tabLoading").html())
    lay.innerHeight($(mainEL).innerHeight() == 0 ? 500 : $(mainEL).innerHeight());
//                lay.css("innerHeight",$(o.mainEL).height()+"px");
    lay.width($(mainEL).innerWidth());
    var progressLoding = $($("#tabLoading").html());
    progressLoding.attr("id", "progressLodingPanel")
    progressLoding.innerHeight($(mainEL).innerHeight());
    progressLoding.width($(mainEL).innerWidth());
    progressLoding.css('padding-top', $(mainEL).height() / 2 - $(mainEL).height() / 3);
    progressLoding.css('z-index', '9999');
    $(mainEL).prepend(lay);
    $(mainEL).prepend(progressLoding);
}

function removeProgresser(mainEL) {
    $(mainEL).find("#progressLodingPanel").remove();
    $(mainEL).find("#progressLayPanel").remove();

}
JSON.stringify = JSON.stringify || function (obj) {
    var t = typeof (obj);
    if (t != "object" || obj === null) {
        // simple data type
        if (t == "string") obj = '"' + obj + '"';
        return String(obj);
    }
    else {
        // recurse array or object
        var n, v, json = [], arr = (obj && obj.constructor == Array);
        for (n in obj) {
            v = obj[n];
            t = typeof(v);
            if (t == "string") v = '"' + v + '"';
            else if (t == "object" && v !== null) v = JSON.stringify(v);
            json.push((arr ? "" : '"' + n + '":') + String(v));
        }
        return (arr ? "[" : "{") + String(json) + (arr ? "]" : "}");
    }
};
function bjtab_h() {
    alert(document.body.clientHeight - 140 + "px");
    document.getElementById("bjtab_h").style.height = document.body.clientHeight - 140 + "px";
}

/**
 * 遍历选择树节点的checkbox
 * @param uids
 * @param treePanel
 */
function initBDTreeChkValue(uids, treePanel) {
    initBDTreeChkValue_impl(uids, $(treePanel));
}


function initBDTreeChkValue_impl(uids, treeElem) {
    uids = uids.split(",")
    var roots = treeElem.tree('getRoots');
    for (var i = 0; i < roots.length; i++) {
        treeElem.tree('uncheck', roots[i].target);
        var nodes = treeElem.tree('getChildren', roots[i].target);
        for (var j = 0; j < nodes.length; j++) {
            treeElem.tree('uncheck', nodes[j].target);
        }
    }

    var checkNodesFun = function() {
        $.each(uids, function (i, v) {
            var node = treeElem.tree('find', v);
            if (node != undefined) {
                treeElem.tree('check', node.target);
            }
        });
    }

    setTimeout(checkNodesFun, 500);
}

//jquery ui combox
(function ($) {
    $.widget("ui.comboboo", {
        options:{
            red:255,
            green:0,
            blue:0,

            // callbacks
            change:null,
            random:null,
            afterChange:null,
            keydownEvent:null
        },
        _create:function () {
            var input,
                self = this,
                select = this.element.hide(),
                selected = select.children(":selected"),
                value = selected.val() ? selected.text() : "",
                wrapper = $("<span>")
                    .addClass("ui-combobox")
                    .insertAfter(select);
            input = $("<input>")
                .attr('name', select.attr('name'))
                .attr('maxlength', select.attr('maxlength'))
                .appendTo(wrapper)
                .val(value)
                .addClass(select.attr('class'))
                .attr('style', select.attr('style'))
                .autocomplete({
                    delay:0,
                    minLength:0,
                    source:function (request, response) {
                        var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
                        response(select.children("option").map(function () {
                            var text = $(this).text();
                            if (this.value && ( !request.term || matcher.test(text) ))
                                return {
                                    label:text.replace(
                                        new RegExp(
                                            "(?![^&;]+;)(?!<[^<>]*)(" +
                                                $.ui.autocomplete.escapeRegex(request.term) +
                                                ")(?![^<>]*>)(?![^&;]+;)", "gi"
                                        ), "<strong>$1</strong>"),
                                    value:text,
                                    option:this
                                };
                        }));
                    },
                    select:function (event, ui) {

                        ui.item.option.selected = true;
                        self._trigger("selected", event, {
                            item:ui.item.option
                        });
                        if (self.options.afterChange != undefined) {
                            self.options.afterChange.call();
                        }

                    },
                    change:function (event, ui) {
                        if (!ui.item) {
                            var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex($(this).val()) + "$", "i"),
                                valid = false;
                            select.children("option").each(function () {
                                if ($(this).text().match(matcher)) {
                                    this.selected = valid = true;
                                    return false;
                                }
                            });
//								if ( !valid ) {
//									// remove invalid value, as it didn't match anything
//									$( this ).val( "" );
//									select.val( "" );
//									input.data( "autocomplete" ).term = "";
//									return false;
//								}
                        }
                        //select.change();

                        if (self.options.afterChange != undefined) {
                            self.options.afterChange.call();
                        }
                    }
                })
            select.removeAttr('name');
            //.addClass( "ui-widget ui-widget-content ui-corner-left" );
            input.show();
            input.data("autocomplete")._renderItem = function (ul, item) {
                return $("<li></li>")
                    .data("item.autocomplete", item)
                    .append("<a>" + item.label + "</a>")
                    .appendTo(ul);
            };
            input.keydown(function (event) {
                if (self.options.keydownEvent != undefined && event.keyCode == 13) {
                    self.options.keydownEvent.call()
                }

            })
            $("<a>")
                .attr("tabIndex", -1)
                .attr("title", "Show All Items")
                .appendTo(wrapper)
                .button({
                    icons:{
                        primary:"ui-icon-triangle-1-s"
                    },
                    text:false
                })
                .removeClass("ui-corner-all")
                .addClass("ui-corner-right ui-button-icon")
                .click(function () {
                    // close if already visible
                    if (input.autocomplete("widget").is(":visible")) {
                        input.autocomplete("close");
                        return;
                    }

                    // work around a bug (likely same cause as #5265)
                    $(this).blur();

                    // pass empty string as value to search for, displaying all results
                    input.autocomplete("search", "");
                    input.focus();
                });
        },

        destroy:function () {
            this.wrapper.remove();
            this.element.show();
            $.Widget.prototype.destroy.call(this);
        }
    });
})(jQuery);

function highlightOnLoad(contentId, searchString) {
    // Starting node, parent to all nodes you want to search
    var textContainerNode = document.getElementById(contentId);
    // Informational message for search
    var searchInfo = 'Search Results for: ';
    // Split search terms on '|' and iterate over resulting array
    var searchTerms = searchString.split(/\s+|\||,|[\sAND\s]|[\sOR\s]|\(|\)/);
    for (var i in searchTerms) {
//        // The regex is the secret, it prevents text within tag declarations to be affected
         searchTerms[i] = searchTerms[i].replace(/\u002B/g, "\\u002B");      //+
         searchTerms[i] = searchTerms[i].replace(/\u002D/g, "\\u002D");     //-
         searchTerms[i] = searchTerms[i].replace(/\u002E/g, "\\u002E");    //.
//         searchTerms[i] = searchTerms[i].replace(/\u0028/g, "");    //(
//         searchTerms[i] = searchTerms[i].replace(/\u0029/g, "");    //)
        if (searchTerms[i] != "") {
            var regex = new RegExp(">([^<]*)?(" + searchTerms[i] + ")([^>]*)?<", "ig");
            highlightTextNodes(textContainerNode, regex, i);
        }

//        // Add to info-string
////        searchInfo += ' <span class="highlighted term' + i + '">' + searchTerms[i] + '</span> ';
    }

    // Create div describing the search
//    var searchTermDiv = document.createElement("H2");
//    searchTermDiv.className = 'searchterms';
//    searchTermDiv.innerHTML = searchInfo;

    // Insert as very first child in searched node
//    textContainerNode.insertBefore(searchTermDiv, textContainerNode.childNodes[0]);
//        }
}


function highlightTextNodes(element, regex, termid) {
    var tempinnerHTML = element.innerHTML;
    // Do regex replace
    // Inject span with class of 'highlighted termX' for google style highlighting
    element.innerHTML = tempinnerHTML.replace(regex, '>$1<span class="crtime">$2</span>$3<');
}


/*
 * This displays a dialog box that allows a user to enter their own
 * search terms to highlight on the page, and then passes the search
 * text or phrase to the highlightSearchTerms function. All parameters
 * are optional.
 */
function searchPrompt(defaultText, treatAsPhrase, textColor, bgColor)
{
    // This function prompts the user for any words that should
    // be highlighted on this web page
    if (!defaultText) {
        defaultText = "";
    }

    // we can optionally use our own highlight tag values
    if ((!textColor) || (!bgColor)) {
        highlightStartTag = "";
        highlightEndTag = "";
    } else {
        highlightStartTag = "<font style='color:" + textColor + "; background-color:" + bgColor + ";'>";
        highlightEndTag = "</font>";
    }

    if (treatAsPhrase) {
        promptText = "Please enter the phrase you'd like to search for:";
    } else {
        promptText = "Please enter the words you'd like to search for, separated by spaces:";
    }

    searchText = prompt(promptText, defaultText);

    if (!searchText)  {
        alert("No search terms were entered. Exiting function.");
        return false;
    }

    return highlightSearchTerms(searchText, treatAsPhrase, true, highlightStartTag, highlightEndTag);
}

function doHighlight(bodyText, searchTerm, highlightStartTag, highlightEndTag)
{
    // the highlightStartTag and highlightEndTag parameters are optional
    if ((!highlightStartTag) || (!highlightEndTag)) {
        highlightStartTag = "<font style='color:#cc0000; '>";
        highlightEndTag = "</font>";
    }

    // find all occurences of the search term in the given text,
    // and add some "highlight" tags to them (we're not using a
    // regular expression search, because we want to filter out
    // matches that occur within HTML tags and script blocks, so
    // we have to do a little extra validation)
    var newText = "";
    var i = -1;
    var lcSearchTerm = searchTerm.toLowerCase();
    var lcBodyText = bodyText.toLowerCase();

    while (bodyText.length > 0) {
        i = lcBodyText.indexOf(lcSearchTerm, i+1);
        if (i < 0) {
            newText += bodyText;
            bodyText = "";
        } else {
            // skip anything inside an HTML tag
            if (bodyText.lastIndexOf(">", i) >= bodyText.lastIndexOf("<", i)) {
                // skip anything inside a <script> block
                if (lcBodyText.lastIndexOf("/script>", i) >= lcBodyText.lastIndexOf("<script", i)) {
                    newText += bodyText.substring(0, i) + highlightStartTag + bodyText.substr(i, searchTerm.length) + highlightEndTag;
                    bodyText = bodyText.substr(i + searchTerm.length);
                    lcBodyText = bodyText.toLowerCase();
                    i = -1;
                }
            }
        }
    }

    return newText;
}



function highlightSearchTerms(searchText, treatAsPhrase, warnOnFailure, highlightStartTag, highlightEndTag)
{
    // if the treatAsPhrase parameter is true, then we should search for
    // the entire phrase that was entered; otherwise, we will split the
    // search string so that each word is searched for and highlighted
    // individually
    searchText = $.trim(searchText)
    if(searchText == "")
        return
    searchText = replaceQuery(searchText)
    if (treatAsPhrase) {
        searchArray = [searchText];
    } else {
        searchArray = searchText.split(" ");
    }
    if (!document.body || typeof(document.body.innerHTML) == "undefined") {
        if (warnOnFailure) {
            alert("Sorry, for some reason the text of this page is unavailable. Searching will not work.");
        }
        return false;
    }

    var bodyText = document.body.innerHTML;
    for (var i = 0; i < searchArray.length; i++) {
        bodyText = doHighlight(bodyText, searchArray[i], highlightStartTag, highlightEndTag);
    }

    document.body.innerHTML = bodyText;
    return true;
}
function highlightSearchElem(searchText ,elem){
    // the entire phrase that was entered; otherwise, we will split the
    // search string so that each word is searched for and highlighted
    // individually
    searchText = $.trim(searchText)
    if(searchText == "")
        return
    searchText = replaceQuery(searchText)
    searchArray = searchText.split(" ");

    var bodyText =$(elem).html();
    for (var i = 0; i < searchArray.length; i++) {
        if($.trim(searchArray[i])!="")
            bodyText = doHighlight(bodyText, searchArray[i], null, null);
    }

    $(elem).html(bodyText);
    return true;
}

/*
 * This function takes a referer/referrer string and parses it
 * to determine if it contains any search terms. If it does, the
 * search terms are passed to the highlightSearchTerms function
 * so they can be highlighted on the current page.
 */
function highlightGoogleSearchTerms(referrer)
{
    // This function has only been very lightly tested against
    // typical Google search URLs. If you wanted the Google search
    // terms to be automatically highlighted on a page, you could
    // call the function in the onload event of your <body> tag,
    // like this:
    //   <body onload='highlightGoogleSearchTerms(document.referrer);'>

    //var referrer = document.referrer;
    if (!referrer) {
        return false;
    }

    var queryPrefix = "q=";
    var startPos = referrer.toLowerCase().indexOf(queryPrefix);
    if ((startPos < 0) || (startPos + queryPrefix.length == referrer.length)) {
        return false;
    }

    var endPos = referrer.indexOf("&", startPos);
    if (endPos < 0) {
        endPos = referrer.length;
    }

    var queryString = referrer.substring(startPos + queryPrefix.length, endPos);
    // fix the space characters
    queryString = queryString.replace(/%20/gi, " ");
    queryString = queryString.replace(/\+/gi, " ");
    // remove the quotes (if you're really creative, you could search for the
    // terms within the quotes as phrases, and everything else as single terms)
    queryString = queryString.replace(/%22/gi, "");
    queryString = queryString.replace(/\"/gi, "");

    return highlightSearchTerms(queryString, false);
}

function replaceQuery(queryString){
    queryString = queryString.replace(/%20/gi, " ");
    queryString = queryString.replace(/\+/gi, " ");
    // remove the quotes (if you're really creative, you could search for the
    // terms within the quotes as phrases, and everything else as single terms)
    queryString = queryString.replace(/%22/gi, "");
    queryString = queryString.replace(/\"/gi, "");
    return queryString
}
function setDetailAgehigh(obj){
    var id = $(obj).val()
    if(id=="20"){
        $("#detail_agehigh").html('<option value="">请选择</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option><option value="60">60</option><option value="65">65</option>')
    }else if(id=="25"){
        $("#detail_agehigh").html('<option value="">请选择</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option><option value="60">60</option><option value="65">65</option>')
    }else if(id=="30"){
        $("#detail_agehigh").html('<option value="">请选择</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option><option value="60">60</option><option value="65">65</option>')
    }else if(id=="35"){
        $("#detail_agehigh").html('<option value="">请选择</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option><option value="60">60</option><option value="65">65</option>')
    }else if(id=="40"){
        $("#detail_agehigh").html('<option value="">请选择</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option><option value="60">60</option><option value="65">65</option>')
    }else if(id=="45"){
        $("#detail_agehigh").html('<option value="">请选择</option><option value="45">45</option><option value="50">50</option><option value="55">55</option><option value="60">60</option><option value="65">65</option>')
    }else if(id=="50"){
        $("#detail_agehigh").html('<option value="">请选择</option><option value="50">50</option><option value="55">55</option><option value="60">60</option><option value="65">65</option>')
    }else if(id=="55"){
        $("#detail_agehigh").html('<option value="">请选择</option><option value="55">55</option><option value="60">60</option><option value="65">65</option>')
    }else if(id=="60"){
        $("#detail_agehigh").html('<option value="">请选择</option><option value="60">60</option><option value="65">65</option>')
    }else if(id=="65"){
        $("#detail_agehigh").html('<option value="">请选择</option><option value="65">65</option>')
    }else if(id==""){
        $("#detail_agehigh").html('<option value="">请选择</option>')
    }
}

function  tabChangeHtmlContent(mainDiv,url){
    $(mainDiv).load(url + "?t=" + new Date().getTime());
}


function changeHeight(mainEL,lay){

}
String.prototype.format = function () {
    var args = arguments;
    return this.replace(/\{\{|\}\}|\{(\d+)\}/g, function (m, n) {
        if (m == "{{") { return "{"; }
        if (m == "}}") { return "}"; }
        return args[n];
    });
};
function renderElem(arr, panel,itemIdPre,itemHtml,clickCallback) {
    $(panel).empty();
    var size = arr.length;
    $.each(arr, function (index, item) {
        var html = itemHtml.format(itemIdPre+index,item[0],item[1],item[2]);
        var obj =$(html).click(function(event){clickCallback(this,event)});
        $(panel).append(obj);
        if (index == size - 1)
            $(panel).append(" <div class=\"cl\"></div>");
    });
}

Array.prototype.unique = function(){
    var tmp =[];
    $.each(this,function(i,n){
        var obj = $.grep(tmp,function(r,j){ return r[0]== n[0];}) ;
        if(obj.length ==0){
            tmp.push(n)
        }
    });
    return  tmp    ;
};
Array.prototype.remove = function(item){
    var index = -1;
    $.each(this,function(i,n){
        if(n[0] == item) {
            index = i;
            return
        }
    }) ;
    if(index>-1)
        this.splice(index,1) ;
};
Array.prototype.removeSingle = function(item){
    var index = -1;
    $.each(this,function(i,n){
        if(n== item) {
            index = i;
            return
        }
    }) ;
    if(index>-1)
        this.splice(index,1) ;
};
Array.prototype.any = function (item) {
    var result = $.grep(this, function (n, i) {
        return n == item;
    });
    return result != null && result.length > 0;
};
var toAllMap = function (str) {
    var vars = [], hash;
    var hashes = str.split('&');
    for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
};
var toMap = function (str, name) {
    return toAllMap(str)[name];
};



//div to loading

var contentDiv = null

function encodeUrl(s){
    var a = s.replace(/\+/g,"33")
    return a
}
eventKeyCode= {
    BACKSPACE: 8,
    COMMA: 188,
    DELETE: 46,
    DOWN: 40,
    END: 35,
    ENTER: 13,
    ESCAPE: 27,
    HOME: 36,
    LEFT: 37,
    NUMPAD_ADD: 107,
    NUMPAD_DECIMAL: 110,
    NUMPAD_DIVIDE: 111,
    NUMPAD_ENTER: 108,
    NUMPAD_MULTIPLY: 106,
    NUMPAD_SUBTRACT: 109,
    PAGE_DOWN: 34,
    PAGE_UP: 33,
    PERIOD: 190,
    RIGHT: 39,
    SPACE: 32,
    TAB: 9,
    UP: 38
}

function checkSiteAccount(site,successCallBackFun){

    createProgresser(contentDiv)
    if(site =="IHRSCLOUD"){
        successCallBackFun.call()
        return
    }
    var syshost = getSystemHost()
    $.get(syshost+"/sourcing/checkSiteAccountIsValid",{site:site},function(data){

        if(data.valid){
            successCallBackFun.call()
        }else{
            artDialog.tips(data.errorMsg,3);
            removeProgresser(contentDiv)

        }
    })
}

function getSystemHost(){
    var syshost = window.location.host

    if(syshost.indexOf(".com") <0)
        syshost = syshost + "/EHRSword"

    if(!syshost.startsWith("http://"))
        syshost = "http://"+syshost

    return syshost
}
function setDate(date1,date2){
    $(date1).datepicker({
        dateFormat:'yy-mm-dd',
        changeMonth:true,
        changeYear:true,
        onClose:function () {
            $(date2).datepicker("option", "minDate", parseDate(date1));
        }
    });
    $(date1).attr('readonly', 'true');
    $(date2).datepicker({
        dateFormat:'yy-mm-dd',
        changeMonth:true,
        changeYear:true,
        minDate:parseDate(date1)
    });
    $(date2).attr('readonly', 'true');
}

(function ($) {
    $.support.placeholder = ('placeholder' in document.createElement('input'));
})(jQuery);


//fix for IE7 and IE8
$(function () {
    if (!$.support.placeholder) {
        $("[placeholder]").focus(function () {
            if ($(this).val() == $(this).attr("placeholder")) $(this).val("");
        }).blur(function () {
            if ($(this).val() == "") $(this).val($(this).attr("placeholder"));
        }).blur();

        $("[placeholder]").parents("form").submit(function () {
            $(this).find('[placeholder]').each(function() {
                if ($(this).val() == $(this).attr("placeholder")) {
                    $(this).val("");
                }
            });
        });
    }
});
function setEdulevelhigh(id){
    if(id=="090"){
        $("#edulevelhigh").html('<option value="">及以上</option><option value="005">博士后</option><option value="010">博士</option><option value="020">MBA/EMBA</option><option value="030">硕士</option><option value="040">本科</option><option value="050">大专</option><option value="060">中专</option><option value="070">中技</option><option value="080">高中</option><option value="090">初中</option>')
    }else if(id=="080"){
        $("#edulevelhigh").html('<option value="">及以上</option><option value="005">博士后</option><option value="010">博士</option><option value="020">MBA/EMBA</option><option value="030">硕士</option><option value="040">本科</option><option value="050">大专</option><option value="060">中专</option><option value="070">中技</option><option value="080">高中</option>')
    }else if(id=="070"){
        $("#edulevelhigh").html('<option value="">及以上</option><option value="005">博士后</option><option value="010">博士</option><option value="020">MBA/EMBA</option><option value="030">硕士</option><option value="040">本科</option><option value="050">大专</option><option value="060">中专</option><option value="070">中技</option>')
    }else if(id=="060"){
        $("#edulevelhigh").html('<option value="">及以上</option><option value="005">博士后</option><option value="010">博士</option><option value="020">MBA/EMBA</option><option value="030">硕士</option><option value="040">本科</option><option value="050">大专</option><option value="060">中专</option>')
    }else if(id=="050"){
        $("#edulevelhigh").html('<option value="">及以上</option><option value="005">博士后</option><option value="010">博士</option><option value="020">MBA/EMBA</option><option value="030">硕士</option><option value="040">本科</option><option value="050">大专</option>')
    }else if(id=="040"){
        $("#edulevelhigh").html('<option value="">及以上</option><option value="005">博士后</option><option value="010">博士</option><option value="020">MBA/EMBA</option><option value="030">硕士</option><option value="040">本科</option>')
    }else if(id=="030"){
        $("#edulevelhigh").html('<option value="">及以上</option><option value="005">博士后</option><option value="010">博士</option><option value="020">MBA/EMBA</option><option value="030">硕士</option>')
    }else if(id=="020"){
        $("#edulevelhigh").html('<option value="">及以上</option><option value="005">博士后</option><option value="010">博士</option><option value="020">MBA/EMBA</option>')
    }else if(id=="010"){
        $("#edulevelhigh").html('<option value="">及以上</option><option value="005">博士后</option><option value="010">博士</option>')
    }else if(id=="005"){
        $("#edulevelhigh").html('<option value="">及以上</option><option value="005">博士后</option>')
    }else{
        $("#edulevelhigh").html('<option value="">不限</option>')
    }
}
function showSubExportButton() {
    $("#subExportButton").show();
}
function hideSubExportButton() {
    $("#subExportButton").hide();
}
function windowOpenPostData(verb, url, data, target) {
    var form = document.createElement("form");
    form.action = url;
    form.method = verb;
    form.target = target || "_self";
    if (data) {
        for (var key in data) {
            var input = document.createElement("textarea");
            input.name = key;
            input.value = typeof data[key] === "object" ? JSON.stringify(data[key]) : data[key];
            form.appendChild(input);
        }
    }
    form.style.display = 'none';
    document.body.appendChild(form);
    form.submit();
};