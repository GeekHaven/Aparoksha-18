{*smarty*}
{config_load file="site.conf"}
{load_presentation_object filename="base" assign="obj"}
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>{#site_title#}</title>
	{literal}
	<script src="styles/bootstrap/js/jquery.js"></script>
	
	<link href="styles/hint.css" rel="stylesheet" type="text/css" />
	<link href="styles/bootstrap/js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css" />
	<link href="styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="styles/bootstrap/css/docs.css" rel="stylesheet" type="text/css" />
	<link href="styles/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="styles/navigation/ddsmoothmenu.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="styles/colorbox/css/colorbox.css" />
	<script src="js/jquery.min.js"></script>
	<script src="styles/colorbox/js/jquery.colorbox.js"></script>
	<script src="styles/bootstrap/js/bootstrap-dropdown.js"> </script>
	
	<style type="text/css">
		#foot {
			height:20px;
			width: 100%;
			font-family: 'Hobo Std';
			font-size: 15px;
			text-align: left;
			margin-bottom: 0px;
			color: black;
			background-color: rgba(0, 0, 0, 0.2);
			background-image: -moz-linear-gradient(center top , rgba(0, 136, 204, 0.3), rgba(0, 85, 204, 0.3));
			box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.05) inset;
		}
	</style>
		
	<script>
		 function getColorBox(cls) {
			clsNew = "."+cls;
			$(clsNew).colorbox({rel:cls, transition:"fade"});
			$(".ajax").colorbox();
		 }
			$(document).ready(function() {
		
				$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
	{/literal}
</head>

<body>
	
	<div class="page-header" id="banner">
		{include file=$obj->mHeader}
	</div>
	
	<div class="container">
		
		<div class="span10">
			{include file=$obj->mCell}
		</div>	
	</div>
	
	<div class="modal-footer" style="color:  #0088cc;">&copy; GeekHaven, <a href="http://www.iiita.ac.in">IIIT-A</a></div>

	
</body>

</html>