<?php /* Smarty version Smarty-3.0.8, created on 2013-09-16 15:49:08
         compiled from "C:\wamp\www\poll/presentation/templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28335523728741cd833-18499817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6d6ce9d0022c0743790988de8eb445fecd745f7' => 
    array (
      0 => 'C:\\wamp\\www\\poll/presentation/templates\\login.tpl',
      1 => 1379346243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28335523728741cd833-18499817',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\wamp\www\poll/presentation/smarty_plugins\function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"login",'assign'=>"obj"),$_smarty_tpl);?>




<form class="well form-inline" action="<?php echo $_smarty_tpl->getVariable('obj')->value->mLinkToLogin;?>
" method="post">
	<?php if ($_smarty_tpl->getVariable('obj')->value->isLogin==0){?>
		<span class="hint--bottom" data-hint="Enter your roll number"><input type="text" class="input-small" placeholder="Roll Number" name="username" value="<?php echo $_smarty_tpl->getVariable('obj')->value->mUsername;?>
"></span>
		<span class="hint--bottom" data-hint="Enter your password"><input type="password" class="input-small" placeholder="Password" name="password" value=""></span>
		<button type="submit" class="btn btn-danger" name="login" style="margin-left: 10px;">Sign in</button>
		<?php }else{ ?>
		
		<h3 style=" float: left; top: 25px;"> <h1>Welcome</h1><h3> <?php echo $_smarty_tpl->getVariable('obj')->value->mUsername;?>
  </h3</h3>

	<?php }?>
	

  <h1 style="float: left; margin-right: 650px; font-family: 'Stereofidelic';
				font-weight: solid;
				font-size: 50px;
				text-shadow: 0 0 6px rgb(218, 79, 73);  position: absolute; top: 7px; right: -150px;"> Effe MM'13 |  T-Shirt POLLING </h1>
</form>
<div style="float:right; margin-top: -15px; margin-right: 30px; background-color: rgba(0, 116, 204, 0.2);
background-image: -moz-linear-gradient(center top , rgba(0, 136, 204, 0.3), rgba(0, 85, 204, 0.3));
background-repeat: repeat-x repeat-y;     border: 3px solid rgba(0, 0, 0, 0.05);
    border-radius: 4px 4px 4px 4px;
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.05) inset;
}">
<ul style="list-style-type:none; margin:0; padding:0;">
<li style="display:inline;"><span class="hint--left" data-hint="Home Page"><a href="<?php echo $_smarty_tpl->getVariable('obj')->value->index_url;?>
"><button class="btn btn-danger"> HOME  </button></a></span></li>
<?php if ($_smarty_tpl->getVariable('obj')->value->showMyVote==1){?>
	<li style="display:inline; padding: 0;"><span class="hint--bottom" data-hint="Your votes"><a href="<?php echo $_smarty_tpl->getVariable('obj')->value->myvote_url;?>
"><button class="btn btn-danger"> MyVotes  </button></a></span></li>
<?php }?>

<?php if ($_smarty_tpl->getVariable('obj')->value->poll_complete==1){?>
	<li style="display:inline;"><span class="hint--bottom" data-hint="Order Now"><a href="<?php echo $_smarty_tpl->getVariable('obj')->value->placeorder_url;?>
"><button class="btn btn-danger"> Place My Order </button> </a></span></li>
<?php }?>
<?php if ($_smarty_tpl->getVariable('obj')->value->isLogin==1){?>
	<a href="<?php echo $_smarty_tpl->getVariable('obj')->value->mLinkToLogout;?>
" class="btn btn-danger"> Logout </a>
<?php }?>
<li>

</li>
</ul>
</div>
<?php if ($_smarty_tpl->getVariable('obj')->value->mAuthenticate==2){?>
	<h3 style="margin-left: 500px;"> Your userid or password did not match. </h3>
<?php }?>
<h3> <b style="float:right; font-family: 'Hobo Std'; font-size: 21px; position: fixed; bottom: 20px; right: 20px;"> Total Votes: <?php echo $_smarty_tpl->getVariable('obj')->value->total_votes[0]['total_votes'];?>
 </b> </h3>

