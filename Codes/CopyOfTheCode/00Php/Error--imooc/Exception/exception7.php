<?php
function exceptionErrorHandler($errno,$errstr,$errfile,$errline){
    throw new ErrorException($errstr,0,$errno,$errfile,$errline);
}

set_error_handler('exceptionErrorHandler');

try{
    echo gettype();
}catch (Exception $e){
    echo $e->getMessage();
}