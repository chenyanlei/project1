// JavaScript Document
//用于处理URL中#的参数的操作，包括设置，获取
var urlParm = {
	//获取过滤条件并组装URL
	setURLParameter : function(parameter, val) {
		var cur_href = location.href;
		var reg = new RegExp('#' + parameter + '=[^#]*', "ig");
		if (reg.exec(cur_href)) {
			cur_href = cur_href.replace(reg, '#' + parameter + '=' + val);
		} else {
			cur_href += '#' + parameter + '=' + val;
		}
		location.href = cur_href;
	},
	//以url的GET形式返回参数,如 jumei.com?a=1&b=2中的,a=1&b=2部分
	getAjaxURLParameters : function() {
		var cur_href = location.href;
		var parm_index = cur_href.indexOf('#');
		if (parm_index == -1) {
			return "";
		}
		var reg = new RegExp('#', "ig");
		return cur_href.substring(parm_index, cur_href.length).replace(reg, '&');
	},
	//以数组形式反回参数集合
	getURLParameterArray : function(parameter) {
		var cur_href = location.href;
		var parmList = cur_href.split('#');
		var returnList = [];
		if (parmList.length > 1) {
			for (var p = 1; p < parmList.length; p++) {
				var parm = parmList[p].split('=');
				if (parm.length > 1) {
					//returnList.push(parm);
					returnList[parm[0]] = parm[1];
				}
			}
		} else {
			returnList = null;
		}
		return returnList;
	},
	//获取半个参数值
	getParm : function(filter) {
		if (filter) {
			var parmList = urlParm.getURLParameterArray();
			if (!parmList || typeof (parmList[filter]) == 'function') {
				//parmList['filter']= !parmList['filter']
				filter = null;
			} else {
				filter = parmList[filter];
			}
		}
		return filter;
	}
};
