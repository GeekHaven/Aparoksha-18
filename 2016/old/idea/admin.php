<?php session_start(); ?>

<!DOCTYPE html>
<html>
<?php include ('header.php');
?>
<head>
<!-- Site Properities -->
  <title>Ideaboard </title>
  <style>#home{
	background: url('images/img1.gif') repeat;
	}
	</style>
	<link href="css/jquery.cssemoticons.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="js/jquery.cssemoticons.min.js" type="text/javascript"></script>
	
		<script type="text/javascript">
		$(document).ready(function(){
			$('.text').emoticonize({
			});
			$('#toggle-headline').toggle(
				function(){
					$('#large').unemoticonize({
					})
				}, 
				function(){
					$('#large').emoticonize({
					})
				}
			);
		})
	</script>
	
</head>
<body id="home">
<?php 
if(!isset($_SESSION['name']) || empty($_SESSION['name']))
	echo 'you are not logged in!!!! You cannot access this page!!!';
elseif($_SESSION['admin_name'] != 1)
	echo 'You cannot access this page!!!';
else {
	
?>

  
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
	<a href = "about.php" class="item">
    
     <font color="#FFF"> About </font>
    </a>
  </div>

  <div class="ui inverted page grid stackable ">
    <div class="row">

    </div>
	  <?php
include("db.php");
$msql=mysql_query("SELECT * FROM posts WHERE isactive=0 OR isdelete=0 ORDER BY post_id DESC");
while($post_count=mysql_fetch_array($msql))
{
$id=$post_count['post_id'];
$isactive = $post_count['isactive'];
$isdelete = $post_count['isdelete'];
$idea=$post_count['post'];
$title=$post_count['title'];
$like = $post_count['likes'];
$user = $post_count['username'];
$fname1=substr($user, 0, strrpos($user, "-"));
$fname=str_replace("-", " ", $fname1);?>

<?php if(1) { ?>

<div class="row">
      <div class="ten wide column">
      <div class="ui segment">
      <div class="circular huge ui icon button">
		<i class="large user icon"></i>
	  </div><font size="6">     <?php echo $fname; ?></font>


<?php
echo '	 <h2>'.$title.'</h2>';?>
	  
	  
	   
	  <div class="ui segment text">
	  <div class="ui corner label">
        <i class="icon asterisk"></i>
      </div>
	   <?php echo $idea; ?>
	   
	   </div>
	   <form action="active.php" method="POST">
	   <?php if($isactive == 0) {?>
	   <input type="hidden" name="id" value="<?php echo $id; ?>"/>
	   <input class="ui green submit button" name="active" type="submit" value="Make Post Active"/>
	   <?php }?>
	   <?php if($isdelete == 0) {?>
	   <input class="ui red submit button" name="delete" type="submit" value="Delete Post"/>
	   <?php }?>
	   </form>
	   </div></div></div>
	  <div class="row"></div></div>
  
  <?php
}}
?>
  <?php
  } 
   include('footer.php');
   ?>
</body>

</html>