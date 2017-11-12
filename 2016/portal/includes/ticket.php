<?php
	for ($i=0; $i < Input::get('quantity'); $i++) { ?>
		<div style="padding: 0.2em 5em; margin: 0.5em 3em;">
			<h1>Event: <?php echo $events->find(Input::get('event'))->name; ?></h1>
			<h4>Name: <?php echo Input::get('username'); ?></h4>
			<img src="images/logo1.jpg" style="width: 500px;height: 90px;margin-top: -100px;margin-left: 350px;">
		</div><hr>
<?php } ?>
