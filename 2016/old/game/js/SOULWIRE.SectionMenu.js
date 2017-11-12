
SOULWIRE.SectionMenu = (function(){
    
    var $context    = $("#sectionMenu");
    var items       = $("a", $context);
    var callbacks   = {};
    
    var onMenuItemClicked = function( event ) {
        var link = $(event.currentTarget);
        SOULWIRE.SectionController.navigate( link.attr("href"), link.attr("title") );
        return false;
    };
    
    return {
        
        init: function() {
            items.bind( "click", onMenuItemClicked );
        },
        
        highlightLink: function( href ) {
            
            var item;
            
            items.each(function(){
                item = $(this);
                if( new RegExp("\\b" + href + "\\b", "i").test( item.attr("href") ) ) {
                    item.addClass("active");
                } else {
                    item.removeClass("active");
                }
            });
        }
        
    };
    
})();