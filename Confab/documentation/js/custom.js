var currentActiveSection = 'start-installation';

function onePageCurrentSection() {
    $(".docs-content-inner").each(function (index) {
        var h = $(this).offset().top;
        var y = $(window).scrollTop();
        if (y + 50 >= h && y < h + $(this).height() && $(this).attr('id') != currentActiveSection) {
            currentActiveSection = $(this).attr('id');
        }
    });
    return currentActiveSection;
}

$(document).ready(function () {
    /*==============================================================*/
    //demo button  - START CODE
    /*==============================================================*/

    var $buythemediv = '<div class="buy-theme alt-font sm-display-none"><a href="https://themeforest.net/item/pofo-creative-agency-corporate-and-portfolio-multipurpose-template/20645944?ref=themezaa" target="_blank"><i class="ti-shopping-cart"></i><span>Buy Theme</span></a></div><div class="all-demo alt-font sm-display-none"><a href="mailto:info@themezaa.com?subject=POFO - Creative Agency, Corporate and Portfolio Multi-purpose Template - Quick Question"><i class="ti-email"></i><span>Quick Question?</span></a></div>';
    $('body').append($buythemediv);

    /*==============================================================*/
    //demo button  - END CODE
    /*==============================================================*/
    $('#leftCol').affix({
        offset: {
            top: 245
        }
    });

    if ($('.docs-navigation').length) {
        var el = $('.docs-navigation'),
                stickyTop = el.offset().top,
                footerHeight = $('#footer').outerHeight();

        $('.docs-navigation').find('.inner-link').parent('li').removeClass('active');
        $('.docs-navigation').find('.inner-link[href="#' + onePageCurrentSection() + '"]').parent('li').addClass('active');

        $(window).scroll(function () {
            var stickyHeight = el.children('ul').outerHeight(),
                    limit = $('#footer').offset().top - stickyHeight,
                    windowTop = $(window).scrollTop(),
                    windowHeight = $(window).height();

            if (stickyTop < windowTop) {
                el.css({position: 'fixed', top: 0});
            } else {
                el.css({position: 'absolute', top: 0});
            }

            if (limit < windowTop) {
                var diff = limit - windowTop;
                el.css({height: windowHeight - diff - footerHeight, top: diff});
            } else {
                el.css({height: '100%'});
            }

            $('.docs-navigation').find('.inner-link').parent('li').removeClass('active');

            $('.docs-navigation').find('.inner-link[href="#' + onePageCurrentSection() + '"]').parent('li').addClass('active');
        });
    }

    $('a.sec-link').click(function () {
        var currentSection = $(this).attr('href');

        $('.docs-content section').each(function (index) {
            var _this = $(this).attr('id');
        });

        var divScrollToAnchor = $(this).attr('href');
        var _this = $(this);
        $('.docs-content section').addClass('hidden');
        $('.docs-content section' + currentSection).removeClass('hidden');
        $(_this).parent('li').parent('ul').find('li').removeClass('active');
        $(_this).parent('li').addClass('active');


        var topOffsetScroll = 40;

        $('html, body').stop().animate({
            'scrollTop': $(divScrollToAnchor).offset().top
        }, 750, 'easeOutQuint');

    });

    $("a.inner-link").not(".sec-link").click(function () {

        $(this).parent('li').parent('ul').find('li').removeClass('active');
        $(this).parent('li').addClass('active');

        var divScrollToAnchor = $(this).attr('href');

        var topOffsetScroll = 40;

        $('html, body').stop().animate({
            'scrollTop': $(divScrollToAnchor).offset().top
        }, 750, 'easeOutQuint');


        return false;
    });
});

/*==============================================================
 Smooth Scroll - START CODE
 ==============================================================*/
$('.inner-link').smoothScroll({
    speed: 900,
    offset: -0
});

$('.sec-link').smoothScroll({
    speed: 900,
    offset: -0
});


/*==============================================================
 Custom scrollbar
 ==============================================================*/

(function ($) {
    $(window).load(function () {
        $("#leftCol").mCustomScrollbar({
            set_width: false, /*optional element width: boolean, pixels, percentage*/
            set_height: false, /*optional element height: boolean, pixels, percentage*/
            horizontalScroll: false, /*scroll horizontally: boolean*/
            scrollInertia: 0, /*scrolling inertia: integer (milliseconds)*/
            mouseWheel: true, /*mousewheel support: boolean*/
            mouseWheelPixels: "auto", /*mousewheel pixels amount: integer, "auto"*/
            autoDraggerLength: true, /*auto-adjust scrollbar dragger length: boolean*/
            autoHideScrollbar: false, /*auto-hide scrollbar when idle*/
            scrollButtons: {/*scroll buttons*/
                enable: false, /*scroll buttons support: boolean*/
                scrollType: "continuous", /*scroll buttons scrolling type: "continuous", "pixels"*/
                scrollSpeed: "auto", /*scroll buttons continuous scrolling speed: integer, "auto"*/
                scrollAmount: 80 /*scroll buttons pixels scroll amount: integer (pixels)*/
            },
            advanced: {
                updateOnBrowserResize: true, /*update scrollbars on browser resize (for layouts based on percentages): boolean*/
                updateOnContentResize: true, /*auto-update scrollbars on content resize (for dynamic content): boolean*/
                autoExpandHorizontalScroll: false, /*auto-expand width for horizontal scrolling: boolean*/
                autoScrollOnFocus: false, /*auto-scroll on focused elements: boolean*/
                normalizeMouseWheelDelta: false /*normalize mouse-wheel delta (-1/1)*/
            },
            contentTouchScroll: true, /*scrolling by touch-swipe content: boolean*/
            callbacks: {
                onScrollStart: function () { }, /*user custom callback function on scroll start event*/
                onScroll: function () { }, /*user custom callback function on scroll event*/
                onTotalScroll: function () { }, /*user custom callback function on scroll end reached event*/
                onTotalScrollBack: function () { }, /*user custom callback function on scroll begin reached event*/
                onTotalScrollOffset: 0, /*scroll end reached offset: integer (pixels)*/
                onTotalScrollBackOffset: 0, /*scroll begin reached offset: integer (pixels)*/
                whileScrolling: function () { } /*user custom callback function on scrolling event*/
            },
            theme: "dark-2" /*"light", "dark", "light-2", "dark-2", "light-thick", "dark-thick", "light-thin", "dark-thin"*/
        });
    });
})(jQuery);

/*==============================================================
 Scroll To Top
 ==============================================================*/

$(window).scroll(function () {
    if ($(this)
            .scrollTop() > 100) {
        $('.scrollToTop')
                .fadeIn();
    } else {
        $('.scrollToTop')
                .fadeOut();
    }
});
//Click event to scroll to top
$('.scrollToTop').click(function () {
    $('html, body').animate({
        scrollTop: 0
    }, 1000);
    return false;
});