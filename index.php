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

$params = array(
	'username' => $USERNAME,
	'password' => $PASSWORD,
	'project_id' => $PROJECT_ID,
);

$get_user_accessible = array (
	'username' => $USERNAME,
	'password' => $PASSWORD,
);

$client = new nusoap_client($WSDL_POINT, false);
$categories = $client->call('mc_project_get_categories', $params, $WSDL_POINT, 'http://soap.amazon.com'); // Получаем доступные в проекте категории
$projectlist = $client->call('mc_projects_get_user_accessible', $get_user_accessible, $WSDL_POINT, 'http://soap.amazon.com'); // Получаем список проектов, в которые можно репортить

echo '<h2>'. SELECTEDPROJECT .'</h2>';

echo "<pre>";
foreach ($projectlist as $list => $project) {
	echo $project.'<br>';
}
echo '<hr>';
foreach ($categories as $cat => $category) {
	echo $category.'<br>';
}

echo "</pre>";


include_once('footer.php');

?>
