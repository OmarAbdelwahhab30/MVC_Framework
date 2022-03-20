<?php

namespace PHPMVC\APP;


defined('DB_HOST_NAME')       ? null : define ('DB_HOST_NAME', 'localhost');
defined('DB_USER_NAME')       ? null : define ('DB_USER_NAME', 'root');
defined('DB_PASSWORD')        ? null : define ('DB_PASSWORD', '');
defined('DB_NAME')            ? null : define ('DB_NAME', 'e-store');
defined('DB_PORT_NUMBER')     ? null : define ('DB_PORT_NUMBER', 3306);


define("URLROOT","http://e-store/");
define("SITENAME","e-store") ;
define("DS", DIRECTORY_SEPARATOR);
define("APP_PATH",realpath(dirname(__FILE__)));
define("VIEW_PATH" , realpath(dirname(__FILE__).DS."view"));
define("LIB_PATH" , realpath(dirname(__FILE__).DS."lib"));
define("INCLUDES_USER_PATH" , realpath(dirname(__FILE__).DS."view".DS."includes"));
define("INCLUDES_ADMIN_PATH" , realpath(dirname(__FILE__).DS."view".DS."AdminDashboard".DS."includes"));
define("INCLUDES_PATH" , realpath(dirname(__FILE__).DS."view".DS."includes"));
define("ITEMS_IMAGES_PATH","assets/img/ItemsImages/");
define("Users_Images_PATH","assets/img/UsersImages/");
define("STATIC_IMAGE" , "img_avatar.png");


