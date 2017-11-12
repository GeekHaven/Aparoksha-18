
/**************************************************************************

 GLOBAL VARIABLES

 **************************************************************************/

var touch = 'ontouchstart' in document.documentElement;
var dim = { ww : $(window).width() , wh : $(window).height() };
var loader = {};
var newhash = { page : ''};
var pageSlider = {};
var work = {};
var skillMng = {};
var counter = {};
var componentForm = {form:'.contact form'};
var particles = {};
var cuul = {};
var website_lang = $('html').attr('lang');
var hashes = { actual: window.location.hash.substring(1) , past : ''};
var scroll_down = {};


/**************************************************************************

 GLOBAL EVENT LISTENERS FUNCTIONS

 **************************************************************************/

function ready() {

	if(!Modernizr.csstransforms3d) $('body').prepend('<div class="alert"><div class="box"><h2>Fatti un regalo.</h2><p>Questo sito usa tecnologie moderne non compatibili con il tuo vecchissimo browser.</p><p>Fatti un regalo, impiega due minuti a installare gratuitamente un browser recente, tipo <a href="http://www.google.it/intl/it/chrome/browser/">Google Chrome</a>. Scoprirai che il web è molto più bello!</p></div></div>');
	loader.init();
	$('nav').addClass('hidden');
	//particles.init();
	work.init();
	newhash.change(true);
	extra();
	skillMng.init();
	componentForm.init();
	responsiveNav();
	material_click();
	cuul.init();
	disableHover();
	scroll_down.init();
}

function load() {
	titleSize();
	
	$(loader.element).addClass('done');
	setTimeout(function(){ $(loader.element).remove() },1000)
	setTimeout(function(){
		$('.home img.logo').addClass('fadeDown');
		$('.home div.i_am').addClass('fadeUp');
		$('nav').removeClass('hidden');		
		//$('#awwwards').addClass('appear');		
	},1200);
	/*
	$(loader.element).slideUp(400, function(){
		$(this).remove();
		setTimeout(function(){ $('.home img.logo').addClass('fadeDown') },200);
	}); */
}

function resize() {
	
	dim.ww = $(window).width();
	dim.wh = $(window).height();	
	titleSize();
	//particles.resize();
}

/**************************************************************************

LOADER - plugin spin.js

 **************************************************************************/

loader.init = function(){

	var opts = {
	  lines: 17, // The number of lines to draw
	  length: 0, // The length of each line
	  width: 4, // The line thickness
	  radius: 37, // The radius of the inner circle
	  corners: 1, // Corner roundness (0..1)
	  rotate: 0, // The rotation offset
	  direction: 1, // 1: clockwise, -1: counterclockwise
	  color: '#fff', // #rgb or #rrggbb or array of colors
	  speed: 1.1, // Rounds per second
	  trail: 44, // Afterglow percentage
	  shadow: false, // Whether to render a shadow
	  hwaccel: false, // Whether to use hardware acceleration
	  className: 'spinner', // The CSS class to assign to the spinner
	  zIndex: 2e9, // The z-index (defaults to 2000000000)
	  top: '50%', // Top position relative to parent in px
	  left: '50%' // Left position relative to parent in px
	};
	this.element = document.getElementById('loader');
	var spinner = new Spinner(opts).spin(this.element);
}

/**************************************************************************

 SCROLL DOWN 

**************************************************************************/

scroll_down.init = function(){
	$('#world > section').not('.home').each(function(){
		var s = ( $(this).hasClass('work') ) ? $(this).find('> section.container') : $(this);
		$('<a class="scroll_down fa fa-chevron-down"></a>').appendTo(s);
	});
}
scroll_down.manage = function(){
	var section = ( $('#world > section.selected').hasClass('work') ) ? $('#world > section.selected > section.container') : $('#world > section.selected');
	if(section.hasClass('home')) return;
	if(section[0].scrollHeight <= dim.wh) return;
	var elem = section.find('a.scroll_down');	
	
	var timer = setTimeout(function(){ elem.addClass('show') }, 2000);
	elem.click(function(){ section.animate({ scrollTop : dim.wh }, 1000, 'easeInOutCubic'); });
	section.on('scroll', function(){
		clearTimeout(timer);
		if( $(this).scrollTop() > 0 ) elem.removeClass('show');
		else elem.addClass('show');
	});	
}

