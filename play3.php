<?php
session_start();
include "includes/connect.php";

if (!isset($_SESSION['image']) || ($_SESSION['image'] == ''))
{
	echo "<script>document.location.replace('play.php');</script>";
}


$degre = array(
0 => 0,
5 => 20.574169158935547,
10 => 39.95671463012695,
15 => 58.0001220703125,
20 => 74.56707000732422,
25 => 89.53147888183594,
30 => 102.77945709228516,
35 => 115.21017456054688,
40 => 123.73664855957031,
45 => 131.28636169433594,
50 => 136.80186462402344,
55 => 140.24119567871094,
60 => 141.57814025878906,
65 => 140.8025665283203,
70 => 139.92034912109375,
75 => 133.9534454345703,
80 => 125.93962860107422,
85 => 116.93229675292969,
90 => 116.93229675292969
);



if(isset($_POST['submit_save']))
{
	$rotating = $_POST['rotating'];
	if($rotating <0)
	{
		$rot = $rotating * (-1);
	}
	else
	{
		$rot = $rotating;
	}
	echo $ofsetx = $_POST['ofsetx'];echo '<Br>';
	echo $ofsety = $_POST['ofsety'];
	$widthPos = $_POST['widthPos'];
	$heightPos = $_POST['heightPos'];
	
	$target_path = "gallerys/files/thumbnail/" . $_SESSION['image'];
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr">
<head>
    <title>BBAC</title>
    <meta name="description" content="" />
    
    <script>
        window.onload = function() {
            
            // Get the image
			var rotate = <?php echo $rotating; ?>;
			var ofsetx = <?php echo $ofsetx ; ?>;
			var ofsety = <?php echo $ofsety?>;
			var widthPos = parseInt(<?php echo $widthPos; ?>);
			var heightPos = parseInt(<?php echo $heightPos; ?>);
			
            var sampleImage = document.getElementById("ringoImage"),
                canvas = convertImageToCanvas(sampleImage);
				
            
            // Actions
            document.getElementById("canvasHolder").appendChild(canvas);
			
            document.getElementById("pngHolder").appendChild(image);
            
            // Converts image to canvas; returns new canvas element
            function convertImageToCanvas(image) {
            var canvas = document.createElement("canvas");
                canvas.width = 485;
                canvas.height = 384;
				
				pos_x = (widthPos /2);
				pos_y = (heightPos / 2);
alert(pos_x + ' ' + pos_y + ' ' + rotate);
				canvas.getContext("2d").save();
				canvas.getContext("2d").translate(ofsetx, ofsety);
				canvas.getContext("2d").translate(pos_x, pos_y);
				
				canvas.getContext("2d").rotate( ( Math.PI / 180 ) * rotate);
                canvas.getContext("2d").drawImage(image, -pos_x, -pos_y, widthPos, heightPos);
				//canvas.getContext("2d").drawImage(image, -pos_x, -pos_y);
				canvas.getContext("2d").restore();

				
				var dataURL = canvas.toDataURL();
                document.getElementById('my_hidden').value = dataURL;
				
				//var myform=document.getElementById("getting_image");
				//myform.submit();
               return canvas;
            }	
		
        };
    </script>
</head>

<body>
	
	<div id="content-left">
	<form method="post" id="getting_image" action="play4.php">
    <input type="hidden" value="" name="my_hidden" id="my_hidden" />
    <!--<input type="submit" value="save" />-->
    </form>

	<p>
		<img src="<?php echo $target_path;?>" id="ringoImage" />
	</p>
	
	<h2>Canvas Image</h2>
	<p id="canvasHolder">
		
	</p>
</body>
</html>
<?php
}
?>