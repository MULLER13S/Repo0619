<?php
/*
$fh=fopen('./msg.txt','r');
$i=1;
while($row=fgetcsv($fh)){

    echo '<li>'.'<a href=./readmsg.php?tid=',$i,' />'.$row[0].'</li>';

    $i++;
}
*/
?>
<?php
$conn = mysqli_connect("localhost", "root", "123456", "test");
mysqli_query($conn, "set names utf8");
$sql="select * from message";
$res = mysqli_query($conn, $sql);
//var_dump($res);
while($row=mysqli_fetch_assoc($res)){
    //print_r($row);
echo '<li>','<a href=readmsg.php?id=',$row['id'],' />',$row['title'].'</li>';
}