/**************************************************************************

DISABLE HOVER

**************************************************************************/
 
function disableHover(){ 
	if(touch) $('nav ul li a').addClass('disablehover');
	}

/**************************************************************************

 CUUL EFFECT

 **************************************************************************/

cuul.init = function(){
	$('.special-counter, .passions, .contact form, .thanksforwatching p').addClass('cuul rotateXInDown');
	$('.about .wrapper > h3, .skills > .wrapper > h3, .work > .container > a, .contact .social li').addClass('cuul scaleIn');
	$('.work > .container > h3, .work > .container > img, .work > .container > ul').addClass('cuul fadeInDown');
		
	$('#world > section, #world > section.work > .container').on('scroll', function(e){ cuul.scroll(e) });
	$(window).resize(function(){ cuul.initSection() });
}

cuul.initSection = function(){
	this.cuuls = [];
	this.scrolltop = 0;
	
	$('#world > section.selected').find('.cuul').each(function(){
		var section = $(this).parents('section').not('#world');
		cuul.cuuls.push({ elem : this , top : $(this).offset().top , section : section[section.length-1] });
	});

	$('#world > section.selected').trigger('scroll');
}

cuul.checkvisibility = function(obj){
	var delay = ($(obj.elem).height()/2 <= 100) ? $(obj.elem).height()/2 : 100;
	if(this.scrolltop + dim.wh - delay >= obj.top)	$(obj.elem).addClass('cuul-animated');
	else $(obj.elem).removeClass('cuul-animated');	
}

cuul.scroll = function(e){
	var scrolled_section = (e.currentTarget.classList[0] != 'container') ? e.target : e.currentTarget.parentElement ;
	
	this.scrolltop = $(e.target).scrollTop();
	
	for( var i in this.cuuls){
		if( this.cuuls[i].section ==  scrolled_section) this.checkvisibility(this.cuuls[i])	
	}
	
}

/**************************************************************************

RESPONSIVE NAV

 **************************************************************************/

function responsiveNav(){
	var nav = $('nav');
	var li = nav.find('li');
	var li_a = li.find('a');
	var ctrl = $('nav a.responsive_ctrl');
	
	function resize_nav(){
		if(dim.ww <= 700){
			li_a.css('line-height', dim.wh / li.length +'px' );
		}else{
			li_a.attr('style','');
		} 
	}
	resize_nav();
	
	
	ctrl.click(function(){	nav.toggleClass('opened');	});
	li_a.click(function(){	if(dim.ww <= 700) nav.toggleClass('opened');	});
	li.filter('.closeNav').click(function(e){ e.preventDefault(); });
	
	$(window).resize( resize_nav );
}


/**************************************************************************

 MATERIAL CLICK

 **************************************************************************/
 
function material_click(){
	
	$('#world > section').not('section.home').click(function(e){
		
		var section = $(this);
		var scroll = section.scrollTop();
		var x = e.pageX;
		var y = e.pageY + scroll;
		var color = section.find('h2').css('background-color');
		
		if(!color) color = '#ccc';
		
		var circle = $('<div></div>').appendTo(section);
		
		circle.css({
			'position' : 'fixed',
			'top' : y,
			'left' : x,
			'z-index' : '99999',
			'border-radius':'50px',
			'width' : '2px',
			'height' : '2px',
			'background' : color,
			'-webkit-box-shadow' : '0 0 0 0 '+color,
			'box-shadow' : '0 0 0 0 '+color,
			'opacity' : 1,
			'-webkit-transition': '-webkit-box-shadow 1s, opacity 1s',
			'transition': 'box-shadow 1s, opacity 1s'	
					
		});
		setTimeout(function(){
			circle.css({
				'opacity' : 0,
				'box-shadow' : '0 0 0 60px #ccc'
			});
		},5);
		setTimeout(function(){
			circle.remove();
		},1010);
		
	});
		
}

/**************************************************************************

 PARTICLES

 **************************************************************************/

    
