
SOULWIRE.Discussion = (function(){
    
    var $sections    = $('#sections');
    var $context     = $('#discussion');
    var $content     = $context.find('.content');
    var $toggle      = $context.find('.toggle');
    
    return {
        
        refresh: function() {
            // Reset Disquss for current URL
            if( typeof(DISQUS) !== 'undefined' ) {
                DISQUS.reset({
                    reload: true,
                    config: function () {
                        //this.page.developer = 1;
                        this.page.identifier = window.location.pathname;
                        this.page.url = window.location.href + "#!" + window.location.pathname;
                    } 
                });
            }
        },

        enable: function() {
            $context.removeClass('disabled');
            SOULWIRE.Discussion.refresh();
        },

        disable: function() {
            $context.addClass('disabled closed');
            $sections.removeClass('pushed');
        },

        open: function() {
            $context.removeClass('closed');
            $sections.addClass('pushed');
        },

        close: function() {
            $context.addClass('closed');
            $sections.removeClass('pushed');
        },

        init: function() {

            $toggle.bind('click', function(){
                if( $context.hasClass('closed') ) {
                    SOULWIRE.Discussion.open();
                } else {
                    SOULWIRE.Discussion.close();
                }
                return false;
            });

            // Enable Disqus
            var disqus_developer = 1;

            (function() {
                var dsq = document.createElement('script');
                dsq.type = 'text/javascript';
                dsq.async = true;
                dsq.src = 'http://soulwire.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();

            // Check for load
            var checkInterval = setInterval(function(){
                if( typeof(DISQUS) !== 'undefined' ) {
                    clearInterval(checkInterval);
                    if( !$context.hasClass('disabled') ) {
                        SOULWIRE.Discussion.refresh();
                    }
                }
            },100);

            // Listen for signals
            SOULWIRE.Signals.bind( 'enableComments', SOULWIRE.Discussion.enable, SOULWIRE.Discussion );
            SOULWIRE.Signals.bind( 'disableComments', SOULWIRE.Discussion.disable, SOULWIRE.Discussion );
        }
        
    };
    
})();