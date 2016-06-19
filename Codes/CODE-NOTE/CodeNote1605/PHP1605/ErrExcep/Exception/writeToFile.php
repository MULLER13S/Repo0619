<?php
class FileException extends Exception{
    public function getDetails(){
        switch($this->code){
            case 0:
                return 'not apply';
            break;
            case 1:
                return 'not exists';
            break;
            case 2:
                return 'not a  file';
            break;
            case 3:
                return 'not  written';
            break;
            case 4:
                return 'illegal file model';
            break;
            case 5:
                return 'data error';
            break;
            case 6:
                return 'cant be';
            break;
            default:
                return 'default';
            break;
        }
    }
}

class writeData{
    private $_message='';
    private $_fp;
    public  function __construct($filename=null,$model='w'){
        $this->_message="filename:::{$filename}  :::{$model}";
        if(empty($filename)){
            throw new FileException($this->_message,0);
        }
        if(!file_exists($filename)){
            throw new FileException($this->_message,1);
        }
        if(!is_file($filename)){
            throw new FileException($this->_message,2);
        }
        if(!is_writable($filename)){
            throw new FileException($this->_message,3);
        }if(!in_array($model,array('w','w+','a','r'))){
            throw new FileException($this->_message,4);
        }
        $this->_fp=fopen($filename,$model);




    }


    public function write($data){
        if(@!fwrite($this->_fp,$data.PHP_EOL)){
            throw new FileException($this->_message,5);
        }
    }

    public function  close(){
        if($this->_fp){
            if(@!fclose($this->_fp)){
                throw new FileException($this->_message,6);

            }
            $this->_fp=null;
        }

    }

    public function __destruct(){
        $this->close();
    }




}


try{
    $fp=new writeData('test.txt','w');
    $fp->write('this is raining');
    $fp->close();
    echo "written success<hr/>";
}catch (FileException $e){
    echo "error exist".$e->getDetails()."simple".$e->getMessage();

}