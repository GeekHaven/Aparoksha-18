{load_presentation_object filename="myvote" assign="obj"}
<center>
<h2 style="text-decoration: underline;">Myvote Page </h2>
<br/><br/><br/>
</center>

{if $obj->isLogin eq 2}
{section name=i loop=$obj->mItemDetails}
<div class="row">
<div style="border-bottom: 2px dashed; margin-top: 10px; margin-down: 10px;"></div>
	<div class="span5">
	
		<img src="{$obj->mItemDetails[i].thumb_url}" />
	</div>
	<h2 style="margin-top: 20px"> You voted for <b style="color:rgb(218, 79, 73);"> {$obj->mItemDetails[i].added_by} </b> </h2>
	<br/>
	<h2>Votes  = {$obj->mItemDetails[i].total_votes} </h2>
</div>
{/section}
{/if}

{if $obj->isLogin eq 1}
	<h3 style="color:red;"> You have not Voted yet </h3>
{/if}

{if $obj->isLogin eq 0}
	<h3 style="color:red;"> Please Login to see your Vote </h3>
{/if}