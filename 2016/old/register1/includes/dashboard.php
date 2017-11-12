<?php
	$username = $_SESSION['user'];
	$userid = getAccountid($username);
	$eventlist = "";
	$eventname = "";
	$upcoming = "";
	$ongoing = "";
	$registered = "";
	$events = array();
	$categories = array();
	$news = array();
	$timezone = "Asia/Calcutta";
	date_default_timezone_set($timezone);
	$eventlist = getRegisteredEvents($userid);
	for ($i = 0; $i < count($eventlist); $i++) {
		$eventname = getEventbyid($eventlist[$i]['event_id']);
		$registered .= "<tr>
			   <td><p style='padding:3px; line-height:20px;'>{$eventname[0]['event_name']}</p></td>
			   <td><p style='padding:3px; line-height:20px;'>".format_date($eventname[0]['start'])."</p></td>
			   <td><p style='padding:3px; line-height:20px;'>".format_date($eventname[0]['end'])."</p></td>
		   </tr>
	   ";
	}
	$categories = getEventCategories();
	$events = getAllEvents();
	for ($i = 0; $i < count($categories); $i++) {
		$eventcat = $categories[$i]['id'];
		for ($j = 0; $j < count($events); $j++) {
			if ($eventcat == $events[$j]['event_category_id']) {
				if (strtotime($events[$j]['start']) <= time() && time() < strtotime($events[$j]['end'])) {
					$ongoing .= "<tr><td>{$events[$j]['event_name']}</td><td>".ucFirst($categories[$i]['name'])."</td><td>".format_date($events[$j]['end'])."</td></tr>";
				}
			}
		}
	}
	$count = 0;
	$upcmevents = array();
	$upcmevents = $events;
	for ($i = 0; $i < count($upcmevents); $i++) {
		for ($j = 0; $j < count($upcmevents)-1; $j++) {
			if (strtotime($upcmevents[$j]['start']) > strtotime($upcmevents[$j+1]['start'])) {
				$tmp = array();
				$tmp = $upcmevents[$j];
				$upcmevents[$j] = $upcmevents[$j+1];
				$upcmevents[$j+1] = $tmp;
			}
		}
	}
	
	for ($i = 0; $i < count($upcmevents); $i++) {
		if ($count < 5 && strtotime($upcmevents[$i]['start']) > strtotime(date('Y-m-d H:i:s'))) {
			$count++;
			$categories = getCategory($upcmevents[$i]['event_category_id']);
			$upcoming .= "<tr><td>{$upcmevents[$i]['event_name']}</td><td>".ucFirst($categories[0]['name'])."</td><td>".format_date($upcmevents[$i]['start'])."</td></tr>";
		}
	}	
?>

<!-- Container -->
<div id="container">
  <div class="shell">
   
    <!-- Main -->
   

      <!-- Content -->
      <div id="content" style="width:42%; margin-left: 15px; margin-top: 10px;">
        <!-- Box -->
       <?php
			if ($registered) {
				echo "<div class='box'>
						<!-- Box Head -->
						<div class='box-head'>
							<h2 class='left'>Registered Events	</h2>
						</div>
						<!-- End Box Head -->
						<!-- Table -->
						<div class='table'>
							<table width='100%'>
								<th align='center'>Event</th>
								<th align='center'>From</th>
								<th align='center'>To</th>
								{$registered}
							</table>
						  </div>
						</div>
				";
			}
			if ($ongoing) {
				echo "<div class='box'>
						  <!-- Box Head -->
						  <div class='box-head'>
							<h2>Ongoing Events</h2>
						  </div>
						  <!-- End Box Head-->
						  <div class='table'>
							<table style='width: 100%'>
								<th>Event</th>
								<th>Category</th>
								<th>Contest Ends On</th>
								{$ongoing}
							</table>
							<!-- End Sort -->
						  </div>
					</div>
				";
			}
			if ($upcoming) {
				echo" <div class='box' >
						<div class='box-head'>
							<h2>Upcoming Events</h2>
						</div>
						<div class='table'>
							<table style='width: 100%'>
							  <th>Event</th>
							  <th>Category</th>
							  <th>Contest Starts On</th>
							  {$upcoming}
							</table>
						<!-- End Sort -->
						</div>
					  </div>
				";
			}
		  ?>
		
        
        <!-- End Box -->
        <!-- Box --><!-- End Box -->
      </div>
      
      
      <!-- End Content -->
      <!-- Sidebar -->
      <div id="sidebar" style="width:54%;padding-right: 15px; margin-top: 20px;">
        <!-- Box -->
        <div class="box" style="height:850px;">
          <!-- Box Head -->
          <div class="box-head" style='margin-bottom: 5px;'>
            <h2 class="left">Recent Updates</h2>
          </div>
          <!-- End Box Head -->
          <!-- Table -->
          <div style="overflow-y:scroll;  height:800px">
          <div class="table" >
				<?php
					$news = getNews();
					for ($i = count($news)-1; $i >= 0; $i--) {
						echo "<div class='box'>
								<div style='padding-top: 5px;  padding-left: 5px; padding-bottom: 10px; color:#103755'>
									<h2>{$news[$i]['heading']}</h2>
								</div>
								<div style = 'padding-left: 5px; padding-bottom: 5px; font-size:14px; line-height:17px;' >
									{$news[$i]['content']}<br>
									<p style=' text-align: right; margin-top: 5px; margin-right: 5px; color:#aaa;'><i>Published on:" . format_date( $news[$i]['added_on']) . "</i></p>
								</div>
							  </div>
						";
					}
				?>
            </table>
            <!-- Pagging -->
            
            <!-- End Pagging -->
          </div>
          </div>
          <!-- Table -->
        </div>
        <!-- End Box -->
      </div>
      <!-- End Sidebar -->
      <div class="cl">&nbsp;</div>
  
<!-- End Container -->
<!-- Footer -->
<!--div id="footer">
  <div class="shell"> <span class="left">&copy; 2010 - CompanyName</span></div>
</div-->
<!-- End Footer -->
</body>
</html>
