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

//echo '<h2>'. FILLTHEFORM .'</h2>';

echo '
<div class="container-sm border shadow p-4">
<h3>'. FILLTHEFORM .'</h3>
<hr>
	<form>
		<div class="row">
			<div class="col">
				<label for="FormControlSelect1"><b>Выберите проект</b><p class="text-muted">(К какому продукту относится запрос)</p> </label>
				<select class="form-control" id="FormControlSelect1">
';

foreach ($projectlist as $list => $project) {
	echo '<option>'.$project["id"].' - '.$project["name"].'</option>';
}

echo '
				</select>
			</div>
			<div class="col">
				<label for="FormControlSelect2"><b>Выберите Категорию запроса</b><p class="text-muted">(К какому типу относится запрос)</p></label>
				<select class="form-control" id="FormControlSelect2">
';
foreach ($categories as $cat => $category) {
	echo '<option>'.$category.'</option>';
}

echo '
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col">
    		<label for="FormControlTextarea1">Описание</label>
    		<textarea class="form-control" id="FormControlTextarea1" rows="6"></textarea>
  		</div>
		</div>
	</form>
</div>
';

//echo var_dump($project);

include_once('footer.php');

?>
