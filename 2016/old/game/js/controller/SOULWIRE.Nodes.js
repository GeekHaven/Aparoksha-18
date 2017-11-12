
/**
 * @constructor
 */
SOULWIRE.Nodes = function( $context ) {
    
    this.MIN_DIST        = 200;
    this.MIN_DIST_SQ     = Math.pow(this.MIN_DIST, 2);
    this.VISCOSITY       = 0.02;
    this.DAMPING         = 0.95;
    
    this.$context        = $context;
    this.$hub            = $context.find('.hub');
    this.$nodes          = this.$hub.find('li a');
    
    this.useGPU          = false;
    this.mouseX          = 0;
    this.mouseY          = 0;
    this.loop            = 0;
    this.nodes           = [];
    
    this.callbacks       = {
        onMouseMove: $.proxy( this.onMouseMove, this ),
        update:      $.proxy( this.update, this )
    };
    
    // Call super constructor
    SOULWIRE.AbstractController.call( this, $context );
};

// Inherit from AbstractController
SOULWIRE.Nodes.prototype = new SOULWIRE.AbstractController();
SOULWIRE.Nodes.prototype.constructor = SOULWIRE.Nodes;
SOULWIRE.Nodes.prototype._super = SOULWIRE.AbstractController.prototype;

SOULWIRE.Nodes.prototype.init = function() {
    
    var self   = this,
            count  = this.$nodes.length,
            theta  = Math.PI * -0.5,
            step   = (Math.PI * 2) / count,
            radius,
            node,
            pos,
            px,
            py;
            
    // Use the GPU if we can
    this.useGPU = false; //Modernizr.csstransitions;
    
    this.$nodes.each(function(){
        
        node   = $(this);
        
        radius = 220;//180 + Math.random() * 60;
        px = Math.cos(theta) * radius;
        py = Math.sin(theta) * radius;
        
        if( theta > Math.PI * 0.5 ) {
            node.parent().addClass( 'flip' );
        } else {
            node.parent().removeClass( 'flip' );
        }
        
        self.nodes.push( new SOULWIRE.Node(px, py, node) );
        
        if(self.useGPU) {
            node.css({left:0, top:0});
        }
        
        theta += step;
    });
    
    /*
    // Encode
    var str = "mailto:justin@soulwire.co.uk";
    var enc = str.split('');
    var off = 13;
    
    for(var i = 0; i < enc.length; i++) {
        enc[i] = enc[i].charCodeAt(0) + off;
    }
    
    console.log(enc);
    */
    
    this.$context.find('.email a').attr('href', (function(){
        
        // Decode
        var dec = [13, 122, 110, 118, 121, 129, 124, 71, 119, 130, 128, 129, 118, 123, 77, 128, 124, 130, 121, 132, 118, 127, 114, 59, 112, 124, 59, 130, 120];
        var off = parseInt(dec.shift(), 10);

        for(var i = 0; i < dec.length; i++) {
            dec[i] = String.fromCharCode(dec[i] - off);
        }

        return dec.join('');
    })());
};

SOULWIRE.Nodes.prototype.update = function() {
    
    var pVel = SOULWIRE.Parallax.instance.velocity; 
    pVel.y += (-12 - pVel.y) * 0.01;
    
    if( this.enabled ) {
        
        var i, m, n, node;

        // Toggle between update and draw
        this.loop = (this.loop + 1) % 3;
        
        switch( this.loop ) {
            
            case 0 :
            case 1 : /* UPDATE PHYSICS */
            
                var dx, dy, dSq, f, a;

                for( i = 0, n = this.nodes.length; i < n; i++ ) {

                    node = this.nodes[i];

                    // Distance from start position
                    dx = this.mouseX - node.x;
                    dy = this.mouseY - node.y;
                    dSq = dx*dx + dy*dy;

                    // Attraction towards mouse
                    if( dSq <= this.MIN_DIST_SQ ) {
                        
                        f = 1 - (dSq / this.MIN_DIST_SQ);
                        //f = Math.pow(f, 1.2);

                        // Use delta between current position for angle
                        dx = this.mouseX - node.x;
                        dy = this.mouseY - node.y;
                        
                        a = Math.atan2(dy, dx);
                        
                        node.fx += Math.cos(a) * f;
                        node.fy += Math.sin(a) * f;
                    }

                    // Attraction towards starting position
                    node.fx += (node.ox - node.x) * this.VISCOSITY;
                    node.fy += (node.oy - node.y) * this.VISCOSITY;
                    
                    // Apply force: v = f(1/m)
                    node.vx += node.fx * node.massInv;
                    node.vy += node.fy * node.massInv;
                    
                    // Apply velocity
                    node.x += node.vx;
                    node.y += node.vy;

                    // Dampen velocity
                    node.vx *= this.DAMPING;
                    node.vy *= this.DAMPING;

                    // Reset force
                    node.fx = 0.0;
                    node.fy = 0.0;
                }
            
                break;
                
            case 2 : /* POSITION NODES */
            
                for( i = 0, n = this.nodes.length; i < n; i++ ) {

                    node = this.nodes[i];
                    
                    if(this.useGPU) {
                        
                        node.node.css({
                            '-webkit-transform' : 'translate3d(' + Math.round(node.x) + 'px,' + Math.round(node.y) + 'px, 0px)'
                        });
                        
                    } else {
                        
                        node.node.css({
                            left: node.x,
                            top: node.y
                        });
                        
                    }
                }
            
                break;
            
        }
        
        // Schedule next update
        requestAnimFrame( this.callbacks.update, this );
    }
    
};

SOULWIRE.Nodes.prototype.enable = function() {
    if(!this.enabled) {
        
        var node;
        
        // Give the nodes some initial force
        for( var i = 0, n = this.nodes.length; i < n; i++ ) {
            node = this.nodes[i];
            node.x += (Math.random() - 0.5) * 100 + 20;
            node.y += (Math.random() - 0.5) * 100;
        }
        
        this.$context.bind( 'mousemove', this.callbacks.onMouseMove );
        this._super.enable.call(this);
        this.update();
    }
};

SOULWIRE.Nodes.prototype.disable = function() {
    if(this.enabled) {
        this.$context.unbind( 'mousemove', this.callbacks.onMouseMove );
        this._super.disable.call(this);
    }
};

SOULWIRE.Nodes.prototype.onMouseMove = function( event ) {
    var offset = this.$hub.offset();
    this.mouseX = event.clientX - offset.left - this.$hub.width() * 0.5;
    this.mouseY = event.clientY - offset.top - this.$hub.height() * 0.5;
};

/**
 * @constructor
 */
SOULWIRE.Node = function(x, y, node) {
    // Position
    this.x = this.ox = x;
    this.y = this.oy = y;
    // Force
    this.fx = 0.0;
    this.fy = 0.0;
    // Velocity
    this.vx = 0.0;
    this.vy = 0.0;
    // DOM Element
    this.node = node;
    this.mass = 1.0; //0.9 + Math.random() * 0.4;
    this.massInv = 1.0 / this.mass;
};