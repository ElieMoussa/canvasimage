<?php 

$data = $_POST['my_hidden'];

$img = str_replace('data:image/png;base64,', '', $data);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = "image_name.png";
$success = file_put_contents($file, $data);

?>
