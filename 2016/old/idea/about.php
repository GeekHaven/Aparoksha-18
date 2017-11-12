<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php include ('header.php');
?>
<head>
<!-- Site Properities -->
  <title>Ideaboard </title>
</head>
<body id="home">


  
  <div class="ui large vertical labeled inverted sidebar menu">
	<a href = "index.php" class="item">
    
     <font color="#FFF"> Home </font>
    </a>
	<?php if(isset($_SESSION['name'])&&!empty($_SESSION['name']))echo '<a href = "index.php?action=post" class="item">
    
     <font color="#FFF"> Post Idea </font>
    </a>';
							else echo '<a class="item">
    
     <font color="#FFF"> Post Idea </font>
	 <div class="ui page dimmer">
					<div class="content">
						<div class="center">
							<h1 class="ui inverted header">Hey, you need to login first</h1>
							<br>
							<a class="ui black button" href="login.php">LOGIN</a>
						</div>
					</div>
				</div>
	 
    </a>
	<script>
				$(".ui.page.dimmer") 
					.dimmer({
						on:"click"
					})
					;
				</script>
	';?>
	
	<?php if(isset($_SESSION['name'])&&!empty($_SESSION['name']))echo '<a href = "index.php?action=view" class="item">
    
     <font color="#FFF"> View Idea </font>
    </a>';
							else echo '<a class="item">
    
     <font color="#FFF"> View Idea </font>
	 <div class="ui page dimmer">
					<div class="content">
						<div class="center">
							<h1 class="ui inverted header">Hey, you need to login first</h1>
							<br>
							<a class="ui black button" href="login.php">LOGIN</a>
						</div>
					</div>
				</div>
	 
    </a>
	<script>
				$(".ui.page.dimmer") 
					.dimmer({
						on:"click"
					})
					;
				</script>
	';?>
    
    
		<!--div class="ui basic accordion">
		<div class="title"><a class="item">
		<i class="dropdown icon" color="white"></i>
		<font color="white">View Ideas</font></a>
		</div>
		<!--div class="content">
		<ul>
		<li><a href="view_idea.php">Web Designing</a></li>
		<li><a href="view_idea.php">Robotics</a></li>
		<li><a href="view_idea.php">Network Security</a></li>
		</ul>
		</div></div-->
	<script>
	$('.ui.accordion').accordion();
    </script>
    

    
    <!--a class="item">
      <i class="bookmark icon"></i> Favorites
    </a>
    <a class="item">
    	History
    </a-->
	<a href = "#" class="item">
    
     <font color="#FFF"> About </font>
    </a>
  </div>

  <div class="ui inverted purple grid segment">
  
  <div class="row">
  <div class="three wide column"></div>
  <div class="ten wide column">
  <h1 class="center aligned ui header"> SO WHAT IS THIS WEBSITE ALL ABOUT??? </h1>
	<div class="ui teal segment">
  <div class="ui header"> <b><p>Ideaboard can help take your idea and turn it into reality. 
  If you have any idea for which you require some help you can pin it up in our ideaboard. 
  If you are expert at something then you can even help others to convert their idea into reality. 
  One can also comment on an idea to suggest any kind of improvisations.</p>
  <p>This is quite a common thing abroad. Many institutes such as Harvard University had such a website for posting ideas and creating them to reality.
  By this, it not only helps the one who posts the idea but also others who could further utilise this ideas and create them into reality.</p>
  </b>
  </div></div></div> </div>
  </div>
   <div class="ui inverted purple grid segment">
  <div class="three wide column"></div>
  <div class="ten wide column">
  <h1 class="center aligned ui header" style="padding:20px;"> WEB DEVELOPEMENT TEAM </h1>
  <div class="ui grid">
  <div class ="row">
  <h2 class="center aligned ui header"> Developed and Created By: </h2>
  <div class="three wide column"></div>
  <div class="seven wide column">
  

 <div class="ui circular rotate reveal image">
  <img class="visible content" src="images/saptak.jpg" style="width:150px;height:150px;max-width:250px">
  <a href="https://www.facebook.com/s4p74k.s3ngup74" target="blank">
  <img class="hidden content" src="images/shp.png" style="width:150px;height:150px;max-width:250px">
   </a></div></div>
   <div class="six wide column">
   
   <div class="ui circular rotate reveal image">
  <img class="visible content" src="images/mund.jpg" style="width:150px;height:150px;max-width:250px">
  <a href="https://www.facebook.com/ankitmund007" target="blank">
  <img class="hidden content" src="images/mnd.png" style="width:150px;height:150px;max-width:250px"></a>
   </div>
   </div></div>
   <div class="row">
   <h2 class="center aligned ui header"> Designed By: </h2>
   <div class="three wide column"></div>
   <div class="four wide column">
   <div class="ui circular rotate reveal image">
  <img class="visible content" src="images/bhindi.jpg" style="width:100px;height:100px;max-width:250px">
  <a href="https://www.facebook.com/shubham.bhendarkar" target="blank">
  <img class="hidden content" src="images/bhind.png" style="width:100px;height:100px;max-width:250px">
  </a>
   </div></div>
   <div class="four wide column">
   <div class="ui circular rotate reveal image">
  <img class="visible content" src="images/sanj.jpg" style="width:100px;height:100px;max-width:250px">
  <a href="http://www.facebook.com/killzinator2" target="blank">
  <img class="hidden content" src="images/snj.png" style="width:100px;height:100px;max-width:250px">
  </a>
   </div></div>
   <div class="four wide column">
   <div class="ui circular rotate reveal image">
  <img class="visible content" src="images/abhi.jpg" style="width:100px;height:100px;max-width:250px">
  <a href="https://www.facebook.com/abhishek.menon.3958" target="blank">
  <img class="hidden content" src="images/abb.png" style="width:100px;height:100px;max-width:250px"></a>
</div></div></div></div></div>


  <div class="row">
  <div class="three wide column"></div>
  <div class="ten wide column">
  <h3 class="center aligned ui header"> SPECIAL THANKS TO : </h3>
  <div class="ui grid">
  <div class="three wide column"></div>
   <div class="five wide column">
  <div class="ui teal segment">
  
  
  <a href="https://www.facebook.com/zeek102" target="blank"><h3 align="center"> Aditya Chaturvedi</h3></a></div></div>
    
   <div class="five wide column">
  <div class="ui teal segment">
  
  
  <a href="https://www.facebook.com/j.mehtaaa" target="blank"><h3 align="center"> Jatin Mehta</h3></a></div></div>
	
  </div>
  
  </div><br><br></div></div> </div>
  

</div>
  <?php include('footer.php'); ?>
  
</body>

</html>
