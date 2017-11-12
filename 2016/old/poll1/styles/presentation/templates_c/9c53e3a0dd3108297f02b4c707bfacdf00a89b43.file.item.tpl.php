<?php /* Smarty version Smarty-3.0.8, created on 2012-08-28 13:09:57
         compiled from "/var/www/html/poll/presentation/templates/item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1766863789503c75cde26095-48908358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c53e3a0dd3108297f02b4c707bfacdf00a89b43' => 
    array (
      0 => '/var/www/html/poll/presentation/templates/item.tpl',
      1 => 1346139586,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1766863789503c75cde26095-48908358',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include '/var/www/html/poll/presentation/smarty_plugins/function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"item",'assign'=>"obj"),$_smarty_tpl);?>


<div>
	<div class="span10">
		<center>
		<div class="btn-group">
		  <button class="btn dropdown-toggle" data-toggle="dropdown">
			FILTER
			<span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">			
		<!--	<li> <a href="<?php echo $_smarty_tpl->getVariable('obj')->value->filter_url[0];?>
"> Latest Added </a> </li>
			<li> <a href="<?php echo $_smarty_tpl->getVariable('obj')->value->filter_url[1];?>
"> Oldest Added </a> </li>
		-->	<li> <a href="<?php echo $_smarty_tpl->getVariable('obj')->value->filter_url[2];?>
"> Rank Down to Top </a> </li>
			<li> <a href="<?php echo $_smarty_tpl->getVariable('obj')->value->filter_url[3];?>
"> Rank Top to Down </a> </li>
		  </ul>
		</div>
		</center>
	</div>
	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('obj')->value->items) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<div class="span10">
			<div class="span3">
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['y']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['name'] = 'y';
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('obj')->value->item_images) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total']);
?>
					<?php if ($_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['item_id']==$_smarty_tpl->getVariable('obj')->value->item_images[$_smarty_tpl->getVariable('smarty')->value['section']['y']['index']]['item_id']){?>
						<p><a class="group<?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['item_id'];?>
" href="<?php echo $_smarty_tpl->getVariable('obj')->value->item_images[$_smarty_tpl->getVariable('smarty')->value['section']['y']['index']]['image_url'];?>
"> <img src="<?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['thumb_url'];?>
"> </a> </p>
						<?php break 1?>
					<?php }?>
				<?php endfor; endif; ?>
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['y']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['name'] = 'y';
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('obj')->value->item_images) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['y']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['y']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['y']['total']);
?>
					<?php if ($_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['item_id']==$_smarty_tpl->getVariable('obj')->value->item_images[$_smarty_tpl->getVariable('smarty')->value['section']['y']['index']]['item_id']){?>
						<p><a class="group<?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['item_id'];?>
" href="<?php echo $_smarty_tpl->getVariable('obj')->value->item_images[$_smarty_tpl->getVariable('smarty')->value['section']['y']['index']]['image_url'];?>
"> </a> </p>
					<?php }?>
				<?php endfor; endif; ?>
			</div>
			
			<div class="span6">
				<h2> <?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
 </h2>
				<h6> <?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['description'];?>
 </h6>
			<!--	<h6> Created by: <?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['added_by'];?>
 </h6>
			-->	<h5> Current Votes: <?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['current_votes'];?>
 </h5>
				<div class="progress progress-striped active">
					<div class="bar" style="background: #149bdf;width: <?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vote_percent'];?>
%;"></div>
				</div>
				<?php if ($_smarty_tpl->getVariable('obj')->value->has_voted==0){?>
					<?php if ($_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['can_vote']==1){?>
						<a href="<?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['link_to_vote'];?>
"> <button class="btn btn-small btn-primary" style="float:right;">Vote for this </button> </a>
					<?php }else{ ?>
						<button class="btn btn-small disabled" style="float:right;">Vote for this </button>
					<?php }?>
				<?php }?>
			</div>
		</div>
	<?php endfor; endif; ?>
</div>
