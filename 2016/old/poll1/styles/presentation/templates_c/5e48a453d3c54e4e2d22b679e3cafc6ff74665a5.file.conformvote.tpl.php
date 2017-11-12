<?php /* Smarty version Smarty-3.0.8, created on 2012-08-28 03:23:20
         compiled from "/var/www/html/poll/presentation/templates/conformvote.tpl" */ ?>
<?php /*%%SmartyHeaderCode:626033392503bec50f26bf8-72055352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e48a453d3c54e4e2d22b679e3cafc6ff74665a5' => 
    array (
      0 => '/var/www/html/poll/presentation/templates/conformvote.tpl',
      1 => 1346104174,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '626033392503bec50f26bf8-72055352',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include '/var/www/html/poll/presentation/smarty_plugins/function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"conformvote",'assign'=>"obj"),$_smarty_tpl);?>


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

</div>