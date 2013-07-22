<?php

if( ($_SESSION['myimg_type'] == 'image/jpeg') || ($_SESSION['myimg_type'] == 'image/pjpeg'))
{
		$source_image = imagecreatefromjpeg($target_path);
		$width = imagesx($source_image);
		$height = imagesy($source_image);
		
		$dest = $target_path_t;
		
		$desired_width = $widthPos;
		$desired_height = $heightPos;
		
		/* find the "desired height" of this thumbnail, relative to the desired width  */
		//$desired_height = floor($height * ($desired_width / $width));
		
		/* create a new, "virtual" image */
		$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
		
		/* copy source image at a resized size */
		imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
		
		/* create the physical thumbnail image to its destination */
		imagejpeg($virtual_image, $dest);
}

if ($_SESSION['myimg_type'] == 'image/png')
{
		$source_image = imagecreatefrompng($target_path);
		$width = imagesx($source_image);
		$height = imagesy($source_image);
		
		$dest = $target_path_t;
		
		$desired_width = $widthPos;
		$desired_height = $heightPos;
	
		
		
		/* find the "desired height" of this thumbnail, relative to the desired width  */
		//$desired_height = floor($height * ($desired_width / $width));
		
		/* create a new, "virtual" image */
		$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	
		$background = imagecolorallocate($virtual_image, 0, 0, 0);
        // removing the black from the placeholder
        imagecolortransparent($virtual_image, $background);

        // turning off alpha blending (to ensure alpha channel information 
        // is preserved, rather than removed (blending with the rest of the 
        // image in the form of black))
        imagealphablending($virtual_image, false);

        // turning on alpha channel information saving (to ensure the full range 
        // of transparency is preserved)
        imagesavealpha($virtual_image, true);
		
		/* copy source image at a resized size */
		imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
		
		
		/* create the physical thumbnail image to its destination */
		imagepng($virtual_image, $dest);
}

if ($_SESSION['myimg_type'] == 'image/gif')
{
		$source_image = imagecreatefromgif($target_path);
		$width = imagesx($source_image);
		$height = imagesy($source_image);
		
		$dest = $target_path_t;
		
		$desired_width = $widthPos;
		$desired_height = $heightPos;

		/* find the "desired height" of this thumbnail, relative to the desired width  */
		//$desired_height = floor($height * ($desired_width / $width));
		
		/* create a new, "virtual" image */
		$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	
		$background = imagecolorallocate($virtual_image, 0, 0, 0);
        
		
		/* copy source image at a resized size */
		imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
		
		
		/* create the physical thumbnail image to its destination */
		imagegif($virtual_image, $dest);
}
?>