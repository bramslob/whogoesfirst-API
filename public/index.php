<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App;

require_once(__DIR__ . '/../app/Routes.php');

$app->run();