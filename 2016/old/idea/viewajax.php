 <?php
 include("db.php");

session_start();

if(isSet($_POST['post_id']))
{
$id=$_POST['post_id'];
$com=mysql_query("select * from comments where post_id_fk='$id' order by comments_id");
while($r=mysql_fetch_array($com))
{
$c_id=$r['com_id'];
$comment=$r['comments'];
?>


<div class="comment_ui" >
<div class="comment_text">
<div  class="comment_actual_text"><img src="profile.jpg" width="32" height="32" /><div id="sssss"><?php echo $comment; ?></div></div>
</div>
</div>


<?php } }?>
<div class="dddd">
<div>
<img src="profile.jpg" width="32" height="32" />
<form action="savecomment.php" method="post">
<input name="mesgid" type="hidden" value="<?php echo $id ?>" />
<input name="mcomment" type="text" placeholder="Write a comment..." style="height: 24px; border:1px solid #BDC7D8; padding:3px; border-width: 1px 0px 1px 1px; width:302px;" />
<input id="buts" name="" type="submit" value="ENTER" />
</form>
</div>
</div>