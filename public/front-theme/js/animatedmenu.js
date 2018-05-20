$(document).ready(function(){
	
	//Fix Errors - http://www.learningjquery.com/2009/01/quick-tip-prevent-animation-queue-buildup/
	
	//Remove outline from links
	$("a").click(function(){
		$(this).blur();
	});
	
	//When mouse rolls over
	$("li.blue").mouseover(function(){
		$(this).stop().animate({height:'170px'},{queue:false, duration:600, easing: 'easeOutBounce'});
		if ($.browser.msie && $.browser.version.substr(0,1)<7) {
			$("#_lpChatBtn1").fadeIn("fast");
		}
	});
	
	//When mouse is removed
	$("li.blue").mouseout(function(){
		$(this).stop().animate({height:'40px'},{queue:false, duration:600, easing: 'easeOutBounce'});
		if ($.browser.msie && $.browser.version.substr(0,1)<7) {
			$("#_lpChatBtn1").fadeOut("fast");
		}
	});
	
});