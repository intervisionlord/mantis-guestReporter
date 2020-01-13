<?php
/**
* Заголовко (Header)
*
* @author Intervision (https://github.com/intervisionlord)
* Copyright © 2019-2020 Intervision
*/
require_once('./core/core.php');
echo '
<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="./inc/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./inc/styles/default.css">
    <script src="https://kit.fontawesome.com/d984210af5.js" crossorigin="anonymous"></script>';
if ($USECAPTCHA == '1') {
  echo '<script src="https://www.google.com/recaptcha/api.js?hl='.$LOCALE_SHORT.'" async defer></script>';
}
echo '
  </head>
  <title>'. MAIN_TITLE .'</title>

<header>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./">
      <img src="./inc/imgs/caterpillar.png" width="30" height="30" class="d-inline-block align-top" alt="Mantis Reporter Logo">
        '. MAIN_TITLE .'
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link disabled" href="#">&diams;</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="'.$MANTISURL.'" target="_blank"><i class="fa fa-external-link"></i> '.GOTOMANTIS.'</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">&diams;</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php"><i class="fa fa-info-circle"></i> '.ABOUTSTRING.'</a>
        </li>
      </ul>
    </div>
  </nav>
</header>

  <div class="container-fluid pt-5 mt-5 mb-5 pb-5"> <!-- div внутри main (открывающий) -->
';
