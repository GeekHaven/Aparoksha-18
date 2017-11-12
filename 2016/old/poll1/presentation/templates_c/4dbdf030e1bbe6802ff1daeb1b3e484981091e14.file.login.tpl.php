<?php /* Smarty version Smarty-3.0.8, created on 2015-02-12 12:02:51
         compiled from "/var/www/websites/aparoksha/poll/presentation/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153074818054dc49135d24e7-12984050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dbdf030e1bbe6802ff1daeb1b3e484981091e14' => 
    array (
      0 => '/var/www/websites/aparoksha/poll/presentation/templates/login.tpl',
      1 => 1423476348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153074818054dc49135d24e7-12984050',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include '/var/www/websites/aparoksha/poll/presentation/smarty_plugins/function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"login",'assign'=>"obj"),$_smarty_tpl);?>


<form class="well form-inline" action="<?php echo $_smarty_tpl->getVariable('obj')->value->mLinkToLogin;?>
" method="post">



<div style="float:right">
	<?php if ($_smarty_tpl->getVariable('obj')->value->isLogin==0){?>
		<span class="hint--bottom" data-hint="Enter your roll number"><input type="text" class="input-small" placeholder="Roll Number" name="username" value="<?php echo $_smarty_tpl->getVariable('obj')->value->mUsername;?>
"></span>
		<span class="hint--bottom" data-hint="Enter your password"><input type="password" class="input-small" placeholder="Password" name="password" value=""></span>
		<button type="submit" class="btn btn-primary" name="login" style="margin-left: 10px;">Sign in</button>
		<?php }else{ ?>
		
		<h3 style=" float: left; top: 25px;"> <h1 style="display: inline-block;">Welcome</h1><h3 style="display:inline;margin-left:0px;"> <?php echo $_smarty_tpl->getVariable('obj')->value->mUsername;?>
  </h3</h3>

	<?php }?>
	
</div>

  </form>
  <h1 style="float: left; 
				font-weight: solid;
				font-size: 27px;
				text-shadow: 0 0 6px #0088cc;  position: absolute; top: 15px; left:200px;"> Aparoksha'15 |  T-Shirt Polling</h1>

<div style="float:right; margin-top: -15px; margin-right: 20px; background-color: rgba(0, 116, 204, 0.2);
background-image: -moz-linear-gradient(center top , rgba(0, 136, 204, 0.3), rgba(0, 85, 204, 0.3));
background-repeat: repeat-x repeat-y;     border: 3px solid rgba(0, 0, 0, 0.05);
    border-radius: 4px 4px 4px 4px;
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.05) inset;
}">
<ul style="list-style-type:none; margin:0; padding:0;">
<li style="display:inline;padding:15px"><span class="hint--left" data-hint="Home Page"><a href="<?php echo $_smarty_tpl->getVariable('obj')->value->index_url;?>
"> Home  </a></span></li>
<?php if ($_smarty_tpl->getVariable('obj')->value->showMyVote==1){?>
	<li style="display:inline; padding: 0;padding:15px"><span class="hint--bottom" data-hint="Your votes"><a href="<?php echo $_smarty_tpl->getVariable('obj')->value->myvote_url;?>
"> MyVotes  </a></span></li>
<?php }?>

<?php if ($_smarty_tpl->getVariable('obj')->value->poll_complete==1){?>
	<li style="display:inline;padding:15px"><span class="hint--bottom" data-hint="Order Now"><a href="<?php echo $_smarty_tpl->getVariable('obj')->value->placeorder_url;?>
">Place My Order </a></span></li>
<?php }?>
<?php if ($_smarty_tpl->getVariable('obj')->value->isLogin==1){?>
	<a href="<?php echo $_smarty_tpl->getVariable('obj')->value->mLinkToLogout;?>
" style="padding:15px"> Logout </a>
<?php }?>
<li>

</li>
</ul>

</div>
<?php if ($_smarty_tpl->getVariable('obj')->value->mAuthenticate==2){?>
	<h3 style="margin-left: 500px;"> Your userid or password did not match. </h3>
<?php }?>

<h3> <b style="float:right; font-family: 'Hobo Std'; font-size: 21px; position: fixed; bottom: 40px; right: 20px;"> Total Votes: <?php echo $_smarty_tpl->getVariable('obj')->value->total_votes[0]['total_votes'];?>
 </b> </h3>

<h3> <b style="float:right; font-family: 'Hobo Std'; font-size: 21px; position: fixed; bottom: 20px; right: 20px;"> Distinct Voters: <?php echo $_smarty_tpl->getVariable('obj')->value->unique_voters[0]['unique_voters'];?>
 </b> </h3>
