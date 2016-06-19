<?php
/*function binary(&$arr,$find,$left,$right){
    if($left>$right){
        echo "no number";
        return; //return 必须有，否则可能报错；
    }
    $mid=round(($left+$right)/2);
    if($find>$arr[$mid]){
        binary($arr,$find,$mid+1,$right);
    } elseif($find<$arr[$mid]) {
        binary($arr, $find, $left, $mid - 1);
    }
    else {
        echo "founded! index is:".$mid;
    }


}*/
function binary2(&$arr,$find,$left,$right){

    $mid=round(($left+$right)/2);
    if($arr[$mid]<$find && $arr[$mid+1]>$find){
        echo "index is:".($mid+1);
        return;
    }

    if($find>$arr[$mid]){
        binary2($arr,$find,$mid+1,$right);
    } elseif($find<$arr[$mid]) {
        binary2($arr, $find, $left, $mid - 1);
    }
    else {
        echo "founded! index is:".$mid;
    }


}
$b=array(1,2,3,4,5,6,7,8,12,34,67);
$a=9;
binary2($b,9,0,count($b)-1);