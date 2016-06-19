<?php

// 创建图像
$image = imagecreatetruecolor(600, 450);


// 分配一些颜色
$white    = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
$gray     = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);
$darkgray = imagecolorallocate($image, 0x90, 0x90, 0x90);
$navy     = imagecolorallocate($image, 0x00, 0x00, 0x80);
$darknavy = imagecolorallocate($image, 0x00, 0x00, 0x50);
$red      = imagecolorallocate($image, 0xFF, 0x00, 0x00);
$darkred  = imagecolorallocate($image, 0x90, 0x00, 0x00);
$green    = imagecolorallocate($image, 0, 200, 0);

//填充画布背景颜色；
imagefill($image,0,0,$green);

// 创建 3D 效果

for ($i = 180; $i > 150; $i--) {
    imagefilledarc($image, 250, $i, 300, 150, 0, 45, $darknavy, IMG_ARC_PIE);
    imagefilledarc($image, 250, $i, 300, 150, 45, 75 , $darkgray, IMG_ARC_PIE);
    imagefilledarc($image, 250, $i, 300, 150, 75, 360 , $darkred, IMG_ARC_PIE);
}

imagefilledarc($image, 250, 150, 300, 150, 0, 45, $navy, IMG_ARC_PIE);
imagefilledarc($image, 250, 150, 300, 150, 45, 75 , $gray, IMG_ARC_PIE);
imagefilledarc($image, 250, 150, 300, 150, 75, 360 , $red, IMG_ARC_PIE);


// 输出图像
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?> 