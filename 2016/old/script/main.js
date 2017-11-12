$(document).ready(function(){
  
  var ENHANCED_WIDTH = 600;
  var IMAGE_POLL_INTERVAL = 50; // milliseconds
  var IMAGE_TIMEOUT = 2000;
  var IMAGE_WIDTH = 0;
  var IMAGE_HEIGHT = 0;
  
  var $background = $('#background');
  var scaleTimeout = null;
  var backgroundImage = null;
  var polledTime = 0;
  var alwaysShow = false;
  var show = false;
  var currentScale = 0;
  
  if ($background.length === 0) return;

  $('body').addClass(($(document).width() >= ENHANCED_WIDTH) ? 'wide' : 'narrow');
  alwaysShow = $background.data('alwaysshow') === true;
  
  setupBackground();
  
  $(window).resize(function() {
      if (scaleTimeout) {
          clearTimeout(scaleTimeout);
          scaleTimeout = null;
      }
      
      scaleTimeout = setTimeout(setupBackground, 30);
  });

  function setupBackground() {

      var width = $(window).width();
      
      if (width >= ENHANCED_WIDTH) {
          if ($('body').is('.narrow')) {
              $('body').removeClass('narrow').addClass('wide');
          }
          if (!show) showImage();
      }
      else if (alwaysShow && !show) showImage();
      else if (width < ENHANCED_WIDTH && $('body').is('.wide')) {          
          $('body').removeClass('wide').addClass('narrow');
          if (!alwaysShow) hideImage();
      }
      
      scaleElements();
  }

  function scaleElements() {
    if (!backgroundImage.complete) return;
    var width = $(document).width(), height = $(document).height(), xScale = 1, yScale = 1, scale = 1;
    var $elementsToScale = $('.scale');
    
    xScale = width / backgroundImage.width;
    yScale = $(window).height() /  backgroundImage.height;
    
    scale = Math.ceil(((xScale > yScale) ? xScale : yScale) * 10) / 10;
    
    if (scale === currentScale) return;
    
    $elementsToScale.css({
        'transform' : 'scale(' + scale + ')',
        '-webkit-transform' : 'scale(' + scale + ')',
        '-moz-transform' : 'scale(' + scale + ')',
        '-o-transform' : 'scale(' + scale + ')',
        '-ms-transform' : 'scale(' + scale + ')',
        'width' : backgroundImage.width + 'px',
        'height' : backgroundImage.height + 'px',
        'margin-left' : -(backgroundImage.width / 2) + 'px'
    });
    
    currentScale = scale;
  }
  
  function loadImage(imageUrl, callback) {
    var imageObj = {
        complete: false,
        loading: false,
        width: 0,
        height: 0,
        el: null,
        src: imageUrl
    };  

    imageObj.loading = true;
    imageObj.el = document.createElement('img');
    imageObj.el.src = imageObj.src;

    setTimeout(pollForImage, 0, imageObj, callback);
    return imageObj;
  }
  
  function pollForImage(imageObj, callback) {
    if (imageObj.el.width > 0) {
        // Successfully loaded
        imageObj.width = imageObj.el.width; // Store original dimensions. Opera changes them with scaling.
        imageObj.height = imageObj.el.height; 
        imageObj.loading = false;
        imageObj.complete = true;
        callback && callback(imageObj);
        return;
    }
    else {
        polledTime += IMAGE_POLL_INTERVAL;
        if (polledTime > IMAGE_TIMEOUT) return;
        setTimeout(pollForImage, IMAGE_POLL_INTERVAL, imageObj, callback);
    }
  }
  
  function showImage() {
      $background[0].className = 'hide';
      if (backgroundImage && backgroundImage.complete) {
          backgroundImage.el.className = 'scale';
          $background.prepend(backgroundImage.el);
          setTimeout(function() {
             $background[0].className = 'animate show';
         },0);
      }
      
      if (backgroundImage === null) {
        backgroundImage = loadImage($background.data('limg'), function() {
            $background[0].className = 'hide';
            backgroundImage.el.className = 'scale';
           $background.prepend(backgroundImage.el);
           scaleElements();
           setTimeout(function() {
               $background[0].className = 'animate show';
           },0);
        });
      }
      
      show = true;
          
  }
  
  function hideImage() {
    backgroundImage.el.parentNode.removeChild(backgroundImage.el);
    imageVisible = false;
    show = false;
  }
});