<?php /* Smarty version Smarty-3.0.8, created on 2012-09-03 13:53:02
         compiled from "/var/www/websites/effervescence/poll/presentation/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1850616818504468e671ef30-55023684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e23e1104be005ed987e11b1e131a0edb012a1a5' => 
    array (
      0 => '/var/www/websites/effervescence/poll/presentation/templates/login.tpl',
      1 => 1346660572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1850616818504468e671ef30-55023684',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include '/var/www/websites/effervescence/poll/presentation/smarty_plugins/function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"login",'assign'=>"obj"),$_smarty_tpl);?>




<form class="well form-inline" action="<?php echo $_smarty_tpl->getVariable('obj')->value->mLinkToLogin;?>
" method="post">
	<?php if ($_smarty_tpl->getVariable('obj')->value->isLogin==0){?>
		<input type="text" class="input-small" placeholder=" Enter Roll Num" name="username" value="<?php echo $_smarty_tpl->getVariable('obj')->value->mUsername;?>
">
		<input type="password" class="input-small" placeholder="Password" name="password" value="">
		<button type="submit" class="btn" name="login">Sign in</button>
	<?php }else{ ?>
		<h3> Welcome <b> <?php echo $_smarty_tpl->getVariable('obj')->value->mUsername;?>
 </b> </h3>
		<a href="<?php echo $_smarty_tpl->getVariable('obj')->value->mLinkToLogout;?>
"> Logout </a>
	<?php }?>

  <h1> Effe MM'13 T-Shirt POLLING </h1>
</form>

<a href="<?php echo $_smarty_tpl->getVariable('obj')->value->index_url;?>
"><button class="btn btn-inverse"> HOME  </button></a>


<?php if ($_smarty_tpl->getVariable('obj')->value->showMyVote==1){?>
	<a href="<?php echo $_smarty_tpl->getVariable('obj')->value->myvote_url;?>
"><button class="btn btn-success"> MyVote  </button></a>
<?php }?>

<?php if ($_smarty_tpl->getVariable('obj')->value->poll_complete==1){?>
	<a href="<?php echo $_smarty_tpl->getVariable('obj')->value->placeorder_url;?>
"><button class="btn btn-primary"> Place My Order </button> </a>
<?php }?>

<?php if ($_smarty_tpl->getVariable('obj')->value->mAuthenticate==2){?>
	<h3> Your userid or password did not match </h3>
<?php }?>
<h3> <b style="float:right;"> Total Votes: <?php echo $_smarty_tpl->getVariable('obj')->value->total_votes[0]['total_votes'];?>
 </b> </h3>

