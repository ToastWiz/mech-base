<?php
  session_start();

  if(($file = fopen("login_credentials.csv", "r"))) //opens login_credentials CSV file
  {
    $login_data = fgetcsv($file);
    $users[$login_data[0]] = array("password" => $login_data[1]); //makes associative array with username as key
  }
  else
  {
    $error = "<label class='text-danger'>Unable to locate authentication file on server. Cannot validate login.</p>"; //error message if login details aren't found
  }

  fclose($file); //closes file stream

  if(isset($_POST['username']) && isset($_POST['password']))//checks if both inputs are submitted
  {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if(isset($users[$username]) && $users[$username]["password"] == $password) //checks if the submitted POST variables match the login credentials stored in the associative array
    {
      $_SESSION['loggedin'] = true; //sets new session variable 'loggedin' which is used to determine the content of elements across the site accordingly
      header("Location: success.php");
    }
    else
    {
      $error = "<label class='text-danger'>Invalid login credentials!</p>"; //error message set if submitted POST variables do not match the provided login credentials
    }
  }

  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
  {
    header("Location: success.php"); //redirects user to success page is login is sucessful
  }
  ?>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Login to your Mechbase administrator account here. Logging in provides you with product submission privileges.">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/prefs.js" type="text/javascript"></script>
</head>
<body>
<!--navbar-->
<nav class="navbar navbar-fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="home.php">MBUK</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
            </li>

        </ul>
        <ul class="nav navbar-nav navbar-right">

          <li class="nav-item">
            <a class="nav-link" href="preferences.php">Preferences</a>
          </li>
          <li class="nav-item active">
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
<div class="container">
      <div class="col-xl-12">
          <div class= "container text-center">
            <br>
              <h1 class="display-4">Login</h1>

                <form id="login" action="login.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-check">

                    </div>
                  <button type="submit" class="btn btn-outline-primary btn-block">Login</button>
                  <?php
                  if(isset($error))
                  {
                    echo $error;
                  }

                   ?>
                </form>
            </div>
      </div>
</div>


</body>
</html>
