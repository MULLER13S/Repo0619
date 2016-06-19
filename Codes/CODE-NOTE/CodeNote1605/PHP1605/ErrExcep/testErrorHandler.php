<?php
require_once 'errorHandlerClass.php';
error_reporting(-1);
set_error_handler(array('MyErrorHandler','deal'));
echo $test;
settype($var,'king');
//test();
trigger_error('i am  hand',E_USER_ERROR);