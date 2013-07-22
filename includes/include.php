<?php
error_reporting( E_ALL ^ E_NOTICE );
include_once "facebook.php";
session_start();
//facebook application
$config['appid' ] = "597766673589432";
$config['secret'] = "504da90df3de81b67e8ae61aabab8b2a";
$config['baseurl'] = "http://lebappsonline.com/dev01/bbac/app/";

$config['appbaseurl'] = "http://www.facebook.com/bbacbank?&sk=app_597766673589432";
// Create our Application instance.
$facebook = new Facebook(array(
'appId' => $config['appid'],
'secret' => $config['secret'],
'cookie' => true,
));

$signedRequest = $facebook->getSignedRequest();
if ( isset($signedRequest['page']['liked']) && $signedRequest['page']['liked'] == 0 ) {
	header('location: like.php');
}


$user = $facebook->getUser();
$loginUrl = $facebook->getLoginUrl(
array('scope' => 'email,user_birthday,publish_stream,status_update,user_work_history,publish_actions, publish_stream, offline_access')
);
if ($user) {
try {
//get user basic description
$userInfo = $facebook->api("/$user");
//echo 'hi '.$userInfo['name'];
$fb_access_token = $facebook->getAccessToken();
} catch (FacebookApiException $e) {
//you should use error_log($e); instead of printing the info on browser
error_log('APP ERROR: '.$e);
$user = null;
}
}
if (!$user) {
echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
exit;
}
if (isset($_GET['code'])){
header("Location: " . $config['appbaseurl']);
$baseurl= $config['appbaseurl'];
echo "<script type='text/javascript'>top.location.href = '$baseurl'</script>";
exit();
}

$_SESSION['uid'] = $userInfo['id'];
$uname = $userInfo['name'];
$ufirst = $userInfo['first_name'];
$ulast = $userInfo['last_name'];
$uemail = $userInfo['email'];
$_SESSION['dob'] = $dob = $userInfo['birthday'];
$_SESSION['gender'] = $userInfo['gender'];
?>