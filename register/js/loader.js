$(document).ready(function($) {
    $('.tetris').css('width','100%');
    $('.tetris').css('height','100%');
});
$(window).on('load', function () {
    $('.tetris').fadeOut();
    //make site visible again
    //$('body').removeClass('loader');
});
