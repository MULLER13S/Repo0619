<?php
/*
$tid=$_GET['tid'];
$fh=fopen('./msg.txt','r');
$i=1;
while($row=fgetcsv($fh)){
    if($i==$tid){
        print_r($row);
    }
    $i++;
}
*/
?>
<?php
$conn = mysqli_connect("localhost", "root", "123456", "test");
mysqli_query($conn, "set names utf8");
$id=$_GET['id'];

$sql="select * from message where id=".$id;
$res = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($res);
?>
<h1><?php echo $row['title'];?></h1>
<p><?php echo $row['content'];?></p>
