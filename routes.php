<?php

use Admin\Mvcoop\Controllers\Admin\AuthenticateController;
use Admin\Mvcoop\Controllers\Admin\CategoryController;
use Admin\Mvcoop\Controllers\Admin\DashboardController;
use Admin\Mvcoop\Controllers\Admin\PostController;
use Admin\Mvcoop\Controllers\Admin\UserController;
use Bramus\Router\Router;
use Admin\Mvcoop\Controllers\Client\HomeController;

// Create Router instance
$router = new Router();

$router->get('/', HomeController::class . '@index');

$router->match('GET|POST', '/auth/login', AuthenticateController::class . '@login');

$router->mount('/admin', function () use ($router) {
    $router->get('/', DashboardController::class . '@index');
    $router->get('/logout', AuthenticateController::class . '@logout');

    $router->mount('/users', function () use ($router) {
        $router->get('/', UserController::class . '@index');
        $router->get('/{id}/show', UserController::class . '@show');
        $router->get('/{id}/delete', UserController::class . '@delete');
        $router->match('GET|POST', '/{id}/update', UserController::class . '@update');
        $router->match('GET|POST', '/create', UserController::class . '@create');
    });

    $router->mount('/categories', function () use ($router) {
        $router->get('/', CategoryController::class . '@index');
        $router->get('/{id}/delete', CategoryController::class . '@delete');
        $router->match('GET|POST', '/{id}/update', CategoryController::class . '@update');
        $router->match('GET|POST', '/create', CategoryController::class . '@create');
    });
    
    $router->mount('/posts', function () use ($router){
        $router->get('/',                           PostController::class . '@index');
        $router->get('/{id}/show',                  PostController::class . '@show');
        $router->get('/{id}/delete',                PostController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  PostController::class . '@update');
        $router->match('GET|POST', '/create',       PostController::class . '@create');
    });
});

$router->before('GET|POST', '/admin/*', function () {
    if (!isset($_SESSION['user'])) {
        header('Location: /auth/login');
        exit();
    }
});
$router->before('GET|POST', '/admin/.*', function () {
    if (!isset($_SESSION['user'])) {
        header('Location: /auth/login');
        exit();
    }
});
// Run it!
$router->run();