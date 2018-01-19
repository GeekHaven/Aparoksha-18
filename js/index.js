"use strict";

function animateWithRandomNumber(myClass, from, to) {
    TweenMax.fromTo(myClass, Math.floor(Math.random() * (60 - 2 + 1) + 2) * 0.5 + 0.5, { y: from }, { y: to,
        onComplete: animateWithRandomNumber,
        onCompleteParams: [myClass, from, to],
        ease: Linear.easeNone });
}

var itemsDown = [".light4", ".light5", ".light6", ".light7", ".light8", ".light11", ".light12", ".light13", ".light14", ".light15", ".light16"].forEach(function (e) {
    return animateWithRandomNumber(e, -1080, 1080);
});
var itemsUp = [".light1", ".light2", ".light3", ".light9", ".light10", ".light17"].forEach(function (e) {
    return animateWithRandomNumber(e, 1080, -1080);
});

var newYearTime = '1521138600'; //Wed, 01 Jan 2014 00:00:00 GMT. Timstamp
var currentTime = moment().format('X'); //Thu, 24 Jan 2013 13:00:00 GMT. Timestamp

var diffTime = newYearTime - currentTime; //better to handle this in Controller to avoid timezone problem
var duration = moment.duration(diffTime, 'seconds');
var interval = 1;

setInterval(function () {
    duration = moment.duration(duration.asSeconds() - interval, 'seconds');

    var _url = "http://www.chabudai.org/temp/wonderfl/honehone/img/";

    var month1;
    var month = duration.months();
    if(month < 10){
      month1 = 0;
    }else{
      month1 = Math.floor(month / 10);
    }

    var month2 = month%10;
  
    var day1;
    var day = duration.days();
    if(day < 10){
      day1 = 0;
    }else{
      day1 = Math.floor(day / 10);
    }

    var day2 = day%10;

    var hour1;
    var hour = duration.hours();
    if(hour < 10){
      hour1 = 0;
    }else{
      hour1 = Math.floor(hour / 10);
    }

    var hour2 = hour%10;

    var minute1;
    var minute = duration.minutes();
    if(minute < 10){
      minute1 = 0;
    }else{
      minute1 = Math.floor(minute / 10);
    }

    var minute2 = minute%10;

    var second1;
    var second = duration.seconds();
    if(second < 10){
      second1 = 0;
    }else{
      second1 = Math.floor(second / 10);
    }
    var second2 = second%10;

    $('#month1').css("background-image", "url("+_url+"h" + month1 + ".gif)");
    $('#month2').css("background-image", "url("+_url+"hh" + month2 + ".gif)").text('Months');
    $('#day1').css("background-image", "url("+_url+"h" + day1 + ".gif)");
    $('#day2').css("background-image", "url("+_url+"hh" + day2 + ".gif)").text('Days');
    $('#hour1').css("background-image", "url("+_url+"h" + hour1 + ".gif)");
    $('#hour2').css("background-image", "url("+_url+"hh" + hour2 + ".gif)").text('Hours');
    $('#minute1').css("background-image", "url("+_url+"m" + minute1 + ".gif)");
    $('#minute2').css("background-image", "url("+_url+"mm" + minute2 + ".gif)").text('Minutes');
    $('#second1').css("background-image", "url("+_url+"s" + second1 + ".gif)");
    $('#second2').css("background-image", "url("+_url+"ss" + second2 + ".gif)").text('Seconds');
}
, 1000);
