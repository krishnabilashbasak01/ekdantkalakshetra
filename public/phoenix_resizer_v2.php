<?php
/*
8888888b.  888                                 d8b              8888888b.                    d8b                                         .d8888b.  
888   Y88b 888                                 Y8P              888   Y88b                   Y8P                                        d88P  Y88b 
888    888 888                                                  888    888                                                                     888 
888   d88P 88888b.   .d88b.   .d88b.  88888b.  888 888  888     888   d88P  .d88b.  .d8888b  888 88888888  .d88b.  888d888     888  888      .d88P 
8888888P"  888 "88b d88""88b d8P  Y8b 888 "88b 888 `Y8bd8P'     8888888P"  d8P  Y8b 88K      888    d88P  d8P  Y8b 888P"       888  888  .od888P"  
888        888  888 888  888 88888888 888  888 888   X88K       888 T88b   88888888 "Y8888b. 888   d88P   88888888 888         Y88  88P d88P"      
888        888  888 Y88..88P Y8b.     888  888 888 .d8""8b.     888  T88b  Y8b.          X88 888  d88P    Y8b.     888          Y8bd8P  888"       
888        888  888  "Y88P"   "Y8888  888  888 888 888  888     888   T88b  "Y8888   88888P' 888 88888888  "Y8888  888           Y88P   8888888888

Phoenix Resizer
Version: 2.0

Requires PHP GD Library to function.
Developed by Phoenix
                                                                                                                          
*/

function siteURL()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'];
    return $protocol.$domainName;
}

header("Access-Control-Allow-Origin: ".siteURL());

if(strpos($_SERVER['HTTP_REFERER'], siteURL()) === false)
	die("Permission Denied!");

(!empty($_GET['src']))?($path=$_GET['src']):(die("Phoenix Resizer v2: Source Missing!"));
(!empty($_GET['w']))?($width=$_GET['w']):($width="auto");
(!empty($_GET['h']))?($height=$_GET['h']):($height="auto");
(!empty($_GET['q']))?($quality=$_GET['q']):($quality=80);

$extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
	
switch($extension)
{
	case "jpg":
	case "jpeg":
		$image = imagecreatefromjpeg($path);
		break;
	case "png":
		$image = imagecreatefrompng($path);			
		break;
	default:
		die("Please provide a valid image! Only jpg, jpeg and png images are supported!");
}

list($defwidth, $defheight) = getimagesize($path);

if(($width == "auto") && ($height == "auto"))
	die("<strong>Phoenix Image Resizer Error:</strong> You must pass either width or height, at least.");

if($width != "auto")
{
	$new_width = $width;
	
	if($height != "auto")
	{
		$new_height = $height;
	}
	else
	{
		$new_height = $new_width*$defheight/$defwidth;
	}
}
elseif($height != "auto")
{
	$new_height = $height;
	
	if($width != "auto")
	{
		$new_width = $width;
	}
	else
	{
		$new_width = $new_height*$defwidth/$defheight;
	}
}

if($extension == "png")
{
	$png = imagecreatetruecolor($new_width, $new_height);
	imagealphablending($png, false );
	imagesavealpha($png, true );
	imagecopyresampled( $png, $image, 
                   0, 0, 
                   0, 0, 
                   $new_width, $new_height, 
                   $defwidth, $defheight);
}
else
{
	$image = imagescale($image, $new_width, $new_height);
}

if($extension == "jpg" || $extension == "jpeg")
{
	header("Content-type: image/jpeg");
	imagejpeg($image, NULL, $quality);
}
elseif($extension == "png")
{
	header("Content-type: image/png");
	imagepng($png, NULL, 9);
	imagedestroy($png);
}

imagedestroy($image);

/*

Simply use like so: <img src="phoenix_resizer_v2.php?src=slider/1.jpg&w=480" />

*/

?>