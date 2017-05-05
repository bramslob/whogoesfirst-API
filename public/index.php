<?php

require __DIR__ . '/../vendor/autoload.php';


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app = new \Slim\App;

require_once(__DIR__ . '/../app/Routes/Api.php');

$app->run();