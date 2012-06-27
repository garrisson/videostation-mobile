$(document).bind("mobileinit", function(){
  $.mobile.touchOverflowEnabled = true;
});
$(document).bind("mobileinit", function () {
	$.mobile.ajaxEnabled = true;
});
$(document).bind("mobileinit", function(){
	$.mobile.loadingMessage = 'Loading...';
	$.mobile.loadingMessageTextVisible = true;
});

$(document).ready(function(){
			
	function lastPostFunc() 
	{ 
		$.mobile.showPageLoadingMsg();
		$.post("pages/scroll.php?lastID="+$(".comment:last").attr("id"),
		
		function(data){
			if (data != "") {
			$("ul#movies").append(data).listview('refresh');			
			}
			$.mobile.hidePageLoadingMsg();
		});
	};
		
	$(window).scroll(function(){
		if($(window).scrollTop() + $(window).height() >= $(document).height()){
			lastPostFunc();
		}
	}); 
			
});