
SOULWIRE.GitHub = (function(){
    
    var cache = null;
    var lastUpdate = -1;
    
    return {
        
        //FEED_URI:     "/data/github.json",
        //DATA_FORMAT:  "json",
        
        FEED_URI:       "https://github.com/soulwire.json",
        DATA_FORMAT:    "jsonp",
        EXPIRE_AFTER:   1000 * 60 * 10,
        
        getData: function( callback ) {

            if( cache && (new Date().getTime() - lastUpdate) < SOULWIRE.GitHub.EXPIRE_AFTER ) {

                if( callback ) {
                    callback.call( SOULWIRE.GitHub, cache );
                }

            } else {
                
                var request = {};
                
                request['url']      = SOULWIRE.GitHub.FEED_URI;
                request['dataType'] = SOULWIRE.GitHub.DATA_FORMAT;
                request['error']    = function( error ) {};
                request['success']  = function( result ) {
                    
                    SOULWIRE.GitHub.lastUpdate = new Date().getTime();
                    
                    if( callback ) {
                        cache = result;
                        callback.call( SOULWIRE.GitHub, result );
                    }
                };
                
                $.ajax( request );
                
            }
        }
        
    };
    
})();