particles.init = function(){

    /*this.stage;
	this.circles;
    this.colors = ['#d51b11', '#2ecc71', '#FDC162', '#7BB7FA'];*/
	
	//$('canvas#stage').remove();
	//$('section.home').prepend('<canvas id="stage" width="500" height="200"></canvas>');
	//$('section.home').prepend('<canvas id="stage"></canvas>');
	/*this.initStages();
	this.initCircles();
   this.animate();*/
	
}/*
particles.resize = function(){

    this.stage.canvas.width = dim.ww;
    this.stage.canvas.height = dim.wh;
    this.stage.removeAllChildren();
	this.stage.update();    
    for(var i in this.circles) this.circles[i].tween.kill();
	particles.initCircles();
	particles.hashchange();
	
}

particles.initStages = function() {

        this.stage = new createjs.Stage("stage");
        this.stage.canvas.width = dim.ww;
        this.stage.canvas.height = dim.wh;
    }
    
particles.initCircles = function() {
        this.circles = [];
        var num_circles = (dim.ww*0.7 > 300) ? 300 : dim.ww*0.7 ;
        for(var i=0; i<num_circles; i++) {
            var circle = new createjs.Shape();
            var r = Math.floor(Math.random() * 4) + 1;
            var x = dim.ww*Math.random();
            var y = dim.wh*Math.random();
            var color = this.colors[Math.floor(i%this.colors.length)];
            var alpha = 0.1 + Math.random()*0.1;
            circle.alpha = alpha;
            circle.radius = r;
            circle.graphics.beginFill(color).drawCircle(0, 0, r);
            circle.x = x;
            circle.y = y;
            this.circles.push(circle);
            this.stage.addChild(circle);
            circle.movement = 'float';
            this.tweenCircle(circle);
        }
    }
    
particles.animate =  function() {
        particles.stage.update();
        requestAnimationFrame(particles.animate);
    }
    
particles.tweenCircle = function(c) {
        if(c.tween) c.tween.kill();
                
        c.tween = TweenLite.to(
        	c, 
        	5 + Math.random()*3.5,
        	{
        		x: c.x -100+Math.random()*200,
        		y: c.y -100+Math.random()*200,
        		ease:Quad.easeInOut, 
        		alpha: Math.random(),
        		onComplete: function() { particles.tweenCircle(c); }
        	}
        );	        
    } 
    
particles.hashchange = function(){
	var nav = $('nav');
	if(newhash.page == 'home' ){
		nav.addClass('transparent');
		for(var i in this.circles) this.circles[i].tween.play();
	}else{
		nav.removeClass('transparent');
		for(var i in this.circles) this.circles[i].tween.pause();
	}
	
}

 
/**************************************************************************

COMPONENT FORM

 **************************************************************************/

componentForm.init = function(){
	
	var $form = $(this.form),
		$result = $form.find('p.result'),
		$submit = $form.find('a.submit'),
		mess_required = (website_lang == 'it') ? "Hey, dovresti compilarlo!" : "Hey, you have to fill!";
		mess_required_email = (website_lang == 'it') ? "Mi vuoi fregare? Inserisci un email valida." : "Are you cheating me? Insert a valid email address.";
		mess_ok = (website_lang == 'it') ? "Yessa! Il tuo messaggio ha preso il volo!" : "Yessa! Your message is on his way!";
		mess_ko = (website_lang == 'it') ? "Qualcosa è andato storto, mi dispiace. Ricarica la pagina e riprova." : "Something went wrong, I'm sorry. Reload the page and try again.";
	
	$form.find('.component').first().addClass('selected');
	
	$submit.click(function(e){

		e.preventDefault();
		$result.text('');
		
		var sel_component = $form.find('.component.selected');
		var sel_component_input = ( sel_component.find('input').length > 0 ) ? sel_component.find('input') : sel_component.find('textarea');
		
		if(sel_component_input.prop('required') && sel_component_input.val()==""){
			$result.text(mess_required);
			return;	
		}
		if( sel_component_input.attr('pattern') ){
			var re = new RegExp(sel_component_input.attr('pattern'));
			if( !re.test(sel_component_input.val()) ){
				$result.text(mess_required_email);
				return;	
				}
		}
		
		if(sel_component.next('.component').length > 0){			
			var next_component = sel_component.next();
			var next_component_input = ( next_component.find('input').length > 0 ) ? next_component.find('input') : next_component.find('textarea');			
			sel_component.addClass('pre_selected');
			next_component.addClass('pre_selected');
			setTimeout(function(){ 
				sel_component.removeClass('selected'); next_component.addClass('selected');
				setTimeout(function(){ next_component.removeClass('pre_selected'); next_component_input.focus(); }, 20)	
			},400);			
						
		}else{
			$.ajax({				
				type: "POST",
				url: "/assets/send.php",
				data: $form.serialize(),
				dataType: "json",
				success: function(result){		
					if(result.msg == 'ok') $result.text(mess_ko).addClass('ko');
					else $result.text(mess_ko).addClass('ko');
					$form.find('fieldset').fadeOut(600);					
				},
				error: function(result){	
					$result.text(mess_ko).addClass('ko');
					$form.find('fieldset').fadeOut(600);	
				}
			});
		}		
	});
	
	$form.find('input').keypress(function(e){
		if(e.keyCode == 13) $submit.trigger('click');
	});
	
}

