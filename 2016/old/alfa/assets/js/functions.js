var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};
var menu= 0	
$(function(){
	
	if( isMobile.any() ) {
	
	}else{
		$('html,body').mousemove(function(xy) {
			
			winHeight = $(window).innerHeight();
			winHeight2 = Math.ceil(winHeight/145.5) * 145.5;
			winWidth = $(window).innerWidth();
			middle = winWidth/2
			middleHeight = winHeight/2
			pageX = (xy.pageX); 
			pageY = (xy.pageY); 
			middle2 = pageX-middle;
			middle3 = pageY-middleHeight;
                        
                        var $textShadow = $('.text_shadow');
			for (var i = 0; i < $textShadow.length;  i++) {
			var thisPos = $($textShadow[i]).offset().top;
			var thisCenter = $($textShadow[i]).height() / 2;
			var thisPosCenter = pageY - (thisPos + thisCenter);
                           $($textShadow[i]).css({'text-shadow': '' + -((middle2 * 0.025)) + 'px ' + -((thisPosCenter * 0.025)) + 'px 0 rgba(24,230,152,0.5)'});
                        
                           //TweenMax.to($textShadow[i], .5, {css:{textShadow:'' + -((middle2 * 0.02)) + 'px ' + -((thisPosCenter * 0.02)) + 'px 0 rgba(24,230,152,0.5)'}});
			};
		});
		
	}
	
});