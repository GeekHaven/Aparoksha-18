
SOULWIRE.Wordpress = (function(){
    
    var cache = null;
    var lastUpdate = -1;
    
    return {
        
        //FEED_URI:     "/data/blog.json",
        //DATA_FORMAT:  "json",
        
        FEED_URI:       "http://blog.soulwire.co.uk/feed/?feed=json&jsonp=?",
        DATA_FORMAT:    "jsonp",
        EXPIRE_AFTER:   1000 * 60 * 10,
        
        getData: function( callback ) {

            if( cache && (new Date().getTime() - lastUpdate) < SOULWIRE.Wordpress.EXPIRE_AFTER ) {

                if( callback ) {
                    callback.call( SOULWIRE.Wordpress, cache );
                }

            } else {
                
                var request = {};
                
                request['url']       = SOULWIRE.Wordpress.FEED_URI;
                request['dataType']  = SOULWIRE.Wordpress.DATA_FORMAT;
                request['error']     = function( error ) {};
                request['success']   = function( result ) {
                    
                    SOULWIRE.Wordpress.lastUpdate = new Date().getTime();
                    
                    if( callback ) {
                        cache = result;
                        callback.call( SOULWIRE.Wordpress, result );
                    }
                };
                
                $.ajax( request );
            }
        }
        
    };
    
})();