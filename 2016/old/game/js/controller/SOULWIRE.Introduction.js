
/**
 * @constructor
 */
SOULWIRE.Introduction = function( $context ) {
    
    this.WORD_INTERVAL   = 2500;
    this.SLICE_INTERVAL  = 1500;
    
    this.$context        = $context;
    this.$introduction   = $context.find('article.introduction');
    this.$definition     = this.$introduction.find('dd');
    this.$list           = this.$definition.find('ul');
    this.$items          = this.$list.find('li');
    this.$target         = this.$items.first();
    this.$figure         = $context.find('figure');
    this.$link           = $context.find('nav a');
    this.$nav            = $context.find('nav');
    this.slicer          = null;
    this.words           = [];
    this.counter         = 1;
    
    this.timeouts        = {
        word: null,
        slice: null
    };
    
    this.callbacks       = {
        updateSlice: $.proxy( this.updateSlice, this ),
        updateWord: $.proxy( this.updateWord, this ),
        clicked: $.proxy( this.clicked, this )
    };
    
    // Call super constructor
    SOULWIRE.AbstractController.call( this, $context );
};

// Inherit from AbstractController
SOULWIRE.Introduction.prototype = new SOULWIRE.AbstractController();
SOULWIRE.Introduction.prototype.constructor = SOULWIRE.Introduction;
SOULWIRE.Introduction.prototype._super = SOULWIRE.AbstractController.prototype;

SOULWIRE.Introduction.prototype.init = function() {
    
    var self = this;
    
    // Start the slicer!
    this.slicer = this.$context.find('figure ul').slicer({
        horizontal: true,
        duration: 600,
        slices: 2
        });
    
    // Sort slicer on mouse over
    this.$figure.bind( 'mouseenter', function(){
        self.slicer.shuffle( Math.random() );
        clearTimeout( self.timeouts.slice );
    });
    
    // Shuffle on mouse out
    this.$figure.bind( 'mouseleave', function(){
        self.timeouts.slice = setTimeout( self.callbacks.updateSlice, self.SLICE_INTERVAL );
        self.slicer.shuffle();
    });
    
    // Index all words
    this.$items.each(function(){
        self.words.push( $(this).text() );
    });
    
    // Shuffle them
    this.words.sort(function(){
        return (Math.round(Math.random())-0.5);
    });
    
    // Show the word container
    this.$definition.css({
        opacity: 1.0,
        left: 0.0
    });
    
    // Pass nav mouse events to button
    this.$nav.bind( 'mouseover', function(){
        self.$link.addClass( 'over' );
    }).bind( 'mouseout', function(){
        self.$link.removeClass( 'over' );
    });
    
    // Setup the list
    this.$items.not( this.$target ).remove();
    this.$target.text( this.words[0] );
    
    // Listen for nav clicks
    //this.$link.bind( 'click', this.callbacks.clicked );
    this.$nav.bind( 'click', this.callbacks.clicked );
};

SOULWIRE.Introduction.prototype.updateWord = function() {
    
    this.$target.pushText({
        text: this.words[ this.counter ],
        duration: 1000,
        ratio: 0.5
    });
    
    this.counter = (this.counter + 1) % this.words.length
    
    clearTimeout( this.timeouts.word );
    this.timeouts.word = setTimeout( this.callbacks.updateWord, this.WORD_INTERVAL );
};

SOULWIRE.Introduction.prototype.updateSlice = function() {
    this.slicer.shuffle();
    clearTimeout( this.timeouts.slice );
    this.timeouts.slice = setTimeout( this.callbacks.updateSlice, this.SLICE_INTERVAL );
};

SOULWIRE.Introduction.prototype.enable = function() {
    if(!this.enabled) {
        this.timeouts.slice = setTimeout( this.callbacks.updateSlice, this.SLICE_INTERVAL );
        this.timeouts.word = setTimeout( this.callbacks.updateWord, this.WORD_INTERVAL );
        this._super.enable.call(this);
    }
};

SOULWIRE.Introduction.prototype.disable = function() {
    if(this.enabled) {
        clearTimeout( this.timeouts.slice );
        clearTimeout( this.timeouts.word );
        this._super.disable.call(this);
    }
};

SOULWIRE.Introduction.prototype.clicked = function( event ) {
    var link = $(event.currentTarget);
    SOULWIRE.SectionController.navigate( this.$link.attr("href"), this.$link.attr("title") );
    event.preventDefault();
};