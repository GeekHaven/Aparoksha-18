$('.game li a').click(function() {
	var selected = $(this);
	$('.game').fadeOut(1);
	$('#game-content div').fadeOut(1);
	if(selected.hasClass('csevent'))
		$('#cs').fadeIn(300);
	if(selected.hasClass('ssevent'))
		$('#splitsec').fadeIn(300);
	if(selected.hasClass('dotaevent'))
		$('#dota').fadeIn(300);
	if(selected.hasClass('fifaevent'))
		$('#fifa').fadeIn(300);
	
	
});
$('.closediv').click(function(e) {
	$('.game').fadeIn(300);
	$('#game-content div').fadeOut(1);
});