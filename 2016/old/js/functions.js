var menu= 0	
$(function(){
	$('.contact').hide();
        
	$('.closeme, .btn_close, .close_contact_resp').click(function(e) {
		$('.popup, .contact').fadeOut(300);
		$('.contenido_popup').removeClass('popup_abierto');
		
	});	
});


function toContact(){
	$('.contact').fadeIn(300);
	$('.menu_resp').fadeOut(300)
}



