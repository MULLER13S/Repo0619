<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    </head>
<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("test.xml");
//$stus是一个Nodelist对象；
$stus=$xmlDoc->getElementsByTagName("stu");
echo "Total:".$stus->length;
$stu1=$stus->item(2);
$name1=$stu1->getElementsByTagName("name");
var_dump($stu1);
echo $name1->item(0)->nodeValue;
//echo $name1;

echo "<br><br>";
function getNodeVal(&$mynode,$tagname){
    $nodeList=$mynode->getElementsByTagName($tagname);
    echo "<br>-------------";
    var_dump($nodeList);
    $node=$nodeList->item(0);
    echo "<br>--------------";
    var_dump($node);
    $value=$node->nodeValue;
    echo "<br>---------";
    var_dump($value);
    return $mynode->getElementsByTagName($tagname)->item(0)->nodeValue;
}
echo getNodeVal($stu1,"age");
?>
</html>