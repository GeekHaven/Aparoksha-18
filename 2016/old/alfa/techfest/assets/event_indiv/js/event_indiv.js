function event_details(str) {
	var event = "#" + str;
	//alert(event);
	$('.event_id').fadeOut(1);
	$('.cd-tabs-navigation a').removeClass('selected');
	$('.cd-tabs-content li').removeClass('selected');
	$('a[data-content="desc"]').addClass('selected');
	$('li[data-content="desc"]').addClass('selected');
	$(event).fadeIn(200);
		
}
