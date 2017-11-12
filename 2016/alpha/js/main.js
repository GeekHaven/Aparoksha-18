$('.rect-loader').removeClass('not-ready');
var $animLoader = $('.anim-loader');
function drawSVGPaths() {
    $.each( $animLoader, function() {
        var totalLength = this.getTotalLength();
        $(this).css({
            'stroke-dashoffset': totalLength,
            'stroke-dasharray': totalLength + ' ' + totalLength
        });
    });
};
drawSVGPaths();

progressBar = {
    countElmt: 0,
    loadedElmt: 0,
    init: function () {
        var that = this;
        this.countElmt = $('.loading img').length;

        $('.loading img').each(function () {
            $('<img/>')
                .attr('src', $(this).attr('src'))
                .on('load error', function () {
                that.loadedElmt++;
                that.updateProgressBar();
            });
        });
    },
    updateProgressBar: function () {
        var valueDashLoader = Math.round(((progressBar.loadedElmt / progressBar.countElmt) * 273) + 273);
        $animLoader.stop().animate({
            'stroke-dashoffset': valueDashLoader + 'px'
        }, function(){
            if(progressBar.loadedElmt == progressBar.countElmt) {
                $('.loader svg').delay(500).fadeOut(1000).queue(function(){
                    $('body').removeClass('not-ready');
                    $(this).parent().delay(500).fadeOut(2000).queue(function(next){
                        $(this).remove();
                        $('.loading').remove();
                        window.animIntroduction();
                        next();
                    });
                });
            }
        });
    }
};
progressBar.init();

var WIDTH;
var HEIGHT;
var canvas;
var con;
var g;
var pxs = new Array();
var rint = 80;

function draw() {
	con.clearRect(0,0,WIDTH,HEIGHT);
	for(var i = 0; i < pxs.length; i++) {
		pxs[i].fade();
		pxs[i].move();
		pxs[i].draw();
	}
}

function Circle() {
	this.s = {ttl:8000, xmax:5, ymax:2, rmax:8, rt:1, xdef:960, ydef:540, xdrift:4, ydrift: 4, random:true, blink:true};

	this.reset = function() {
		this.x = (this.s.random ? WIDTH*Math.random() : this.s.xdef);
		this.y = (this.s.random ? HEIGHT*Math.random() : this.s.ydef);
		this.r = ((this.s.rmax-1)*Math.random()) + 1;
		this.dx = (Math.random()*this.s.xmax) * (Math.random() < .5 ? -1 : 1);
		this.dy = (Math.random()*this.s.ymax) * (Math.random() < .5 ? -1 : 1);
		this.hl = (this.s.ttl/rint)*(this.r/this.s.rmax);
		this.rt = Math.random()*this.hl;
		this.s.rt = Math.random()+1;
		this.stop = Math.random()*.2+.4;
		this.s.xdrift *= Math.random() * (Math.random() < .5 ? -1 : 1);
		this.s.ydrift *= Math.random() * (Math.random() < .5 ? -1 : 1);
	}

	this.fade = function() {
		this.rt += this.s.rt;
	}

	this.draw = function() {
		if(this.s.blink && (this.rt <= 0 || this.rt >= this.hl)) this.s.rt = this.s.rt*-1;
		else if(this.rt >= this.hl) this.reset();
		var newo = 1-(this.rt/this.hl);
		con.beginPath();
		con.arc(this.x,this.y,this.r,0,Math.PI*2,true);
		con.closePath();
		var cr = this.r*newo;
		g = con.createRadialGradient(this.x,this.y,0,this.x,this.y,(cr <= 0 ? 1 : cr));
		g.addColorStop(0.0, 'rgba(255,255,255,'+newo+')');
		g.addColorStop(this.stop, 'rgba(224,241,255,'+(newo*.1)+')');
		g.addColorStop(1.0, 'rgba(77,101,181,0)');
		con.fillStyle = g;
		con.fill();
	}

	this.move = function() {
		this.x += (this.rt/this.hl)*this.dx;
		this.y += (this.rt/this.hl)*this.dy;
		if(this.x > WIDTH || this.x < 0) this.dx *= -1;
		if(this.y > HEIGHT || this.y < 0) this.dy *= -1;
	}

	this.getX = function() { return this.x; }
	this.getY = function() { return this.y; }
}

