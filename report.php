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
  'secret' => '6Le-D8YUAAAAAHaNyXfsBpru2hUZ6xiUtzQsfCoT',
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
  echo "<p>You are not not a bot!</p>";
}

include_once('footer.php');
