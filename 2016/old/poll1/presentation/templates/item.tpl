{load_presentation_object filename="item" assign="obj"}

<div>   
	<div class="span10">
		<right>
		<div class="btn-group">
		  <button class="btn dropdown-toggle" data-toggle="dropdown">
			FILTER
			<span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">			
			<li> <a href="{$obj->filter_url[0]}"> Latest Added </a> </li>
			<li> <a href="{$obj->filter_url[1]}"> Oldest Added </a> </li>
			<li> <a href="{$obj->filter_url[2]}"> Rank Down to Top </a> </li>
			<li> <a href="{$obj->filter_url[3]}"> Rank Top to Down </a> </li>
		  </ul>
		</div>
		</right>
	</div>
	{section name=i loop=$obj->items}
		<div class="span10">
		<div style="border-bottom: 1px solid #999; margin-top: 10px; margin-down: 10px;"></div>
			<div class="span3">
				{section name=y loop=$obj->item_images}
					{if $obj->items[i].item_id eq $obj->item_images[y].item_id}
						<p><a class="group{$obj->items[i].item_id}" onclick="getColorBox('group{$obj->items[i].item_id}');" href="{$obj->item_images[y].image_url}"> <img src="{$obj->items[i].thumb_url}" style="height: 250px;width:200px"> </a> </p>
						{break}
					{/if}
				{/section}
				{section name=y loop=$obj->item_images}
					{if $obj->items[i].item_id eq $obj->item_images[y].item_id}
						<p><a class="group{$obj->items[i].item_id}" href="{$obj->item_images[y].image_url}"> </a> </p>
					{/if}
				{/section}
			</div>
			<div class="span6">
				<h2> {$obj->items[i].title} </h2>
				<h6> {$obj->items[i].description} </h6>
				{**<h6> Created by: {$obj->items[i].added_by} </h6>**}
				<h5> Current Rating: {$obj->items[i].current_votes} </h5>
				<div class="progress">
					<div class="bar" style="width: {$obj->items[i].vote_percent}%;"></div>
				</div>
				{if $obj->has_voted eq 0}
					{if $obj->items[i].can_vote eq 1}
						{if $obj->num_of_votes[0].votes eq 0}
							<a href="{$obj->items[i].link_to_vote}"> <button class="btn btn-small btn-primary" style="float:right;"><i class="icon-thumbs-up-1" style="margin-right: 15px;"></i>+3</button> </a>
						{/if}
						{if $obj->num_of_votes[0].votes eq 1}
							<a href="{$obj->items[i].link_to_vote}"> <button class="btn btn-small btn-primary" style="float:right;"><i class="icon-thumbs-up-1" style="margin-right: 15px;"></i>+2</button> </a>
						{/if}
						{if $obj->num_of_votes[0].votes eq 2}
							<a href="{$obj->items[i].link_to_vote}"> <button class="btn btn-small btn-primary" style="float:right;"><i class="icon-thumbs-up-1" style="margin-right: 15px;"></i>+1</button> </a>
						{/if}
					{else}
						<button class="btn btn-small disabled" style="float:right;">Rated</button>
					{/if}
				{/if}
			</div>
		</div>
	{/section}
</div>
