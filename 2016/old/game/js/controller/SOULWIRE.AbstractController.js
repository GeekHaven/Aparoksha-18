
/**
 * @constructor
 * @param {Object=} $context
 */
SOULWIRE.AbstractController = function( $context ) {
    
    if( $context ) {
        
        this.$context = $context;
        this.enabled  = false;
        this.slug     = $context.data("slug");
    }
    
    this.init();
};

SOULWIRE.AbstractController.extend = function( child ) {
    child.prototype = new SOULWIRE.AbstractController();
    child.prototype.constructor = child;
    child.prototype._super = SOULWIRE.AbstractController.prototype;
};

SOULWIRE.AbstractController.prototype = {
    
    init: function() {
    },
    
    enable: function() {
        if(!this.enabled) {
            this.$context.addClass("enabled");
            this.enabled = true;
        }
    },
    
    disable: function() {
        if(this.enabled) {
            this.$context.removeClass("enabled");
            this.enabled = false;
        }
    },
    
    show: function() {
    },
    
    navigate: function( slug ) {
        if(!this.enabled) {
            this.enable();
        }
    }
    
};