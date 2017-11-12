
(function($){
    
    $.fn.extend({
        
        pushText: function( params ) {
            
            var defaults = {
                duration: 1000,
                easing:   'easeOutQuint',
                ratio:    0.555,
                text:     ''
            };
            
            var options = $.extend( defaults, params );
            
            return this.each(function(){
                
                var $this = $(this),
                        $span = $('<span>').addClass('old'),
                        timer = { progress: 0.0 },
                        prev  = $this.text(),
                        rInv  = 1.0 / options.ratio,
                        text  = options.text.toString(),
                        textA = '',
                        textB = '';
                        
                $(timer).animate({
                    progress: 1.0
                },{
                    duration: options.duration,
                    step: function() {
                        
                        textA = text.substr(0, Math.round(text.length * timer.progress * rInv));
                        textB = prev.substr(Math.round(prev.length * timer.progress));
                        
                        $span.text( textB );
                        $this.text( textA ).append( $span );
                        
                    },
                    easing: 'easeOutQuint'
                });
                
            });
            
        }
        
    });
    
})(jQuery);