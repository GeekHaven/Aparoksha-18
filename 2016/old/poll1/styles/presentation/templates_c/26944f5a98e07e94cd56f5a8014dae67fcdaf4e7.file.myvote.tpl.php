<?php /* Smarty version Smarty-3.0.8, created on 2012-09-03 14:39:04
         compiled from "/var/www/websites/effervescence/poll/presentation/templates/myvote.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1598273874504473b053dd15-36596477%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26944f5a98e07e94cd56f5a8014dae67fcdaf4e7' => 
    array (
      0 => '/var/www/websites/effervescence/poll/presentation/templates/myvote.tpl',
      1 => 1346660572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1598273874504473b053dd15-36596477',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include '/var/www/websites/effervescence/poll/presentation/smarty_plugins/function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"myvote",'assign'=>"obj"),$_smarty_tpl);?>

<center>
<h2>Myvote Page </h2>
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
	<div class="span5">
		<img src="<?php echo $_smarty_tpl->getVariable('obj')->value->mItemDetails[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['thumb_url'];?>
" />
	</div>
	<h4> You voted for <b style="color:blue;"> <?php echo $_smarty_tpl->getVariable('obj')->value->mItemDetails[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 </b> </h4>
	<br/>
	<h4>Votes  = <?php echo $_smarty_tpl->getVariable('obj')->value->mItemDetails[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['total_votes'];?>
 </h4>
</div>
<?php endfor; endif; ?>
<?php }?>

<?php if ($_smarty_tpl->getVariable('obj')->value->isLogin==1){?>
	<h3 style="color:red;"> You have not Voted yet </h3>
<?php }?>

<?php if ($_smarty_tpl->getVariable('obj')->value->isLogin==0){?>
	<h3 style="color:red;"> Please Login to see your Vote </h3>
<?php }?>