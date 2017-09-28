<?php

use Exchangify\core\router\RouterService;
use Exchangify\core\users\UsersController;

require __DIR__ . '/vendor/autoload.php';

$router = new RouterService(array_values(array_filter(explode('/', $_SERVER['REQUEST_URI']))), $_SERVER['REQUEST_METHOD']);

$router->subscribe('users', 'GET', UsersController::class);

$router->notify();