<?php 
session_start();
include "includes/connect.php";

if (!isset($_SESSION['image']) || ($_SESSION['image'] == ''))
{
	echo "<script>document.location.replace('play.php');</script>";
}
else
{
	$data = $_POST['my_hidden'];
	
	$target_path_t = "gallerys/files/thumbnail/t/" . $_SESSION['image'];
	
	$img = str_replace('data:image/png;base64,', '', $data);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	
	$success = file_put_contents($target_path_t, $data);

/*

	# URL's from the web
	$board_url = $target_path_t;
	$printer_url = "images/background/".$_SESSION['thumb_name'];
	
	# read files
	$board_blob = file_get_contents("$board_url");
	$printer_blob = file_get_contents("$printer_url");
	
	# create new image objects
	$board = new imagick();
	$printer = new imagick();
	
	# read blobs
	$board->readImageBlob("$board_blob");
	$printer->readImageBlob("$printer_blob");
	
	# composite
	$board->compositeImage($printer, imagick::COMPOSITE_ATOP, 0, 0);

	# write composited image
	$board->writeImage ($target_path_t);
	
	$date = date("Y-m-d H:m:s", strtotime("+8 hours"));	
	
	$write = mysql_query("INSERT INTO participants VALUES ('','{$_SESSION['uid']}','{$_SESSION['name']}','{$_SESSION['email']}','{$_SESSION['dob']}','{$_SESSION['gender']}','{$_SESSION['country']}','$board_url','$date','1','0','{$_SESSION['latitude']}','{$_SESSION['longitude']}')");
	
	//unlink('gallerys/files/'.$_SESSION['image']);
	
	mysql_close($res1);
	unset($_SESSION['image']);
	unset($_SESSION['myimg_type']);
	$_SESSION = array();
	session_destroy();
	
	
	echo "<script>window.location = 'thankyou.php';</script>";*/
}
?>
