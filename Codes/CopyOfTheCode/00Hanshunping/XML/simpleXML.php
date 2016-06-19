<?php
$lib=simplexml_load_file("test001.xml");
//var_dump($lib);
$stus=$lib->stu;
echo count($stus)."<br>";
$stu1=$stus[0];
echo $stu1->name;
echo "<br>".$stu1['salary']."<br>";
$names=$lib->xpath("//name");
foreach($names as $key=>$val){
    echo "<br>".$key.$val;
}
