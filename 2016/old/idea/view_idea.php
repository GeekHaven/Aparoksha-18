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
    <div class="row">
      <!--div class="column">
        <h1 class="ui header">
        <div class="ui menu">
  		<a class="item" href="index.html">
    		 New Ideas
  		</a>
  		<a class="active item">
    		 Recently Viewed
  		</a>
  	<div class="right menu">
    <div class="item">
      <div class="ui icon input">
        <input type="text" placeholder="Search...">
        <i class="search link icon"></i>
      </div>
    </div>
  </div>
</div>
          
        </h1>
      </div-->
    </div>
    
	  <?php
include("db.php");
$msql=mysql_query("SELECT * FROM posts WHERE isactive=1 AND isdelete=0 ORDER BY post_id DESC ");
while($post_count=mysql_fetch_array($msql))
{



$id=$post_count['post_id'];
$idea=$post_count['post'];
$title=$post_count['title'];
$like = $post_count['likes'];
$user = $post_count['username'];
$fname1=substr($user, 0, strrpos($user, "-"));
$fname=str_replace("-", " ", $fname1);?>


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
	   
	   
	   
	   
	   <?php
   
    $postID = $id;

	$username = $_SESSION['name'];
	$fname1=substr($username, 0, strrpos($username, "-"));
	$fname=str_replace("-", " ", $fname1);
	

        $dislike_sql = mysql_query('SELECT COUNT(*) FROM  likes WHERE username = "'.$username.'" and post_id = "'.$postID.'" and rate = 2 ');
        $dislike_count = mysql_result($dislike_sql, 0); 

        $like_sql = mysql_query('SELECT COUNT(*) FROM  likes WHERE username = "'.$username.'" and post_id = "'.$postID.'" and rate = 1 ');
        $like_count = mysql_result($like_sql, 0);  

        $rate_all_count = mysql_query('SELECT COUNT(*) FROM  likes WHERE post_id = "'.$postID.'"');
        $rate_all_count = mysql_result($rate_all_count, 0);  

        $rate_like_count = mysql_query('SELECT COUNT(*) FROM  likes WHERE post_id = "'.$postID.'" and rate = 1');
        $rate_like_count = mysql_result($rate_like_count, 0);  

        $rate_dislike_count = mysql_query('SELECT COUNT(*) FROM  likes WHERE post_id = "'.$postID.'" and rate = 2');
        $rate_dislike_count = mysql_result($rate_dislike_count, 0);  
?>





    <div class="tab-cnt">
        
       
        <div id=lyk<?php echo $postID;?>  onclick="like(this.id)"; class="like-btn <?php if($like_count == 1){ echo 'like-h';} ?>" ><?php if($like_count == 1){ echo 'Unlike';}else{echo'Like';} ?></div>
       
       
        <div class="tab-tr" id="t1">
           

            <div class="stat-cnt">
                <div class="like-count like-countlyk<?php echo $postID;?>" style="margin-top: 22px;"><?php echo $rate_like_count; ?> <?php if($rate_like_count>1){echo "Likes";}else{echo "Like";}?></div>
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

<div  class="com-box" style="padding-top: 20px;">
    <div id=cmnt<?php echo $postID;?> onclick="comment(this.id)"; class="new-com-bt new-com-btcmnt<?php echo $postID;?>">
        <span>Write a comment ...</span>
    </div>
    <div class="new-com-cnt new-com-cntcmnt<?php echo $postID;?>">
    
    	<input id="cmnt-user" type="hidden" value="<?php echo $_SESSION['name']; ?>" />
        <textarea id="cmnt-com" class="the-new-com the-new-comcmnt<?php echo $postID;?> cmnt-comcmnt<?php echo $postID;?>"></textarea>
        
        <div class="bt-add-com bt-add-comcmnt<?php echo $postID;?>">Post comment</div>
        <div class="bt-cancel-com bt-cancel-comcmnt<?php echo $postID;?>">Cancel</div>
    </div>
    <div class="clear"></div>
</div>

</div><!-- end of comments container "cmt-container" -->


</div>
    </div>
  </div>
</div> <!-- /Comment Box -->




    </div><!-- /tuto-cnt -->
	   
	   
	   
	   
	   
	   
	   
	   
	 
	   
	   
		
		

      </div></div></div><?php } ?>
      
      
      
      
      
      
      </div>
	  <div class="row"></div>
	  
        
   
  <?php }
  include('footer.php');
   ?>
   
   
<script type="text/javascript">


   function comment(pid){ 

   
    	var postID = pid;
    	postID = postID.substr(4);
        
            $("#"+pid).hide();
            $('.new-com-cnt'+pid).show();
            $('.cmnt-com'+pid).focus();
       

        /* when start writing the comment activate the "add" button */
        $('.the-new-com'+pid).bind('input propertychange', function() {
           $(".bt-add-com"+pid).css({opacity:0.6});
           var checklength = $(".the-new-com"+pid).val().length;
           if(checklength){ $(".bt-add-com"+pid).css({opacity:1}); }
        });

      
      
        /* on clic  on the cancel button */
        $('.bt-cancel-com'+pid).click(function(){
            $('.the-new-com'+pid).val('');
            $('.new-com-cnt'+pid).fadeOut('fast', function(){
                $('.new-com-bt'+pid).fadeIn('fast');
            });
        });




        // on post comment click 
        $('.bt-add-com'+pid).click(function(){
        
            var theCom = $('.the-new-com'+pid);
            var theusername = $('#cmnt-user'+pid);
            var theMail = $('#mail-com'+pid);
			
            if( !theCom.val()){ 
                alert('You need to write a comment!'); 
            }else{ 
                $.ajax({
                    type: "POST",
                    url: "ajax/add-comment.php",
                    data: 'act=add-com&post_id='+postID+'&username='+theusername.val()+'&comment='+theCom.val(),
                    success: function(html){
                        theCom.val('');
                        theMail.val('');
                        theusername.val('');
                        $('.new-com-cnt'+pid).hide('fast', function(){
                            $('.new-com-bt'+pid).show('fast');
                            $('.new-com-bt'+pid).before(html);  
                        })
                    }  
                });
            }
        a
        });

    }
    
</script>
   
<script>

var user="<?php echo $username ?>";

function like(pid){
 
        var postID = pid;
             
           if ( $("#"+pid).hasClass( "like-h" ) ) {
            $("#"+pid).removeClass('like-h');
            $("#"+pid).text('Like'); 
            
            postID = postID.substr(3);
            
           $.ajax({
                type:"POST",
                url:"add-like.php",
                data:'act=dislike&postID='+postID+'&user=ankit',
                success: function(html){
                $(".like-count"+pid).html(html);
                },
				beforeSend:function(){
					$(".like-count"+pid).html("<img src='images/loading-min.gif' style='height:18px'>")
				}
            });
            
           }
           
           else {
            $("#"+pid).addClass('like-h');
             $("#"+pid).text('Unlike');
             
             postID = postID.substr(3);
             
             $.ajax({
                type:"POST",
                url:"add-like.php",
                data:'act=like&postID='+postID+'&user=ankit',
                success: function(html){
                $(".like-count"+pid).html(html);
                },
				beforeSend:function(){
					$(".like-count"+pid).html("<img src='images/loading-min.gif' style='height:18px'>")
				}
            });
            }
            
            
           
        
        
       
    
}
   
</script>

   
</body>

</html>
