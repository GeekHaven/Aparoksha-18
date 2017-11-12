<?php

 session_start(); 
 ?>
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
	
	<?php
date_default_timezone_set('Asia/Kolkata');

extract($_POST);
if($_POST['act'] == 'add-com'):
	$username = htmlentities($username);
    $username=$_SESSION['name'];
    
    $fname1=substr($username, 0, strrpos($username, "-"));
	$fname=str_replace("-", " ", $fname1);
	
	$count = substr_count($comment , "'");
	
	if($count % 2 != 0){
	$comment=str_replace("'", "`", $comment);
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
	
	$comment=html2txt($comment);	
		
	include('../includes/config.php'); 
	
    mysql_query("INSERT INTO comments (username, comment, post_id)VALUES( '$username', '$comment', '$post_id')");
    if(!mysql_errno()){
    
    $date = date('d-m-Y H:i');
  	$date = strtotime($date);
  	
  	
?>

<div class="comment" style="padding-bottom: 20px;">
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
<?php endif; ?>