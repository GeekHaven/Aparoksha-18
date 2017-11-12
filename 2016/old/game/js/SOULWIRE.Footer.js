
SOULWIRE.Footer = (function(){
    
    var $context        = $('footer#footer');
    var $prompt         = $context.find('nav');
    var $button         = $prompt.find('.button');
    var $sections       = $("#sections");
    var promptVisible   = false;
    var scrollThreshold = 10;
    
    var onSectionScroll = function( event ) {
        
        if( promptVisible ) {
            if( $sections.scrollTop() > scrollThreshold ) {
                $prompt.addClass( 'disabled' );
                promptVisible = false;
            }
        } else if( $sections.scrollTop() < scrollThreshold ) {
            $prompt.removeClass( 'disabled' );
            promptVisible = true;
        }
    };
    
    var onPromptOver = function( event ) {
        $button.addClass( 'over' );
    };
    
    var onPromptOut = function( event ) {
        $button.removeClass( 'over' );
    };
    
    var onPromptClick = function( event ) {
        SOULWIRE.SectionController.navigate( $button.attr("href"), $button.attr("title") );
        return false;
    };
    
    var onKonami = function() {
        var $about = $context.find('.about');
        var html = $about.html();
        html += ' - Thanks go out to <a href="http://placekitten.com/" target="_blank">Mark</a>for the kittens :)';
        $about.html(html);
    };
    
    return {
        
        init: function() {
            
            $sections.bind( 'scroll', onSectionScroll );
            $prompt.bind( 'mouseover', onPromptOver );
            $prompt.bind( 'mouseout',  onPromptOut );
            $prompt.bind( 'click',  onPromptClick );

            onSectionScroll(null);
            
            SOULWIRE.Signals.bind('KONAMI', onKonami, this);
            
        }
        
    };
    
})();

SOULWIRE.Footer.init();