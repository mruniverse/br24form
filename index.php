<?php
require_once('crest/src/crest.php');
    CRest::installApp(true);
    $result = CRest::call('user.current');
    $name = array_column($result, 'NAME');
    echo $name[0];
