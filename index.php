<?php
require_once "crest/src/crest.php";
require_once "Views/layouts/header.php";
CRest::installApp(true);
$result = CRest::call('user.current');
$name = array_column($result, 'NAME');
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta http-equiv="Content-Language" content="en-us">
    <link rel="stylesheet" href="Views/css/style.css"/>
    <link rel="stylesheet" href="Views/css/bitrix24-guide-style.css"/>
    <meta name="GENERATOR" content="Microsoft FrontPage 4.0">
    <meta name="ProgId" content="FrontPage.Editor.Document">

    <title>Br24 Form</title>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="bx-tabs-wrap">
        <span class="bx-tab" href="Views/home.blade.php">Home</span>
        <span class="bx-tab bx-tab-active" href="Views/auth/login.blade.php">Login</span>
        <span class="bx-tab" href="Views/auth/register.php">Register</span>
        <div class="bx-tabs-line"></div>
    </div>

    <div class="content">
        <div class="title m-b-md">
            Bem-vindo <?=$name[0]?>!
        </div>
    </div>
<?php require_once "Views/layouts/footer.php"; ?>