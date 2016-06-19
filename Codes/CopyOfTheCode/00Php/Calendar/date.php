<?php
header("content-type:text/html;charset=utf-8");
$year=$_GET['y']?$_GET['y']:date("Y");
$mon=$_GET['m']?$_GET['m']:date("m");
//这个月有多少天；
$day=date("t",mktime(0,0,0,$mon,1,$year));
//1号是星期几；
$w=date("w",mktime(0,0,0,$mon,1,$year));

echo "<center>";
echo "<h1>{$year}年{$mon}月</h1>";
echo "<table width='600' border='1'>";
echo "<tr>";
echo "<th style='color:red'>星期日</th>";
echo "<th>星期一</th>";
echo "<th>星期二</th>";
echo "<th>星期三</th>";
echo "<th>星期四</th>";
echo "<th>星期五</th>";
echo "<th style='color:green'>星期六</th>";
echo "</tr>";

$dd=1;
while($dd<=$day){
    echo "<tr>";
    for($i=0;$i<7;$i++){
        if($dd<=$day&&($w<=$i || $dd!=1)) {
            echo "<td>{$dd}</td>";
            $dd++;
        }else{
            echo "<td>&nbsp;</td>";
        }
    }
    echo "</tr>";
}


echo "</table>";

$prey=$nexty=$year;
$prem=$nextm=$mon;
if($prem<=1){
    $prem=12;

    $prey--;
}else{
    $prem--;
}
if($nextm>=12){
    $nextm=1;
    
    $nexty++;
}else{
    $nextm++;
}


echo "<a href='date.php?y={$prey}&m={$prem}'>上一月</a>&nbsp;&nbsp;";
echo "<a href='date.php?y={$nexty}&m={$nextm}'>下一月</a>";






echo "</center>";