/**************************************************************************

 HASH CHANGE

**************************************************************************/

newhash.change = function(first_exec){
	
	
	if( pageSlider.runningAnimation == true && !first_exec) return
	
	var h = window.location.hash.substring(1);

	hashes.past = hashes.actual;
	hashes.actual = h;	

	if(!h) h = 'home';
	newhash.page = h.split('-')[0];
	newhash.work =  h.split('-')[1];
	
	if(first_exec){
		pageSlider.init();
		//$(window).load(function(){ });
	}else{
		pageSlider.move();
		if(newhash.work) work.change();
	}
	//particles.hashchange();
	language();
}


/**************************************************************************

 LANGUAGE

**************************************************************************/

function language(){
	$('div.lang a').each(function(){
		$(this).attr('href', $(this).attr('href').split('#')[0]+'#'+newhash.page);
	});	
}

/**************************************************************************

 PAGE SLIDER

**************************************************************************/


pageSlider.init = function(){

	var ss = $('#world > section.'+newhash.page);
	ss.addClass('selected').siblings().removeClass('selected');
	ss.find('h2').addClass('selected');
	ss.css('overflow-y','scroll');
	
	$(window).load(function(){ cuul.initSection(); });
	scroll_down.manage(); 
	if(ss.hasClass('work')) work.initSection();
	
	$('nav ul li:eq('+ss.index()+') a').addClass('selected').css('color', ss.find('h2').css('background-color') );

	if (touch){
		$('h2').hide();
		return;	
	} 
	
	$('#world > section').css({'-webkit-transition':'-webkit-transform .5s' , 'transition':'transform .5s'});
	var n = ss.index()+1;
	
	
	$('#world > section').not('.selected').each(function(){
		var section = $(this);
		var pos = section.index()+1;
		// Calcolo la differenza numerica tra l'ID della pagina in each e la pagina Home
		var distanceFromHome = pos - n;	
		// Definisco il valore di traslazione X per la pagina in each - Es. 1: pagina in each è la 4, distanceFromHome sarà 3 e la traslazione X da percorrere sarà 330%.
		section.css({
			'-webkit-transform':'translateZ(-500px) rotateY(45deg) translateX('+distanceFromHome+(Math.abs(distanceFromHome)*2)+'0%)',
			'-ms-transform':'translateZ(-500px) rotateY(45deg) translateX('+distanceFromHome+(Math.abs(distanceFromHome)*2)+'0%)',
			'transform':'translateZ(-500px) rotateY(45deg) translateX('+distanceFromHome+(Math.abs(distanceFromHome)*2)+'0%)'
		});
	});
	
}

