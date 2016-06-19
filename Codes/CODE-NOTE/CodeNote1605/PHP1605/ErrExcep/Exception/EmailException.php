<?php
require_once 'ExceptionObserver.php';
class EmailObserver implements ExceptionObserver
{
    protected $_email = '291526394@qq.com';

    public function __construct($email = null)
    {
        if ($email !== null && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->_email = $email;
        }
    }

    public function update(ObserverException $e)
    {
        $message = "time:" . date('H:i:s');
        $message .= "info:" . $e->getMessage();
        $message .= "TRACE:" . $e->getTraceAsString();
        $message .= "FILE:" . $e->getFile();
        $message .= "LINE:" . $e->getLine();

        error_log($message, 1, $this->_email);


    }
}