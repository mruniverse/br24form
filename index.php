<?php
require 'vendor/autoload.php';
require 'init.php';

//App Initializer
$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

//Setting all the routes =============================================================================
$app->map(['GET','POST'],'/install', function () {
    $Home = new \Controllers\HomeController();
    $Home->install();
});

//É o caminho padrão, a maioria das requisições que precisam de alguma validação, entra aqui =========================
$app->map(['GET','POST'],'/', function () {
    $Home = new \Controllers\HomeController();
    $Home->index();
});


// exibe o formulário de cadastro
$app->get('/register', function () {
    $Register = new \Controllers\RegisterController();
    $Register->create();
});

// processa o formulário de cadastro
$app->post('/register', function () {
    $Register = new \Controllers\RegisterController();
    $Register->store();
});


// edição do contato
// exibe o formulário de edição
$app->get('/contact/edit/{id}', function ($request) {
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $Update = new \Controllers\UpdateController();
    $Update->contactEdit($id);
});

// edição da compania
// exibe o formulário de edição
$app->get('/company/edit/{id}', function ($request) {
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $Update = new \Controllers\UpdateController();
    $Update->companyEdit($id);
});

// processa o formulário de edição
$app->post('/contact/update', function () {
    $Update = new \Controllers\UpdateController();
    $Update->updateContact();
});

// processa o formulário de edição
$app->post('/company/update', function () {
    $Update = new \Controllers\UpdateController();
    $Update->updateCompany();
});

// remove um contato
$app->get('/contact/remove/{id}', function ($request) {
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $Home = new \Controllers\HomeController();
    $Home->contactRemove($id);
});

// remove uma compania
$app->get('/company/remove/{id}', function ($request) {
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $Home = new \Controllers\HomeController();
    $Home->companyRemove($id);
});


//Run App
$app->run();