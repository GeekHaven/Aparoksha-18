function event_details(str) {
	var event = "#" + str;
	//alert(event);
	$('.event_id').fadeOut(1);
	$(event).fadeIn(200);
		
}

$('.elec').hover(function(){
	$('div.show-elec').show();
},function() {
	$('div.show-elec').hide();
});