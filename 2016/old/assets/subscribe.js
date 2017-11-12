            function IsEmail(email) {
                  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                  return regex.test(email);
            }
            
            
            function subscribe() {
		  var email = document.getElementById("email").value;
		  var submit = document.getElementById("submit").id;
		  
		  var dataString = 'submit=' + submit + '&email=' + email;
		  
		  if (email == '') {
			alert("Please Enter an E-Mail");
		  } else {
                        if (IsEmail(email)) {
                              $.ajax({
                                    type: "POST",
                                    url: "php/subscribe.php",
                                    data: dataString,
                                    cache: false,
                                    success: function(html) {
                                          alert(html);
                                    }
                              });
                        } else {
                              alert("Enter Valid E-Mail");
                        }
		  }
		  return false;
	    }