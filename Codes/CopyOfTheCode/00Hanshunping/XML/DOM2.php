<?php
//添加XML元素和属性；
$xmlDoc=new DOMDocument();
$xmlDoc->load("test.xml");
$root=$xmlDoc->getElementsByTagName("class")->item(0);
$stu_node=$xmlDoc->createElement("stu");
//添加属性；
$stu_node->setAttribute("salary","8000");
$stu_node_name=$xmlDoc->createElement("name");
$stu_node_name->nodeValue="David";
$stu_node->appendChild($stu_node_name);

$stu_node_age=$xmlDoc->createElement("age");
$stu_node_age->nodeValue=35;
$stu_node->appendChild($stu_node_age);

$stu_node_sex=$xmlDoc->createElement("sex");
$stu_node_sex->nodeValue="male";
$stu_node->appendChild($stu_node_sex);

$stu_node_hobby=$xmlDoc->createElement("hobby");
$stu_node_hobby->nodeValue="soccer";
$stu_node->appendChild($stu_node_hobby);

$root->appendChild($stu_node);
$xmlDoc->save("test.xml");