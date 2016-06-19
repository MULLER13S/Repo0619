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
�����������������£�
����������ļ���{$this->filename}
�����������Ϣ��{$this->message}
����������кţ�{$this->line}
������Ϣ��{$backtrace}

EOF;
    error_log($errorMsg,1,'291526394@qq.com');
        exit(1);
    }

    public function dealWarning(){
        /*ob_start();
        debug_print_backtrace();
        $backtrace=ob_get_flush();*/
        $errorMsg=<<<EOF
�����������������£�
����������ļ���{$this->filename}
�����������Ϣ��{$this->message}
����������кţ�{$this->line}

EOF;
    error_log($errorMsg,1,'291526394@qq.com');
    }

    public function dealNotice(){

        $errorMsg=<<<EOF
�����������������£�
����֪ͨ���ļ���{$this->filename}
����֪ͨ����Ϣ��{$this->message}
����������кţ�{$this->line}

EOF;
    error_log($errorMsg,3,'H:\ERROR\errmsg.txt');
    }



}