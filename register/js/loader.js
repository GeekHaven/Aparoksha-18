$(document).ready(function($) {
    $('#main-content').addClass('loading');
    $(.tetris').css('margin', '18em auto');
});
$(window).on('load', function () {
    $('.tetris').fadeOut();
    $('#main-content').removeClass('loading');
});
