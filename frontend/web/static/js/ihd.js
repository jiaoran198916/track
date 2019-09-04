(function(e,d,a){var b,f,c;c="resizeEnd";f={delay:250};b=function(h,g,i){if(typeof g==="function"){i=g;g={}}i=i||null;this.element=h;this.settings=e.extend({},f,g);this._defaults=f;this._name=c;this._timeout=false;this._callback=i;return this.init()};b.prototype={init:function(){var g,h;h=this;g=e(this.element);return g.on("resize",function(){return h.initResize()})},getUTCDate:function(h){var g;h=h||new Date();g=Date.UTC(h.getUTCFullYear(),h.getUTCMonth(),h.getUTCDate(),h.getUTCHours(),h.getUTCMinutes(),h.getUTCSeconds(),h.getUTCMilliseconds());return g},initResize:function(){var g;g=this;g.controlTime=g.getUTCDate();if(g._timeout===false){g._timeout=true;return setTimeout(function(){return g.runCallback(g)},g.settings.delay)}},runCallback:function(h){var g;g=h.getUTCDate();if(g-h.controlTime<h.settings.delay){return setTimeout(function(){return h.runCallback(h)},h.settings.delay)}else{h._timeout=false;return h._callback()}}};return e.fn[c]=function(g,h){return this.each(function(){if(!e.data(this,"plugin_"+c)){return e.data(this,"plugin_"+c,new b(this,g,h))}})}})(jQuery,window,document);

var Analysis = 0;

