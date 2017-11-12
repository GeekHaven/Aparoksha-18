

<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/sticky.css">
  <link rel="stylesheet" type="text/css" href="../packaged/css/semantic.css">
  <link rel="stylesheet" type="text/css" class="ui" href="../packaged/css/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="css/homepage.css">
  <link rel="stylesheet" type="text/css" href="css/feed.css">
  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.address/1.6/jquery.address.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
  <script src="../packaged/javascript/semantic.js"></script>
  <script src="js/homepage.js"></script>
  <script src="js/feed.js"></script>

</head>
<body id="home">
<?php include('db.php');?>
<div class="ui fixed green inverted main menu">

    <div class="container"> 
	       <div class="ui green massive launch right attached button" style="display:absolute;right:0px;left:0px;width:70px;">
            <i class="icon list layout"></i>
			<span class="text" style="display:none;">menu</span>
                   
	 <script> 
		$(".launch.button").mouseenter(function(){
			$(this).stop().animate({width: '170'}, 500, 
				function(){$(this).find('.text').show();});
				}).mouseleave(function (event){
			$(this).find('.text').hide();
			$(this).stop().animate({width: '30px'}, 300);
		});
		$(".ui.overlay.sidebar").sidebar({overlay: true})
		.sidebar('attach events','.ui.launch.button');
	</script>
	</div>  
      
      
      <div class="right menu">
        <div class="vertically fitted borderless item"> 
        	
					
                    <i class="huge user icon"></i>
                    <div class="ui teal buttons">
  						<div class="ui button"><?php 
							//require("logincheck.php");  
							if(isset($_SESSION['name'])&&!empty($_SESSION['name'])){
								$name1=substr($_SESSION['name'], 0, strpos($_SESSION['name'],"-"));
								echo "Hello ".$name1;}
							
							else echo "<a href='login.php'><font color='#FFF'>Login</font></a>";?></div>
  						<?php if(isset($_SESSION['name'])&&!empty($_SESSION['name'])) {
						
						if ($_SESSION['admin_name'] == 1) {
							echo '<div class="ui teal floating dropdown icon button">
    							<i class="dropdown icon"></i>
    							<div class="menu">
     								 <a class="item" href="admin.php">Admin block</a>
     								 <a class="item" href="logout.php">Log Out</a>
     								 
    							</div>
								
  						</div>';}
						else{
						echo '<div class="ui teal floating dropdown icon button">
    							<i class="dropdown icon"></i>
    							<div class="menu">
     								 <!--div class="item">View Profile</div-->
     								 <a class="item" href="logout.php">Log Out</a>
     								 
    							</div>
								
  						</div>';}}
						
						?>
					</div>
                    
                    
        	
     
          
        </div>
        
        
      </div>
    </div>
  </div>
  <br><br>
  <div class="ui inverted page grid masthead segment">
	
  <div class="column">
  
      <div class="inverted secondary pointing ui menu">
        
        <!--div class="right menu">
          <div class="ui top right pointing mobile dropdown link item">
            Menu
            <i class="dropdown icon"></i>
            <div class="menu">
              <a class="item">Classes</a>
              <a class="item">Cocktail Hours</a>
              <a class="item">Community</a>
            </div>
          </div>
         </div-->
      </div>
      
    
      <img src="images/idea.png" class="ui medium image">
      <div class="ui hidden transition information">
        <h1 class="ui inverted header">
         IDEABOARD
        </h1>
        <p></p>
      </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!--div class="large basic inverted animated fade ui button">
          <div class="visible content">Not A Member?</div>
          <a href="register.html"><div class="hidden content"><font color="#FFFFFF">Register Now</font></div></a>
        </div-->
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php
          if(!isset($_SESSION['name'])|| empty($_SESSION['name'])) echo '<div class="large basic inverted animated fade ui button">
		  <div class="visible content">Member Area</div>
         <a href="login.php"> <div class="hidden content"><font color="#FFFFFF">login</font></div></a>
        </div>';?>

    </div>
  </div>
  </body>