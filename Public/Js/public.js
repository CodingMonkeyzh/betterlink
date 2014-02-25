// headerTop_nav菜单
function headerTopNav(){
	$("#headerTop_nav ul").css({display:"none"});
	$("#headerTop_nav li").hover(function(){
		$(this).find("ul:first").css({visibility: "visible", display: "none"}).show(400);
	}, function(){
		$(this).find("ul:first").css({visibility: "hidden"});
	});
}

// 搜索
function searchText(){
	$(".searchText").bind("click", function(){
		this.select();
	})
}

//获取url中的参数
function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r != null) return unescape(r[2]); return null; //返回参数值
}

$(document).ready(function(){
	headerTopNav();
	searchText();
});

