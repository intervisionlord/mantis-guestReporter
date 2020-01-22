<?php
/**
* Страница "О программе"
*
* @author Intervision (https://github.com/intervisionlord)
* Copyright © 2019 Intervision
*/
require_once('./core/core.php');
include_once('header.php');

if ($FORCE_LOCALE == "0") {
  $CHECK_F_LOCALE = LOCALENOTFORCED;
  $LOCALECOLOR = "success";
} else {
  $CHECK_F_LOCALE = LOCALEFORCED;
  $LOCALECOLOR = "warning";
}

$mantis = new soapclient($WSDL_POINT);
$MANTISVERSION = $mantis->mc_version();

echo '
<div class="container shadow p-4 bgcustom">
  <table class="table table-hover table-bordered table-sm">
    <thead class="thead-dark">
      <tr>
        <th scope="col" colspan="2">'.ABOUTSTRING.'</th>
      </tr>
    </thead>
      <tr>
        <td>'.ABTVERSIONPARAM.'</td>
        <td>'.$VERSION.' <span class="text-muted">('.$RELEASEDATE.')</span></td>
      </tr>
    <thead class="table-secondary">
      <tr>
        <th scope="col" colspan="2">'.LANGSTRING.'</th>
      </tr>
    </thead>
      <tr>
        <td>'.LANGSTRING.'</td>
        <td>'.$CUR_LOCALE.'</td>
      </tr><tr>
        <td>'.LANGVSTR.'</td>
        <td>'.LANG_VERSION.'</td>
      </tr><tr>
        <td>'.LANGTYPE.'</td>
        <td><span class="text-'.$LOCALECOLOR.'">'.$CHECK_F_LOCALE.'</span></td>
      </tr>
    <thead class="table-secondary">
      <tr>
        <th scope="col" colspan="2">'.INTEGRATION.'</th>
      </tr>
    </thead>
      <tr>
        <td>'.MANTISVERSION.'</td>
        <td>'.$MANTISVERSION.'</td>
      </tr>
  </table>
</div>

<div class="imgcorner">
        <img  src="./inc/imgs/mantis.svg" width="250" height="250">
</div>
';

include_once('footer.php');
