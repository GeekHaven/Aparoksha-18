<?php /* Smarty version Smarty-3.0.8, created on 2012-08-28 03:37:38
         compiled from "/var/www/html/poll/presentation/templates/RNF.tpl" */ ?>
<?php /*%%SmartyHeaderCode:257457385503befaad92ca1-97403543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5a5ae9dc0baf0fad66798deeadb2a5c3023454b' => 
    array (
      0 => '/var/www/html/poll/presentation/templates/RNF.tpl',
      1 => 1346104174,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '257457385503befaad92ca1-97403543',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include '/var/www/html/poll/presentation/smarty_plugins/function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"RNF",'assign'=>"obj"),$_smarty_tpl);?>



<h2 style="color:red;">
	OOps!! The Stuff you looking for does not exists. Go back!
</h2>

<a href="<?php echo $_smarty_tpl->getVariable('obj')->value->mLinkToIndex;?>
"><h4> GO Back to Home </h4> </a>