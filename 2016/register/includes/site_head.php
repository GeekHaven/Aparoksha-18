<body style="background: url(images/bg.png) fixed center center no-repeat !important;">
<style>
	
  .error_box {
	display: none;
}
  
</style>
<div class="row">
  <div class="col s3" style="margin-top:30px;">
  	<p> <a href="http://aparoksha.iiita.ac.in"><img src="images/logo/f2_shadw.png" style="width:200px;height:200px;" alt="Logo"></a></p>
  </div>
 
  <ul id="dropdown1" class="dropdown-content">
  <li><a href="index.html#contact">Email</a></li>
  <li><a href="https://www.facebook.com/aparoksha/">Facebook</a></li>
  <li class="divider"></li>
</ul>
<nav style="position:fixed; background: #005857;">
  <div class="nav-wrapper" style="font-color:blue; a:hover{color:black}" >
     <ul class="right hide-on-med-and-down">
      <li><a href="../index.html" >Home</a></li>
	<?php 
	if(isLogin()) {
		echo '<li>Hello, '.$_SESSION['user'].'</li>
			<li><a onclick="return createTimedLink(this, myFunction, 500);" href="models/logout.php">Logout</a></li>';
	} else {
	?>
        <li><a onclick="return createTimedLink(this, myFunction, 500);" href="?page=register">Register</a></li>
	<li><a onclick="return createTimedLink(this, myFunction, 500);" href="?page=login">Login</a></li>
	<?php } ?>
      <!-- Dropdown Trigger -->
      <li><a href="../index.html#contact">Contact</a></li>
    </ul>
  </div>
</nav>
	
	
	
	<!-- End Logo + Top Nav -->
  
<script>
if($('#navigation ul').html() != undefined){
	$('.head').css('display','none');
	}


</script>   


