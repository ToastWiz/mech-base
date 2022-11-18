<?php
  session_start();

 ?>
<html lang="en">
<head>
    <title>Products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Browse your product catalog here. You can scroll the list of product entires, view each entry individually, or submit new products to the system as an administrator.">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/products.js" type="text/javascript"></script>
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
                <a class="nav-link" href="products.php">Products<span class="sr-only">(current)</span></a>
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
<!--jumbotron-->
<div class="jumbotron">
  <div class="container">
    <?php if(!isset($_SESSION['loggedin'])){?>
    <h1 class="display-4">Welcome, User</h1>
    <p class="lead">Here you can edit existing products, view products with more detail, or simply
      just browse the list of current products in the catalog.</p>
      <hr class="my-4">
      <p>Login as an admin to submit new products to our catalog.</p>
      <p class="lead">
        <a href="login.php" class="btn btn-outline-primary btn-lg" role="button" aria-disabled="true">Login to submit</a>
      </p>
    <?php }else{ ?>
      <h1 class="display-4">Welcome, Admin</h1>
      <p class="lead">Here you can edit existing products, view products with more detail, or simply
        just browse the list of current products in the catalog.</p>
    <hr class="my-4">
    <p>As an admin, you have the additional fuctionality of being able to submit new products.</p>
    <p class="lead">
      <a class="btn btn-outline-primary btn-lg" href="submit-product.php" role="button">New product</a>
    </p>
    <?php } ?>
  </div>
</div>
<!--end jumbotron-->

<div class="container">
  <h1 class="display-4">Product Catalog</h1><br>
</div>
<div class="container">
    <div class="row" id="catalog">
        <!--products are loaded here via jquery ajax load() method in external script.js file-->
   </div><br>
</div>
</body>
</html>
