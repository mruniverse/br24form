<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'crest.php';

echo '<pre>';
print_r(CRest::call(
   'crm.lead.add',
   [
      'fields' =>[
      'TITLE' => 'alah msdab',//Title*[string]
      'NAME' => 'Doidera toppers',//Name[string]
      'LAST_NAME' => 'Eta nois',//Last name[string]
      ]
   ])
);

echo '</pre>';

$result = CRest::call('crm.lead.list', "*");

echo '<pre>';
	print_r($result);
echo '</pre>';
