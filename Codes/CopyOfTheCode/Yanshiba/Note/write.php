
<?php
/*
//print_r($_POST);
$fh=fopen('./msg.txt','a');
$str=$_POST['title'].','.$_POST['content']."\n";
fwrite($fh,$str);
fclose($fh);
echo 'ok';
*/
?>
<?php
$conn = mysqli_connect("localhost", "root", "123456", "test");
if (!$conn) {
    die("连接失败" . mysql_error());
} else {
    echo "Success!";
}
mysqli_query($conn, "set names utf8");
$sql="insert into message (title,content,pubtime) VALUES ('".$_POST['title']."',
'".$_POST['content']."',".time().")";
echo $sql."<br/>";
if($res = mysqli_query($conn, $sql)){
    echo "留言成功";
}else{
    echo "留言失败";
}
?>
