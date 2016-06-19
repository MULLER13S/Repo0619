<?php

$im=imagecreatetruecolor(400,300);
$red=imagecolorallocate($im,255,0,0);
//imageellipse($im,40,20,20,20,$red);
//imageline($im,0,0,400,300,$red);
//imagerectangle($im,10,20,300,200,$red);
//imagefilledrectangle($im,20,100,360,150,$red);
//imagearc($im,200,150,300,220,40,250,$red);
imagefilledarc($im,200,150,300,220,40,250,$red,IMG_ARC_PIE);
//$srcImage=imagecreatefromjpeg("123.jpg");
//$srcImageInfo=getimagesize("123.jpg");
//
//imagecopy($im,$srcImage,10,5,50,60,$srcImageInfo[0],$srcImageInfo[1]);
//imagestring($im,22,5,8,'hello World',$red);
//$str='hello word,天津海港城';
//msyhbd.ttf为支持中文的字体，在C:WINDOWS/FONTS里复制到目录；
//imagettftext($im,25,10,15,140,$red,"msyhbd.ttf",$str);
header("content-type:image/png");
imagepng($im);
imagedestroy($im);