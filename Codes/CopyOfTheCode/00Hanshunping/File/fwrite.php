<?php
$file_path = "I:/Test/bbc.txt";
if (file_exists($file_path)) {
    $fp = fopen($file_path, "a+");
    $con = "\r\n���Ư��";
    for ($i = 0; $i < 10; $i++) {
        fwrite($fp, $con);
    }

} else {

}
fclose($fp);
//************�ڶ���д�뷽ʽ*****
//file_put_contents�����ε��� fopen()��fwrite() �Լ� fclose() ����һ����
for ($i = 0; $i < 8; $i++) {
    $con .= "������\r\n";
}
//append:׷�ӣ�lock����ռ����
file_put_contents($file_path, $con, FILE_APPEND | LOCK_EX);
echo "ok";
