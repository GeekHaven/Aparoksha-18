<?php /* Smarty version Smarty-3.0.8, created on 2015-02-12 12:08:53
         compiled from "/var/www/websites/aparoksha/poll/presentation/templates/conformvote.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102722650354dc4a7d1b1a42-63159920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa97ffe96fc93430f1e15ce1e97c037b27883528' => 
    array (
      0 => '/var/www/websites/aparoksha/poll/presentation/templates/conformvote.tpl',
      1 => 1423527121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102722650354dc4a7d1b1a42-63159920',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_load_presentation_object')) include '/var/www/websites/aparoksha/poll/presentation/smarty_plugins/function.load_presentation_object.php';
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
" style="height: 250px;"/>
	</div>
<!--	<h2> <?php echo $_smarty_tpl->getVariable('obj')->value->mVoteText;?>
 </h2> -->

	<br/>

	<?php if ($_smarty_tpl->getVariable('obj')->value->mConformVote==1){?>
		<h3> Please read the <b style="color:red;"> Rules </b> above before you confirm </h3> 
		<h3 style="color:red; margin-bottom: 10px;"> Are you sure? </h3>
		
		<form action="<?php echo $_smarty_tpl->getVariable('obj')->value->mLinkToConformVote;?>
" method="post"}
			<input type="text" value="" >
			<span class="hint--right" data-hint="Vote"><button type="submit" class="btn btn-success" name="conform" value="<?php echo $_smarty_tpl->getVariable('obj')->value->mValue;?>
"> Cast my Vote </button></span>
		</form>
	<?php }?>
    
	<a href="<?php echo $_smarty_tpl->getVariable('obj')->value->mLinkToIndex;?>
" class="btn btn-info"> Go back to main </a>
<?php }else{ ?>
	<h2> Polling has already finished. Go back to view winners or place order </h2>
<?php }?>

</div>
