<?php
// diretório base da aplicação
define('BASE_PATH', __DIR__);

// configurações do PHP
ini_set('display_errors', true);
error_reporting(E_ALL);

//CRest app install
require_once ('crest/src/crest.php');
CRest::installApp(true);

