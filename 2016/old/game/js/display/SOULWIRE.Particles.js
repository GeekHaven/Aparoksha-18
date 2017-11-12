
/**
 * @constructor
 */
SOULWIRE.Particles = function( width, height ) {
    
    this.NUM_PARTICLES     = 24;
    this.MIN_DISTANCE      = 220;
    this.MIN_RADIUS        = 4.0;
    this.MAX_RADIUS        = 15.0;
    this.MIN_SPEED         = 0.5;
    this.MAX_SPEED         = 1.5;
    this.MIN_DISTANCE_SQ   = Math.pow(this.MIN_DISTANCE, 2);
    this.MIN_DISTANCE_SQI  = 1.0 / this.MIN_DISTANCE_SQ;
    
    // Konami code stuff
    this.kittens           = [];
    this.drawKittens       = false;
    
    this.width             = width || 0;
    this.height            = height || 0;
    this.particles         = [];
    this.connections       = [];
    
    this.init();
};

SOULWIRE.Particles.prototype.init = function() {
    
    var self = this;
    
    SOULWIRE.Signals.bind('KONAMI', function(){
        // Make kittens
        var d = self.MAX_RADIUS - self.MIN_RADIUS;
        var m = self.MAX_RADIUS * 2 * 2;
        for(var i = 0; i < d; i++) {
            self.kittens[i] = new Image();
            self.kittens[i].src = 'http://placekitten.com/g/' + m + '/' + (m + i);
        }
        self.drawKittens = true;
        SOULWIRE.Parallax.instance.velocity.y = -120;
    });
    
    var i, j, s, x, y, r, f, blank = [];
    
    // Prepare blank array
    for( i = 0; i < this.NUM_PARTICLES; i++ ) {
        blank[i] = false;
    }
    
    // Create particles
    for( i = 0; i < this.NUM_PARTICLES; i++ ) {
        
        f = Math.random();
        
        x = Math.random() * this.width;
        y = Math.random() * this.height;
        
        r = this.MIN_RADIUS + f * (this.MAX_RADIUS - this.MIN_RADIUS);
        s = this.MIN_SPEED + f * (this.MAX_SPEED - this.MIN_SPEED);
        
        // Create new particle
        this.particles[i] = new SOULWIRE.Particle( x, y, s, r );
        
        // Add slots for indexing connections
        this.connections[i] = blank.concat();
    }
};

SOULWIRE.Particles.prototype.update = function( force ) {
    
    //console.profile('Particles#Update');
    
    var i, j,
            p, q,
            dx, dy, dd,
            w = this.width,
            h = this.height;
    
    // Move particles
    for( i = 0; i < this.NUM_PARTICLES; i++ ) {
        
        p = this.particles[i];
        
        // Apply force
        p.x += p.s * force.x;
        p.y += p.s * force.y;
        
        // Wrap around screen
        p.x = p.x < -p.r ? w + p.r : p.x > w + p.r ? -p.r : p.x;
        p.y = p.y < -p.r ? h + p.r : p.y > h + p.r ? -p.r : p.y;
    }
    
    // Calculate connections
    for( i = 0; i < this.NUM_PARTICLES; i++ ) {
        
        p = this.particles[i];
        
        for( j = i + 1; j < this.NUM_PARTICLES; j++ ) {
        
            q = this.particles[j];
        
            dx = p.x - q.x;
            dy = p.y - q.y;
            dd = dx*dx + dy*dy;
        
            if( dd <= this.MIN_DISTANCE_SQ ) {
                this.connections[i][j] = 1 - (dd * this.MIN_DISTANCE_SQI);
            } else {
                this.connections[i][j] = false;
            }
        }
    }
    
    //console.profileEnd('Particles#Update');
};

/**
 * @param {number=} alpha
 */
SOULWIRE.Particles.prototype.draw = function( ctx, alpha ) {
    
    //console.profile('Particles#Draw');
    
    var i, j, p, q, c;
    
    for( i = 0; i < this.NUM_PARTICLES; i++ ) {
        
        p = this.particles[i];
        
        for( j = i + 1; j < this.NUM_PARTICLES; j++ ) {
            
            if( (c = this.connections[i][j]) !== false ) {
                
                q = this.particles[j];
                
                ctx.beginPath();
                ctx.moveTo(p.x, p.y);
                ctx.lineTo(q.x, q.y);
                
                ctx.globalAlpha = c * 1.5 * alpha;
                ctx.strokeStyle = '#FFF';
                ctx.lineWidth = 1;
                ctx.stroke();
            }
        }
        
        if(this.drawKittens) {
            
            var r = p.r * 2;
            ctx.save();
            ctx.globalAlpha = 1.0;
            ctx.beginPath();
            ctx.arc(p.x, p.y, r, 0, Math.PI*2, false);
            ctx.closePath();
            ctx.clip();
            ctx.drawImage(this.kittens[p.id % this.kittens.length], p.x - r, p.y - r);
            ctx.restore();
            
        } else {
            
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI*2, false);
            ctx.closePath();

            ctx.strokeStyle = p.c;
            ctx.globalAlpha = 0.25 * alpha;
            ctx.lineWidth = p.r * this.MIN_RADIUS * 0.5;
            ctx.stroke();

            ctx.globalAlpha = 0.8 * alpha;
            ctx.fillStyle = p.c;
            ctx.fill();
        }
    }
    
    //console.profileEnd('Particles#Draw');
};

/**
 * @constructor
 * @param {number} x
 * @param {number} y
 * @param {number} s
 * @param {number} r
 * @param {string=} c
 */
SOULWIRE.Particle = function( x, y, s, r, c ) {
    this.x = x || 0.0;
    this.y = y || 0.0;
    this.s = s || 1.0;
    this.r = r || 5.0;
    this.c = c || '#FFF';
    this.id = SOULWIRE.Particle.GUID++;
};

SOULWIRE.Particle.GUID = 0;