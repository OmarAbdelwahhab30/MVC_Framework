<?php

namespace PHPMVC\lib;

class FrontController
{

    protected $_controller = "IndexController";
    protected $_action = "default";
    protected $_params = array();

    public function __construct()
    {
        $this->_parseUrl();
        $this->dispatch();
    }

    private function _parseUrl()
    {
        $url = explode("/", trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/"), 3);
        if (isset($url[0]) && $url[0] != "") {
            $this->_controller = $url[0];
        }
        if (isset($url[1]) && $url[1] != "") {
            $this->_action = $url[1];
        }
        if (isset($url[2]) && $url[2] != "") {
            $this->_params = explode("/", $url[2]);
        }
    }


    public function dispatch()
    {
        if (file_exists(APP_PATH.DS."controllers".DS.ucwords($this->_controller).".php")){
            require_once APP_PATH.DS."controllers".DS.ucwords($this->_controller).".php" ;
        }else {
            $this->_controller = "Notfound";
        }

        $controllerclassname = "PHPMVC\CONTROLLERS\\".ucwords($this->_controller);
        $obj = new $controllerclassname;
        $actionname = $this->_action ;
        if (!method_exists($obj,$this->_action)){
            $this->_action = $actionname = "notfound";
        }
        call_user_func_array(array($obj, $actionname), $this->_params);
    }
}