<?php
session_start();

 ?>
<html lang="en">
<head>
    <title>Preferences</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Change your user preferences with a single click. Choose between small, medium and large header elements on the site. Your preference will be stored until you clear your cookies.">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/prefs.js" type="text/javascript"></script>
</head>
<body>
<!--navbar-->
<nav class="navbar navbar-fixed-top navbar-expand-lg navbar-light bg-light" id="homeNav">
    <a class="navbar-brand" href="home.php">MBUK</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item active">
              <a class="nav-link" href="preferences.php">Preferences</a>
            </li>
            <li class="nav-item">
                <?php if(!isset($_SESSION['loggedin'])){ //changes which link to provide depending on login state?>
                 <a class="nav-link" href="login.php">Login</a>
               <?php }else{ ?>
                 <a class="nav-link" href="logout.php">Log out</a>
               <?php } ?>
            </li>
        </ul>
    </div>
</nav>
<!--end navbar-->
<!--page content-->
<div class="jumbotron">
  <div class="container">
    <h1 class="display-4">Preferences</h1>
    <p class="lead">Here you can set your user preferences. You can change the size of the header elements
    on the site by choosing between small, medium and large.</p>
    <div class="btn-group btn-group-toggle" role="toolbar">
        <button type="button" id="buttonSmall" class="btn btn-outline-secondary">Small</button>
        <button type="button" id="buttonMed" class="btn btn-outline-secondary">Medium</button>
        <button type="button" id="buttonLarge" class="btn btn-outline-secondary">Large</button>
    </div>
  </div>
</div>
<!--end page content-->
</body>
</html>
