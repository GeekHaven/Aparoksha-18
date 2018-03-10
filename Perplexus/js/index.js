$(window).bind('resize', function(e)
{
  if (window.RT) clearTimeout(window.RT);
  window.RT = setTimeout(function()
  {
    this.location.reload(false); /* false to get page from cache */
  }, 100);
});
var ferris = $("#ferris"),
    center = $("#center"),
    support=$("#support"),
    tl;
var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;
//alert('viewport width is: '+ windowWidth + ' and viewport height is: + windowHeight);
TweenLite.set(center, {x:windowWidth/7.1894, y:windowWidth/7.1894});



//a little tricky getting the ferris wheel built, but it serves its purpose
function addArms(numArms) {
  var space = 360/numArms; 
  for (var i = 0; i < numArms; i++){
    var newArm = $("<div>", {class:"arm"}).appendTo(center)
    var newPivot = $("<div>", {class:"pivot outer"}).appendTo(center);
    var newBasket = $("<div>", {class:"basket"}).appendTo(newPivot);
    TweenLite.set(newPivot, {rotation:i*space, transformOrigin:"0.75vw 15.75vw"})
    TweenLite.set(newArm, {rotation:(i*space) -90, transformOrigin:"0vw 0.225vw"})
    TweenLite.set(newBasket, {rotation:  (-i * space), transformOrigin:"50% top" });
  }   
}

//Get this party started
addArms(8);
//values between 2 and 12 work best
TweenLite.from(ferris, 1, {autoAlpha:0});

//Animation (super easy)
tl = new TimelineMax({repeat:-1, onUpdate:updateSlider});
tl.to(center, 20, {rotation:360,  ease:Linear.easeNone})
//tl.to(support, 20, {rotation:-360,  ease:Linear.easeNone})
//spin each basket in the opposite direction of the ferris wheel at same rate (no math)
tl.to($(".basket"), 20, {rotation:"-=360",  ease:Linear.easeNone},0)
tl.pause();
//UI Controls
$( "#slider" ).slider({
  range: false,
  min: 0,
  max: 1,
  step:.001,
  slide: function ( event, ui ) {
    tl.progress( ui.value ).pause();
  },
  stop: function( event, ui ) {tl.play()}
});	
			
function updateSlider() {
		$("#slider").slider("value", tl.progress());
}

$( "#sliderSpeed" ).slider({
  range: false,
  min: 0,
  max: 8,
  step:.02,
  value:1,
  slide: function ( event, ui ) {
    tl.timeScale( ui.value ).resume();
  }
});	


$("#playBtn").click(function(){
  tl.play();
});
$("#pauseBtn").click(function(){
	tl.pause();
});

$("#reverseBtn").click(function(){
  tl.reverse();
});

 var x = $("#center").position();
 // alert("Top: " + x.top + " Left: " + x.left);
  $("#supportL").css(
    {
    "-ms-transform": "rotate(60deg)", /* IE 9 */
    "-webkit-transform": "rotate(60deg)", /* Chrome, Safari, Opera */
    "transform": "rotate(60deg)",
    
    "visibility":"visible"
     
  }






    );
    $("#lbtn").css({"visibility":"hidden"});
  $("#lbtn").css({"opacity":"0"});
  $("#mbtn").click(function(){

    //alert("hi");
    $("body").css({
      "background": "#fefcea",
      "background": "-moz-radial-gradient(center, ellipse cover,  #fefcea 0%, #fefcea 40%, #f1da36 100%)",
      "background": "-webkit-radial-gradient(center, ellipse cover,  #fefcea 0%,#fefcea 40%,#f1da36 100%)",
      "background":" radial-gradient(ellipse at center,  #fefcea 0%,#fefcea 40%,#f1da36 100%)",
      "filter":     "progid:DXImageTransform.Microsoft.gradient( startColorstr='#fefcea', endColorstr='#f1da36',GradientType=1 )"
      
}
      );
    $("#ferris").css({"-webkit-filter":"blur(0px)","filter":"blur(0px)"});
    $(".bottom").css({"-webkit-filter":"blur(0px)","filter":"blur(0px)"});
    $(".basket").css({"-webkit-filter":"brightness(100%)"});

    tl.play();
    // document.getElementById("mbtn").Id="hello"
    $(function(){
        $("#typed").typed({
             strings: ["Thank you for visiting", "Login with facebook"],
            //stringsElement: $('#typed-strings'),
            typeSpeed: 40,
            backDelay: 600,
            loop: false,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: true,
            callback: function(){ foo(); },
            resetCallback: function() { newTyped(); }
        });

        $(".reset").click(function(){
            $("#typed").typed('reset');
        });

    });

    function newTyped(){ /* A new typed object */ }

    function foo(){ console.log("Callback"); }
	$("#lbtn").css({"visibility":"visible"});
	$("#lbtn").css({"opacity":"1"});
	$("#mbtn").css({"opacity":"0"});
	$("#mbtn").css({"visibility":"hidden"});
	








});
