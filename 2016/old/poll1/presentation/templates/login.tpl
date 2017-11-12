{load_presentation_object filename="login" assign="obj"}

<form class="well form-inline" action="{$obj->mLinkToLogin}" method="post">



<div style="float:right">
	{if $obj->isLogin eq 0}
		<span class="hint--bottom" data-hint="Enter your roll number"><input type="text" class="input-small" placeholder="Roll Number" name="username" value="{$obj->mUsername}"></span>
		<span class="hint--bottom" data-hint="Enter your password"><input type="password" class="input-small" placeholder="Password" name="password" value=""></span>
		<button type="submit" class="btn btn-primary" name="login" style="margin-left: 10px;">Sign in</button>
		{else}
		
		<h3 style=" float: left; top: 25px;"> <h1 style="display: inline-block;">Welcome</h1><h3 style="display:inline;margin-left:0px;"> {$obj -> mUsername}  </h3</h3>

	{/if}
	
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
<li style="display:inline;padding:15px"><span class="hint--left" data-hint="Home Page"><a href="{$obj->index_url}"> Home  </a></span></li>
{if $obj->showMyVote eq 1}
	<li style="display:inline; padding: 0;padding:15px"><span class="hint--bottom" data-hint="Your votes"><a href="{$obj->myvote_url}"> MyVotes  </a></span></li>
{/if}

{if $obj->poll_complete eq 1}
	<li style="display:inline;padding:15px"><span class="hint--bottom" data-hint="Order Now"><a href="{$obj->placeorder_url}">Place My Order </a></span></li>
{/if}
{if $obj->isLogin eq 1}
	<a href="{$obj->mLinkToLogout}" style="padding:15px"> Logout </a>
{/if}
<li>

</li>
</ul>

</div>
{if $obj->mAuthenticate eq 2}
	<h3 style="margin-left: 500px;"> Your userid or password did not match. </h3>
{/if}

<h3> <b style="float:right; font-family: 'Hobo Std'; font-size: 21px; position: fixed; bottom: 40px; right: 20px;"> Total Votes: {$obj->total_votes[0].total_votes} </b> </h3>

<h3> <b style="float:right; font-family: 'Hobo Std'; font-size: 21px; position: fixed; bottom: 20px; right: 20px;"> Distinct Voters: {$obj->unique_voters[0].unique_voters} </b> </h3>
