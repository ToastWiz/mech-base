<?php
  session_start();
?>
<html lang="en">
<head>
    <title>Mechbase</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Online dashboard tool to allow Mechbase employees to manage their product catalog. Includes an audio widget, user preferences, and a login system.">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/audio.js" type="text/javascript"></script>
    <script src="js/prefs.js" type="text/javascript"></script>
</head>
<body>
<!--navbar-->
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" id="homeNav">
    <a class="navbar-brand" href="home.php">MBUK</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
              <a class="nav-link" href="preferences.php">Preferences</a>
          </li>
          <li class="nav-item">
             <?php if(!isset($_SESSION['loggedin'])){ //changes which link to provide depending on login state ?>
              <a class="nav-link" href="login.php">Login</a>
            <?php }else{ ?>
              <a class="nav-link" href="logout.php">Log out</a>
            <?php } ?>
          </li>
        </ul>
    </div>
</nav>
<!--end navbar-->

<!--JUMBOTRON-->
<div class="jumbotron">
  <div class="container">
    <h1 class="display-4">Home</h1>
    <p class="lead">Mechbase is a world leader in providing mechanical keyboard supplies. This online tool is designed
    to allow you to manage our online product catalog, with some additional quality of life features such as user preferences,
    an audio widget and currency converter.</p>
    <hr class="my-4">
    <p>Login as an admin to access additional privileges on the site, such as submitting new products on our product page.</p>
  </div>
</div>
<!--end jumbtron-->

<!--page content-->
<div class="container">
  <h1 class="display-4">Utilities</h1><br>
  <div class="row">
    <div class="col-xl-6">
      <!--audio widget-->
      <div class="card border-secondary mb-3 text-center">
        <div class="card-header">Audio Widget</div>
          <div class="card-body text-secondary">
            <div class="container">

                <span class="lead">Sonata in G Minor - </span>
                <span class ="lead" id="current_time">00:00</span>
                <span class = "lead"> / </span>
                <span class ="lead" id="duration"></span>
                <br>
                <span class = "lead">Volume:</span>
                <span><input type="range" class="slider" id="change_vol" onchange="changeVol()" step="0.05" min="0" max="1" value="1"></span>

                <audio preload="auto" id="audio_player" ontimeupdate="updateTrackTime(this);">
                <source src="resources/audio.ogg" type="audio/ogg">
                </audio>
                <br>
                <br>
                <div class="container">
                  <input type="button" class="btn btn-outline-secondary btn-md" value= "back" onclick="backAudio()" id="back_button">
                  <input type="button" class="btn btn-outline-secondary btn-md" value="play" onclick="playAudio()" id="play_button">
                  <input type="button" class="btn btn-outline-secondary btn-md" value="pause" onclick="pauseAudio()" id="pause_button">
                  <input type="button" class="btn btn-outline-secondary btn-md" value= "stop" onclick="stopAudio()" id="stop_button">
                  <input type="button" class="btn btn-outline-secondary btn-md" value= "forward" onclick="fwdAudio()" id="fwd_button">
                </div>
            </div>
          </div>
        </div>
        <!--end audio widget-->
      </div>
    <div class="col-xl-6">
      <div class="card border-secondary mb-3 text-center">
        <div class="card-header">Currency Converter</div>
          <div class="card-body text-secondary">
            <h5 class="card-title">Coming soon...</h5>
            <p class="card-text">Under construction?</p>
          </div>
      </div>
    </div>
  </div>
</div>
<!--end page content-->
</body>
</html>
