<?php
define('BASE_BATH', '/26_mvc_4/project/');

require_once __DIR__ . "/config/config.php";
require_once __DIR__ . "/vendor/Mysqlidb/MysqliDb.php";
require_once __DIR__ . "/app/controllers/UserController.php" ;
$config = require "config/config.php";
$db = new MysqliDb($config);
$controller = new UserController($db);

// echo '<pre>';
// print_r($_SERVER);
$request = $_SERVER["REQUEST_URI"];
switch ($request):
    case BASE_BATH:
        $controller->home();
        break;
    case BASE_BATH . "user/add":
        $controller->add();
        break;
    case BASE_BATH . "user/edit?id=" . $_GET["id"]:
        $controller->edit($_GET["id"]);
        break;
    case BASE_BATH . "user/delete?id=" . $_GET["id"]:
        $controller->delete($_GET["id"]);
        break;
endswitch;
