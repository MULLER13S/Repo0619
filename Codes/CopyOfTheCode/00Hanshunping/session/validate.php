<?php
$check="";
for($i=0;$i<4;$i++){
    $check.=dechex(rand(1,36));
}
echo $check;