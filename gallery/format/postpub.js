(function() {

window.Config = {
	
	// Ajax相关设置
	ajax : {
		headers : { "Content-Type" : "text/plain;charset=GBK;" }		// 请求头
	},
	
	// 编辑器设置
	editor : {
		/* debug
		previewCss : "css/preview.css",
		uploader : "uploadFile.swf"
		// */
		
		// formal
		previewCss : "/css/preview.css",
		uploader : "/swf/uploadFile.swf"
		//uploader : "https://cms.ws.netease.com/swf/uploadFile.swf"
		// */
	},
	
	// Ajax数据源
	dataSrc : {
		/* debug
		videoTopics : "data/videotreeforjson.asp",
		videoList : "data/videolistforjson.asp",
		videoSwf : "data/video.asp",
		imageList : "data/imagelistforjson.asp"
		// */
		
		// formal
		videoTopics : "/post/videotreeforjson.jsp",
		videoList : "/post/videolistforjson.jsp",
		videoSwf : "/temp/video.jsp",
		imageList : "/cms/associatedquery.do"
		// */
	},
	
	// 提示
	tips : {
		loading : "读取中，请稍后……",
		noPicture : "暂无相匹配的图片",
		noVideoResult : "暂无相匹配的视频",
		noVideo : "暂无视频"
	},
	
	// 树形菜单
	tree : {
		
		shrinkIcon : "/images/new_cms_img/tree_shrink.png",	// 收缩的图标
		expandIcon : "/images/new_cms_img/tree_expand.png",	// 展开的图标*/
		
		/*shrinkIcon : "images/tree_shrink.png",	// 收缩的图标
		expandIcon : "images/tree_expand.png",	// 展开的图标*/
		
		shrinkText : "收缩",
		expandText : "展开",
		defaultExtended : 1		// 默认展开层数
	},
	
	// 视频设置
	video : {
		width: 490,
		height: 394,
		swfUrl : 'http://swf.ws.126.net/flvplayer081128/~false~<#=topicid#>_<#=vid#>~<#=imgpath#>~.swf',
		swfParams : {
			AllowScriptAccess : "always",
			Scale : "ShowAll",
			BgColor : "#ffffff",
			AllowFullScreen : true,
            wmode : 'opaque'
		},
		videoParams : {
            allowfullscreen : 'true',
            allowscriptaccess : 'always',
            allownetworking : 'all',
            wmode : 'opaque'
		}
	}
};


// ------------------------------------------------------------------------------
// 工具函数扩展 Begin

var isUrl = /^https?:\/\//i, isDate = /^(\d{4})-(\d{1,2})(?:-(\d{1,2})(?:\s+(\d{1,2}):(\d{1,2}):(\d{1,2}))?)?$/;

/**
 * 判断指定字符串是否Url
 * @param {String} 指定字符串
 * @return {Boolean} 指定字符串是否Url
 */
$.util.isUrl = function(str) {
	return isUrl.test(str);
};

/**
 * 去掉指定字符串开头的http(s)://
 * @param {String} 指定字符串
 * @return 修正后的字符串
 */
$.util.trimUrl = function(str) {
	return str.replace(isUrl, "");
};


/**
 * 判断指定字符串是否符合日期格式
 * @param {String} 指定字符串
 * @return {Boolean} 指定字符串是否符合日期格式
 */
$.util.isDate = function(str) {
	var dateParts = str.match(isDate);
	if (dateParts) {
		dateParts[1] = parseInt(dateParts[1]);	// 年
		if (dateParts[1] < 1970) {
			return false;
		}
		dateParts[2] = parseInt(dateParts[2]);	// 月
		if (dateParts[2] < 1 || dateParts[2] > 12) {
			return false;
		}
		if (dateParts[3] != "") {	// 日
			var temp = new Date(dateParts[1], dateParts[2], 0);
			dateParts[3] = parseInt(dateParts[3]);
			if (dateParts[3] < 1 || dateParts[3] > temp.getDate()) {
				return false;
			}
		}
		if (dateParts[4] != "" && dateParts[5] != "" && dateParts[6] != "") {	// 时、分、秒
			dateParts[4] = parseInt(dateParts[4]);
			dateParts[5] = parseInt(dateParts[5]);
			dateParts[6] = parseInt(dateParts[6]);
			if (dateParts[4] < 0 || dateParts[4] > 23 ||
				dateParts[5] < 0 || dateParts[5] > 59 ||
				dateParts[6] < 0 || dateParts[6] > 59) {
				return false;
			}
		}
		return true;
	} else {
		return false;
	}
};


/**
 * 把一段字符串反序列化为json对象
 * @param {String} 指定字符串
 * @return {Object} json对象
 */
$.util.toJson = "undefined" != typeof JSON ? JSON.parse : function(str) {
	var data;
	try {
		eval("data = " + str + ";");
	} catch(e) {
	}
	return data;
};


var chsNumbers = ["零", "一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二", "十三", "十四", "十五", "十六", "十七", "十八", "十九", "二十", "二十一", "二十二", "二十三", "二十四", "二十五", "二十六", "二十七", "二十八", "二十九", "三十"];
/**
 * 把指定数字（0－30）转换为中文数字
 * @param {Number} 指定数字
 * @return {String} 中文数字
 */
$.util.toChsNumber = function(num) {
	return chsNumbers[num];
};


/**
 * #计算指定字符串的长度，汉字按两个字符计算
 * 将所有ascii编码大于127的都按两个字符长度，防止在宋体下有些单字节字符会占用两个字符的宽度
 * @param {String} 指定字符串
 * @return {Number} 指定字符串的长度
 */
$.util.countText = function(str) {
	//return str.replace(/[^\x00-\xff]/g, "**").length / 2;
	var len = str.length, result = 0;
    if(typeof str != "string") {
        return result;
    }
    while(len) {
        result += str.charCodeAt(--len) > 127? 1: 0.5;
    }
    return result;
};

$.util.copyToClipboard = function(txt) {
	if(window.clipboardData) { 
		window.clipboardData.clearData();   
		window.clipboardData.setData("Text",txt);
	} else if(window.netscape) {   
		try {   
			netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");   
		} catch (e) {   
			alert("被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将'signed.applets.codebase_principal_support'设置为'true'");   
		}   
		var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard),
			trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
		if (!clip || !trans) {  
			return; 
		}
		trans.addDataFlavor('text/unicode'); 
		
		var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString); 
		str.data = txt;   
		trans.setTransferData("text/unicode", str, txt.length*2);   
		var clipid = Components.interfaces.nsIClipboard;   
		if (!clip) {   
			return false;
		}
		clip.setData(trans,null,clipid.kGlobalClipboard);
	}
	return true;
}

