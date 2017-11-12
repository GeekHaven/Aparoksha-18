<?php /* Smarty version Smarty-3.0.8, created on 2012-09-03 18:40:27
         compiled from "/var/www/websites/effervescence/poll/presentation/templates/conformvote.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18022210215044ac43c29aa2-96029940%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '275a0448a17cde2865881c5fc3efa8c89124f6b2' => 
    array (
      0 => '/var/www/websites/effervescence/poll/presentation/templates/conformvote.tpl',
      1 => 1346660572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18022210215044ac43c29aa2-96029940',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include '/var/www/websites/effervescence/poll/presentation/smarty_plugins/function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"conformvote",'assign'=>"obj"),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('obj')->value->poll_complete==0){?>
<div class="span10">
	<h2> Rules for T-Shirt Voting: </h2>
	<h4> 1> A voter has a total of 3 votes. </h4>
	<h4> 2> No votes are transferable. </h4>
	<h4> 3> A voter can vote for one t-shirt only once. </h4>
	<h4> 4> A vote once casted is <b>irreversible. </b> </h4>	
</div> 

<div class="span10">
	<br/> <br/> <br/>
</div>

<div class="row">
	<div class="span5">
		<img src="<?php echo $_smarty_tpl->getVariable('obj')->value->mImageUrl;?>
" />
	</div>
	<h2> <?php echo $_smarty_tpl->getVariable('obj')->value->mVoteText;?>
 </h2>

	<br/>

	<?php if ($_smarty_tpl->getVariable('obj')->value->mConformVote==1){?>
		<h3> Please read the <b style="color:blue;"> Rules </b> above before you confirm </h3> 
		<h3 style="color:red;"> Are you sure? </h3>
		
		<form action="<?php echo $_smarty_tpl->getVariable('obj')->value->mLinkToConformVote;?>
" method="post"}
			<input type="text" value="" >
			<button type="submit" class="btn" name="conform" value="<?php echo $_smarty_tpl->getVariable('obj')->value->mValue;?>
"> Cast my Vote </button>
		</form>
	<?php }?>
	<a href="<?php echo $_smarty_tpl->getVariable('obj')->value->mLinkToIndex;?>
"> Go back to main </a> 
<?php }else{ ?>
	<h2> Polling has already finished. Go back to view winners or place order </h2>
<?php }?>

</div>