
/**
 * @constructor
 */
SOULWIRE.SlideShow = function( $context ) {
    
    this.enabled        = true;
    
    this.$context       = $context;
    this.$target        = $context.find("ul");
    this.$items         = $context.find("li");
    this.$nav               = $("<nav>");
    this.$prev          = $('<a href="#"></a>').addClass('button prev').html('<span>Previous</span>');
    this.$next          = $('<a href="#"></a>').addClass('button next').html('<span>Next</span>');
    
    this.vertical       = $context.data("direction") === "vertical";
    this.numItems       = this.$items.length;
    this.position       = 0;
    
    this.callbacks = {
        next: $.proxy( this.next, this ),
        prev: $.proxy( this.prev, this )
    };
    
    this.init();
};

SOULWIRE.SlideShow.prototype.init = function() {
    
    // Append navigation
    this.$nav.append( this.$prev );
    this.$nav.append( this.$next );
    this.$context.append( this.$nav );
    
    // Position items
    var vertical = this.vertical,
        spacing = vertical ? this.$target.height() : this.$target.width();
    
    this.$items.each(function(index){
        $(this).css(vertical ?
            {top:  index * spacing} :
            {left: index * spacing}
            );
    });
    
    // Bind event handlers
    this.$next.bind( "click", this.callbacks.next );
    this.$prev.bind( "click", this.callbacks.prev );
};

SOULWIRE.SlideShow.prototype.goTo = function( position ) {
    
    if( this.enabled ) {
        
        this.position = position < 0 ? this.numItems - 1 :
                        position > this.numItems - 1 ? 0 :
                        position;

        var self = this,
            offset = this.vertical ?
                    {top:  this.position * -this.$target.height() }:
                    {left: this.position * -this.$target.width()  };
        
        this.enabled = false;
        
        this.$target.stop().animate(offset, {
            duration: 450,
            easing:     "easeInOutQuint",
            complete: function() {
                self.enabled = true;
            }
        });
    }
};

SOULWIRE.SlideShow.prototype.next = function() {
    this.goTo( this.position + 1 );
    return false;
};

SOULWIRE.SlideShow.prototype.prev = function() {
    this.goTo( this.position - 1 );
    return false;
};