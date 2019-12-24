<?php
/**
* Страница-обработчик
*
* @author Intervision (https://github.com/intervisionlord)
* Copyright © 2019 Intervision
*/
require_once('./core/core.php');
include_once('header.php');
require_once('./inc/nusoap/0.9.7/nusoap.php');

$response = $_POST["g-recaptcha-response"];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
  'secret' => $CAPTCHA_SECRET,
  'response' => $_POST["g-recaptcha-response"]
);
$options = array(
  'http' => array (
    'method' => 'POST',
    'header' => 'Content-Type: application/x-www-form-urlencoded\r\n',
    'content' => http_build_query($data)
  )
);
$context  = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
$captcha_success=json_decode($verify);
if ($captcha_success->success==false) {
  echo "<p>You are a bot! Go away!</p>";
} else if ($captcha_success->success==true) {

  echo "<p>You are not a bot!</p>";
  $ISSUE_PROJECT = (int)$_POST['SelectProject'];
  $ISSUE_CATEGORY = $_POST['SelectCategory'];
  $ISSUE_TITLE = $_POST['Title'];
  $ISSUE_DESCR = $_POST['Description'];
  $ISSUE_EMAIL = $_POST['email'];

  /*  $ISSUE_ARRAY = array (
      'project' => array (
        'id' => $ISSUE_PROJECT
      ),
      'category' => $ISSUE_CATEGORY,
      'summary' => $ISSUE_TITLE,
      'description' => $ISSUE_DESCR,
    );*/

      $ISSUE_ARRAY = array (
        'project' => array (
          'id' => $ISSUE_PROJECT
        ),
        //'category' => $ISSUE_CATEGORY,
        'reporter' => array (
          'id' => '2',
        ),
        'summary' => $ISSUE_TITLE,
        'description' => $ISSUE_DESCR,
      );

    $mc_issue_add = array (
        'username' => $USERNAME,
        'password' => $PASSWORD,
        'issue' => $ISSUE_ARRAY,
    );
    $client = new nusoap_client($WSDL_POINT, false);
    $new_issue = $client->call('mc_issue_add', $mc_issue_add, $WSDL_POINT);

  /*  if ($client->fault) {
        echo '<p><b>Сбой: ';
        print_r($new_issue);
        echo '</b></p>';
    } else {
        // Проверяем, возникла ли ошибка
        $err = $client->getError();
        if ($err) {
            // Отображаем ошибку
            echo '<p><b>Ошибка: ' . $err . '</b></p>';
        } else {
            // Отображаем результат
            print_r($new_issue);
        }
    } */

    print_r($new_issue);
    var_dump((int)$new_issue);
/*    echo '<br>PROJECT '.$ISSUE_PROJECT.'<br>
    CATEGORY ',$ISSUE_CATEGORY.'<br>
    TITLE ',$ISSUE_TITLE.'<br>
    DESCR ',$ISSUE_DESCR.'<br>
    EMAIL ',$ISSUE_EMAIL.'<br>';
*/
    var_dump($ISSUE_PROJECT);
    echo '<br>';
    var_dump($ISSUE_CATEGORY);
}

include_once('footer.php');
