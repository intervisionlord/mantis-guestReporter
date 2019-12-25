<?php
/**
* Страница-обработчик
*
* @author Intervision (https://github.com/intervisionlord)
* Copyright © 2019 Intervision
*/
require_once('./core/core.php');
include_once('header.php');

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
  echo '<div class="p-3 mb-2 bg-danger text-white">'. LANG_CAPTCHA_NOTPASSED .'</div>';
} else if ($captcha_success->success==true) {

if (empty($_POST['SelectProject']) or empty($_POST['SelectCategory']) or empty($_POST['Title']) or empty($_POST['Description'])) {
  echo '<div class="p-3 mb-2 bg-danger text-white"><b>'. LANG_REQFLD_EMPTY .'</b><br>'.
  LANG_REQFLD_DSCR .'</div>';
  exit;
}

  $ISSUE_PROJECT = (int)$_POST['SelectProject'];
  $ISSUE_CATEGORY = $_POST['SelectCategory'];
  $ISSUE_TITLE = $_POST['Title'];
  $ISSUE_DESCR = $_POST['Description'];

if (isset($_POST['email']) && ($_POST['email'] != '')) {
  $ISSUE_EMAIL = $_POST['email'];

  $create_issue = array(
  'project' => array (
    'id' => $ISSUE_PROJECT),
  'summary' => $ISSUE_TITLE,
  'description' => $ISSUE_DESCR ."\r\n". LANG_REPORTER_EMAIL .': '. $ISSUE_EMAIL,
  'category' => $ISSUE_CATEGORY,
  'reporter' => array (
    'id' => $USERID,
    ),
  );
} else {
  $ISSUE_EMAIL = LANG_REPORTER_EMAIL_NOTDEFINED;

  $create_issue = array(
  'project' => array (
    'id' => $ISSUE_PROJECT),
  'summary' => $ISSUE_TITLE,
  'description' => $ISSUE_DESCR,
  'category' => $ISSUE_CATEGORY,
  'reporter' => array (
    'id' => $USERID,
    ),
  );
}

$mantis = new soapclient($WSDL_POINT);

try {
    $new_issue = $mantis->mc_issue_add($USERNAME, $PASSWORD, $create_issue);
} catch(SoapFault $e) {
    exit(1);
}
    echo '<div class="p-3 mb-2 bg-success text-white">'. LANG_ISSUE_CREATED .' <b>'. $new_issue .'</b></div>';
    echo '<h2>'. LANG_ISSUE_DETAILS .'</h2><hr>
    <b>'. LANG_ISSUE_TITLE .':</b> '. $ISSUE_TITLE .'<br>
    <b>'. LANG_ISSUE_CATEGORY .':</b> '. $ISSUE_CATEGORY .'<br>
    <b>'. LANG_ISSUE_DESCRIPTION .':</b> '. $ISSUE_DESCR .'<br>
    <b>'. LANG_REPORTER_EMAIL .':</b> '. $ISSUE_EMAIL;
}

include_once('footer.php');
