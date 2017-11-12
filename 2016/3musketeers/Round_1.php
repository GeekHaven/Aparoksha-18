<html lang="en">
<head>
<title>3 Muskeeters</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.js"></script>


<style type="text/css" media="screen">
    #editor { 
        position: absolute;
        top: 70;
        right: 0;
        bottom: 0;
        left: 70;
    }
.ace_editor {
    width:600px;
    height:300px;
}
	.myeditor {
		height: 700px;
		width: 1000px	;
	}
	.invisible {
		display: none;
	}
	
    .cls {
    	position: relative;
        top: 10;
        right: 0;
        bottom: 0;
        margin:5;
        left: 200;
    }

    .cls2 {
    	position: absolute;
        top: 100;
        right: 0;
        bottom: 0;
        margin:5;
        left: 10;
        width:50; 
    }

    .clsad {
    	position: relative;
        top: 10;
        right: 50;
        bottom: 0;
        margin:5;
        left: 300;
    }
    
</style>
</head>
<body>

	<script>
	
	document.onmousedown=disableclick;
	//status="Right Click Disabled";
	function disableclick(event)
	{
	  if(event.button==2)
	   {
		 //alert(status);
		 return false;    
	   }
	}

	var global = 0;

	function countdown2(  minutes, seconds )
	{
		editor1.setReadOnly(false);
		editor2.setReadOnly(false);
		editor3.setReadOnly(false);
		editor4.setReadOnly(false);
			

		var element, endTime, hours, mins, msLeft, time;

		function twoDigits( n )
		{
			return (n <= 9 ? "0" + n : n);
		}

		function updateTimer()
		{
			msLeft = endTime - (+new Date);
			if ( msLeft < 1000 ) {
				element.innerHTML = "countdown's over!";

				editor1.setReadOnly(true);
				editor2.setReadOnly(true);
				editor3.setReadOnly(true);
				editor4.setReadOnly(true);

				
				if(global == 1) {
					document.getElementById('musk3').disabled = false;
					global = 2;
				}

				if(global == 0) {
				document.getElementById('musk2').disabled = false;
					global =1;
				}



			} else {
				time = new Date( msLeft );
				hours = time.getUTCHours();
				mins = time.getUTCMinutes();
				element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
				setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
			}
		}

		element = document.getElementById( 'countdown' );
		endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
		updateTimer();
	}


	//countdown( "countdown", 1, 5 );
	//countdown( "countdown2", 100, 0 );


	</script>  

	<div class="container">
		<div class="row" style="margin-top:0.75rem;">
			<div class="col s12">
				 <button class="waves-effect waves-light btn" id="musk1">Muskeeter 1</button>
				 <button class="waves-effect waves-light btn" id="musk2">Muskeeter 2</button>
				 <button class="waves-effect waves-light btn" id="musk3">Muskeeter 3</button>
				 <div class="flow-text right-align right" id="countdown"> Welcome </div>
			</div>
		</div>
	
	<script type="text/javascript"> 
		document.getElementById('musk1').onclick = function() {
			countdown2(6,0);
			
			document.getElementById('musk1').disabled = true;
			document.getElementById('musk2').disabled = true;
			document.getElementById('musk3').disabled = true;

		};

		document.getElementById('musk2').onclick = function() {
			countdown2(6,0);
			document.getElementById('musk2').disabled = true;
		};

		document.getElementById('musk3').onclick = function() {
			countdown2(6,	0);
			document.getElementById('musk3').disabled = true;
		};

	</script>

		<div class="row">
			<div class="col s12">
				<div id="editordisplay">
					<div class="myeditor" id="editor1">Question 1</div>
					<div class="myeditor" id="editor2">Question 2</div>
					<div class="myeditor" id="editor3">Question 3</div>
					<div class="myeditor" id="editor4">Question 4</div>
				</div>
			</div>
		</div>
	</div>
	<div class="collection" id="accordion" style="position: absolute; top: 66px; margin-left:0.5rem;">
		<a class="collection-item active" style="cursor:pointer;">Question 1</a>
		<a class="collection-item" style="cursor:pointer;">Question 2</a>
		<a class="collection-item" style="cursor:pointer;">Question 3</a>
		<a class="collection-item" style="cursor:pointer;">Question 4</a>
	</div>
	<script src="ace.js" type="text/javascript" charset="utf-8"></script>
	<script>
		document.getElementById('musk2').disabled = true;
		document.getElementById('musk3').disabled = true;

		var editor1,editor2,editor3,editor4;

		$(function() {
			 editor1 = ace.edit("editor1");
			 editor2 = ace.edit("editor2");
			 editor3 = ace.edit("editor3");
			 editor4 = ace.edit("editor4");


			 editor1.setTheme("ace/theme/monokai");
			 editor2.setTheme("ace/theme/monokai");
			 editor3.setTheme("ace/theme/monokai");
			 editor4.setTheme("ace/theme/monokai");

			editor1.getSession().setMode("ace/mode/c_cpp");
			editor2.getSession().setMode("ace/mode/c_cpp");
			editor3.getSession().setMode("ace/mode/c_cpp");
			editor4.getSession().setMode("ace/mode/c_cpp");

			editor1.setReadOnly(true);
			editor2.setReadOnly(true);
			editor3.setReadOnly(true);
			editor4.setReadOnly(true);
		
			
		});

		(function revealHide() {
			$(".myeditor")
				.not(':first')
					.addClass('invisible');
			
			$('.collection-item').click(function() {				
				$('.collection-item')
					.removeClass("active");

				$(this)
					.addClass("active");
					
				var index = $(this).index();
				var that = $('.myeditor')[index];
				
				$('.myeditor')
					.not(this)
						.addClass('invisible');

				$(that)
					.removeClass('invisible');
			});
		})();
		
		(function(){
			var str = '#include <bits/stdc++.h>\nusing namespace std;\nint main()\n{\n	cout << "Hello World!!" << endl;\n	return 0;\n}';
			$('.myeditor').text(str);
		})();
	</script>
	
	<footer class="page-footer" style="background-color:#26A69A!important;">
		<div class="footer-copyright center-align">
		&copy 3 Musketeers organisers
		</div>
	</footer>
</body>
</html>

<?php
	
#echo "hello world";	
?>
