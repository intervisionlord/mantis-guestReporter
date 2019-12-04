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
$categories = $client->call('mc_project_get_categories', $params, $WSDL_POINT); // Получаем доступные в проекте категории
$projectlist = $client->call('mc_projects_get_user_accessible', $get_user_accessible, $WSDL_POINT); // Получаем список проектов, в которые можно репортить

//echo '<h2>'. FILLTHEFORM .'</h2>';

echo '
<div class="container-sm border shadow p-4">
<h3>'. FILLTHEFORM .'</h3>
<hr>
	<form id="bugreport" method="POST" action="report.php">
		<div class="row p-2">
			<div class="col">
				<label for="FormControlSelect1"><span class="text-danger">* </span><b>Выберите проект</b><span class="text-muted"> (К какому продукту относится запрос)</span> </label>
				<select class="form-control" id="FormControlSelect1" name="SelectProject">
';

foreach ($projectlist as $list => $project) {
	echo '<option value="'.$project["id"].'">'.$project["name"].'</option>';
}

echo '
				</select>
			</div>
			<div class="col">
				<label for="FormControlSelect2"><span class="text-danger">* </span><b>Выберите Категорию запроса</b><span class="text-muted"> (К какому типу относится запрос)</span></label>
				<select class="form-control" id="FormControlSelect2" name="SelectCategory">
';
foreach ($categories as $cat => $category) {
	echo '<option value="'.$category.'">'.$category.'</option>';
}

echo '
				</select>
			</div>
		</div>

		<div class="row p-2">
			<div class="col">
				<label><span class="text-danger">* </span><b>Заголовок</b><span class="text-muted"> (Краткое описание запроса)</span></label>
				<input class="form-control" type="text" placeholder="" name="Title">
			</div>
			<div class="col">
				<label><b>e-mail</b><span class="text-muted"> (Если потребуется связаться с Вами)</span></label>
				<input class="form-control" type="email" placeholder="mail@example.com" name="email">
			</div>
		</div>

		<div class="row p-2">
			<div class="col">
    		<label for="FormControlTextarea1"><span class="text-danger">* </span><b>Описание</b><span class="text-muted"> (Полное описание запроса)</span></label>
    		<textarea class="form-control" id="FormControlTextarea1" rows="6" name="Description"></textarea>
  		</div>
		</div>
		<div class="row p-2">
			<div class="col mr-auto">
				<span class="text-danger">* </span> - Поля, обязательные для заполнения.
			</div>
			<div class="col-auto">
				<div class="g-recaptcha" data-sitekey="6Le-D8YUAAAAAAzZMOS1qxgAuaQb5FCSuhTH1M-l"></div>

				<script>
					document.getElementById("bugreport").onsubmit = function () {
    				if (!grecaptcha.getResponse()) {
         			alert("Вы не заполнили поле Я не робот!");
         			return false; // возвращаем false и предотвращаем отправку формы
    				}
					}
				</script>

			</div>
			<div class="col-auto">
				<button type="submit" class="btn btn-success">Отправить</button>
			</div>
		</div>
	</form>
</div>
';

//echo var_dump($categories);

include_once('footer.php');

?>
