/*==============================================================
    pull menu
 ==============================================================*/

function bindEvent(el, eventName, eventHandler) {
    if (el.addEventListener) {
        el.addEventListener(eventName, eventHandler, false);
    } else if (el.attachEvent) {
        el.attachEvent('on' + eventName, eventHandler);
    }
}

(function () {

    var bodyEl = document.body,
            //content = document.querySelector( '.content-wrap' ),
            openbtn = document.getElementById('open-button'),
            closebtn = document.getElementById('close-button'),
            isOpen = false;

    function init() {
        initEvents();
    }

    function initEvents() {
        if (openbtn) {
            bindEvent(openbtn, 'click', toggleMenu);

        }
        //openbtn.addEventListener( 'click', toggleMenu );
        if (closebtn) {

            bindEvent(closebtn, 'click', toggleMenu);
            //closebtn.addEventListener( 'click', toggleMenu );
        }

        // close the menu element if the target itÃ‚Â´s not the menu element or one of its descendants..

    }

    function toggleMenu() {

        if (isOpen) {
            classie.remove(bodyEl, 'show-menu');
             if ( $( ".full-width-pull-menu" ).length ) {
                 classie.remove(bodyEl, 'overflow-hidden');
                 classie.remove(bodyEl, 'position-fixed');
            }
        }
        else {
            classie.add(bodyEl, 'show-menu');
            
            if ( $( ".full-width-pull-menu" ).length ) {
                classie.add(bodyEl, 'overflow-hidden');
                classie.add(bodyEl, 'position-fixed');
            }
           
        }
        isOpen = !isOpen;
    }

    init();

})();