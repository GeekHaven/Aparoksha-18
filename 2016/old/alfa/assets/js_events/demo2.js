(function(){

    var button = document.getElementById('cn-button'),
    wrapper = document.getElementById('cn-wrapper');

    //open and close menu when the button is clicked
	var open = false;
	button.addEventListener('click', handler, false);

	function handler(){
	  if(!open){
	    this.innerHTML = "Close";
	    classie.add(wrapper, 'opened-nav');
	  }
	  else{
	    this.innerHTML = "Categories";
		classie.remove(wrapper, 'opened-nav');
	  }
	  open = !open;
	}
	function closeWrapper(){
		classie.remove(wrapper, 'opened-nav');
	}
	
	$('ul.menuE li').click(function(e) { 
	 handler();
	});
	handler();
})();

$('.elec').hover(function(){
	$('.show-elec').fadeIn(200);
},function() {
	$('.show-elec').fadeOut(200);
});

$('.foss').hover(function(){
	$('.show-foss').fadeIn(200);
},function() {
	$('.show-foss').fadeOut(200);
});

$('.graphic').hover(function(){
	$('.show-graphic').fadeIn(200);
},function() {
	$('.show-graphic').fadeOut(200);
});

$('.robo').hover(function(){
	$('.show-robo').fadeIn(200);
},function() {
	$('.show-robo').fadeOut(200);
});

$('.dev').hover(function(){
	$('.show-dev').fadeIn(200);
},function() {
	$('.show-dev').fadeOut(200);
});

$('.quiz').hover(function(){
	$('.show-quiz').fadeIn(200);
},function() {
	$('.show-quiz').fadeOut(200);
});

$('.misc').hover(function(){
	$('.show-misc').fadeIn(200);
},function() {
	$('.show-misc').fadeOut(200);
});
