<?php

session_start();


require "config/autoload.php";

$newTokenManger = new CSRFTokenManager();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = $newTokenManger->generateCSRFToken();
}

var_dump($_SESSION['email']);
var_dump($_SESSION['id']);
$newOrderManager = new OrderManager();
$products = $newOrderManager->showList($_SESSION['id']);
var_dump($products);
$router = new Router();

$router->handleRequest($_GET);
