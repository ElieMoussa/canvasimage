<?php
	session_start();
	include "../includes/connect.php";
	
	
	$name = addslashes($_POST['name']);
	$lastname = addslashes($_POST['lastname']);
	$dob = addslashes($_POST['dob']);
	$email = addslashes($_POST['email']);
	$address = addslashes($_POST['address']);
	$phone = addslashes($_POST['phone']);
	
	$date = date("Y-m-d");
	
	if ( ($name != '') &&($lastname != '') && ($dob != '') && ($email != '') && ($address != '') && ($phone != '') )
	{
		$write ="INSERT INTO afcard VALUES  ('','{$_SESSION['uid']}','$name','$lastname','$dob','$address','{$_SESSION['country']}','$email','$phone','$date','0')";
	
		 mysql_query($write);
					
		/*$image = 'http://lebappsonline.com/dev01/total/app/gallery/t/' . $image;
		
		$facebook->api("/me/feed", "post", array(
		message => 'I submitted this image, please vote',
		picture=>  $image,
		link => $config['appbaseurl'],
		name => "Total"
		));*/
		
		mysql_close($res1);
		/*echo "<script>document.location.replace('thankyou.php');</script>";*/
		echo "1";
	}
?>