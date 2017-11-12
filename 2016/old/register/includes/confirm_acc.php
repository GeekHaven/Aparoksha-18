<?php

if(isset($_GET['code']))
{
	$code = addslashes(htmlentities($_GET['code']));
}
else
	$code = 0;
	
if($code)
{
	$x = validateAccount($code);
	if($x) {
		redirectTo(LOGIN."&val=1");
	}
	else
		redirectTo(HOME);
}

?>