<?php
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
//$appId = '1658058641175935'; //Facebook App ID
$appId = '135777727055075'; //Facebook App ID
// $appId = '385488418535595';
//$appSecret = '717615f43af87685ae408999c7dfb3f4'; // Facebook App Secret
$appSecret = '36d0848ccb0d0e3fa26674dc42f36814'; // Facebook App Secret
// $appSecret='d2468a0678422cac607bb7b7bfc53246';
$homeurl = 'https://effe.org.in/Perplexus/';  //return to home Made changes
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret,

));
$fbuser = $facebook->getUser();
echo "<script>alert( 'Debug Objects: " . $fbuser . "' );</script>";

?>
