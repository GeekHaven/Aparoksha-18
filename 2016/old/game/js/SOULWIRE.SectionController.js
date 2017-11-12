
SOULWIRE.SectionController = (function(){
    
    var KONAMI_CODE        = [38,38,40,40,37,39,37,39,66,65,13];
    var konamiProgress     = KONAMI_CODE.concat();
    var konamiTimeout      = null;
    var konamiDone         = false;
    
    var currentPath        = null;
    var currentSection     = null;
    var currentController  = null;
    var initialPath        = null;
    var shownSubSection    = false;
    var changingSection    = false;
    var $container         = $("#sections");
    var sections           = $("#sections > section");
    var sectionsBySlug     = {};
    var controllersBySlug  = {};
    var callbacks          = {};
    var scrollTimeout      = null;
    
    var KONAMIFY = function() {
        var $img, n, w, h;
        $('img').each(function(index){
            $img = $(this);
            n = parseInt($img.attr('name'));
            if(!isNaN(n)) { index = n; }
            w = $img.width() + index;
            h = $img.height() + index;
            $img.attr('src', 'http://placekitten.com/g/' + w + '/' + h);
            $img.attr('width', w).attr('height', h);
        });
    };
    
    /**
     * Registers sections found in the DOM and starts any associated controllers
     */
    var registerSections = function() {
        
        for(var i = 0; i < sections.length; ++i) {
            
            var $section   = $(sections[i]);
            var controller = $section.data("controller");
            var slug       = $section.data("slug");
            
            // Store the section by it's slug
            
            if( slug ) {
                
                sectionsBySlug[slug] = $section;
                
                // Start the section's controller

                if( controller ) {
                    try {
                        var constructor = SOULWIRE.SectionController.getDefinitionByName( controller );
                        controllersBySlug[ slug ] = new constructor( $section );
                    } catch( error ) {
                        //console.warn( error, controller );
                    }
                } else {
                    // If no custom controller is specified, use the AbstractController
                    controllersBySlug[ slug ] = new SOULWIRE.AbstractController( $section );
                }
            }
        }
    };
    
    /**
     * Checks the container scroll position and switches sections if necessary
     */
    var checkScrollPosition = function() {
        
        var threshold   = $container.height() * 0.5,
            distance    = Number.MAX_VALUE,
            $section,
            section,
            closest,
            slug,
            top,
            bot,
            dt,
            db,
            dd;
        
        for( var i = 0, n = sections.length; i < n; ++i ) {
            
            section = sections[i];
            $section = $(section);
            
            top = $section.position().top;
            bot = top + $section.height();
            
            dt = Math.abs(threshold - top);
            db = Math.abs(threshold - bot);
            dd = Math.min(dt, db);
            
            if( dd < distance ) {
                distance = dd;
                closest = section;
            }
        }
        
        slug = $(closest).data("slug");
        SOULWIRE.SectionController.enableSection( slug );
    };
    
    /**
     * Event handler for the container scroll event
     */
    var onContainerScroll = function( event ) {
        clearTimeout( scrollTimeout );
        scrollTimeout = setTimeout( checkScrollPosition, 150 );
    };
    
    /**
     * Event handler for history popstate
     */
    var onHistoryPopState = function( event ) {
        SOULWIRE.SectionController.focusSection();
        SOULWIRE.SectionController.trackPageView();
    };
    
    var onKeyDown = function( event ) {
        
        var key = event.keyCode;
        var top = currentSection.prev().length === 0;
        
        // If we're in the home section, check for Konami code
        if(!konamiDone && top && key === konamiProgress[0]) {
            
            // Another one down...
            konamiProgress.shift();
            if(konamiProgress.length === 0) {
                SOULWIRE.Signals.send('KONAMI');
                KONAMIFY();
                konamiDone = true;
            }
            
            // Set a timeout to reset progress
            clearTimeout(konamiTimeout);
            konamiTimeout = setTimeout(function(){
                konamiProgress = KONAMI_CODE.concat();
            }, 800);
            
            // Don't process normal key events
            return false;
            
        } else {
            // You fucked it, start again!
            konamiProgress = KONAMI_CODE.concat();
        }
        
        // Normal key events
        var target;
        
        switch(key) {
            
            case 38 : // Up
            case 40 : // Down
                
                if(changingSection) {
                    return;
                }
                
                target = currentSection[key === 38 ? 'prev' : 'next']('section');
                
                if(target.length > 0) {
                    var slug = target.data('slug');
                    if(slug) {
                        SOULWIRE.SectionController.navigate('/' + slug);
                    }
                }
                
                break;
                
            case 37 : // Left
            case 39 : // Right
                
                target = currentSection.find(".scroll-x");
                
                if(target.length > 0) {
                    var position = target.scrollLeft();
                    position += (key === 37 ? -1 : 1) * $(window).width() * 0.5;
                    target.stop().animate({
                        scrollLeft: position
                    },{
                        duration: 500,
                        easing: "easeOutQuint"
                    });
                }
                
                return false;
                
                break;
        }
    };
    
    /**
     * Event handler for the window resize event
     */
    var onWindowResize = function( event ) {
        SOULWIRE.SectionController.focusSection(false);
    };
    
    return {
        
        historyLength: 0,
        
        /**
         * Initialises the section controller
         */
        init: function() {
            
            initialPath = SOULWIRE.SectionController.getPathSegments();

            // Register visible sections
            registerSections();

            // Enable history API if available
            if( SOULWIRE.SectionController.supportsHistoryAPI() ) {
                window.addEventListener( "popstate", onHistoryPopState, false );
            } else {
                // If we're deeplinked, redirect to hash...
                if( window.location.hash.length === 0 ) {
                    var path = window.location.pathname.replace(/^\/|\/$/g, '');
                    if( path.length > 0 ) {
                        SOULWIRE.SectionController.navigate(path);
                    }
                }
            }

            // Listen for window resize event
            $(window).bind("resize", onWindowResize);
            $(window).bind("keydown", onKeyDown);

            // Listen for scroll events
            $container.bind( "scroll", onContainerScroll );

            // Focus the current section
            SOULWIRE.SectionController.focusSection();

            // Check scroll position immediately
            checkScrollPosition();

            // Show sections
            setTimeout(function(){
                sections.css({opacity: 1.0});
            }, 500);
            
            // Track the initial page view
            SOULWIRE.SectionController.trackPageView();
        },
        
        trackPageView: function( path ) {
            if(typeof(path) === 'undefined') {
                path = SOULWIRE.SectionController.getPathSegments().join('/');
            }
            path = path.replace(/^\/+|\/+$/g, '');
            _gaq.push(['_setAccount', 'UA-323020-1']);
            _gaq.push(['_trackPageview', '/' + path + '/']);
        },
        
        /**
         * Checks whether the current browser supports history
         */
        supportsHistoryAPI: function() {
            return !!(window.history && history.pushState); 
        },
        
        /**
         * Returns a function reference from a string
         */
        getDefinitionByName: function( classname ) {

            var ns = classname.split('.');
            var fn = (window || this);

            for( var i = 0, n = ns.length; i < n; ++i ) {
                fn = fn[ ns[i] ];
            }

            if( typeof fn !== "function" ) {
                throw new Error( "'" + classname + "' is not a valid function definition" );
            }

            return fn;
        },
        
        /**
         * Returns the uri segments in the provided path or the window's current location
         */
        getPathSegments: function( uri ) {

            if( SOULWIRE.SectionController.supportsHistoryAPI() ) {
                // If history is supported
                uri = uri || window.location.pathname;
            } else {
                // Otherwise, use hash
                uri = uri || window.location.hash;
            }

            return uri.replace(/^\#?\/|\/$/g, '').split('/');
        },
        
        /**
         * Navigates to a URL and pushes the change into the history
         */
        navigate: function( url, title, state ) {
            
            if( SOULWIRE.SectionController.supportsHistoryAPI() ) {
                // If history is supported
                if( url !== window.location.pathname ) {
                    history.pushState( state || {}, title, url );
                    SOULWIRE.SectionController.historyLength++;
                }
            } else {
                // Otherwise, use hash
                window.location = '/#/' + url.replace(/^\//, '');
            }
            
            SOULWIRE.SectionController.focusSection();
            SOULWIRE.SectionController.trackPageView();
        },
        
        /**
         * Brings the current section (based on window location) into focus
         */
        focusSection: function(animate) {

            animate = (typeof(animate) === "undefined" ? true : animate);

            var segments = SOULWIRE.SectionController.getPathSegments(),
                    fullPath = segments.join('/'),
                    section;

            if( section = sectionsBySlug[ segments[0] ] ) {

                var top = $container.scrollTop() + $(section).position().top - 0;

                // Tween is proportional to distance
                var steps = Math.round(Math.abs(top - $container.scrollTop()) / $container.height());

                // Scroll to section
                if( currentSection !== null && animate ) {
                    // Animate normal focus
                    var self = this;
                    changingSection = true;
                    $container.stop().animate({
                        scrollTop: top
                    },{
                        duration: 400 + (200 * steps),
                        easing: "easeInOutQuint",
                        complete: function(){
                            changingSection = false;
                            if( typeof(currentController) !== 'undefined' ) {
                                currentController.show.call(currentController);
                            }
                        }
                    });

                } else {
                    // First focus is instant
                    $container.scrollTop( top );
                    checkScrollPosition();
                }

                if( fullPath !== currentPath ) {

                    var instant = false;

                    if( !shownSubSection && initialPath.join('/') === segments.join('/') ) {
                        shownSubSection = true;
                        instant = true;
                    }

                    // Navigate to subsection or base
                    var controller = controllersBySlug[ segments[0] ];
                    controller.navigate( segments[1] || null, instant );

                    // Highlight the correct menu item
                    SOULWIRE.SectionMenu.highlightLink( segments[0] );
                }

            }

            currentPath = fullPath;
        },
        
        /**
         * Enables a section via it's controller and disables any redundant sections
         */
        enableSection: function( slug ) {

            var section = sectionsBySlug[ slug ];

            if( section !== currentSection ) {

                // Disable current section
                if( currentController ) {
                    currentController.disable();
                }

                // Get the new controller
                currentController = controllersBySlug[ slug ];

                // Enable the new section
                if( currentController ) {
                    currentController.enable();
                }

                // Tag the body with this section
                if( currentSection ) {
                    $("body").removeClass( currentSection.data("slug") );
                }

                $("body").addClass(slug);

                // Mark the new section active
                currentSection = section;

                // If location doesn't match
                var segments = SOULWIRE.SectionController.getPathSegments();

                if( segments[0] !== slug && SOULWIRE.SectionController.supportsHistoryAPI() ) {
                    history.pushState( {}, '', '/' + slug );
                    SOULWIRE.SectionController.historyLength++;
                }

                // Snap to the current section
                SOULWIRE.SectionController.focusSection();

                // Enable pagination for this section (if required)
                SOULWIRE.SectionScroll.update( currentSection );
            }
        }
        
    };
    
})();