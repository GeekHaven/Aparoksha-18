<?php /* Smarty version Smarty-3.0.8, created on 2012-09-23 23:53:57
         compiled from "/var/www/websites/effervescence/poll/presentation/templates/placeorder.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2028046357505f53bdac5056-13075153%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be265507bfe072164d141308b16e6fad0f360d03' => 
    array (
      0 => '/var/www/websites/effervescence/poll/presentation/templates/placeorder.tpl',
      1 => 1348424624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2028046357505f53bdac5056-13075153',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include '/var/www/websites/effervescence/poll/presentation/smarty_plugins/function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"placeorder",'assign'=>"obj"),$_smarty_tpl);?>


<h1> Place Your Order </h1>

<?php if ($_smarty_tpl->getVariable('obj')->value->place_order==0){?>
	<h2> Voting is still On. Cannot place order now. </h2>
<?php }elseif($_smarty_tpl->getVariable('obj')->value->isLogin==0){?>
	<h2> Please login to place order. </h2>
	<br/><br/><br/><br/>
	<div class="row">
	<div class="span5">
		<img src="images/img_thumb/IIT2011083.jpg" />
	</div>
	<h2 style="color:blue;"> Congratulation. WINNER!! </h2> 
	<!--
	<h5> Degined By: Ankit Bhatia (IIT2011083)</h5>-->
	<br/> <br/>
	
	<h3> <b style="color:green;"> Price per piece: Rs 250  </b></h3>
</div>
<?php }else{ ?>
<div class="row">
	<div class="span5">
		<img src="images/img_thumb/IIT2011083.jpg" />
	</div>
	<h2 style="color:blue;"> Additional ORDERS FROM 24 September 2012. These will be ordered only if a MINIMUM OF 50 tShirts are ordered !! Only for 24 hours. </h2> 
	<!--
	<h5> Degined By: Ankit Bhatia (IIT2011083)</h5>-->
	<br/> <br/>
	
	<h3> <b style="color:green;"> Price per piece: Rs 250  </b></h3>
</div>
<br/> <br/> <br/>
<div class="span8">
	<h1> Size specification Details</h1> <br/>
	<table class="table table-hover">
		<thead>
			<tr>
				<th> Specifications <p style="color:blue;">(BOYS) </p> </th>
				<th> S </th>
				<th> M </th>
				<th> L </th>
				<th> XL </th>
				<th> XXL </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td> <b>Chest Width('') </b></td>
				<td> 20 </td>
				<td> 22 </td>
				<td> 22 </td>
				<td> 23 </td>
				<td> 24 </td>
			</tr>
			<tr>
				<td><b> Body Length('') </b></td>
				<td> 26 </td>
				<td> 27 </td>
				<td> 28 </td>
				<td> 29 </td>
				<td> 30 </td>
			</tr>
		</tbody>
	</table> <br/> <br/>
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th> Specifications <p style="color:blue;">(GIRLS) </p> </th>
				<th> S </th>
				<th> M </th>
				<th> L </th>
				<th> XL </th>
				<th> XXL </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td> <b>Chest Width('') </b></td>
				<td> 16.5 </td>
				<td> 17.5 </td>
				<td> 18.5 </td>
				<td> 19.5 </td>
				<td> 20.5 </td>
			</tr>
			<tr>
				<td><b> Body Length('') </b></td>
				<td> 23.5 </td>
				<td> 24.5 </td>
				<td> 25.5 </td>
				<td> 26.5 </td>
				<td> 27.5 </td>
			</tr>
		</tbody>
	</table>
</div>
<br/> <br/> <br/>
<div class="span8">
	
	<?php if ($_smarty_tpl->getVariable('obj')->value->order_status==1){?>
	<br/> <br/> <br/>
	<h4> Your Previous Orders: </h4>
		<table class="table table-hover">
			<thead>
				<tr>
					<th> Quantity </th>
					<th> Size </th>
					<th> Gender </th>
					<th> Ordered On </th>
					<th> </th>
				</tr>
			<thead>
			<tbody>
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('obj')->value->order_details) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<tr>
						<td><?php echo $_smarty_tpl->getVariable('obj')->value->order_details[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['quantity'];?>
 </td>
						<td><?php echo $_smarty_tpl->getVariable('obj')->value->order_details[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['size'];?>
 </td>
						<td><?php echo $_smarty_tpl->getVariable('obj')->value->order_details[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['gender'];?>
 </td>
						<td><?php echo $_smarty_tpl->getVariable('obj')->value->order_details[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['added_on'];?>
 </td>
						<!--<td><a href="<?php echo $_smarty_tpl->getVariable('obj')->value->order_details[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['cancel_url'];?>
"> <img src="images/del.png" /> </a> </td>-->
					</tr>
				<?php endfor; endif; ?>
			</tbody>
		</table>
	
	<?php }?>
	
	
	<h2> Fill order Details Below </h2> <br/>
	
	<form class="form-inline" method="post" action="<?php echo $_smarty_tpl->getVariable('obj')->value->mLinkToOrder;?>
">
		<h6> Quantity </h6>
		<select class="span2" name="quantity">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="10">10</option>
			<option value="25">25</option>
			<option value="50">50</option>
		</select>
		
		<h6> Size </h6>
		<select class="span1" name="size">
			<option value="s">S</option>
			<option value="m">M</option>
			<option value="l">L</option>
			<option value="xl">XL</option>
			<option value="xxl">XXL</option>
		</select>
		
		<h6> Gender </h6>
		<select class="span2" name="gender">
			<option value="m"> Male </option>
			<option value="f"> Female </option>
		</select>
		<button type="submit" class="btn" name="saveorder" value="saveorder">Save Order</button>
	</form>
	
	
</div>

<?php }?>
