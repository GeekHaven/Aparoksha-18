 $(document).ready(function() {
 	$('nav ul li').click(function() {
 		$('nav ul li').removeClass('active');
 		$(this).addClass('active');
 	});

	$('.button-collapse').sideNav({
      menuWidth: 240, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );

 	$('.carousel').carousel();

 	$('.collapsible').collapsible();
 	$('.collapsible li').click(function() {
 		$('.collapsible-body').css({'display': 'none'});
 		console.log($(this).find('.collapsible-body'));
 		$(this).find('.collapsible-body').css({'display': 'block'});
 	})

});