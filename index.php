<?php use Exchangify\core\router\RouterService;

require __DIR__ . '/vendor/autoload.php';

RouterService::invoke(array_values(array_filter(explode('/', $_SERVER['REQUEST_URI']))), $_SERVER['REQUEST_METHOD']);