$(document).ready(function() {

    // var $
    var $nav = $("nav");
    var $body = $("body");
    var $intro = $("#home");
    var $introBg = $(".bgintro");
    var $introHeader = $("#home").find("header");
    var $canvas = $("canvas, .lightAnim");
    var $btnScroll = $('.btn-scroll').find('a');
    var $btnScrollInner = $('.btn-scroll-inner');
    var $btnScrollParent = $('.btn-scroll');
    var $nav = $('nav');
    var $roueLaw3 = $('.roue-law-3');
    var $fullHeight = $(".fullHeight");
    var $introStroke = $('#home .stroke');
    var $introH1 = $('#home h1');
    var $introH2 = $('#home h2');
    var $infoBtn = $('.info-btn');
    var $infoClose = $('.info-close');
    var $info = $('.info');

    // var global
    var windowWidth = $(window).outerWidth();
    var windowHeight = $(window).outerHeight();
    var navHeight = $nav.outerHeight();

    // canvas
    WIDTH = window.innerWidth;
    HEIGHT = window.innerHeight;
    canvas = document.getElementById('particles');
    $(canvas).attr('width', WIDTH).attr('height',HEIGHT);
    con = canvas.getContext('2d');
    for(var i = 0; i < 100; i++) {
        pxs[i] = new Circle();
        pxs[i].reset();
    }
    setInterval(draw,rint);

    // info
    $infoBtn.on('click', function() {
        $info.removeClass('is-desactive');
    });
    $infoClose.on('click', function() {
        $info.addClass('is-desactive');
    });

    // remove class preload => launch the awesome
    $body.delay(500).queue(function(next){
        $(this).removeClass("preload");
        $(this).removeClass("overflowH");
        next();
    });

    // resize
    JeResize();
    $(window).resize(JeResize);
    function JeResize(){

        var windowWidth = $(window).outerWidth();
        var windowHeight = $(window).outerHeight();

        $fullHeight.css('height', windowHeight);
        $fullHeight.css('width', windowWidth);

        var roueLaw3Width = $roueLaw3.outerWidth();
        $roueLaw3.css('height', roueLaw3Width);

    };


    // prefix navigateur
    //var prefixTransform = Modernizr.prefixed('transform');

    // Parallax
    $(window).on("scroll", function(){
        var scrollTop = $(window).scrollTop();
        if (scrollTop <= windowHeight) {
            $intro.css('background-position', 'center ' + ((scrollTop*(.75))) + 'px')
            var calc1 = 1-(scrollTop/400);
            $introHeader.css('opacity', calc1);
            $btnScrollInner.css('opacity', calc1);
            //$introHeader.css('transform', "translateY(" + scrollTop * 1.25 + "px)");
            //$canvas.css('transform', "translateY(" + scrollTop * 1.50 + "px)");
            $introHeader.css('transform', "matrix(1, 0, 0, 1, 0, " + scrollTop * 1.25 + ")");
            $canvas.css('transform', "matrix(1, 0, 0, 1, 0, " + scrollTop * 1.50 + ")");
        };
    });

    // easing for scroll
    $.easing.easeInOutQuart = function (x, t, b, c, d) {
        if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
        return -c/2 * ((t-=2)*t*t*t - 2) + b;
    }
    // scroll
    $.localScroll.defaults.axis = 'y';
    $.localScroll({
        target: 'body',
        queue:true,
        duration:2000,
        hash:true,
        easing: 'easeInOutQuart'
    });

    // anim intro
    var animIntroduction = window.animIntroduction = function(){
            $introH1.delay(250).queue(function(){
                $introH1.shuffleLetters({
                    "text": $(this).attr("data-title"),
                    "type": "symbol",
                    "step": 20,
                    "fps": 40
                });
            $introStroke.addClass('anim');
        });

        $introH2.delay(
            1000
            ).queue(function(next){
                $introH2.shuffleLetters({
                    "type": "symbol",
                    "step": 30,
                    "fps": 40
                });

                $btnScrollParent.delay(1000).queue(function() {
                    $(this).removeClass('not-ready');
                    $nav.removeClass('not-ready').delay(5000).queue(function(next) {
                        $infoBtn.removeClass('not-ready');
                        $(".text-link").each(function (i) {
                            $(this).delay(i*100).queue(function(){
                                $(this).removeClass('not-ready');
                            });
                        });
                        next();
                    });
                });
        });
    };

    /* nav shuffletext */
    var $link = $('nav ul li a');
    $link.on('mouseenter', function () {
        $(this).parent().find('.text-link').show();
        $(this).parent().find('.text-link').shuffleLetters({
            "text": $(this).attr("data-title"),
            "step": 3,
            "fps": 30
        });
    });

    /* scroll to slide */
    $fullHeight.windows({
        snapping: true,
        snapSpeed: 500,
        snapInterval: 1100
    });

    /**** Nav ****/
    $fullHeight.waypoint({
        handler: function(event, direction) {

            var active_section;
            active_section = $(this);
            if (direction === "up") active_section = active_section.prev()
            var active_link = $('nav a[href="#' + active_section.attr("id") + '"]');

            $('.active').removeClass("active");
            active_link.addClass("active");
        },
        offset: '50%'
    })

    /* nav keypress */
    $(document).keyup(function(e){
        if ((e.keyCode || e.which) == 38 || (e.keyCode || e.which) == 37) {
            $nav.find('.active').parent().prev().find('a').trigger('click');
        } if ((e.keyCode || e.which) == 40 || (e.keyCode || e.which) == 39) {
            $nav.find('.active').parent().next().find('a').trigger('click');
        }
    });

    // konami
    $(function(){
        var kKeys = [];
        function Kpress(e){
            kKeys.push(e.keyCode);
            if (kKeys.toString().indexOf("38,38,40,40,37,39,37,39,66,65") >= 0) {
                $(this).unbind('keydown', Kpress);
                launchTheKonami();
            }
        }
        $(document).keydown(Kpress);
    });
    function launchTheKonami(){
        $body.stop().scrollTo('0', 3000);
        $introH1.empty();
        $introH1.html("UX");
        $('.home-to-ux').empty();
        $('.home-to-ux').html("UX");
        $introH2.empty();
        $introH2.html("Fight for the user");
        $('.text-robot').addClass('is-less');
        $('.text-design').addClass('is-more').html('design');
        $body.addClass('konami');
    };


});