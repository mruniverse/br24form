<?php
require_once('crest/src/crest.php');
require 'vendor/autoload.php';
require 'init.php';

$app = new \Slim\App();

$app->map(['GET','POST'],'/', function () {
    $Home = new \App\controllers\HomeController();
    $Home->index();
});

// adição de usuário
// exibe o formulário de cadastro
$app->get('/register', function () {
    $Register = new \App\controllers\RegisterController();
    $Register->create();
});

// processa o formulário de cadastro
$app->post('/register', function () {
    $Register = new \App\controllers\RegisterController();
    $Register->store();
});


// edição de usuário
// exibe o formulário de edição
$app->get('/edit/{id}', function ($request) {
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $UsersController = new \App\Controllers\UsersController;
    $UsersController->edit($id);
});

// processa o formulário de edição
$app->post('/edit', function () {
    $UsersController = new \App\Controllers\UsersController;
    $UsersController->update();
});

// remove um usuário
$app->get('/remove/{id}', function ($request) {
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $UsersController = new \App\Controllers\UsersController;
    $UsersController->remove($id);
});

$app->run();