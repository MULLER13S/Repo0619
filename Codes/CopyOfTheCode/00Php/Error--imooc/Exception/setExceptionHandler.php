<?php
function exceptionHandler($e){
    echo "self defined process111";
    echo "exception1::",$e->getMessage();
}

function exceptionHandler2($e){
    echo "self defined process2222";
    echo "exception22::",$e->getMessage();
}

set_exception_handler('exceptionHandler');
set_exception_handler('exceptionHandler2');

//恢复到上一个异常处理器；
restore_exception_handler();
throw new Exception('test');