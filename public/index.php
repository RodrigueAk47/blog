<?php

require_once '../vendor/autoload.php';


$router = new AltoRouter();

try {
    $router->map('GET', '/', function () {
        require dirname(__DIR__) . '/views/post/index.php';
    });
} catch (Exception $e) {
}

$match = $router->match();
$match['target']();