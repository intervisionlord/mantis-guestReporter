<?php
/**
* Страница "О программе"
*
* @author Intervision (https://github.com/intervisionlord)
* Copyright © 2019 Intervision
*/
require_once('./core/core.php');
include_once('header.php');


echo '
<center><h2>'.ABOUTSTRING.'</h2></center>
  <table class="table table-striped table-sm">
    <tr>
      <th scope="col">'.ABTPARAM.'</th>
      <th scope="col">'.ABTVALUE.'</th>
    </tr><tr>
      <td>'.ABTVERSIONPARAM.'</td>
      <td>'.$VERSION.'</td>
    </tr><tr>
      <td>'.LANGSTRING.'</td>
      <td>'.$CUR_LOCALE.'</td>
    </tr>
  </table>';

include_once('footer.php');

?>
