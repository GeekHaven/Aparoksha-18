{load_presentation_object filename="placeorder" assign="obj"}

<h1> Place Your Order </h1>
<hr/>
<div>
	<h2 style="color:#aab22c"> Tshirt - A </h2>
	<img src="images/t1_f.jpg" style="height: 250px;"/>
	<img src="images/t1_b.jpg" style="height: 250px;"/>
	
</div>
<div>
	<h2 style="color:#aab22c"> Tshirt - B </h2>
	<img src="images/t2_f.jpg" style="height: 250px;"/>
	<img src="images/t2_b.jpg" style="height: 250px;"/>
</div>
<!--
<div>
	<h2 style="color:#aab22c"> Tshirt - C (just for IIITA faculty) </h2>
	<img src="images/t3_f.jpg" style="height: 250px;"/>
	<img src="images/t3_b.jpg" style="height: 250px;"/>
</div>	
-->
{if $obj->place_order eq 0}
	<h2> Voting is still On. Cannot place order now. </h2>
{elseif $obj->isLogin eq 0}
	<h2> Please login to place order. </h2>
	<br/><br/><br/><br/>
	<div class="row">
	
	<h3> <b style="color:green;"> Price per piece: Rs:270 for A/B. </b></h3>
</div>
{else}
<div class="row">
	
	<h3> <b style="color:green; margin-left: 25px;"> Price per piece: Rs:270 for A/B. </b></h3>
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
					<th> Type </th>
					<th> Gender </th>
					<th> Hostel </th>
					<th> Contact </th>
					<th> Ordered On </th>
					<th> </th>
				</tr>
			</thead>
			<tbody>
				{section name=i loop=$obj->order_details}
					<tr>
						<td>{$obj->order_details[i].quantity} </td>
						<td>{$obj->order_details[i].size} </td>
						<td>{$obj->order_details[i].tshirt_type} </td>
						<td>{$obj->order_details[i].gender} </td>
						<td>{$obj->order_details[i].hostel} </td>
						<td>{$obj->order_details[i].contact} </td>
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
		
		<h6 style="font-size: 13px; color: black; margin-left: 25px;"> Tshirt Type : </h6>
		<select class="span1" name="tshirt_type" style="margin-left: 25px; margin-top: 10px; width:100px;">
			<option value="a">A (Aparoksha)</option>
			<option value="b">B (Geekhaven )</option>
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
		<input name="contact" type="text" maxlength="11" placeholder="enter your number" />
		
		<h6 style="font-size: 13px; color: black; margin-left: 25px;"> Gender : </h6>
		<select class="span2" name="gender" style="margin-left: 25px; margin-top: 10px;">
			<option value="m"> Male </option>
			<option value="f"> Female </option>
		</select>
		<button type="submit" class="btn btn-primary" name="saveorder" value="saveorder" style="margin-top: 10px;">Save Order</button>
	</form>
	
	
</div>

{/if}
