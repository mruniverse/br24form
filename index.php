<?
    $auth = $_REQUEST['AUTH_ID'];
    $domain = ($_REQUEST['PROTOCOL'] == 0 ? 'http' : 'https') . '://' . $_REQUEST['DOMAIN'];

    $res = file_get_contents($domain . '/rest/user.current.json?auth=' . $auth);
    $arRes = json_decode($res, true);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <script type="text/javascript" src="//api.bitrix24.com/api/v1/"></script>
    </head>
    <body>
        Bitrix24 has told the server that your name is <?= htmlspecialchars($arRes['result']['NAME']) ?>. <a
                href="javascript:void(0)" onclick="clientCheck();">Check?</a>
        <a href="Views/welcome.php">BEGIN</a>
    </body>
</html>
<script>
    function clientCheck() {
        BX24.callMethod('user.current', {}, function (r) {
            alert('Bitrix24 has told the browser that your name is' + r.data().NAME + ' :-)');
        });
    }
</script>