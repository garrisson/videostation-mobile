$(document).bind("mobileinit", function(){
  $.mobile.touchOverflowEnabled = true;
});
$(document).bind("mobileinit", function () {
	$.mobile.ajaxEnabled = true;
});
$(function()
{
$('.more').live("click",function()
{
var ID = $(this).attr("id");
if(ID)
{
$("#more"+ID).html('<img src="images/ajax-loader.gif" />');

$.ajax({
type: "POST",
url: "load_more.php",
data: "lastid="+ ID,
cache: false,
success: function(html){
$("ul#movies").append(html).listview('refresh');
$("#more"+ID).remove(); // removing old more button
}
});
}
else
{
$(".custom").html('The End');// no results
}

return false;
});
});