var menu= 0	
$(function(){
	$('.about').hide();
        
	$('.closeme, .btn_close, .close_about_resp').click(function(e) {
		ion.sound.play("close");
		$('.popup, .about').fadeOut(300);
		$('.contenido_popup').removeClass('popup_abierto');
		
	});	
});


function toAbout(){
	$('.about').fadeIn(300);
	$('.menu_resp').fadeOut(300)
}