$.util.getFromClipboard = function() {
	var data;
	if (window.clipboardData) {
		data = window.clipboardData.getData("Text");
	} else if(window.netscape) {
		try {   
			netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");   
		} catch (e) {   
			alert("被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将'signed.applets.codebase_principal_support'设置为'true'");   
		}   
		
		var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard),
			trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
		if (!clip || !trans) {  
			return; 
		}
		trans.addDataFlavor("text/unicode");
		
		clip.getData(trans, clip.kGlobalClipboard);
		var str	= {};
		var strLength = {};
		trans.getTransferData("text/unicode", str, strLength);
		if (str) {
			str = str.value.QueryInterface(Components.interfaces.nsISupportsString);
			data = str.data.substring(0, strLength.value / 2);
		}
	}
	return data;
}
	
	
/**
 * 把指定数字转换为两位数字符串
 * @param {Object} 数字
 * @return {String} 两位数的字符串
 */
var toTwoDigit = function(num) {
	return num < 10 ? "0" + num : num.toString();
};
/**
 * 返回指定格式的日期字符串
 * @param {String} 格式字符串
 * @return {String} 指定格式的日期字符串
 */
Date.prototype.format = function(formation) {
	var year = this.getFullYear(),
		month = this.getMonth() + 1,
		date = this.getDate(),
		hours24 = this.getHours(),	// 24小时制
		hours12 =  hours24 > 12 ? hours24 - 12 : hours24,	// 12小时制
		minute = this.getMinutes(),
		second = this.getSeconds();

	return formation.replace(/[ymdhsHM]+/g, function($1) {
		switch ($1) {
			case "yyyy": return year;	
			case "yy": return year.toString().right(2);
			case "MM": return toTwoDigit(month);
			case "M": return month;
			case "dd": return toTwoDigit(date);
			case "d": return date;			
			case "HH": return toTwoDigit(hours24);			
			case "H": return hours24;
			case "hh": return toTwoDigit(hours12);
			case "h": return hours12;
			case "mm": return toTwoDigit(minute);
			case "m": return minute;
			case "ss": return toTwoDigit(second);
			case "s": return second;
			default: return $1;
		}
	});
};


