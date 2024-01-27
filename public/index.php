<?php

use Medilies\AiesecPhpIntro\Router;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$router = new Router;

echo $router->handleRequest();
