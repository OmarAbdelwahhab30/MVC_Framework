<?php
namespace PHPMVC\lib;

use PHPMVC\controllers\IndexController;
use PHPMVC\models\SignInModel;

class AbstractController
{

    public function Model($modelname)
    {
        require_once APP_PATH.DS."MODELS".DS.$modelname.".php";
        $modelname = "PHPMVC\MODELS\\" . $modelname;
        return new $modelname();
    }

    public function Route($view,$data= array(),$data2 = array(),$data3 = array()){
        if (file_exists(VIEW_PATH.DS.$view.".php")){
            require_once VIEW_PATH.DS.$view.".php";
        }else {
            require_once APP_PATH.DS."view".DS."notfound".DS."notfound.php";
        }
    }

    //Check If user is logged ...
    public function isLoggedIn() {
        if (isset($_SESSION['userid'])) {
            return true;
        } else {
            return false;
        }
    }

    //check if is admin

    public function isAdmin()
    {
        if (isset($_SESSION['roles'])){
            if ($_SESSION['roles'] == 1 ){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

    public function IsUserActivated()
    {
        if (isset($_SESSION['regstatus'])&& isset($_SESSION['roles'])){
            if ( $_SESSION['roles'] == "0"){
                if ($_SESSION['regstatus'] == "0") {
                    return false;
                }else{
                    return true;
                }
            }else{
                return true;
            }
        }
        return false;
    }
}
