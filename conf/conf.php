<?php
/**
* Файл настроек авторизации
*
* @author Intervision (https://github.com/intervisionlord)
* Copyright © 2019 Intervision
*/

define('MAIN_TITLE', 'Mantis Reporter'); // Sitename

$FORCE_LOCALE = "0"; // Используется название локали (например ru_RU). По умолчанию "0"

$USERNAME = ""; // Mantis Username
$PASSWORD = ""; // Mantis Password
$MANTISURL = ""; // Mantis URL (for main page link)
$USERID = ''; // UserID in Mantis

$WSDL_POINT = ""; // e.g. Your_Mantis_URL/api/soap/mantisconnect.php?wsdl
$PROJECT_ID = "1"; // It will be deprecated soon (maybe)

// Google Captcha Settings
$USECAPTCHA = ""; // 0 or 1
$CAPTCHA_SITEKEY = "";
$CAPTCHA_SECRET = "";
