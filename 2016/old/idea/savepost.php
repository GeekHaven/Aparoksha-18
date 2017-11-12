<?php
//include("db.php");

session_start();

include('header.php');
$postcon=$_POST['rteditor'];
$post_title=$_POST['title'];
$user=$_POST['username'];

$count1 = substr_count($postcon , "'");
	
	if($count1 % 2 != 0){
	$postcon=str_replace("'", "`", $postcon);
	}
	
	$count2 = substr_count($post_title , "'");
	
	if($count2 % 2 != 0){
	$post_title=str_replace("'", "`", $post_title);
	}
		
	function html2txt($document){
		$search = array('@<script[^>]*?>.*?</script>@si',  
               '@<[\/\!]*?[^<>]*?>@si',            
               '@<style[^>]*?>.*?</style>@siU',  
               '@<![\s\S]*?--[ \t\n\r]*>@'        
		);
		$text = preg_replace($search, '', $document);
		return $text;
	} 
	
	$postcon=html2txt($postcon);	
	$post_title=html2txt($post_title);
	
	
if(isset($_SESSION['name'])&&!empty($_SESSION['name'])){
if(!empty($postcon)) {
mysql_query("INSERT INTO posts(title, post, username) VALUES ('$post_title', '$postcon', '$user')");

echo '<head>
  
  <!-- Site Properities -->
  <title>Ideaboard - Post Idea</title>

  

</head>
<body id="home">


  
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
  </div>
  <!--div class="content">
  <ul>
  <li><a href="index.html">Web Designing</a></li>
  <li><a href="index.html">Robotics</a></li>
  <li><a href="index.html">Network Security</a></li>
  </ul>
  </div></div-->
  <script> $(".ui.accordion").accordion();
    </script>
    
    <!--a class="item">
      <i class="bookmark icon"></i> Favorites
    </a>
    <a class="item">
    	History
    </a-->
  </div>

  

  <div class="ui inverted page grid stackable ">
    <div class="row"></div>
    <div class="row">
		<div class="two wide column"></div>
      <div class="twelve wide column">
      
      
	  <div class="ui segment"><center>
	  <h2>Your Idea has been successfully posted. Wait for it to be verified.</h2>
	  
	  
	  <a class="ui purple submit button" href="index.php?action=post">Post Another Idea</a>
	  <a class="ui green submit button" href="index.php?action=view">View Idea</a></center>
	  
  
	   
	   
		
		</div>

      </div></div></div>
	  <div class="row"></div><br><br>
	  
	  
        
   
</body>
';
 include('footer.php');
}
else {

header('Location: post_idea.php');
}
}
else {
	echo "You are not logged in!!!";
	}

?>