/**
 * 替换节点
 * @param {HtmlElement} 原节点
 * @param {HtmlElement} 新节点
 */
$.dom.replaceNode = function(oldNode, newNode) {
	if (oldNode.replaceNode) {
		oldNode.replaceNode(newNode);
	} else if (oldNode.parentNode.replaceChild) {
		oldNode.parentNode.replaceChild(newNode, oldNode);
	}
};


/**
 * 获取指定元素在页面上的绝对位置
 * @param {HtmlElement} 元素
 * @return {Object} 坐标
 */
$.style.getAbsPosition = function(elem) {
	var pos = {};
	if (elem.getBoundingClientRect) {
		var rect = elem.getBoundingClientRect();
		pos.y = rect.top + (document.body.scrollTop || document.documentElement.scrollTop);
		pos.x = rect.left + (document.body.scrollLeft || document.documentElement.scrollLeft);
	} else {
		pos.y = elem.offsetTop;
		pos.x = elem.offsetLeft;
	}
	
	return pos;
};

// 工具函数扩展 End
// ------------------------------------------------------------------------------



// ------------------------------------------------------------------------------
// UI 扩展 Begin

/**
 * 模板静态类
 */
$.ui.Template = {
	
	/**
	 * 模板缓存
	 */
	_cache : {},
	
	/**
	 * 获取指定模板的代码
	 * @param {String} 模板名
	 * @return {String} 模板代码
	 */
	get : function(name) {	
		return this._cache[name] == null ? "" : this._cache[name];
	},
	
	/**
	 * 模板转换
	 * @param {String} 模板名
	 * @param {Object} 值集合
	 * @return {String} 转换后的代码
	 */
	parse : function(name, values) {
		return $.util.parseTpl(this.get(name), values);
	},
	
	/**
	 * 读取页面中模板容器（id 为templates）中的模板代码，此方法用于初始化此类
	 */
	load : function() {
		var templates = $("#templates > div"), i = templates.length;
		while (--i >= 0) {
			this._cache[templates[i].title] = templates[i].innerHTML.replace(/(?:^\s*<!--)|(?:-->\s*$)/g, "");
		}
	}
};


/**
 * 文本长度计算器
 * @param {HtmlElement} 文本框元素
 * @param {HtmlElement} 显示文本长度的元素
 */
$.ui.TextCounter = function(input, span) {
	if (!arguments.length) {
		return;
	}
	
	var t = this;
	t.constructor = arguments.callee;
	
	t._input = input; t._span = span;
	
	$.event.addEvent(input, "change", function() { t.getTextCount(); });
	$.event.addEvent(input, "keyup", function() {
		t._keyTimer && clearTimeout(t._keyTimer);
		t._keyTimer = setTimeout(t.getTextCount.bind(t), 120);
	 });
	
	t.getTextCount();
};

// 文本长度计算器原型（方法定义）
$.ui.TextCounter.prototype = {
	/**
	 * 设置并获取当前文本长度
	 * @return {Number} 文本长度
	 */
	getTextCount : function() {
		var textCount = $.util.countText(this._input.value);
		this._span.innerHTML = textCount;
		return textCount;
	}
};


/**
 * 创建页码数据
 * @param {Number} 当前页
 * @param {Number} 总页数
 * @return {Object} 页码数据
 */
$.ui.buildPages = function(currentPage, pageCount) {
	var data = {
		pages : []
	};
	
	var i = 1, temp;
	
	while (i <= currentPage && i <= pageCount) {
		data.pages.push({
			seq : i,
			isCurrent : i == currentPage
		});
		
		if (1 == i) {
			i = Math.max(currentPage - 5, 2);
			if (i != 2) {
				data.pages.push({
					seq : -1
				});
			}
		} else {
			i++;
		}
	}
	
	i = currentPage; temp = Math.min(pageCount, currentPage + 5);
	while (++i <= temp) {
		data.pages.push({
			seq : i
		});
	}
	if (i - 1 < pageCount) {
		data.pages.push({
			seq : -1
		});
	}
	
	return data;
};

// UI 扩展 End
// ------------------------------------------------------------------------------

})();