pageSlider.move = function(){

	var $page_dest = $('#world > section.'+newhash.page);
	var destination = $page_dest.index()+1,
		$page_curr = $('#world > section.selected'),
		current = $page_curr.index()+1,
		distance = destination-current;
				
	var tempo =	(current!=1) ? 500 : 0;
	
	if(touch) tempo = 0;
		
	var sections = $('#world > section');
	
	if( destination != current ){
		this.runningAnimation = true;
		//$('nav').addClass('hidden');
		sections.not('.selected').show();
		
		sections.animate({ scrollTop: 0 }, 'fast');
		$('section.selected h2').removeClass('selected');
		
		sections.css('overflow-y','hidden');	
		
		setTimeout(function(){
			$page_curr.css({
			'-webkit-transform':'translateZ(-500px) rotateY(45deg) translateX(0)',
			'-ms-transform':'translateZ(-500px) rotateY(45deg) translateX(0)',
			'transform':'translateZ(-500px) rotateY(45deg) translateX(0)'
			});
		}, tempo);
		
		if(!touch) tempo = tempo+500;	
		
		setTimeout(function(){
			$page_curr.removeClass('selected');
			$page_dest.addClass('selected');			
			var color = $page_dest.find('h2').css('background-color');						
			$('nav ul li:eq('+(destination-1)+') a').css('color',color).addClass('selected').parent().siblings().children().css('color','#ffffff').removeClass('selected');			
			sections.each(function(){
				var translate = $(this).index() +1 - current - distance;
				var translateX = 'translateX('+translate+(Math.abs(translate)*2)+'0%)';
				$(this).css({
					'-webkit-transform':'translateZ(-500px) rotateY(45deg) '+translateX,
					'-ms-transform':'translateZ(-500px) rotateY(45deg) '+translateX,
					'transform':'translateZ(-500px) rotateY(45deg) '+translateX
				});
			});
		}, tempo);
		
		if(!touch) tempo= tempo+500;
		
		setTimeout(function(){ $page_dest.css({
			'-webkit-transform':'translateZ(0px) rotateY(0deg)',
			'-ms-transform':'translateZ(0px) rotateY(0deg)',
			'transform':'translateZ(0px) rotateY(0deg)'
		});	}, tempo);

		if(!touch) tempo= tempo+500;		
		
		setTimeout(function(){ $page_dest.find('h2').addClass('selected'); }, tempo);
		
		if(!touch) tempo= tempo+500;
		
		setTimeout(function(){ 
			// $('nav').removeClass('hidden');
			sections.not('.selected').hide();
			$page_dest.css('overflow-y','scroll'); 
			cuul.initSection(); 
			window.location.hash = hashes.actual;
			pageSlider.runningAnimation=false; 
			scroll_down.manage(); 
			if(newhash.page == 'work') work.initSection();
		}, tempo);	
		
	}
}	


/**************************************************************************

WORK

 **************************************************************************/


work.init = function(){
	this.container = $('#world > section.work section.container');
	this.link = $('#world > section.work aside ul li');
	this.h3s = [];
	var that = this;
		
	function onscroll(){	
		var scroll = that.container.scrollTop();
		for(var i in that.h3s){
			if( that.h3s[parseInt(i)+1] > scroll || that.h3s[parseInt(i)+1] == null ){ that.link.eq(i).children('a').addClass('selected').parent().siblings().children('a').removeClass('selected'); break }
		}
	}
	this.container.on('scroll', onscroll );
	$(window).resize( function(){ if(newhash.page == 'work') that.initSection() })
	
}
work.initSection = function(){
	var that = this;
	this.h3s = [];
	var scroll = that.container.scrollTop();
	$('h3', this.container).each(function(){		
		that.h3s.push(parseInt($(this).position().top + scroll));		
	});
	this.container.trigger('scroll');
}
work.change = function(){
	var w = $('h3.'+newhash.work, this.container).position().top;
	this.container.animate({ scrollTop: this.container.scrollTop() + w}, 1000);
}


 
/**************************************************************************

COUNTER

**************************************************************************/

counter.init = function(){
	
	var sc = $('.special-counter div');
	var scroll_elem = $('#world > section');
	
	scroll_elem.scroll(function(){
		var parent = $(this);
		sc.each(function(){	
			var visible = ( $(this).offset().top + $(this).height()/2 > + dim.wh ) ? false : true;
			if( visible && !$(this).hasClass('animated') ) counter.go(this);
			else if(!visible) $(this).removeClass('animated');
		});
	});
	
}

