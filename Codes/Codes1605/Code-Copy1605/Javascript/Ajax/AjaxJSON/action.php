
<?php
move_uploaded_file($_FILES['img']['tmp_name'],'123.jpg');
$img_id=88;
$error = '123456';
/*$msg = '';
$msg .= " File Name: " . $_FILES['img']['name'] . ", ";
$msg .= " File Size: " . @filesize($_FILES['img']['tmp_name']);*/


$msg= "<input class='weui_input' type='number' name='bankNumber' readonly='readonly' value='{$img_id}' pattern='[0-9]*' />";

echo "{";
echo				"error: '" . $error . "',\n";
echo				"msg: '" . $msg . "'\n";
echo "}";



