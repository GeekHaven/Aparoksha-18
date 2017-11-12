
SOULWIRE.Flickr = (function(){
    
    var cache = null;
    var lastUpdate = -1;
    
    return {
        
        //FEED_URI:     "/data/flickr.json",
        //DATA_FORMAT:  "json",
        
        FEED_URI:      "http://flickr.com/services/feeds/photos_public.gne?id=13386131@N08&format=json&jsoncallback=?",
        DATA_FORMAT:   "jsonp",
        EXPIRE_AFTER:  1000 * 60 * 10,
        
        getData: function( callback ) {

            if( cache && (new Date().getTime() - lastUpdate) < SOULWIRE.Flickr.EXPIRE_AFTER ) {

                if( callback ) {
                    callback.call( SOULWIRE.Flickr, cache );
                }

            } else {
                
                var request = {};
                
                request['url']      = SOULWIRE.Flickr.FEED_URI;
                request['dataType'] = SOULWIRE.Flickr.DATA_FORMAT;
                request['error']    = function( error ) {};
                request['success']  = function( result ) {
                    
                    SOULWIRE.Flickr.lastUpdate = new Date().getTime();
                    
                    if( callback ) {
                        cache = result;
                        callback.call( SOULWIRE.Flickr, result );
                    }
                };
                
                $.ajax( request );
            }
        }
        
    };
    
})();