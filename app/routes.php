<?php

use Medilies\AiesecPhpIntro\Controllers\AuthController;
use Medilies\AiesecPhpIntro\Controllers\HomeController;
use Medilies\AiesecPhpIntro\Controllers\LandingController;

return [
    'GET:/' => [
        'action' => [LandingController::class, 'handle'],
    ],
    'GET:/home' => [
        'action' => [HomeController::class, 'handle'],
    ],
    'GET:/register' => [
        'action' => [AuthController::class, 'registerPage'],
    ],
    'POST:/register' => [
        'action' => [AuthController::class, 'register'],
    ],
    'GET:/login' => [
        'action' => [AuthController::class, 'loginPage'],
    ],
    'POST:/login' => [
        'action' => [AuthController::class, 'login'],
    ],
    'POST:/logout' => [
        'action' => [AuthController::class, 'logout'],
    ],
];
