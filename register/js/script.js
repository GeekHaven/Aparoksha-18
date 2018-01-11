$(document).ready(function()  {

  $(".popup1, .popup2").hide();
  $("#exit").hide();
  
  $("#left").mouseover(function() {
    $(".logo, .name").css("color", "white");
    $(".logo1, .name1").css("color", "#0f1216");
    $("#left").css("background-color", "#0f1216");
    $("#right").css("background-color", "white");
  });
  $("#right").mouseover(function() {
    $(".logo1, .name1").css("color", "white");
    $(".logo, .name").css("color", "#0f1216");
    $("#right").css("background-color", "#0f1216");
    $("#left").css("background-color", "white");
  });
  $("#left, #right").mouseleave(function() {
    $(".logo, .name").css("color", "#0f1216");
    $(".logo1, .name1").css("color", "#0f1216");
    $("#right").css("background-color", "white");
    $("#left").css("background-color", "white");
  });


  $("#left").click(function() {
    if($("#left").hasClass("col-md-6")){
        $(this).toggleClass("col-md-6 col-md-12",1000);
    }
    $("#right").hide(1000);
    $(".logo").hide();
    $(".name").addClass("formopen");
    $(".popup1").fadeIn(1000);
    $("#left").mouseover(function() {
      $("#left").css("background-color", "white");
      $(".name").css("color", "#0f1216");
    });
    $("#exit").fadeIn();
  });

  $("#exit").click(function() {
    $(".popup1").hide();
    if($("#left").hasClass("col-md-12")){
      $("#left").toggleClass("col-md-12 col-md-6",2000);
    }
    $(".name").removeClass("formopen");
    $("#right").show(1000);
    $(".logo").show();
    $(".logo, .name").css("text-align", "center");
    $(".name").css("padding-top", "15%");
    $("#left").mouseover(function() {
      $(".logo, .name").css("color", "white");
      $(".logo1, .name1").css("color", "#0f1216");
      $("#left").css("background-color", "#0f1216");
      $("#right").css("background-color", "white");
    });  
    $("#exit").fadeOut(); 
  });

  
  $("#right").click(function() {
    if($("#right").hasClass("col-md-6")){
        $(this).toggleClass("col-md-6 col-md-12",1000);
    }
    $("#left").hide();
    $(".logo1").hide();
    $(".name1").addClass("formopen");
    $(".popup2").fadeIn(1000);
    $("#right").mouseover(function() {
      $("#right").css("background-color", "white");
      $(".name1").css("color", "#0f1216");
    });
    $("#exit").fadeIn();
  });

  $("#exit").click(function() {
    $(".popup2").hide();
    if($("#right").hasClass("col-md-12")){
      $("#right").toggleClass("col-md-12 col-md-6",2000);
    }
    $(".name1").removeClass("formopen");
    $("#left").show(1500);
    $(".logo1").show();
    $(".logo1, .name1").css("text-align", "center");
    $(".name1").css("padding-top", "15%");
    $("#right").mouseover(function() {
      $(".logo1, .name1").css("color", "white");
      $(".logo, .name").css("color", "#0f1216");
      $("#right").css("background-color", "#0f1216");
      $("#left").css("background-color", "white");
    });
    $("#exit").fadeOut(); 
  });    

  var textArray = [
    'Hack In The North Registrations have started! Check events and workshop tab for more.',
    'Fest Registrations have started! Check fest registration tab for more.'
  ];

  var count = 0;

  document.getElementById("info-mov").innerHTML = textArray[count];  

  setInterval(function() {
    count++;
    if(count >= textArray.length) {
      count = 0;
    }
    document.getElementById("info-mov").innerHTML = textArray[count];
  }, 10000);

}); 
