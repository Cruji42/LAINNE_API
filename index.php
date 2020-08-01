<?php

use Controller\UserController;
include_once 'utils/UserController.php';

use PController\ProductController;
include_once 'utils/ProductController.php';

include_once 'utils/headers.php';

//get the name of the archive clean
//we init the string without the ip
$uri = explode("/", substr(@$_SERVER['PHP_SELF'],1));
$URL = rtrim($uri[2],'.php');


switch ($URL){
    case 'USER':
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$userId = $request-> id;
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $controller = new UserController();
        $controller->processRequest($requestMethod, $userId);
        break;

    case 'PRODUCT':
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$productId = $request-> id;
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $controller = new ProductController();
        $controller->processRequest($requestMethod, $productId);
        break;

};