{load_presentation_object filename="placeorder" assign="obj"}

<h1> Place Your Order </h1>

{if $obj->place_order eq 0}
	<h2> Voting is still On. Cannot place order now. </h2>
{elseif $obj->isLogin eq 0}
	<h2> Please login to place order. </h2>
	<br/><br/><br/><br/>
	<div class="row">
	<div class="span5" style="margin: 5px;">
		<img src="images/img_thumb/IEC2011025.jpg" />
	</div>
	<h2 style="color:blue; margin-top: 10px;"> Congratulation. WINNER!! </h2> 
	
	<h5 style="font-size: 17px"> Degined By: IEC2011025</h5>
	<br/> <br/>
	
	<h3> <b style="color:green;"> Price per piece: To be Decided  </b></h3>
</div>
{else}
<div class="row">
	<div class="span5">
		<img src="images/img_thumb/IEC2011025.jpg" />
	</div>
	<h2 style="color:blue;"> Additional ORDERS date will be decided later. These will be ordered only if a MINIMUM OF 50 tShirts are ordered !! Only for 24 hours. </h2> 
	<h5 STYLE="font-size: 17px"> Degined By: IEC2011025</h5>
	<br/> <br/>
	
	<h3> <b style="color:green; margin-left: 385px;"> Price per piece: To be decided </b></h3>
</div>
<br/> <br/> <br/>
<div class="span8">
	<h1> Size specification Details :</h1> <br/>
	<table class="table table-hover" style="font-family: 'Hobo Std'; margin-left: 25px;">
		<thead>
			<tr>
				<th style="font-size: 15px;"> Specifications : <p style="color:red;">(BOYS) </p> </th>
				<th> S </th>
				<th> M </th>
				<th> L </th>
				<th> XL </th>
				<th> XXL </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="font-size: 15px;"> <b>Chest Width(''): </b></td>
				<td> 20 </td>
				<td> 22 </td>
				<td> 22 </td>
				<td> 23 </td>
				<td> 24 </td>
			</tr>
			<tr>
				<td style="font-size: 15px;"><b> Body Length(''): </b></td>
				<td> 26 </td>
				<td> 27 </td>
				<td> 28 </td>
				<td> 29 </td>
				<td> 30 </td>
			</tr>
		</tbody>
	</table> <br/> <br/>
	
	<table class="table table-hover" style="font-family: 'Hobo Std'; margin-left: 25px;">
		<thead>
			<tr>
				<th style="font-size: 15px;"> Specifications : <p style="color:red;">(GIRLS) </p> </th>
				<th> S </th>
				<th> M </th>
				<th> L </th>
				<th> XL </th>
				<th> XXL </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="font-size: 15px"> <b>Chest Width(''): </b></td>
				<td> 16.5 </td>
				<td> 17.5 </td>
				<td> 18.5 </td>
				<td> 19.5 </td>
				<td> 20.5 </td>
			</tr>
			<tr>
				<td style="font-size: 15px"><b> Body Length(''): </b></td>
				<td> 23.5 </td>
				<td> 24.5 </td>
				<td> 25.5 </td>
				<td> 26.5 </td>
				<td> 27.5 </td>
			</tr>
		</tbody>
	</table>
</div>
<br/> <br/> <br/>
<div class="span8">
	
	{if $obj->order_status eq 1}
	<br/> <br/> <br/>
	<h2 style=" margin-bottom: 10px;"> Your Previous Orders : </h2>
		<table class="table table-hover" style="margin-left: 25px; font-family: 'Hobo Std';">
			<thead style="border-bottom: 1px solid rgba(500,0,0,0.5);">
				<tr>
					<th> Quantity </th>
					<th> Size </th>
					<th> Gender </th>
					<th> Ordered On </th>
					<th> </th>
				</tr>
			</thead>
			<tbody>
				{section name=i loop=$obj->order_details}
					<tr>
						<td>{$obj->order_details[i].quantity} </td>
						<td>{$obj->order_details[i].size} </td>
						<td>{$obj->order_details[i].gender} </td>
						<td>{$obj->order_details[i].added_on} </td>
						<!--<td><a href="{$obj->order_details[i].cancel_url}"> <img src="images/del.png" /> </a> </td>-->
					</tr>
				{/section}
			</tbody>
		</table>
	
	{/if}
	
	
	<h2 style="margin-bottom: -20px; margin-top: 40px;"> Fill order Details Below: </h2> <br/>
	
	<form class="form-inline" method="post" action="{$obj->mLinkToOrder}">
		<h6 style="font-size: 13px; color: black; margin-left: 25px;"> Quantity : </h6>
		<select class="span2" name="quantity" style="margin-left: 25px; margin-top: 10px;">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="10">10</option>
			<option value="25">25</option>
			<option value="50">50</option>
		</select>
		
		<h6 style="font-size: 13px; color: black; margin-left: 25px;"> Size : </h6>
		<select class="span1" name="size" style="margin-left: 25px; margin-top: 10px;">
			<option value="s">S</option>
			<option value="m">M</option>
			<option value="l">L</option>
			<option value="xl">XL</option>
			<option value="xxl">XXL</option>
		</select>
		
		<h6 style="font-size: 13px; color: black; margin-left: 25px;"> Hostel : </h6>
		<select class="span1" name="hostel" style="margin-left: 25px; margin-top: 10px;">
			<option value="bh1">BH1</option>
			<option value="bh2">BH2</option>
			<option value="bh3">BH3</option>
			<option value="bh4">BH4</option>
			<option value="gh1">GH1</option>
			<option value="gh2">GH2</option>
			<option value="gh3">GH3</option>
			<option value="res">Residence</option>
			<option value="others">Others</option>
		</select>
		
		
		<h6 style="font-size: 13px; color: black; margin-left: 25px;"> Contact Num : </h6>
		<input name="contact" type="text" length="12" placeholder="enter your number" />
		
		<h6 style="font-size: 13px; color: black; margin-left: 25px;"> Gender : </h6>
		<select class="span2" name="gender" style="margin-left: 25px; margin-top: 10px;">
			<option value="m"> Male </option>
			<option value="f"> Female </option>
		</select>
		<button type="submit" class="btn btn-danger" name="saveorder" value="saveorder" style="margin-top: 10px;">Save Order</button>
	</form>
	
	
</div>

{/if}
