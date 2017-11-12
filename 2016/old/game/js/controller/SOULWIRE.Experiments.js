
/**
 * @constructor
 */
SOULWIRE.Experiments = function( $context ) {
    
    this.items          = $("article", $context);
    this.$sections      = $("#sections");
    this.$content       = $('<iframe class="content" name="experiment">');
    this.$scrollX       = $(".scroll-x", $context);
    this.$header        = $("#header hgroup");
    this.$close         = $("#header a.close");
    this.$prev          = $(".pagination .prev");
    this.$next          = $(".pagination .next");
    this.scrollStep     = $("article", $context).width() * 2;
    this.initialised    = false;
    this.currentItem    = null;
    this.itemsBySlug    = {};
    
    this.callbacks      = {
        onItemClicked:      $.proxy(this.onItemClicked, this),
        onCloseClicked:     $.proxy(this.onCloseClicked, this),
        onWindowResized:    $.proxy(this.onWindowResized, this)
    };
    
    // Call super constructor
    SOULWIRE.AbstractController.call( this, $context );
};

// Inherit from AbstractController
SOULWIRE.Experiments.prototype = new SOULWIRE.AbstractController();
SOULWIRE.Experiments.prototype.constructor = SOULWIRE.Experiments;
SOULWIRE.Experiments.prototype._super = SOULWIRE.AbstractController.prototype;

SOULWIRE.Experiments.prototype.init = function() {
    
    if( this.initialised === false ) {
        
        var item,
            link,
            slug,
            count = this.items.length,
            self  = this;

        // Listen for item clicks
        this.items.each(function(index){
            
            item = $(this);
            
            // Index the item's slug
            if( slug = item.data("slug") ) {
                self.itemsBySlug[slug] = item;
            }
            
            // Store the item title and subtitle
            item.data("title", item.find("header h2 a").text());
            item.data("subtitle", item.find("header h3 a").text());
            
            // Find all action links inside the item
            item.find("a.open, .slideshow").each(function(){
                link = $(this);
                // Give this link the item slug
                link.data("slug", slug);
                // Allow it to trigger content load (via navigate)
                link.bind("click", self.callbacks.onItemClicked);
            });
            
        });
        
        // Listen for window resize
        $(window).bind("resize", this.callbacks.onWindowResized);

        // Listen for close clicks
        this.$close.bind("click", this.callbacks.onCloseClicked);
        
        // Enable pagination
        //this.$prev.bind("click", this.callbacks.onPageClicked);
        //this.$next.bind("click", this.callbacks.onPageClicked);
        
        this.initialised = true;
    }
};

SOULWIRE.Experiments.prototype.showContent = function( instant ) {
    
    if( !!this.currentItem ) {
        
        instant = !!instant;
        
        // Pause background ambience
        SOULWIRE.Signals.send( 'ambienceStop' );
        
        var self = this;
        
        this.$content.css('background-color', self.currentItem.data("color") || '#222');
        
        this.$context.stop().animate({
            scrollTop: this.$context.height()
        },{
            duration: instant ? 10 : 550,
            easing: "easeInOutQuint",
            complete: function() {
                self.$content.attr("src", self.currentItem.data("content"));
            }
        });
        
        this.$header.removeClass("hidden");
        this.$header.find("h2").html( this.currentItem.data("title") );
        this.$header.find("h3").html( this.currentItem.data("subtitle") );
        
        //this.$sections.css("overflow-y", "hidden");
        this.$context.append(this.$content);
        this.$close.removeClass("hidden");
        
        // Enable comments
        if( !!this.currentItem.data("comments") ) {
            SOULWIRE.Signals.send( 'enableComments' );
        }
        
        $("body").addClass("fullscreen");
    }
};

SOULWIRE.Experiments.prototype.hideContent = function() {
    
    if( this.currentItem ) {
        
        // Restart background ambience
        SOULWIRE.Signals.send( 'ambienceStart' );
        
        // Call the pause method on the experiment window
        try {
            window.frames['experiment'].__pause();
        } catch( error ) {}

        var content = this.$content;

        this.$header.addClass("hidden");
        
        // Close after a delay to allow any pause logic in the iframe to happen
        this.$context.stop().delay(150).animate({
            scrollTop: 0
        },{
            duration: 550,
            easing: "easeInOutQuint",
            complete: function() {
                content.attr("src", '').remove();
                // Disable comments
                SOULWIRE.Signals.send( 'disableComments' );
            }
        });

        //this.$sections.css("overflow-y", "scroll");
        this.$close.addClass("hidden");
        this.currentItem = null;
        
        $("body").removeClass("fullscreen");
        
    }
};

SOULWIRE.Experiments.prototype.enable = function() {
    if(!this.enabled) {
        this._super.enable.call(this);
    }
};

SOULWIRE.Experiments.prototype.disable = function() {
    if(this.enabled) {
        this._super.disable.call(this);
        this.hideContent();
    }
};

SOULWIRE.Experiments.prototype.navigate = function( slug, instant ) {
    
    if(!this.enabled) {
        this.enable();
    }
    
    if( slug !== null ) {
        
        // We're in a sub section
        var item = this.itemsBySlug[slug];

        if( item !== this.currentItem ) {
            this.currentItem = item;
            this.showContent( instant );
        }
        
    } else {
        this.hideContent();
    }
};

SOULWIRE.Experiments.prototype.onItemClicked = function( event ) {
    var item = $(event.currentTarget);
    SOULWIRE.SectionController.navigate( '/' + this.slug + '/' + item.data("slug") + '/' );
    return false;
};

SOULWIRE.Experiments.prototype.onCloseClicked = function( event ) {
    if( SOULWIRE.SectionController.supportsHistoryAPI() && SOULWIRE.SectionController.historyLength > 0 ) {
        window.history.back();
    } else {
        SOULWIRE.SectionController.navigate( '/' + this.slug + '/' );
    }
    return false;
};

SOULWIRE.Experiments.prototype.onWindowResized = function( event ) {
    if( this.enabled && this.currentItem !== null ) {
        this.$context.stop().scrollTop(this.$context.height());
    }
};