$(function(){
	if ($(".filepage").length>0){$.post("/api/");}
    var nua = navigator.userAgent;
	var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1);
	if (isAndroid) {
	  $('select.form-control').removeClass('form-control').css('width', '100%');
	}
	
	if (navigator.userAgent.match(/IEMobile\/10\.0/)){
	  var msViewportStyle = document.createElement('style');
	  msViewportStyle.appendChild(
		document.createTextNode(
		  '@-ms-viewport{width:auto!important}'
		)
	  )
	  document.querySelector('head').appendChild(msViewportStyle);
	}
    
	$('body').on('hidden.bs.modal','.modal[id=typeModal]',function(){
		$(this).removeData('bs.modal');
		$(this).find(".modal-body").html('');
    });

    $(document).on('mouseover mouseout','.filepage .score-intro a',function(event){
	   $(this).removeClass("animated rotateIn");
	   if(event.type == "mouseover"){
            $(this).addClass("animated bounce");
			//$(this).tooltip('show')
		}else if(event.type == "mouseout"){
		    $(this).removeClass("animated bounce");
		}
	});
	
	$("#dwn button").click(function(){
		var a = $(this).attr("id").replace("tab_","");
		$(this).addClass("active").parent().siblings().find("button").removeClass("active");
		$("#dwn table tr").hide();
		if(a == 'all'){
			$("#dwn table tr").show();
		}else{
			$("#dwn table tr[id="+a+"]").show();
		}
	});
	
    // $("#tab1 .imglist,#tab2 .imglist,#tab3 .imglist").slick({
    //     dots:false,infinite:false,speed:300,slidesToShow:5,slidesToScroll:5,
    //     responsive:[
    //         {breakpoint:1200,settings:{slidesToShow:4,slidesToScroll:4}},
    //         {breakpoint:700,settings:{slidesToShow:3,slidesToScroll:3}},
	 //        {breakpoint:600,settings:{slidesToShow:2,slidesToScroll:2}},
	 //        {breakpoint:480,settings:{slidesToShow:2,slidesToScroll:1}}
    //     ],init:(function(){alert(3)})
    // });
	
	window.setTimeout(function(){
		$("#tab2,#tab1").removeClass("active");
	},500);
	
	// $("img.l_d").lazyload({
	// 	effect:"fadeIn",
	// 	threshold:100
	// });

	if ($(".filepage #trailer").length > 0){
	    $(".filepage #trailer button").click(function(){
		    DailogReally($(this));
		});
	}
	
	if ($(".filepage #feature").length > 0){
	    $(".filepage #feature button").click(function(){
		    DailogReally($(this));
		});
	}
	
	if ($(".filepage #play").length > 0){
	    $(".filepage #play button").click(function(){
		    DailogReally($(this));
		});
	}

	$(".navbar-nav a:eq(0)").click(function(){
		$("#searchModal input:eq(0)").val('');
		$("#searchModal .btn-danger").attr("href","");
		$('#searchModal').modal('show');
	});
	
	$(".btn-share").click(function(){
		if ($("#wxqrcode").html() == ""){
		    $('.bds_weixin')[0].click();
		}
    	$('#shareModal').modal('show');
	});
	
	$(".tagBtn button").click(function(){
		var a = ["genres","year","countries"][$(".tagBtn button").index(this)];
		$("#typeModal").modal({
		   backdrop:"static",
		   hidden:true,
		   keyboard:true,
		   remote:"/inc/type_"+a+".html?index_id="+Math.random()
		});
	});
	
	$("#typeModal").on("shown.bs.modal",function(){
		window.setTimeout(function(){
		    $('#typelist').mobiscroll().select({
				theme:'android-ics light',
				mode:'scroller',
				display:'inline',
				animate:'pop',
				lang:'zh',
				label:'none',
				group:true,
				onMarkupReady:function(a,b){
					$("#GoTypeSite").removeClass("disabled");
					makeUrls(b.values);
				},
				onChange:function(a,b){
					makeUrls(b.values);
				}
		    });
	    },300);
    });
	
	var url1,url2;
	$(".tab-content a:contains('播放')").click(function(){
		url1 = $(this).attr("url1");
		url2 = $(this).attr("url2");
		$("#playvideo h4").text($(this).parent().prev().text());
		$("#playvideo .modal-body").html((url2!="")?"<video id=\"p_l\" width=\"100%\" height=\"400\" controls autoplay></video>":"<iframe id=\"p_l\" frameborder=\"0\" \"allowfullscreen\" width=\"100%\" height=\"400\"></iframe>");
		$("#playvideo").modal({
		   backdrop:"static",
		   hidden:true,
		   keyboard:true
		});
	});
	
	$("#playvideo").on("shown.bs.modal",function(){
		var url = ((url2!="")?url2:url1);
	  //  $("#playvideo .modal-body iframe").attr("src",url);
		$("#p_l").attr("src",url);
    });
	
	$("#shareModal").on("shown.bs.modal",function(){
		 if ($("#wxqrcode").html() == ""){
			 $("#ihd_urls").val(window.location.href);
			 $("#ihd_urls")[0].select();
			 $(".bd_weixin_popup_close").remove();
			 $("#wxqrcode").append($("#bdshare_weixin_qrcode_dialog").remove());
			 $("#bdshare_weixin_qrcode_dialog").css("visibility","visible");
			 $("#bdshare_weixin_qrcode_dialog_bg").remove();
			 $(".bdsharebuttonbox a").removeAttr("title");
		 }
    });
	
	/*
	$("#playvideo").on("hidden.bs.modal",function(){
	   $("#playvideo .modal-body").html('');
	   // $(this).removeData("bs.modal");  
    });*/
	
	$(document).on('input','#searchModal input:eq(0)',function(event){
		var a = $("#searchModal .btn-danger");
		$(this).val($.trim($(this).val()));
		if ($(this).val() == ""){
			a.addClass("disabled");
		}else{
			a.removeClass("disabled");
		}a.attr("href","/search.shtml?search="+$(this).eq(0).val());
	});
	
	var _play_url;
	$(document).on('click','#play .btn-danger',function(event){
		_play_url = $(this).prev().attr("href");
		$('#AnalysisModal').modal('show');
	 });
	 
	 $('body').on('shown.bs.modal','.modal[id=AnalysisModal]',function(){
		var a = $(this).find(".modal-body");
		$.each(["http://jx.aeidu.cn/index.php?url=",
				"http://www.82190555.com/video.php?url=",
				"http://2gty.com/apiurl/yun.php?url=",
				"http://api.baiyug.cn/vip/index.php?url=",
				"https://www.917k.la/?url=",
				"http://api.xfsub.com/index.php?url="
	           ],function(index,value){
			a.append('<a class="btn btn-success" target="_blank" href="'+value+_play_url+'">线路'+(index+1)+'</a>');
	   });
	});
	
	$.getUrlParam = function (name) {
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
		var r = window.location.search.substr(1).match(reg);
		if (r != null) return decodeURI(r[2]); return null;
	}
	
    // $(".coll-panel").slick({
    //     dots:false,infinite:false,speed:300,slidesToShow:5,slidesToScroll:5,
    //     responsive:[
    //         {breakpoint:1200,settings:{slidesToShow:4,slidesToScroll:4}},
    //         {breakpoint:700,settings:{slidesToShow:3,slidesToScroll:3}},
	 //        {breakpoint:600,settings:{slidesToShow:2,slidesToScroll:2}},
	 //        {breakpoint:480,settings:{slidesToShow:2,slidesToScroll:1}}
    //     ]
    // });
	
	$('[data-toggle="tooltip"]').tooltip();
	
	// $.scrollUp({
	// 	scrollName:'scrollUp',
     //    scrollDistance:300,
     //    scrollFrom:'top',
     //    scrollSpeed:300,
     //    easingType:'linear',        // Scroll to top easing (see http://easings.net/)
     //    animation:'fade',           // Fade, slide, none
     //    animationSpeed:200,         // Animation speed (ms)
     //    scrollTrigger:false,        // Set a custom triggering element. Can be an HTML string or jQuery object
     //    scrollTarget:false,         // Set a custom target element for scrolling to. Can be element or number
     //    scrollText:'Scroll to top', // Text for element, can contain HTML
     //    scrollTitle:false,          // Set a custom <a> title if required.
     //    scrollImg:true,            // Set true to use image
     //    activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
     //    zIndex: 2147483647
	// });
	
	/* 百度分享开始 */
	var $bdPic = window.location.hostname + ((window.location.href.indexOf("/file/") > 0)?$(".poster img").attr("src"):"/images/web/web_logo.gif");
	var $bdText = $(document).attr("title") + "，蓝光高清电影下载，每日更新。";
    window._bd_share_config = {
	  "common":{
		  "bdSnsKey":{},"bdText":$bdText,"bdMini":"2","bdMiniList":false, "bdPic":$bdPic,"bdStyle":"0","bdSize":"24"
	  },"share":{}
    };

	with (document) 0[(getElementsByTagName('head')[0] || body)
		.appendChild(createElement('script'))
		.src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='
		+ ~(-new Date() / 36e5)];
	/* 百度分享测试结束 */
    
	window.setTimeout(function(){
		$("#ds-recent-visitors div").removeClass("ds-avatar").addClass("ds-avatar2");
		UserUpdata();
		if (window.location.pathname.split("/")[1] == "file"){
			if ($("#play").length > 0){
				$("#play table tr").each(function(){
				   if ($(this).find("td:eq(0) span:eq(2)").hasClass("label-danger")){
					  $(this).find("td:eq(1)").append("<a class='btn btn-danger'>解析</a>");
				   }
				});
    		}
		}
	},2500);
});

