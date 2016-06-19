<?php
$str="123+90";
preg_match('/(\d+)([+-])(\d+)/i',$str,$res);

echo '<pre>';
print_r($res);
echo '</pre>';