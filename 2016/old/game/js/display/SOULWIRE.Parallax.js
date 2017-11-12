
/**
 * @constructor
 */
SOULWIRE.Parallax = function() {
    
    if( SOULWIRE.Parallax.instance ) {
        return SOULWIRE.Parallax.instance;
    }
    
    SOULWIRE.Parallax.instance = this;
    
    this.width             = 0;
    this.height            = 0;
    
    this.$context          = null;
    this.$canvas           = $('<canvas>');
    this.canvas            = this.$canvas[0];
    this.ctx               = this.canvas.getContext('2d');
    
    this.enabled           = false;
    this.particles         = null;
    this.velocity          = {x:0, y:-80};
    this.maxForce          = 12.0;
    this.alpha             = 0.0;
    this.drag              = 0.8;
    this.loop              = 0;
    
    this.callbacks         = {
        resize: $.proxy( this.resize, this ),
        update: $.proxy( this.update, this ),
        scroll: $.proxy( this.scroll, this ),
        start:  $.proxy( this.start, this ),
        stop:   $.proxy( this.stop, this )
    };
    
};

SOULWIRE.Parallax.prototype.init = function( $context ) {
    
    // Stop / start based on global signals
    SOULWIRE.Signals.bind( 'ambienceStop', this.callbacks.stop );
    SOULWIRE.Signals.bind( 'ambienceStart', this.callbacks.start );
    
    var scrollContainers,
            scrollItem;
    
    // Add the canvas to the DOM
    this.$context = $context;
    this.$context.append( this.$canvas );
    
    // Calculate width and height
    this.resize(null);
    
    // Create particles
    this.particles = new SOULWIRE.Particles( this.width, this.height );

    // Listen for scroll events on all scrollable items
    scrollContainers = $('#sections, .scroll-x');
    scrollContainers.bind( 'scroll', this.callbacks.scroll );
    
    // Store previous scroll position for finding velocity
    scrollContainers.each( function(){
        (scrollItem = $(this)).data({
            'px': scrollItem.scrollLeft(),
            'py': scrollItem.scrollTop()
        });
    })
    
    // Listen for resize events on the window
    $(window).bind( 'resize', this.callbacks.resize );
    
    // Start drawing
    this.start();
};

SOULWIRE.Parallax.prototype.start = function() {
    if( !this.enabled ) {
        this.enabled = true;
        this.update();
    }
};

SOULWIRE.Parallax.prototype.stop = function() {
    this.enabled = false;
};

SOULWIRE.Parallax.prototype.update = function() {
    
    if( this.enabled ) {
        
        if( Math.abs(this.velocity.x) > 0.01 || Math.abs(this.velocity.y) > 0.01 ) {

            this.loop = (this.loop + 1) % 4;

            switch( this.loop ) {

                case 0 :
                    
                    this.particles.update( this.velocity );
                    this.velocity.x *= this.drag;
                    this.velocity.y *= this.drag;
                    
                    break;

                case 1 :
                    
                    this.alpha += (1.0 - this.alpha) * 0.1;
                    if( this.alpha < 0.99 ) {
                        this.velocity.y -= 0.1;
                    }
                    
                    this.canvas.width = this.canvas.width;
                    this.particles.draw( this.ctx, this.alpha );
                    
                    break;
            }
        }
        
        requestAnimFrame( this.callbacks.update, this );
    }
};

SOULWIRE.Parallax.prototype.scroll = function( event ) {
    
    var $s = $(event.target),
            ox = $s.data('px'),
            oy = $s.data('py'),
            px = $s.scrollLeft(),
            py = $s.scrollTop(),
            dx = px - ox,
            dy = py - oy,
            md = 120;
    
    // Limit delta
    dx = dx < -md ? -md : dx > md ? md : dx;
    dy = dy < -md ? -md : dy > md ? md : dy;
    
    // Integrate with velocity
    this.velocity.x += (dx / md) * -this.maxForce;
    this.velocity.y += (dy / md) * -this.maxForce;
    
    // Update last scroll position
    $s.data({
        'px': px,
        'py': py
    });
    
};

SOULWIRE.Parallax.prototype.resize = function( event ) {
    
    this.width = this.canvas.width = this.$context.width();
    this.height = this.canvas.height = this.$context.height();
    
    if( this.particles ) {
        this.particles.width = this.width;
        this.particles.height = this.height;
        
        this.canvas.width = this.canvas.width;
        this.particles.draw( this.ctx );
    }
};