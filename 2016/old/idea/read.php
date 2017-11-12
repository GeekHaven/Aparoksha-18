<?php //session_start(); ?>

<!DOCTYPE html>
<html>

<head>
<!-- Site Properities -->
  <title>Ideaboard </title>
  
  <link type="text/css" rel="stylesheet" href="css/like.css">
  <link type="text/css" rel="stylesheet" href="css/comment_style.css">
  	
</head>
<body id="home">
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
  <li><a href="index.html">Web Designing</a></li>
  <li><a href="index.html">Robotics</a></li>
  <li><a href="index.html">Network Security</a></li>
  </ul>
  </div></div-->
  <script> $('.ui.accordion').accordion();
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
    <div class="row"></div>
  <?php
	$pdo = new PDO('mysql:host=localhost;dbname=tech','tech','tech@123');
  
  $id=$_GET['id'];
$msql=" SELECT * FROM posts WHERE post_id= :post_id";
$stmt = $pdo->prepare($msql);

$stmt ->bindParam(":post_id", $id);

$stmt ->execute();

if($result=$stmt->fetch(PDO::FETCH_OBJ)) {

$idea=$result->post;
$title=$result->title;
$like = $result->likes;
$user = $result->username;
$fname1=substr($user, 0, strrpos($user, "-"));
$fname=str_replace("-", " ", $fname1);
echo $idea;
}?>

 <?php if($idea != ""){ ?>

<div class="row">
      <div class="ten wide column">
      <div class="ui segment">
      <div class="circular huge ui icon button">
		<i class="large user icon"></i>
	  </div><font size="6">     <?php echo $fname; ?></font>


<?php
echo '	 <h2>'.$title.'</h2>';?>
	  
	  
	   
	  <div class="ui segment text"><div class="ui corner label">
        <i class="icon asterisk"></i>
      </div>
	   <?php echo $idea; ?>
	   
	   </div>
	   
	   
	   <?php
    include 'includes/config.php';
    $postID = $id;

	$username = $_SESSION['name'];
	$fname1=substr($user, 0, strrpos($user, "-"));
	$fname=str_replace("-", " ", $fname1);
	
    function percent($num_amount, $num_total) {
    	if($num_total>0){
        $count1 = $num_amount / $num_total;
        $count2 = $count1 * 100;
        $count = number_format($count2, 0);
        return $count;
   	 }
    }

        $dislike_sql = mysql_query('SELECT COUNT(*) FROM  likes WHERE username = "'.$username.'" and post_id = "'.$postID.'" and rate = 2 ');
        $dislike_count = mysql_result($dislike_sql, 0); 

        $like_sql = mysql_query('SELECT COUNT(*) FROM  likes WHERE username = "'.$username.'" and post_id = "'.$postID.'" and rate = 1 ');
        $like_count = mysql_result($like_sql, 0);  

        $rate_all_count = mysql_query('SELECT COUNT(*) FROM  likes WHERE post_id = "'.$postID.'"');
        $rate_all_count = mysql_result($rate_all_count, 0);  

        $rate_like_count = mysql_query('SELECT COUNT(*) FROM  likes WHERE post_id = "'.$postID.'" and rate = 1');
        $rate_like_count = mysql_result($rate_like_count, 0);  
        $rate_like_percent = percent($rate_like_count, $rate_all_count);

        $rate_dislike_count = mysql_query('SELECT COUNT(*) FROM  likes WHERE post_id = "'.$postID.'" and rate = 2');
        $rate_dislike_count = mysql_result($rate_dislike_count, 0);  
        $rate_dislike_percent = percent($rate_dislike_count, $rate_all_count);
?>





    <div class="tab-cnt">
        
       
        <div class="like-btn <?php if($like_count == 1){ echo 'like-h';} ?>"><?php if($like_count == 1){ echo 'Unlike';}else{echo'Like';} ?></div>
       
       
        <div class="tab-tr" id="t1">
           

            <div class="stat-cnt">
                <div class="like-count" style="margin-top: 22px;"><?php echo $rate_like_count; ?> <?php if($rate_like_count>1){echo "Likes";}else{echo "Like";}?></div>
            </div><!-- /stat-cnt -->
        </div><!-- /tab-tr -->
    
    
<!-- Comment Box -->
     <div class="ui one column grid">
  <div class="column">
    <div class="ui piled blue segment">
      <h2 class="ui header">
        <i class="icon inverted circular blue comment"></i> Comments
      </h2>
	  <div class="ui comments">
	  
	  
	  <?php 

	date_default_timezone_set('Asia/Kolkata');
	
	
// Connect to the database
include('includes/config.php'); 
$post_id = $id; //the post or the page id
?>
<div class="cmt-container" >
    <?php 
    $sql = mysql_query("SELECT * FROM comments WHERE post_id = '$post_id'") or die(mysql_error());;
    while($affcom = mysql_fetch_assoc($sql)){ 
        $username = $affcom['username'];
        $comment = $affcom['comment'];
        $date = $affcom['dt'];
        
        $date = strtotime($date);

		$fname1=substr($username, 0, strrpos($username, "-"));
		$fname=str_replace("-", " ", $fname1);

    ?>
    
    <div class="comment">
          <a class="avatar">
            <i class="large user icon"></i>
          </a>
          <div class="content">
              <?php echo $fname; ?>
            
           <div class="text"><?php echo $comment; ?></div> 
              
            <?php //echo '<div class="date" title="Added at '.date('H:i \o\n d M Y',$date).'">'.date('d M Y',$date).'</div>' ?>
            
          </div>
        </div>
    
    <?php } ?>

<div class="com-box" style="padding-top: 20px;">
    <div class="new-com-bt">
        <span>Write a comment ...</span>
    </div>
    <div class="new-com-cnt">
    	<input id="cmnt-user" type="hidden" value="<?php echo $_SESSION['name']; ?>" />
        <textarea id="cmnt-com" class="the-new-com"></textarea>
        <div class="bt-add-com">Post comment</div>
        <div class="bt-cancel-com">Cancel</div>
    </div>
    <div class="clear"></div>
</div>

</div><!-- end of comments container "cmt-container" -->


</div>
    </div>
  </div>
</div> <!-- /Comment Box -->


    </div><!-- /tuto-cnt -->
	   		
		

      </div></div></div> <?php } else{  header('Location:index.php'); } ?>
      
	  <div class="row"></div></div>
  
  
	  
        
   
  <?php }
