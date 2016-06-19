<?php
//¸üĞÂXML£»
$xmlDoc=new DOMDocument();
$xmlDoc->load("test001.xml");
$stus=$xmlDoc->getElementsByTagName("stu");
$stu1=$stus->item(0);
$stu_age=$stu1->getElementsByTagName("age")->item(0);
$stu_age->nodeValue+=24;
$xmlDoc->save("test002.xml");