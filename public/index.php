<?php

use App\Router;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

require_once '../vendor/autoload.php';

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

$get = $_GET;
if (isset($get['page']) && $get['page'] === '1') {
    $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
    unset($get['page']);
    $query = http_build_query($get);
    if (!empty($query)) {
        $uri .= '?' . $query;
    }
    header('Location: ' . $uri);
    http_response_code(301);
    exit();
}

define('DEBUG_TIME', microtime(true));

$router = new Router(dirname(__DIR__) . '/views');
$router
    ->get('/', 'post/index', 'home')
    ->get('/category', 'category/show', 'category')
    ->get('/blog/[*:slug]-[i:id]', 'post/show', 'post')
    ->run();