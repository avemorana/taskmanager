<?php
/**
 * Created by PhpStorm.
 * User: Anastasia Shurkina
 * Date: 16.12.2016
 * Time: 18:11
 */
//FRONT CONTROLLER

//настройки, ошибки записываются, но не видны пользователям
ini_set('display_errors', 1);
error_reporting(E_ALL);


//определение путей
define('ROOT', dirname(__FILE__));
require_once ROOT."/components/Router.php";


//создание копии класса Роутер и вызов его метода ран
$router = new Router();
$router->run();
