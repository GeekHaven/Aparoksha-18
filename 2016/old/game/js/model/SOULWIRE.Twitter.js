
SOULWIRE.Twitter = (function(){
    
    var cache = null;
    var lastUpdate = -1;
    
    return {
        
        //FEED_URI:     "/data/twitter.json",
        //DATA_FORMAT:  "json",
        
        FEED_URI:       "http://api.twitter.com/1/statuses/user_timeline.json?screen_name=soulwire&count=100",
        DATA_FORMAT:    "jsonp",
        EXPIRE_AFTER:   1000 * 60 * 10,
        
        getData: function( callback ) {
            
            if( cache && (new Date().getTime() - lastUpdate) < SOULWIRE.Twitter.EXPIRE_AFTER ) {

                if( callback ) {
                    callback.call( SOULWIRE.Twitter, cache );
                }

            } else {
                
                var request = {};
                
                request['url']      = SOULWIRE.Twitter.FEED_URI;
                request['dataType'] = SOULWIRE.Twitter.DATA_FORMAT;
                request['error']    = function( error ) {};
                request['success']  = function( result ) {
                    
                    SOULWIRE.Twitter.lastUpdate = new Date().getTime();
                    
                    if( callback ) {
                        cache = result;
                        callback.call( SOULWIRE.Twitter, result );
                    }
                };
                
                $.ajax( request );
            }
        }
        
    };
    
})();