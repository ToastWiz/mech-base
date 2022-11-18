<?php

  session_start();
  unset($_SESSION['loggedin']); //disables loggedin status
  header("refresh:2; home.php"); //redirects user to homepage after 2 seconds
?>

<h1>Logging out! Redirecting to homepage...</h1>
