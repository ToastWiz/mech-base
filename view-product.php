<?php
  session_start();



?>
<html lang="en">
<head>
    <title>Products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index/noindex"> <!--omitted from searh results as it requires a form submission to display a product-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="products.php">Products > View<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
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
<div class="container">
  <br><h1 class="display-4 text-center">View Product</h1><br>
  <div class="row align-items-center">
    <div class="col">
       <div class="card">
          <img class="card-img-top" src="resources/uploaded_images/<?php echo $_POST['image'] ?>" alt="Card image cap"> <!-- values are loaded from hidden form inputs in load_products-->
          <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['title'] ?></h5>
            <p class="card-text">Description: <?php echo $_POST['description'] ?> </p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Price: $<?php echo $_POST['price'] ?></li>
            <li class="list-group-item">ID: <?php echo $_POST['id'] ?></li>
          </ul>
       </div>
     </div>
  </div>
</div>
<!--end page content-->
<br>

</body>
</html>
