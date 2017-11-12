

(function($){
    
    $.fn.slicer = function( params ) {
        
        var defaults = {
            horizontal: true,
            duration: 500,
            slices: 3
        };
        
        var options     = $.extend( defaults, params ),
                $context    = $(this),
                $container  = $('<div>'),
                $children   = $context.children(),
                numItems    = $children.size(),
                horizontal  = options.horizontal,
                viewports   = [],
                wrappers    = [],
                height      = $children.height(),
                width       = $children.width(),
                slices      = options.slices,
                stepA       = Math.round(horizontal ? height / slices : width / slices),
                stepB       = horizontal ? width : height,
                API         = {};

        function init() {

            var $viewport,
                    $wrapper,
                    style,
                    items;

            // Style children and tag with their index
            $children.each(function( index ){

                style = {};
                style[ horizontal ? 'left' : 'top' ] = index * stepB;
                style.position = 'absolute';
                style.display = 'block';

                $(this).css( style );
            });

            for( var i = 0; i < slices; i++ ) {

                // Create a viewport for this row / col
                $viewport = $('<div>').addClass('viewport');

                // Create an element to hold the items
                $wrapper = $context.clone();
                
                // THIS IS JUST FOR THE KONAMI CODE!!
                $wrapper.find('img').each(function(index){
                    $(this).attr('name', index);
                });

                // Copy the items
                items   = $wrapper.children().remove();

                // Shuffle them
                items   = shuffle( items.toArray() );

                // Initialise the viewport and wrapper
                setupItem( $viewport, $wrapper, i );

                // Add the items to the wrapper
                $wrapper.append( items );

                // Add the wrapper to the viewport
                $viewport.append( $wrapper );

                // Add the viewport to the container
                $container.append( $viewport );

                // Store a reference to the wrapper and viewport
                viewports.push( $viewport );
                wrappers.push( $wrapper );
            }

            // Append
            $context.before( $container ).remove();
            $container.addClass( 'slot' );
        }

        function setupItem( $viewport, $wrapper, index ) {

            // Containers for styles
            var viewportCSS = {},
                    wrapperCSS  = {};

            // Set the cropped viewport dimension
            viewportCSS[ horizontal ? 'height' : 'width' ] = stepA;
            // Set the full size viewport dimension
            viewportCSS[ horizontal ? 'width' : 'height' ] = stepB;
            // Offset the viewport
            viewportCSS[ horizontal ? 'top' : 'left' ] = stepA * index;
            // Position it and kill overflow
            viewportCSS.position = 'absolute';
            viewportCSS.overflow = 'hidden';

            // Offset the wrapper to compensate for the viewport offset
            wrapperCSS[ horizontal ? 'top' : 'left' ] = stepA * -index;
            wrapperCSS.position = 'relative';

            // Apply styles
            $viewport.css( viewportCSS );
            $wrapper.css( wrapperCSS );
        }

        function shuffle( arr ) {
            
            var shuffled = [],
                    copied   = arr.concat();

            while( copied.length > 0 ) {
                shuffled.push( copied.splice( Math.floor(Math.random() * copied.length), 1 )[0] );
            }

            return shuffled;
        }

        // Initialise

        init();

        // Public API

        API.shuffle = function( target ) {
            
            if( typeof(target) === 'number' ) {
                // If Math.random() was used, map it to the amount of items
                if( target < 1.0 ) {
                    target = Math.floor( target * numItems );
                }
            }

            var tween,
                    index,
                    targ,
                    item;

            for( var i = 0; i < wrappers.length; i++ ) {

                item = wrappers[i];
                
                if( typeof(target) === 'number' ) {
                    index = target;
                } else {
                    index = Math.floor(Math.random() * numItems);
                }

                tween = {};
                tween[ horizontal ? 'left' : 'top' ] = -index * stepB;

                $(item).stop().animate( tween, {
                    duration: options.duration
                });
            }

        };

        API.test = function( p ) {
        };

        // Return only API

        return API;
        
    }
    
})( jQuery );