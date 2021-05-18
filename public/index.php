<?php

use App\Router;

require_once '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

define('DEBUG_TIME', microtime(true));

$router = new Router(dirname(__DIR__) . '/views');
$router
    ->get('/', 'post/index', 'blog')
    ->get('/category', 'category/show', 'category')
    ->run();