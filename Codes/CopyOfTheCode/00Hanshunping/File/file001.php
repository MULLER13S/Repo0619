<?php
$file_path="I:/Test/bbc.txt";
//�����ж��ļ��Ƿ���ڣ�
if(file_exists($file_path)){
    //Ϊ��ֲ�Կ��ǣ�ǿ�ҽ������� fopen() ���ļ�ʱ����ʹ�� 'b' ���
    $fp=fopen($file_path,"rb");
    $con=fread($fp,filesize($file_path));
    echo "the content of file is: <br/>";
    //ת�����з���
    $con=str_replace(PHP_EOL,"<br/>",$con);
    echo $con;
}else{
    echo " no file exists";
}
fclose($fp);

//*********�ڶ��ֶ�ȡ��ʽ***********************
//file_get_contents�������ȡ�����ļ����ݣ��ڴ��㹻�󣩣����һ��Զ��ر�ָ�룻
$con=file_get_contents($file_path);
$con=str_replace(PHP_EOL,"<br/>",$con);
echo "<br> ".$con;
//**********�����ֶ�ȡ��ʽ��ѭ����ȡ*********
$fp=fopen($file_path,'rb');
$buffer=10;
$str="";
while(!feof($fp)){
    $str.=fread($fp,$buffer);
}
echo $str;
fclose($fp);