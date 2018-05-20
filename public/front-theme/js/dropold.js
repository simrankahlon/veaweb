 

$(document).ready(function() {

	// wrap for products and more pages
	if (m=window.location.href.match(/#(.+)$/)) { 
		if (m[1]) {
			showwrap(m[1]);
			jQuery(".content .js_"+m[1]).addClass("current"); // for when it's already visible
		}
	} else {
		jQuery(".content li:first").addClass("current");
	}
	jQuery(".content a").each(function(){
		if (m=this.href.match(/#(.+)$/)) {
			var pl=m[1]; 
			if (pl && jQuery("."+pl).get(0)) 
				jQuery(this).click(function() { showwrap(pl); });
		}	
	});

});
var showwrap=function(wrapname, filter) {
	if (typeof(filter)=="undefined") filter="";
			 
 
	if (jQuery(filter+" ."+wrapname+":hidden")[0]) {
		
		jQuery("#dropMenu li,.content a").removeClass("current");
		jQuery("#dropMenu .js_"+wrapname).addClass("current");
		

		jQuery(filter+" .js_content:visible, .applmore:visible").not("."+wrapname).hide();
		if (navigator.userAgent.indexOf("MSIE 7")!=-1 || navigator.userAgent.indexOf("MSIE 6")!=-1) jQuery(filter+"  ."+wrapname+":hidden").show(); 
		else jQuery(filter+" ."+wrapname+":hidden").fadeIn();
		 
		 
	}
}




 