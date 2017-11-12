
SOULWIRE.Signals = (function(){
    
    var signals = {},
        prefix  = '___signal_';
            
    return {
        
        bind: function( name, method, scope ) {

            var signal = method[ prefix + name ] = {
                method: method,
                scope: scope
            };

            (signals[ name ] = signals[ name ] || []).push( signal );

        },

        unbind: function( name, method ) {

            if( signals.hasOwnProperty( name ) ) {

                var observers = signals[ name ],
                        index = observers.indexOf( method[ prefix + name ] );

                if( index !== -1 ) {
                    observers.splice( index, 1 );
                }

                delete method[ prefix + name ];
            }
        },

        send: function( name, params ) {
            
            if( signals.hasOwnProperty( name ) ) {

                var observers = signals[ name ],
                        observer;

                for( var i = 0, n = observers.length; i < n; i++ ) {
                    observer = observers[i];
                    observer.method.call( observer.scope, params );
                }
            }
        }
        
    };
    
})();