counter.go = function(elem){
	
	var that = $(elem);
	var value = that.data('value');
	var i = 0;
	that.addClass('animated');
	var cycle = setInterval(function(){
		if(i<=value){ that.text(i); i++ }
		else{ clearInterval(cycle); }
	}, 10);
}


/**************************************************************************

TITLE SIZE

 **************************************************************************/

function titleSize(){
	$('h2').css('font-size', 15/1200 * dim.ww+'em').css('line-height', dim.wh+'px');
}

/**************************************************************************

SKILLS SELECTOR

 **************************************************************************/

skillMng.init = function(){

	var section = $('section.skills');
	var areas = $('.aree article');
	var abilities = $('.abilita article');
	var closeBtn = $('.abilita article a.close');
	var time_interval = 300;
	var time_transition = 'all .5s';
	var time_fix = 50;
	
	if(touch) { time_interval = 0; time_transition = 'all 0s'; time_fix = 0; }
	
	areas.click(function(){	
		var scroll = section.scrollTop();
		var top = $(this).offset().top + scroll +($(this).height()/2);
		var left = $(this).offset().left + ($(this).width()/2);
		var target = this.className.split(/\s+/)[0];
		var $t = abilities.filter('.'+target);
		
		//$('nav').addClass('hidden');
		section.addClass('noscroll');
		$t.css({ top : top , left : left });
		
		setTimeout(function(){			
			$t.css({ '-webkit-transition': time_transition , 'transition': time_transition });
			$t.css({ width : '100%' , height : dim.ww, top : scroll - ((dim.ww - dim.wh) /2 ) +'px' , left : 0 });
		}, time_fix);
		setTimeout(function(){
			$t.css({ 'border-radius':'0' });			
			setTimeout(function(){
				$t.css({ 'height':'100%', top : scroll+'px', 'overflow-y' : 'scroll' });			
				setTimeout(function(){
					$t.addClass('selected');
					
					$t.find('.wrapper .skillbar div > div').each(function(){
						$(this).css('width','0');
						$(this).animate({ width: $(this).attr('data-value')+'%' }, 2000);
					});
					
				}, time_interval);		
			}, time_interval);			
		}, time_interval);		
	});
	
	closeBtn.click(function(){
		
		var ability = $(this).parent('article');
		var scroll = section.scrollTop();
		
		//$('nav').removeClass('hidden');
		ability.removeClass('selected').css({ height : dim.ww , top : scroll - ((dim.ww - dim.wh) /2 ) +'px' });;
		
		var target = ability.attr('class').split(/\s+/)[0];
		var $t = areas.filter('.'+target);
		var top = $t.offset().top + scroll +($t.height()/2);
		var left = $t.offset().left + ($t.width()/2);
		
		setTimeout(function(){
			ability.css({ 'border-radius': '1000px'  });
			setTimeout(function(){
				ability.css({ 'overflow-y':'hidden', width : 0 , height : 0 , left : left , top : top });		
				section.removeClass('noscroll');
			}, time_interval);
		}, time_interval);
				
	});
	
	
	$(window).on('hashchange', function(){ closeBtn.click(); });
	
	$(window).resize(function(){
		if(abilities.hasClass('selected')){
			abilities.filter('.selected').css({ top : section.scrollTop() +'px' })
		}
	})
	
	
}

/**************************************************************************

 EXTRA

 **************************************************************************/

 function extra(){
 		$('textarea').css('overflow', 'hidden').autogrow();
 	}
 	

/**************************************************************************

 GOOGLE ANALYTICS

 **************************************************************************
 
var _gaq = _gaq || [];
_gaq.push(['_setAccount','UA-55671055-1	']);
_gaq.push(['_trackPageview']);
(function() {
	var ga = document.createElement('script');
	ga.type = 'text/javascript';
	ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(ga, s);
})();

/**************************************************************************

 GLOBAL EVENT LISTENERS

 **************************************************************************/

$(document).ready(ready);
$(window).load(load);
$(window).resize(resize);
$(window).on('hashchange', function(){ newhash.change(false) });