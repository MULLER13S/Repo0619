<?php
//É¾³ýXMLÔªËØ£»
$xmlDoc=new DOMDocument();
$xmlDoc->load("test001.xml");
$root=$xmlDoc->getElementsByTagName("class")->item(0);
$stus=$xmlDoc->getElementsByTagName("stu");
$stu1=$stus->item(2);
//$root->removeChild($stu1);
$stu1->parentNode->removeChild($stu1);
$xmlDoc->save("test001.xml");
echo "Deleted";