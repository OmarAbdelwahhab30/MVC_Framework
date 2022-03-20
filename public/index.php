<?php
namespace PHPMVC;
session_start();
require_once "../app/En.php";
require_once realpath("../vendor/autoload.php");
use PHPMVC\LIB\FrontController;

require_once "../app/config.php";


$front = new FrontController();
