<?php /* Smarty version Smarty-3.0.8, created on 2013-09-14 16:47:16
         compiled from "C:\wamp\www\poll/presentation/templates\myvote.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1016452349314d90a40-06936986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '457729bc84c1aec3358d8519d5e0680421aeec29' => 
    array (
      0 => 'C:\\wamp\\www\\poll/presentation/templates\\myvote.tpl',
      1 => 1379177235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1016452349314d90a40-06936986',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\wamp\www\poll/presentation/smarty_plugins\function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"myvote",'assign'=>"obj"),$_smarty_tpl);?>

<center>
<h2 style="text-decoration: underline;">Myvote Page </h2>
<br/><br/><br/>
</center>

<?php if ($_smarty_tpl->getVariable('obj')->value->isLogin==2){?>
<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('obj')->value->mItemDetails) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
<div class="row">
<div style="border-bottom: 2px dashed; margin-top: 10px; margin-down: 10px;"></div>
	<div class="span5">
	
		<img src="<?php echo $_smarty_tpl->getVariable('obj')->value->mItemDetails[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['thumb_url'];?>
" />
	</div>
	<h2 style="margin-top: 20px"> You voted for <b style="color:rgb(218, 79, 73);"> <?php echo $_smarty_tpl->getVariable('obj')->value->mItemDetails[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['added_by'];?>
 </b> </h2>
	<br/>
	<h2>Votes  = <?php echo $_smarty_tpl->getVariable('obj')->value->mItemDetails[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['total_votes'];?>
 </h2>
</div>
<?php endfor; endif; ?>
<?php }?>

<?php if ($_smarty_tpl->getVariable('obj')->value->isLogin==1){?>
	<h3 style="color:red;"> You have not Voted yet </h3>
<?php }?>

<?php if ($_smarty_tpl->getVariable('obj')->value->isLogin==0){?>
	<h3 style="color:red;"> Please Login to see your Vote </h3>
<?php }?>