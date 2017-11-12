<?php /* Smarty version Smarty-3.0.8, created on 2015-02-15 21:12:12
         compiled from "/var/www/websites/aparoksha/poll/presentation/templates/item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36856960954e0be5475ff44-12962236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '654e5c8e06cdb651621809ce66dd1ad69a916964' => 
    array (
      0 => '/var/www/websites/aparoksha/poll/presentation/templates/item.tpl',
      1 => 1424014177,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36856960954e0be5475ff44-12962236',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include '/var/www/websites/aparoksha/poll/presentation/smarty_plugins/function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"item",'assign'=>"obj"),$_smarty_tpl);?>


<div>   
	<div class="span10">
		<right>
		<div class="btn-group">
		  <button class="btn dropdown-toggle" data-toggle="dropdown">
			FILTER
			<span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">			
			<li> <a href="<?php echo $_smarty_tpl->getVariable('obj')->value->filter_url[0];?>
"> Latest Added </a> </li>
			<li> <a href="<?php echo $_smarty_tpl->getVariable('obj')->value->filter_url[1];?>
"> Oldest Added </a> </li>
			<li> <a href="<?php echo $_smarty_tpl->getVariable('obj')->value->filter_url[2];?>
"> Rank Down to Top </a> </li>
			<li> <a href="<?php echo $_smarty_tpl->getVariable('obj')->value->filter_url[3];?>
"> Rank Top to Down </a> </li>
		  </ul>
		</div>
		</right>
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
		<div style="border-bottom: 1px solid #999; margin-top: 10px; margin-down: 10px;"></div>
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
" onclick="getColorBox('group<?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['item_id'];?>
');" href="<?php echo $_smarty_tpl->getVariable('obj')->value->item_images[$_smarty_tpl->getVariable('smarty')->value['section']['y']['index']]['image_url'];?>
"> <img src="<?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['thumb_url'];?>
" style="height: 250px;width:200px"> </a> </p>
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
				<h5> Current Rating: <?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['current_votes'];?>
 </h5>
				<div class="progress">
					<div class="bar" style="width: <?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vote_percent'];?>
%;"></div>
				</div>
				<?php if ($_smarty_tpl->getVariable('obj')->value->has_voted==0){?>
					<?php if ($_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['can_vote']==1){?>
						<?php if ($_smarty_tpl->getVariable('obj')->value->num_of_votes[0]['votes']==0){?>
							<a href="<?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['link_to_vote'];?>
"> <button class="btn btn-small btn-primary" style="float:right;"><i class="icon-thumbs-up-1" style="margin-right: 15px;"></i>+3</button> </a>
						<?php }?>
						<?php if ($_smarty_tpl->getVariable('obj')->value->num_of_votes[0]['votes']==1){?>
							<a href="<?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['link_to_vote'];?>
"> <button class="btn btn-small btn-primary" style="float:right;"><i class="icon-thumbs-up-1" style="margin-right: 15px;"></i>+2</button> </a>
						<?php }?>
						<?php if ($_smarty_tpl->getVariable('obj')->value->num_of_votes[0]['votes']==2){?>
							<a href="<?php echo $_smarty_tpl->getVariable('obj')->value->items[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['link_to_vote'];?>
"> <button class="btn btn-small btn-primary" style="float:right;"><i class="icon-thumbs-up-1" style="margin-right: 15px;"></i>+1</button> </a>
						<?php }?>
					<?php }else{ ?>
						<button class="btn btn-small disabled" style="float:right;">Rated</button>
					<?php }?>
				<?php }?>
			</div>
		</div>
	<?php endfor; endif; ?>
</div>
