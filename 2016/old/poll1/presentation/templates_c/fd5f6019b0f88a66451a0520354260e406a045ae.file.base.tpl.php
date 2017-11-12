<?php /* Smarty version Smarty-3.0.8, created on 2015-02-12 12:02:51
         compiled from "/var/www/websites/aparoksha/poll/presentation/templates/base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45010761954dc49134aaa74-79236605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd5f6019b0f88a66451a0520354260e406a045ae' => 
    array (
      0 => '/var/www/websites/aparoksha/poll/presentation/templates/base.tpl',
      1 => 1423476348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45010761954dc49134aaa74-79236605',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include '/var/www/websites/aparoksha/poll/presentation/smarty_plugins/function.load_presentation_object.php';
?>
<?php  $_config = new Smarty_Internal_Config("site.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"base",'assign'=>"obj"),$_smarty_tpl);?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $_smarty_tpl->getConfigVariable('site_title');?>
</title>
	
	<script src="styles/bootstrap/js/jquery.js"></script>
	
	<link href="styles/hint.css" rel="stylesheet" type="text/css" />
	<link href="styles/bootstrap/js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css" />
	<link href="styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="styles/bootstrap/css/docs.css" rel="stylesheet" type="text/css" />
	<link href="styles/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="styles/navigation/ddsmoothmenu.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="styles/css/fontello.css">
    <link rel="stylesheet" href="styles/css/animation.css"><!--[if IE 7]><link rel="stylesheet" href="css/fontello-ie7.css"><![endif]-->

	
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
	
</head>

<body>
	
	<div class="page-header" id="banner">
		<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('obj')->value->mHeader, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	</div>
	
	<div class="container">
		
		<div class="span10">
			<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('obj')->value->mCell, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		</div>	
	</div>
	
	<div class="modal-footer" style="color:  #0088cc;">&copy; GeekHaven, <a href="http://www.iiita.ac.in">IIIT-A</a></div>

	
</body>

</html>