include('footer.php');  ?>


<script type="text/javascript">
   $(function(){ 
        //alert(event.timeStamp);
        $('.new-com-bt').click(function(event){    
            $(this).hide();
            $('.new-com-cnt').show();
            $('#cmnt-com').focus();
        });

        /* when start writing the comment activate the "add" button */
        $('.the-new-com').bind('input propertychange', function() {
           $(".bt-add-com").css({opacity:0.6});
           var checklength = $(this).val().length;
           if(checklength){ $(".bt-add-com").css({opacity:1}); }
        });

        /* on clic  on the cancel button */
        $('.bt-cancel-com').click(function(){
            $('.the-new-com').val('');
            $('.new-com-cnt').fadeOut('fast', function(){
                $('.new-com-bt').fadeIn('fast');
            });
        });

        // on post comment click 
        $('.bt-add-com').click(function(){
            var theCom = $('.the-new-com');
            var theusername = $('#cmnt-user');
            var theMail = $('#mail-com');

            if( !theCom.val()){ 
                alert('You need to write a comment!'); 
            }else{ 
                $.ajax({
                    type: "POST",
                    url: "ajax/add-comment.php",
                    data: 'act=add-com&post_id='+<?php echo $post_id; ?>+'&username='+theusername.val()+'&comment='+theCom.val(),
                    success: function(html){
                        theCom.val('');
                        theMail.val('');
                        theusername.val('');
                        $('.new-com-cnt').hide('fast', function(){
                            $('.new-com-bt').show('fast');
                            $('.new-com-bt').before(html);  
                        })
                    }  
                });
            }
        });

    });
</script>
   
<script>
    $(function(){ 
        var postID = <?php echo $postID;  ?>; 

        $('.like-btn').click(function(){
            //$('.dislike-btn').removeClass('dislike-h');    
           
           if ( $( this ).hasClass( "like-h" ) ) {
            $(this).removeClass('like-h');
            $(this).text('Like'); 
            
           $.ajax({
                type:"POST",
                url:"add-like.php",
                data:'act=dislike&postID='+postID,
                success: function(html){
                $(".like-count").html(html);
                },
				beforeSend:function(){
					$(".like-count").html("<img src='images/loading-min.gif' style='height:18px'>")
				}
            });
            
           }
           
           else {
            $(this).addClass('like-h');
             $(this).text('Unlike');
             
             $.ajax({
                type:"POST",
                url:"add-like.php",
                data:'act=like&postID='+postID,
               success: function(html){
                $(".like-count").html(html);
                },
				beforeSend:function(){
					$(".like-count").html("<img src='images/loading-min.gif' style='height:18px'>")
				}
            });
            }
            
            
           
        });
        
       
    });
</script>


</body>

</html>
