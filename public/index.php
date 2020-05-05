<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Test</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php
        require_once '../app/autoload.php';
        require_once 'crest/src/crest.php';

        use app\core\App;
        use app\core\Controller;

        CRest::installApp(true);
        $result = CRest::call('user.current');
        $name = array_column($result, 'NAME');
        $_SESSION['name'] = $name[0];

        $app = new App();
    ?>
    <!--<script src="/assets/js/jquery.slim.min.js"></script>-->
    <!--<script src="/assets/js/bootstrap.min.js"></script>-->
</body>
</html>
