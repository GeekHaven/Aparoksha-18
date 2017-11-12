{load_presentation_object filename="conformvote" assign="obj"}

{if $obj->poll_complete eq 0}
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
		<img src="{$obj->mImageUrl}" />
	</div>
	<h2> {$obj->mVoteText} </h2>

	<br/>

	{if $obj->mConformVote eq 1}
		<h3> Please read the <b style="color:red;"> Rules </b> above before you confirm </h3> 
		<h3 style="color:red; margin-bottom: 10px;"> Are you sure? </h3>
		
		<form action="{$obj->mLinkToConformVote}" method="post"}
			<input type="text" value="" >
			<span class="hint--right" data-hint="Vote"><button type="submit" class="btn btn-danger" name="conform" value="{$obj->mValue}"> Cast my Vote </button></span>
		</form>
	{/if}
	<span class="hint--right" data-hint="Back To Home"><a href="{$obj->mLinkToIndex}" class="btn btn-success"> Go back to main </a> </span>
{else}
	<h2> Polling has already finished. Go back to view winners or place order </h2>
{/if}

</div>