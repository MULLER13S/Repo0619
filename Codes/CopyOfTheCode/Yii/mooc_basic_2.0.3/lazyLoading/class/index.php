<?php
function my_loader($class){
    require($class.'.php');
    //require('Class2.php');
}

spl_autoload_register('my_loader');

$is_girl=$_GET['sex']==0?true:false;
if($is_girl){
    echo 'this is a girl';

    $class1=new Class1();
}else{
    echo 'not a girl friend';

    $class2=new Class2();
}