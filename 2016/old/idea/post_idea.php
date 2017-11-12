<?php //session_start(); ?>

<!DOCTYPE html>
<html>
<?php// include ('header.php');
	
?>
<head>
<!-- Site Properities -->
  <title>Ideaboard </title>
</head>
<body id="home" onLoad=iFrameOn();>
<?php

if(!isset($_SESSION['name']) || empty($_SESSION['name']))
 echo 'you are not logged in!!!! You cannot access this page!!!';
else {
?>

    <div class="ui large vertical labeled inverted sidebar menu">
	<a href = "index.php" class="item">
    
     <font color="#FFF"> Home </font>
    </a>
    <a href = "index.php?action=post" class="item">
    
     <font color="#FFF"> Post Idea </font>
    </a>
    
      <!--div class="ui basic accordion">
  <div class="title"--><a class="item" href="index.php?action=view">
    <i class="dropdown icon" color="white"></i>
    <font color="white">View Ideas</font></a>
  <!--/div>
  <div class="content">
  <ul>
  <li><a href="view_idea/index.html">Web Designing</a></li>
  <li><a href="view_idea/index.html">Robotics</a></li>
  <li><a href="view_idea/index.html">Network Security</a></li>
  </ul>
  </div></div-->
    

   <!-- 
    <a class="item">
      <i class="bookmark icon"></i> Favorites
    </a>
    <a class="item">
    	History
    </a>-->
	<a href = "about.php" class="item">
    
     <font color="#FFF"> About </font>
    </a>
  </div>
  
  <div class="ui inverted page grid">
  <div class = "one wide column"></div>
  <div class="ten wide column">
  <div class="container "> 
  <h1>Post idea</h1>
  <form name="form1" class="ui fluid form segment" action="savepost.php" method="POST">
      
      <div class="field">
        
		<h3><label>Title</label></h3>
		<input placeholder="Title" type="text" name="title">
      </div>
	  <!--border:#000000 1px solid; width:700px; height:300px;-->
	  
	<!--div class="ui icon buttons">
		<!--div class = "ui button" onClick="attach()"><i class="attachment icon"></i></div>
		<div class = "ui button" onClick="iPhoto()"><i class="photo icon"></i></div>
		<div class = "ui button" onClick="iUrl()"><i class="url icon"></i></div>
		<div class = "ui button" onClick="iUl()"><i class="unordered list icon"></i></div>
		<div class = "ui button" onClick="iOl()"><i class="ordered list icon"></i></div>
		<div class="ui button" onClick="iLeft()"><i class="align left icon"></i></div>
		<div class="ui button" onClick="iCenter()"><i class="align center icon"></i></div>
		<div class="ui button" onClick="iRight()"><i class="align right icon"></i></div>
		<div class="ui button" onClick="iJust()"><i class="align justify icon"></i></div>
		<div class="ui button" onClick="iBold()"><i class="bold icon"></i></div>
		<div class="ui button"onClick="iUnder()"><i class="underline icon"></i></div>
		<div class="ui button" onClick="iItalic()"><i class="italic icon"></i></div>
	</div--><br><br>
    <div class="field">
        <h3><label>Description</label></h3>
        
		<!--iframe name="rte" id="rte" style="border:rgba(0,0,0,.15) 1px solid; width:640px; height:300px;line-height:1.33;min-height:8em;height:12em;max-height:24em;resize:vertical;" ></iframe-->
		<textarea name="rteditor"></textarea>
		
    </div>
	
		
		<input name="username" type="hidden" value="<?php echo $_SESSION['name']; ?>" />
	
      <input class="ui purple submit button" type="submit" value="pin on ideaboard"/>
	  <!--div class="ui purple submit button">save draft</div>
	  <div class="ui green submit button">preview</div-->
    </form>   
</div></div>
	
	<!--div class = "five wide column">
	  <div class = "container">
		<div class = "fluid form segment">
		<br><br><br>
			<!--div class = "ui vertical menu">
			<h4 class = "ui red inverted block header">get public</h4>
			<center><a class = "item"><b>Publicize</b></a>
			<a class = "item"><font align = "left"><i class="large facebook sign icon"></i> 
			<i class="large google plus sign icon"></i> 
			<i class="large twitter sign icon"></i></font></a></center> 
			</div>

			<!--div class = "ui vertical menu">
			<h4 class = "ui red inverted block header">tags</h4>
			<a class = "item">
			<div class = "ui icon buttons">
				<div class="ui icon input"><input type="text" placeholder="Add">
					<i class="inverted add icon"></i></div>
			</div><br>
			</a>
		</div>
		<div class = "ui vertical menu">
		<h4 class = "ui red inverted block header">categories</h4>
		<a class="item">
		<div class="ui accordion">
			<div class="title">
			<i class="dropdown icon"></i>Most Used</div>
			<div class="content">
			  <div class="ui checkbox"><input type="checkbox" name="I.T."><label>I.T.</label></div>
			</div></a>
			<a class="item">
			<div class="title"><i class="dropdown icon"></i>All Categories</div>
			<div class="content"><div class="ui checkbox">
			<input type="checkbox" name="I.T."><label>I.T.</label></div>
			<div class="ui checkbox">
			<input type="checkbox" name="Web Designing"><label>Web Designing</label></div>
			<div class="ui checkbox"><input type="checkbox" name="Robotics"><label>Robotics</label></div></div>
			</div>
			
			<script> $('.ui.accordion').accordion();$('.ui.checkbox')
  .checkbox()
;
    </script>
		</a>
	  </div>
	</div>
</div>
</div-->
</div>


   
  <?php }
 include('footer.php');  ?>
</body>

</html>
