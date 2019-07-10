$(function() {
	$("#slider").responsiveSlides({
		auto: true,
		nav: true,
		speed: 500,
		namespace: "callbacks",
		pager: true,
		timeout: 10000, 
	});
	$(".text-block .title").overDot();
	$(".text-block .detail").overDot();
	$(".navbar-nav.navbar-right .dropdown .dropdown-toggle span").overDot();
	$(window).scroll(function(){
		// if($(window).scrollTop()>70){
		// 	$(".top-header").css({"position":"fixed","top":"0"});
		// }else{
		// 	$(".top-header").css({"position":"relative","top":"0"});
		// }
		if($(window).scrollTop()>400){
			$("#toTop").show();
		}else{
			$("#toTop").hide();
		}
	});
	$("#toTop").on("click",function(){
		$('body,html').animate({'scrollTop': 0}, 500);
	});
});