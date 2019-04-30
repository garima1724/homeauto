<?php
//how to generate image in php.
session_start();
header("Content-type:image/jpeg");//another use of header-defines the content type.
$text=$_SESSION['captcha'];
$font_size= 25;
$image_width= 120;
$image_height= 40;

$image= imagecreate($image_width,$image_height);//function to set the dimensions of the image.
imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);// code for black color is 0.
//line_color = imagecolorallocate($image,255,0,0);// for changing the color of lines.

for($i=1;$i<=40;$i++)//this loop is to make the captcha image difficult to read.
{
	$i1=rand(1,100);//generates random numbers for creation of captcha
	$i2=rand(1,100);
	$j1=rand(1,100);
	$j2=rand(1,100);

	imageline($image, $i1,$i2,$j1,$j2,$text_color);// this function will generate random no of lines b/w 1 to 40.
}


imagettftext($image,$font_size,0,15,30,$text_color,'lobster_1.3.otf',$text);

imagejpeg($image);
//this code is incomplete till we haven't matched the captcha with the i/p.for matching we make changes in index.php from line 17
?>