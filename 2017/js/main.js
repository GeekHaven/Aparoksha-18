var $body = $('body');
var $window = $('.window');
var menuBar = function () {
    var $menu = $('.menu');
    $menu.on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('active-nav');
    });
};
menuBar();
var activeWindow = function () {
    $window.on('click', function (e) {
        e.stopPropagation();
        $window.removeClass('current-window');
        $(this).addClass('current-window');
        $('.grid').packery('layout');
    });
};
activeWindow();
var draggableWindow = function () {
    $window.draggable({
        handle: '.window-actions, .window-nav, .status-bar',
        containment: 'parent',
        disabled: false,
        start: function (event, ui) {
            $window.removeClass('current-window');
            $(this).addClass('current-window');

        }
    });
};
draggableWindow();
var resizableWindow = function () {
    $window.resizable({
        handles: 'all',
        disabled: false,
        minWidth: 320,
        minHeight: 225,
        start: function (event, ui) {
            draggableWindow();
            $('.grid').packery('layout');
        }
    });
};
resizableWindow();
var closeWindow = function () {
    $('.window-close').bind('click', function (e) {
        e.preventDefault();
        $(this).parents('.window').removeClass('current-window window-opened').addClass('window-closed').hide();
    });
};
closeWindow();
var zoomWindow = function () {
    $('.window-zoom').on('click', function () {
        if ($window.hasClass('window-zoomed')) {
            $(this).parents('.window').removeClass('window-zoomed').css({
                width: '',
                height: '',
                left: Math.floor(Math.random() * 100) + 1,
                top: Math.floor(Math.random() * 100) + 1
            });
            setTimeout(function () {
                $('.window').removeClass('animated');
            }, 400);
            draggableWindow();
        } else {
            $(this).parents('.window').addClass('animated window-zoomed').css({
                left: 0,
                top: 0,
                right: 0,
                width: $('.screen').width(),
                height: $('.screen').height() - 50
            });
            $window.draggable({ disabled: true });
        }
    });
};
zoomWindow();
var resizableWindowSidebar = function () {
    $('.window-sidebar').resizable({ handles: 'e' });
};
resizableWindowSidebar();
var sortableSidebar = function () {
    var $sidebarUL = $('.sidebar-nav ul');
    $sidebarUL.sortable({
        distance: 10,
        axis: 'y',
        revert: 150
    });
    $sidebarUL.disableSelection();
};
sortableSidebar();
var sidebarToggle = function () {
    $('.toggle-nav').on('click', function () {
        $(this).parent().next('.child-nav').slideToggle(200);
    });
};
sidebarToggle();
var windowTitle = function () {
    var $selectedTitle = $(this).text();
    var $imageSrc = $(this).find('img').attr('src');
    $(this).parents('.window').find('.window-title .title').text($selectedTitle);
    $(this).parents('.window').find('.title-icon').prop('src', $imageSrc);
};
windowTitle();
var selectableSidebarNav = function () {
    $window.each(function () {
        $('.child-nav li', '.sidebar-nav').on('click', function () {
            $('.child-nav li', '.sidebar-nav').removeClass('active');
            $(this).addClass('active');
            windowTitle();
        });
    });
};
selectableSidebarNav();
var clearWindowClasses = function () {
    $body.click(function () {
        $window.removeClass('current-window');
    });
};
clearWindowClasses();
var sortableTabs = function () {
    var $nativeTabs = $('.native-tabs ul');
    $nativeTabs.sortable({
        cancel: '.ui-state-disabled',
        axis: 'x',
        revert: 100,
        containment: 'parent'
    });
    $nativeTabs.disableSelection();
};
sortableTabs();
var switchTabs = function () {
    var $tabs = $('a', '.native-tabs'), $tab = $('.tab');
    $tabs.on('click', function (e) {
        e.preventDefault();
        $tab.not(this).removeClass('tab-active');
        $(this).parent().addClass('tab-active');
    });
};
switchTabs();
var tabCount = null;
var countWindowTabs = function () {
    var windowName = null;
    $window.each(function (e) {
        tabCount = $(this).find('.tab').size();
        windowName = $(this).attr('id');
    });
    $window.on('click', function (e) {
        e.stopPropagation();
        $('.window').removeClass('current-window');
        $(this).addClass('current-window');
        tabCount = $(this).find('.tab').size();
    });
};
countWindowTabs();
var closeTab = function () {
    $('.close-tab').on('click', function (e) {
        e.preventDefault();
        tabCount--;
        console.log('New tab count: ' + tabCount);
        var $currentWindow = $(this).parents('.window');
        if (tabCount < 1) {
            $currentWindow.addClass('hide-tabs');
        } else {
            $currentWindow.removeClass('hide-tabs');
        }
        $(this).parents('.tab').addClass('removing').delay(200).queue(function () {
            $(this).remove();
        });
    });
};
closeTab();
var setDateAndTime = function () {
    var currentDate = new Date();
    var hours = currentDate.getHours();
    var amPM = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12;
    var weekday = new Array(7);
    weekday[0] = 'Sun';
    weekday[1] = 'Mon';
    weekday[2] = 'Tue';
    weekday[3] = 'Wed';
    weekday[4] = 'Thu';
    weekday[5] = 'Fri';
    weekday[6] = 'Sat';
    var weekdayFull = new Array(7);
    weekdayFull[0] = 'Sunday';
    weekdayFull[1] = 'Monday';
    weekdayFull[2] = 'Tuesday';
    weekdayFull[3] = 'Wednesday';
    weekdayFull[4] = 'Thursday';
    weekdayFull[5] = 'Friday';
    weekdayFull[6] = 'Saturday';
    var month = new Array();
    month[0] = 'January';
    month[1] = 'February';
    month[2] = 'March';
    month[3] = 'April';
    month[4] = 'May';
    month[5] = 'June';
    month[6] = 'July';
    month[7] = 'August';
    month[8] = 'September';
    month[9] = 'October';
    month[10] = 'November';
    month[11] = 'December';
    function addZero(i) {
        if (i < 10) {
            i = '0' + i;
        }
        return i;
    }
    var dateTime = weekday[currentDate.getDay()] + ' ' + hours + ':' + addZero(currentDate.getMinutes() + ' ' + amPM);
    var fullDate = weekdayFull[currentDate.getDay()] + ', ' + month[currentDate.getMonth()] + ' ' + currentDate.getDate() + ', ' + currentDate.getFullYear();
    $('.date-time').text(dateTime);
    $('.full-date').text(fullDate);
};
setDateAndTime();
var $appIcon = $('.app-icon');
var sortableDock = function () {
    var $dockUL = $('.dock ul');
    $dockUL.sortable({
        cancel: '.ui-state-disabled',
        revert: 100
    });
    $dockUL.disableSelection();
};
sortableDock();
var resizableDock = function () {
    $('.dock-resizer').resizable({
        handles: 'n',
        maxHeight: 120,
        minHeight: 20,
        resize: function (event, ui) {
            $appIcon.css({
                width: ui.size.height,
                height: ui.size.height
            });
            $('.dock').css('height', ui.size.height + 10);
            $('.grid').packery('layout');
        }
    });
};
resizableDock();
var whichAppsAreRunning = function () {
    function runningApp() {
        $('a', '.dock').each(function () {
            var $linkName = $(this).attr('href');
            if ($($linkName).is(':visible')) {
                $(this).parent().addClass('running');
            } else {
                $(this).parent().removeClass('running');
            }
        });
    }
    runningApp();
    $('a', '.dock').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('.window').removeClass('current-window window-opened').addClass('window-closed').hide();
        var $appLink = $(this).attr('href');
        $('.window').removeClass('current-window');
        $($appLink).show();
        setTimeout(function () {
            $($appLink).removeClass('window-closed').addClass('current-window window-opened');
            runningApp();
        });
    });
};
whichAppsAreRunning();
var rightClickMenu = function () {
    var $screen = $('.screen');
    $screen.bind('contextmenu', function (e) {
        //e.preventDefault();
        $('.context-menu').finish().toggle().css({
            top: e.pageY - 32 + 'px',
            left: e.pageX + 1 + 'px'
        });
    });
    $screen.bind('mousedown', function (e) {
        if (!$(e.target).parents('.context-menu').length > 0) {
            $('.context-menu').hide();
        }
    });
    $('li', '.context-menu').on('on', function () {
        switch ($(this).attr('data-action')) {
        case 'first':
            alert('first');
            break;
        case 'second':
            alert('second');
            break;
        case 'third':
            alert('third');
            break;
        }
        $('.context-menu').hide();
    });
};
//rightClickMenu();
var windowThumbSize = function () {
    $('.thumb-size-slider').slider({
        range: 'min',
        min: -10,
        max: -4,
        value: -6,
        slide: function (event, ui) {
            $('.album-photos').removeClass(function (index, className) {
                return (className.match(/(^|\s)grid-\S+/g) || []).join(' ');
            }).addClass('grid' + ui.value);
        }
    });
    $('.album-photos').addClass('grid' + $('.thumb-size-slider').slider('value'));
};
windowThumbSize();
// var baseUrl = 'https://api.flickr.com/services/rest/?method=';
// var apiKey = '8563c61491f61f1cf1055ac503a9b86f';
// var userID = '14843363@N03';
// var src;
// var getPhotoAlbums = function () {
//     var getListUrl = baseUrl + 'flickr.photosets.getList' + '&user_id=' + userID + '&api_key=' + apiKey + '&format=json&jsoncallback=?';
//     $.getJSON(getListUrl, function (data) {
//         $.each(data.photosets.photoset, function (i, item) {
//             var albumThumbSrc = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.primary + '_' + item.secret + '_s.jpg';
//             $('<li>' + '<a href=\'#album-' + item.id + '\'>' + '<i class=\'icon-sidebar icon-album\'><img src=\'' + albumThumbSrc + '\' alt=\'Album thumbnail for ' + item.title._content + '\'/></i>' + item.title._content + '' + '</a>' + '</li>').appendTo('.photo-albums');
//         });
//     }).done(function () {
//         var $activeAlbum = $('.active a', '.photo-albums');
//         var $selectedTitle = $activeAlbum.text();
//         $('.album-title').text($selectedTitle);
//         var selectedAlbumID = $activeAlbum.attr('href').replace('#album-', '');
//         var displaySelectedAlbum = function () {
//             if (selectedAlbumID === 'all') {
//                 getAllPhotos();
//             } else {
//                 getPhotos(selectedAlbumID);
//             }
//         };
//         displaySelectedAlbum();
//         $('a', '.photo-albums').on('click', function (e) {
//             e.preventDefault();
//             selectedAlbumID = $(this).attr('href').replace('#album-', '');
//             displaySelectedAlbum();
//             $selectedTitle = $(this).text();
//             $(this).parents('.window').find('.album-title').text($selectedTitle);
//         });
//         selectableSidebarNav();
//     });
// };
// getPhotoAlbums();
// var getPhotos = function (photosetid) {
//     var getPhotosUrl = baseUrl + 'flickr.photosets.getPhotos' + '&photoset_id=' + photosetid + '&user_id=' + userID + '&api_key=' + apiKey + '&format=json&jsoncallback=?';
//     $('.album-photos').empty();
//     $.getJSON(getPhotosUrl, function (data) {
//         $.each(data.photoset.photo, function (i, item) {
//             src = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_n.jpg';
//             $('<li class=\'photo\'><div class=\'photo-wrapper\'><span class=\'image\'><img src=\'' + src + '\' alt=\'\'/></span></div></li>').appendTo('.album-photos');
//         });
//         $('.photo-count').text(data.photoset.total + ' Photos');
//     }).done(function () {
//         selectedPhoto();
//     });
// };
// var getAllPhotos = function () {
//     var getPhotosUrl = baseUrl + 'flickr.people.getPublicPhotos' + '&user_id=' + userID + '&api_key=' + apiKey + '&per_page=500&format=json&jsoncallback=?';
//     $('.album-photos').empty();
//     $.getJSON(getPhotosUrl, function (data) {
//         $.each(data.photos.photo, function (i, item) {
//             src = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_n.jpg';
//             $('<li class=\'photo\'><div class=\'photo-wrapper\'><span class=\'image\'><img src=\'' + src + '\' alt=\'\'/></span></div></li>').appendTo('.album-photos');
//         });
//         $('.photo-count').text(data.photos.total + ' Photos');
//     }).done(function () {
//         selectedPhoto();
//     });
// };
// var selectedPhoto = function () {
//     $('.photo').on('click', function (e) {
//         if (!$(this).hasClass('photo__selected')) {
//             $('.photo__selected').removeClass('photo__selected');
//             $(this).addClass('photo__selected');
//             zoomSelectedPhoto();
//         }
//     });
// };
// var zoomSelectedPhoto = function () {
//     $('.photo__selected').on('dblclick', function () {
//         if ($(this).hasClass('photo__zoomed')) {
//             $(this).removeClass('photo__zoomed');
//             $('.image-large').remove();
//         } else {
//             $('<img/>').on('load', function () {
//                 console.log('image loaded correctly');
//             }).on('error', function () {
//                 console.log('error loading image');
//             }).attr('src', $(this).attr('src'));
//             $(this).addClass('photo__zoomed');
//             var selectedImgSrc = $(this).find('img').attr('src');
//             var largeImgSrc = selectedImgSrc.replace('_n.jpg', '_h.jpg');
//             $(this).find('.photo-wrapper').append('<span class=\'image-large\'><img src=\'' + largeImgSrc + '\' alt=\'\'/></span>');
//         }
//     });
// };
// selectedPhoto();