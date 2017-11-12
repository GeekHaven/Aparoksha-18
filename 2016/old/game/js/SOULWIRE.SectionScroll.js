
SOULWIRE.SectionScroll = (function(){
    
    var $context    = $("nav.pagination");
    var $container  = null;
    var $scroller   = null;
    var $children   = null;
    
    var $next       = $context.find(".next a");
    var $prev       = $context.find(".prev a");
    
    return {
        
        init: function() {
            // Bind event handlers
            $next.bind("click", SOULWIRE.SectionScroll.next);
            $prev.bind("click", SOULWIRE.SectionScroll.prev);
        },
        
        /*
         * Returns the index of the closest child
         */
        getNearestIndex: function() {

            if( $children ) {

                var offset,
                        closest = 0,
                        distance = Number.MAX_VALUE;

                $children.each(function( index ){
                    offset = Math.abs( $(this).offset().left );
                    if( offset < distance ) {
                        distance = offset;
                        closest = index;
                    }
                });

                return closest;
            }

            return 0;
        },

        /*
         * Sets up pagination for a section and disables it if not required
         */
        update: function( section ) {

            var container = section.find(".container-x");
            var scroller = section.find(".scroll-x");

            if( !!container.length && !!scroller.length ) {
                $scroller = scroller;
                $container = container;
                $children = container.children();
                $context.addClass("enabled");
            } else {
                $scroller = null;
                $container = null;
                $children = null;
                $context.removeClass("enabled");
            }
        },

        /*
         * Scrolls the current section by a given amount of children
         */
        scroll: function(offset) {
            if( $container ) {

                var move;

                if( $children ) {
                    var index = SOULWIRE.SectionScroll.getNearestIndex() + offset;
                    var target = Math.min(Math.max(0, index), $children.length - 1);
                    var closest = $( $children[ target ] );
                    move = closest.offset().left;
                } else {
                    move = 500 * offset;
                }

                $scroller.stop().animate({
                    scrollLeft: $scroller.scrollLeft() + move
                },{
                    duration: 350,
                    easing: "easeInOutQuint"
                });
            }
        },

        /*
         * Scrolls to next child
         */
        next: function() {
            SOULWIRE.SectionScroll.scroll(1);
            return false;
        },

        /*
         * Scrolls to previous child
         */
        prev: function() {
            SOULWIRE.SectionScroll.scroll(-1);
            return false;
        }
        
    };
    
})();

//SOULWIRE.SectionScroll.init();