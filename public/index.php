<?php

error_reporting(1);
ini_set('display_errors', 1);
require_once("model/core/autoload.php");

global $__autoloader,$__enviroment,$__request,$__controller,$__user;

$__autoloader=new model_core_autoload();

$__enviroment=new model_core_enviroment();
$__enviroment->init();
$__enviroment->setDebugMode(model_core_enviroment::E_ALL);
$__controller=$__enviroment->loadController();
$__controller->run();
$__controller->view->render();
