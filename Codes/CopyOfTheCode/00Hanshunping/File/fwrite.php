<?php
$file_path = "I:/Test/bbc.txt";
if (file_exists($file_path)) {
    $fp = fopen($file_path, "a+");
    $con = "\r\n你好漂亮";
    for ($i = 0; $i < 10; $i++) {
        fwrite($fp, $con);
    }

} else {

}
fclose($fp);
//************第二种写入方式*****
//file_put_contents和依次调用 fopen()，fwrite() 以及 fclose() 功能一样。
for ($i = 0; $i < 8; $i++) {
    $con .= "天津你好\r\n";
}
//append:追加；lock：独占锁；
file_put_contents($file_path, $con, FILE_APPEND | LOCK_EX);
echo "ok";
