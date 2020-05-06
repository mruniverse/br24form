<?php
require 'vendor/autoload.php';
require 'init.php';
include_once BASE_PATH."/app/crest/src/crest.php";

CRest::installApp(true);
$result = CRest::call('user.current');
$name = array_column($result, 'NAME');
?>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title-guide">
                Bem-vindo <?= $name[0] ?>!
            </div>
        </div>
    </div>
<?php //require_once "app/views/includes/header.php" ?>