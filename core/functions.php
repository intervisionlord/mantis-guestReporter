<?php
/**
* Файл основных функций
*
* @author Intervision (https://github.com/intervisionlord)
* Copyright © 2019-2020 Intervision
*/

function check_locale($CL_PARAM) {
  $SYS_LOCALE = locale_get_default();
  if ($CL_PARAM == 'check') {
    if (!is_dir('./l10n/'.$SYS_LOCALE)) {
      return '-1'; //Директория локали не найдена
    } else {
      $LOCALE_DIR = './l10n/'.$SYS_LOCALE;
    }
  }

  if ($CL_PARAM == 'debug') {
    $LOCALE_DIR = './l10n/'.$SYS_LOCALE; // ?? Перевести в мультияз. или убрать...
    echo 'Локаль системы: '.$SYS_LOCALE.', искомый пакет локализации: '.$LOCALE_DIR;
  }
}
