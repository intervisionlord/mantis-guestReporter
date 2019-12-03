<?php
/**
* Основной файл программы
*
* @author Intervision (https://github.com/intervisionlord)
* Copyright © 2019 Intervision
*/

require_once('./core/core.php');
include_once('header.php');


require_once('./inc/nusoap/0.9.7/nusoap.php');

$WSDL_POINT = "https://itsm.twr.su/api/soap/mantisconnect.php";
$issue_id = 80;

$params = array(
	'username' => $USERNAME,
	'password' => $PASSWORD,
	'issue_id' => $issue_id
);
$client = new nusoap_client($WSDL_POINT, false);
$result = $client->call('mc_issue_get', $params, 'https://itsm.twr.su/api/soap/mantisconnect.php', 'http://soap.amazon.com');

echo "<pre>";
print_r ($result);
echo "</pre>";


include_once('footer.php');

?>
