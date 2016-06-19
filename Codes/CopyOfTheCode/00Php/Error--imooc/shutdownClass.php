<?php
class Shutdown{
    public function endScript(){
        if(error_get_last()){
            print_r(error_get_last());
        }
        file_put_contents('H:\ERROR\notice.log','this
        is the end script 0521');
        die('end end rain');
    }
}

register_shutdown_function(array(new Shutdown(),'endScript'));
echo md6();