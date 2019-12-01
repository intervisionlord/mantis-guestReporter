<?php
require_once('./conf/system.conf.php');
require_once('./core/functions.php');

if ($FORCE_LOCALE == '0') {
  $CUR_LOCALE = check_locale('check');
} else {
  $CUR_LOCALE = $FORCE_LOCALE;
}

require_once('L10n/'.$CUR_LOCALE.'/lang.php');
