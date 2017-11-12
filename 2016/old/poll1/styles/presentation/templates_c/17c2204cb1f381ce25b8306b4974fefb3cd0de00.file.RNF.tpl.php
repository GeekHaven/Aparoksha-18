<?php /* Smarty version Smarty-3.0.8, created on 2012-08-27 22:10:37
         compiled from "C:\wamp\www\poll/presentation/templates\RNF.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21016503bf05d4e12f9-19330002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17c2204cb1f381ce25b8306b4974fefb3cd0de00' => 
    array (
      0 => 'C:\\wamp\\www\\poll/presentation/templates\\RNF.tpl',
      1 => 1345680337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21016503bf05d4e12f9-19330002',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\wamp\www\poll/presentation/smarty_plugins\function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"RNF",'assign'=>"obj"),$_smarty_tpl);?>



<h2 style="color:red;">
	OOps!! The Stuff you looking for does not exists. Go back!
</h2>

<a href="<?php echo $_smarty_tpl->getVariable('obj')->value->mLinkToIndex;?>
"><h4> GO Back to Home </h4> </a>