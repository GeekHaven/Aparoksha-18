/*

start with markup of only articles
create upper and lower containers
duplicate articles into upper, lower and large viewport

*/

/**
 * @constructor
 */
SOULWIRE.Scroller = function( $context ) {
    
    this.enabled        = true;
    
    // DOM ELEMENTS
    this.$expanded      = null;
    this.$context       = $context;
    this.$viewport      = $context.find("header");
    this.$items         = $context.find("article");
    this.$nav           = $context.find("nav");
    this.$prev          = $context.find("nav a.up");
    this.$next          = $context.find("nav a.down");
    
    // CONFIG
    this.loop           = true;
    
    // VARIABLES
    this.priorIndex     = 0;
    this.currentIndex   = 0;
    this.currentItem    = null;
    this.indexOffset    = 0;
    this.stackTopSize   = parseInt($context.data("above"), 10) || 1;
    this.stackBotSize   = parseInt($context.data("below"), 10) || 3;
    this.itemSpacing    = parseInt(this.$items.css("margin-bottom"), 10);
    this.viewportSize   = this.$viewport.outerHeight(true);
    this.viewportTop    = this.$viewport.position().top;
    this.viewportBot    = this.viewportTop + this.viewportSize;
    this.itemHeight     = this.$items.outerHeight(true);
    
    this.onScrollCallbacks = [];
    
    // CALLBACKS
    this.callbacks = {
        resize: $.proxy( this.resize, this ),
        click: $.proxy( this.click, this ),
        next: $.proxy( this.next, this ),
        prev: $.proxy( this.prev, this )
    };
    
    this.init();
};

SOULWIRE.Scroller.prototype.init = function() {
    
    var item,
            copy,
            self = this;
    
    // Clone items into viewport
    this.$items.each(function( index ){
        item = $(this);
        copy = item.clone().addClass("expanded");
        self.$viewport.append(copy);
        item.data("index", index);
    });
    
    this.$items.addClass("preview");
    this.$items.bind("click", self.callbacks.click);
    
    // Store a reference to clones
    this.$expanded = this.$viewport.find("article");
    
    // Bind event handlers
    this.$next.bind( "click", this.callbacks.next );
    this.$prev.bind( "click", this.callbacks.prev );
    
    // Refresh view
    $(window).bind( "resize", this.callbacks.resize );
    this.resize();
    
    // Initial sort (with timeout to allow callbacks to be attached after constructor)
    self.sort(false);
    setTimeout(function(){
        for(var i = 0, n = self.onScrollCallbacks.length; i < n; ++i) {
            self.onScrollCallbacks[i]();
        }
    }, 1);
    
    $(this.$expanded[0]).css({opacity:0}).animate({
        opacity: 1.0
    },{
        duration: 350
    });
    
    // Animate in
    this.$items.each(function(index){
        item = $(this);
        if(!item.hasClass('disabled')) {
            item.css({opacity:0.0}).stop().delay(index * 150).animate({
                opacity: 1.0
            },{
                duration: 350
            });
        }
    });
};

SOULWIRE.Scroller.prototype.resize = function() {

};

SOULWIRE.Scroller.prototype.click = function( event ) {
    this.goTo( parseInt( $(event.currentTarget).data("index"), 10 ) );
    return false;
};

SOULWIRE.Scroller.prototype.doTimeout = function(fRef, mDelay) {
    if(typeof fRef == "function") {  
        var argu = Array.prototype.slice.call(arguments,2); 
        var f = (function(){ fRef.apply(null, argu); }); 
        return setTimeout(f, mDelay); 
    } 
    return setTimeout(fRef,mDelay);
};

/**
 * @param {boolean=} tween
 */
SOULWIRE.Scroller.prototype.sort = function( tween ) {
    
    if( this.currentIndex < 0 || this.currentIndex > this.$items.length - 1 ) {
        this.currentIndex = Math.max(this.currentIndex, 0);
        this.currentIndex = Math.min(this.currentIndex, this.$items.length - 1);
        return;
    }
    
    if( typeof(tween) === "undefined" ) {
        tween = true;
    }
    
    var item,
            move,
            targ,
            fade,
            self = this,
            next = this.currentIndex > this.priorIndex;
    
    /*
        Position items
    */
    
    this.$items.each(function(index){
        
        item = $(this);
        move = index - (self.currentIndex - self.indexOffset);
        fade = move > self.stackBotSize || move < -self.stackTopSize;
        targ = self.viewportTop + self.itemHeight * (move *= fade ? 1.25 : 1);
        
        // Prep the current item for it's tween
        if( index === self.priorIndex ) {
            if( next ) {
                item.addClass("static").css({top: self.viewportTop});
            } else {
                item.addClass("static").css({top: self.viewportBot - self.itemHeight});
            }
        }
        
        // Offset items bellow viewport / Stick the current item to it's sibling
        if( index > self.currentIndex || index === self.currentIndex && next ) {
            targ += self.viewportSize - self.itemHeight + self.itemSpacing;
        }
        
        // Enable click on visible items
        if( !fade ) {
            item.removeClass("disabled");
        } else {
            item.addClass("disabled");
        }
        
        // Store current item
        if( index === self.currentIndex ) {
            self.currentItem = item;
        }
        
        if( tween ) {
            
            // Invisible items and those popping from stack should have a special class
            if( fade || next && move >= self.stackBotSize || !next && move <= -self.stackTopSize ) {
                item.addClass("offset");
            } else {
                item.removeClass("offset");
            }
            
            //setTimeout( self.move, 1, item, targ, fade );
            self.doTimeout( self.move, 1, item, targ, fade );
            
        } else {
            item.addClass("static").css({
                opacity: fade ? 0 : 1,
                top: targ
            });
        }
        
    });
    
    /*
        Position clones
    */
    
    this.$expanded.each(function(index){
        
        item = $(this);
        move = index - (self.currentIndex - self.indexOffset);
        targ = item.height() * move;
        
        if( tween ) {
            //setTimeout( self.move, 1, item, targ, false );
            self.doTimeout( self.move, 1, item, targ, false );
        } else {
            item.addClass("static").css({top: targ});
        }
    });
    
    this.priorIndex = this.currentIndex;
    
    for(var i = 0, n = this.onScrollCallbacks.length; i < n; ++i) {
        this.onScrollCallbacks[i]();
    }
}

SOULWIRE.Scroller.prototype.onScroll = function( callback ) {
    this.onScrollCallbacks.push( callback );
};

SOULWIRE.Scroller.prototype.move = function( item, position, fade ) {
    item.removeClass("static").css({
        opacity: fade ? 0 : 1,
        top: position
        });
};

SOULWIRE.Scroller.prototype.goTo = function( index ) {
    this.currentIndex = index;
    this.sort();
};

SOULWIRE.Scroller.prototype.next = function() {
    this.goTo( this.currentIndex + 1 );
    return false;
};

SOULWIRE.Scroller.prototype.prev = function() {
    this.goTo( this.currentIndex - 1 );
    return false;
};