function makeUrls(a){
	$("#GoTypeSite").attr("href","http://www.ihd.me"+a+".shtml");
}

function search(a){
    $.ajax({
		url:"search.php",
		type:'post',
		data:{search:a},
		dataType:'html',
		//timeout:1000,
		error:function(str){
			getMessage(str);
		},success:function(data){
			var data=eval('('+data+')');
			
		    if (data.message != "ok"){
				$(".row:eq(0)").append(creatalert(data.message));
			}
			
			laytpl(gettpl).render(data,function(html){
			    $(".row:eq(0)").append(html);
			});
			
    		$("img.l_d").lazyload({
			    effect:"fadeIn",
				threshold:200,
				failurelimit:10 
		   });
		}
    });	
}

function creatalert(a){
    return "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">"+
    "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>"+
	"<strong>"+a+"</strong>"+
    "</div>";	
}

function DailogReally(a){
	$(".modal-title").text(a.prev().text());
	$('#myModal').modal('show');
}

function UserUpdata(){
	var a = 0,b = parseInt(30*Math.random(),10);
	if (a == b){
		 $.get("/api/ihd_right.php");
	}
}

(function(){
   // var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?25b16f30ca46b8c804fe7f4c01187871":"https://jspassport.ssl.qhimg.com/11.0.1.js?25b16f30ca46b8c804fe7f4c01187871";
   // document.write('<script src="' + src + '" id="sozz"><\/script>');
})();	