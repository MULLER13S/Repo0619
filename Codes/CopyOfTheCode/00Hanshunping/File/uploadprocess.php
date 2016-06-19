<?php
$username=$_POST['username'];
$fileintro=$_POST['fileintro'];
echo $username.$fileintro;
echo "<pre>";
print_r($_FILES);
echo "</pre>";
//上传大文件时，需在php.ini中修改post_max_size和upload_max_filesize参数；
$user_path=$_SERVER['DOCUMENT_ROOT']."/Hanshunping/UP/".$username;
$user_path=iconv("utf-8","gb2312",$user_path);
if(!file_exists($user_path)){
    mkdir($user_path);

}
$fileName=$_FILES['myfile']['name'];
$fileName=iconv("utf-8","gb2312",$fileName);

if(is_uploaded_file($_FILES['myfile']['tmp_name'])){
    $uploaded_file=$_FILES['myfile']['tmp_name'];
    //避免同一用户上传的同一名字文件被覆盖；
    $move_to_file=$user_path."/".time().rand(1,1000).
        substr($fileName,strrpos($fileName,"."));

    if(move_uploaded_file($uploaded_file,$move_to_file)){
        echo $_FILES['myfile']['name']."上传OK";
    }else{
        echo "上传失败";
    }
}else{
    echo "FAILED";
}