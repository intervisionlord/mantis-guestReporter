<?php
/**
* Базовые алгоритмы
*
* @author Intervision (https://github.com/intervisionlord)
* Copyright © 2019 Intervision
*/

$VERSION = '0.1.11';
$RELEASEDATE = '04.12.19';

require_once('./conf/system.conf.php');
require_once('./core/functions.php');

if ($FORCE_LOCALE == '0') {
  $CUR_LOCALE = check_locale('check');
  if (!file_exists('./L10n/'.$CUR_LOCALE.'/lang.php')) {
    $CUR_LOCALE = 'ru_RU';
  }
} else {
  $CUR_LOCALE = $FORCE_LOCALE;
}

$LOCALE_SHORT = substr($CUR_LOCALE, 0, 2);

require_once('./L10n/'.$CUR_LOCALE.'/lang.php');

if (!file_exists('./conf/auth.conf_secret.php')) {
  require_once('./conf/auth.conf.php');
} else {
  require_once('./conf/auth.conf_secret.php');
}
