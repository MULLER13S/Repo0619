<?php
if($fp=fopen("I:/Test/abc.txt","r")){
    $file_info=fstat($fp);
    echo "<pre>";
    print_r($file_info);
    echo "</pre><br/>";
echo "the size of file is -- {$file_info['size']}";
    echo "the modify time is -- ".date("Y-m-d H:i:s",$file_info['mtime']);
    echo "<br/>";
    echo fileatime("I:/Test/abc.txt");
}else{
    echo "No Such File Exists";
}
fclose($fp);
