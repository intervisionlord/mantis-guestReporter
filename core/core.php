<?php
/**
* Базовые алгоритмы
*
* @author Intervision (https://github.com/intervisionlord)
* Copyright © 2019-2020 Intervision
*/

$VERSION = '0.9.7';
$RELEASEDATE = '21.01.20';

/**
* Далее происходит проверка на наличие файла конфигурации conf_secret.php
* Это отладочный файл, который не коммитится на github и его наличие не обязательно
* Если файл присутствует, его использование будет приоритетным
* Основной файл conf.php будет проигнорирован
*/

if (!file_exists('./conf/conf_secret.php')) {
  require_once('./conf/conf.php');
} else {
  require_once('./conf/conf_secret.php');
}

require_once('./core/functions.php');

if ($FORCE_LOCALE == '0') {
  $CUR_LOCALE = check_locale('check'); // check or debug
  if (!file_exists('./L10n/'.$CUR_LOCALE.'/lang.php')) {
    $CUR_LOCALE = 'ru_RU';
  }
} else {
  $CUR_LOCALE = $FORCE_LOCALE;
}

$LOCALE_SHORT = substr($CUR_LOCALE, 0, 2);

require_once('./L10n/'.$CUR_LOCALE.'/lang.php');
