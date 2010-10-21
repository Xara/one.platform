<?php

class One_Core_ErrorController
    extends One_Core_ControllerAbstract
{
    public function errorAction()
    {
        $errors = $this->_getParam('error_handler');        $exception = $errors->exception;

        switch ($errors->type) {
        case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE:
        case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
        case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
            $this->_forward('not-found');            break;
        default:
            $this->getResponse()->setRawHeader('HTTP/1.1 500 Internal Server Error');
            $logger = new Zend_Log(new Zend_Log_Writer_Stream(
                APPLICATION_PATH . DS . 'var' . DS . 'log' . DS . 'exception.log'
                ));
            $message = $exception->getMessage() . PHP_EOL . $exception->getTraceAsString();
            $logger->debug($message);
            break;
        }
    }

    public function notFoundAction()
    {
        $errors = $this->_getParam('error_handler');
        $this->view->message = $errors->exception->getMessage();
        $this->getResponse()->setRawHeader('HTTP/1.1 404 Not Found');
    }
}