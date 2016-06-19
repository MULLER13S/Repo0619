<?php
class MyErrorHandler{
    public $message='';
    public $filename='';
    public $line=0;
    public $vars=array();
    protected $_noticeLog='H:\ERROR\notice.log';
    public function __construct($message,$filename,$line,$vars){
        $this->message=$message;
        $this->filename=$filename;
        $this->line=$line;
        $this->vars=$vars;
    }

    public static function deal($errno,$errmsg,$filename,$line,$vars){
        $self=new self($errmsg,$filename,$line,$vars);
        switch($errno){
            case E_USER_ERROR:
                return $self->dealError();
                break;
            case E_USER_WARNING:
            case E_WARNING:
                return $self->dealWarning();
            break;
            case E_NOTICE:
            case E_USER_NOTICE:
                return $self->dealNotice();
            break;
            default:
                return false;

        }
    }

    public function dealError(){
        ob_start();
        debug_print_backtrace();
        $backtrace=ob_get_flush();
        $errorMsg=<<<EOF
出现了致命错误，如下：
产生错误的文件：{$this->filename}
产生错误的信息：{$this->message}
产生错误的行号：{$this->line}
跟踪信息：{$backtrace}

EOF;
    error_log($errorMsg,1,'291526394@qq.com');
        exit(1);
    }

    public function dealWarning(){
        /*ob_start();
        debug_print_backtrace();
        $backtrace=ob_get_flush();*/
        $errorMsg=<<<EOF
出现了致命错误，如下：
产生警告的文件：{$this->filename}
产生警告的信息：{$this->message}
产生错误的行号：{$this->line}

EOF;
    error_log($errorMsg,1,'291526394@qq.com');
    }

    public function dealNotice(){

        $errorMsg=<<<EOF
出现了致命错误，如下：
产生通知的文件：{$this->filename}
产生通知的信息：{$this->message}
产生错误的行号：{$this->line}

EOF;
    error_log($errorMsg,3,'H:\ERROR\errmsg.txt');
    }



}