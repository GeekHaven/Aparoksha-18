$(document).ready(function(){
    
    // Browser test
    if( Modernizr && (!Modernizr.canvas || !Modernizr.csstransitions || !Modernizr.opacity || !Modernizr.rgba) ) {
        $(".shitbrowser").removeClass("hidden");
    }
    
    // TEST
    // var template = $("#experiment-template");
    // for(var i = 0; i < 4; ++i) {
    //  var copy = template.clone();
    //  var slug = copy.data("slug");
    //  copy.data("slug", slug + '-' + Math.floor(Math.random() * 9999));
    //  template.after(copy);
    // }
    
    // Fix wide container widths
    $(".container-x").each(function(){
        var me = $(this), w = 0;
        me.children().each(function(){w += $(this).outerWidth(true);});
        me.css({width:w});
    });
    
    // Initialise ambience
    var container = $('<div>').addClass( 'parallax' );
    $("#sections").before( container );
    
    var parallax = new SOULWIRE.Parallax();
    parallax.init( container );
    
    // Initialise slideshow components
    $(".slideshow").each(function(){
        new SOULWIRE.SlideShow( $(this) );
    });
    
    // Enable discussions
    //SOULWIRE.Discussion.init();
    
    // Initlaise section controller
    SOULWIRE.SectionController.init();
    SOULWIRE.SectionMenu.init();
});