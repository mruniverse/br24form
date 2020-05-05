<?php
require 'vendor/autoload.php';
require 'init.php';

$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

$app->get('/', function () {
    $Home = new \App\controllers\HomeController();
    $Home->index();
});

$app->run();