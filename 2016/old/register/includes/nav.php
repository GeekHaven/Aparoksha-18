 <?php 
$active = "";

if(isset($_GET['nav'])) {
 	$active = addslashes(htmlentities($_GET['nav']));
}
 ?>
 <script>
 if($('#top-navigation')){
	$('#top-navigation').css('display','none');
}


 </script>
 <div id="top-navigation" style="display:block;"> 
        <div align="right" style="margin-top: -1.5em;">Welcome<strong> <?php echo $_SESSION['user']?>  </strong><span>|  </span><a href="models/logout.php"><button class="md-close1">Log out</button></a></div>
      </div>
  
 
 
 <!-- Main Nav -->
    <div id="navigation">
      <ul>
       <li><a href="?nav=dashboard" <?php if ($active == 'dashboard') echo "class='active'"; ?> ><span>Dashboard</span></a></li>
        <li><a href="?nav=registration" <?php if ($active == 'registration') echo "class='active'"; ?> ><span>Event Catalogue</span></a></li>
		<!--<li><a href="?nav=short" <?php if ($active == 'short') echo "class='active'"; ?> ><span>Short Circuit</span></a></li>
        <li><a href="?nav=results" <?php /*if ($active == 'results') echo "class='active'";*/ ?> ><span>Results</span></a></li>-->
        <li><a href="?nav=profile" <?php if ($active == 'profile'  ||  $active=='') echo "class='active'"; ?> ><span>My Profile</span></a></li>
      </ul>
    </div>
    <!-- End Main Nav -->
	
