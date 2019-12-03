<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="./inc/bootstrap/css/bootstrap.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> <!-- Font Awesome Icons -->
    <!-- <link href="https://getbootstrap.com/docs/4.4/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet"> -->
  </head>

<header>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./">
      <img src="./inc/imgs/caterpillar.png" width="30" height="30" class="d-inline-block align-top" alt="Mantis Reporter Logo">
        Mantis Reporter
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $MANTISURL ?>" target="_blank"><i class="fa fa-external-link"></i> <?php echo GOTOMANTIS; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">&diams;</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php"><i class="fa fa-info-circle"></i> <?php echo ABOUTSTRING; ?></a>
        </li>
      </ul>
    </div>
  </nav>
</header>

  <div class="container-fluid pt-5 mt-5"> <!-- div внутри main (открывающий) -->
