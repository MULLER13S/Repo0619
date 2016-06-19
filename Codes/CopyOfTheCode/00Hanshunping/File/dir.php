<?php

if(mkdir("G:/TIANJIN/beijing/beijing/chengdu",0777,true)){
    echo "ok";
}else{
    echo "fail";
}

unlink("I:/bbb/aaa");
rmdir("I:/bbb");
unlink("I:/abc22.jpg");
$file_path="I:/bbb/aaaa.txt";
$fp=fopen($file_path,'w+');
fwrite($fp,'hello hello world');
echo "ok";