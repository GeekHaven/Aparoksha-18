<?php
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '1651408561820760'; //Facebook App ID
$appSecret = '67e1865d46fdcc336350497a68c54f0b'; // Facebook App Secret
$homeurl = 'https://aparoksha.iiita.ac.in/Perplexus/';  //return to home
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret,

));
$fbuser = $facebook->getUser();
?>
