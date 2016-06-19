<?php
$file_path="I:/Test/bbc.txt";
//首先判断文件是否存在；
if(file_exists($file_path)){
    //为移植性考虑，强烈建议在用 fopen() 打开文件时总是使用 'b' 标记
    $fp=fopen($file_path,"rb");
    $con=fread($fp,filesize($file_path));
    echo "the content of file is: <br/>";
    //转换换行符；
    $con=str_replace(PHP_EOL,"<br/>",$con);
    echo $con;
}else{
    echo " no file exists";
}
fclose($fp);

//*********第二种读取方式***********************
//file_get_contents函数会读取整个文件内容（内存足够大），并且会自动关闭指针；
$con=file_get_contents($file_path);
$con=str_replace(PHP_EOL,"<br/>",$con);
echo "<br> ".$con;
//**********第三种读取方式，循环读取*********
$fp=fopen($file_path,'rb');
$buffer=10;
$str="";
while(!feof($fp)){
    $str.=fread($fp,$buffer);
}
echo $str;
fclose($fp);