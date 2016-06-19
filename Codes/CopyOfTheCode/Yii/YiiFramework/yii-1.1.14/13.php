<?php
$mysqli=new mysqli("localhost","root","123456","php0905");
$mysqli->query("set names utf8");
$sql='select * from test';
$res = $mysqli->query($sql);
while($row=$res->fetch_assoc()){
    echo $row['user']."<br>";
}
