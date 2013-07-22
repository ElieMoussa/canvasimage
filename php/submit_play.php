<?php

$uname = 'asfd';
$uemail = 'asdf@sdf.asdf';
$_SESSION['dob'] = 'aasdf';
$_SESSION['gender'] = 'male';

$error = '';

$name = '';
$age = '';
$email = '';
	
	
if(isset($_POST['continue_submit']))
{
	$_SESSION['name'] = addslashes($_POST['name']);
	$_SESSION['email'] = addslashes($_POST['email']);
	$_SESSION['dob'] = addslashes($_POST['dob']);
	$_SESSION['gender'] = addslashes($_POST['gender']);
	$_SESSION['thumb_name'] = addslashes($_POST['thumb_name'].'.png');
	$_SESSION['image'] = addslashes($_POST['myimg']);
	
	$_SESSION['myimg_type'] = addslashes($_POST['mytype']);
	
	$_SESSION['latitude'] = addslashes($_POST['latitude']);
	$_SESSION['longitude'] = addslashes($_POST['longitude']);
	  
					
					/*$write = mysql_query("INSERT INTO participants VALUES ('','$uid','$name','$age','$email','$address','{$_SESSION['country']}','$phone','$image','$date','1','0','$latitude','$longitude')");
					
					$image = $config['baseurl'] .'gallery/t/' . $image;
					
					$facebook->api("/me/feed", "post", array(
					message => 'I Just voted for this image',
					picture=>  $image,
					link => $config['appbaseurl'],
					name => "Total"
					));*/
			
	echo "<script>document.location.replace('play2.php');</script>";
					

}
?>