<?php
$checkCode = "";
for ($i = 0; $i < 4; $i++) {
    $checkCode .= dechex(rand(1, 15));
}
session_start();
$_SESSION['checkcode'] = $checkCode;

$image1 = imagecreatetruecolor(100, 40);
$red = imagecolorallocate($image1, 255, 0, 0);
//干扰线；
for ($i = 0;$i<14;$i++){
    imageline($image1,rand(0,50),rand(0,20),rand(0,100),
        rand(0,40),imagecolorallocate($image1,
        rand(0,255),rand(0,255),rand(0,255)));
}
imagestring($image1,5,rand(0,20),rand(0,10),$checkCode,$red);
header("content-type:image/png");
imagepng($image1);
imagedestroy($image1);
?>


