
<body style='background-image:url('images/')'>

<!-- Header -->
<div id="header">
  <div class="shell">
    <!-- Logo + Top Nav -->
    <div id="top">
      <a href="http://aparoksha.iiita.ac.in/"><h1 style="margin-left: 2em;margin-top: 0.17em;font-family: merkur;font-size: 4em;">APAROKSHA</h1></a>
	  <div id="top-navigation">
		<a onmouseover="rules();" onmouseout="ruleOut();" href="#">Registration Details</a>
		<a onclick="return createTimedLink(this, myFunction, 500);" href="?page=login">login</a>
		<a onclick="return createTimedLink(this, myFunction, 500);" href="?page=register">Register</a>
	  </div>
      
	
    <?php 
	if(isLogin()) {
		require_once('includes/nav.php');
	}
    ?>
	
    <!-- End Logo + Top Nav -->
  </div>
  
  </div>
  <div class="head">
	<h1> Registration Portal</h1>
</div>
  
</div>

