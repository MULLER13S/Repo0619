<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("test.xml");
$stus=$xmlDoc->getElementsByTagName("stu");
for($i=0;$i<$stus->length;$i++){
    $stu=$stus->item($i);
    echo getNodeVal($stu,"name")."<br>";
    echo getNodeVal($stu,"age")."<br>";
    echo getNodeVal($stu,"sex")."<br>";

}

function getNodeVal(&$mynode,$tagname){

    return $mynode->getElementsByTagName($tagname)->item(0)->nodeValue;
}
?>








</html>