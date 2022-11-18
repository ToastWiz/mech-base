<?php
  session_start();

  if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false)
  {
    header("Location: login.php"); //redirects user to login page if not already logged in, incase attempting to access via URL
  }

    if(isset($_POST["submit"]))
    {
      $file_name = $_FILES["image"]["name"]; //stores the name of the uploaded image for product
      $target_dir = "resources/uploaded_images/"; //defines where to store the image once uploaded
      $target_file = $target_dir . basename($_FILES["image"]["name"]); //defines full directory including name of image
      $valid_upload = true; //initialises boolean value valid_upload to true
      $check_image = getimagesize($_FILES["image"]["tmp_name"]); //check_image will store a boolean variable depending on the outcome of getimagesize - if the method fails, it returns false, so we know the file is not an image

      if($check_image == false) //runs if getimagesize method fails (eg. file is not an image)
      {
        $file_error = "<label class='text-danger'>File is not an image. Please upload a valid file type.</p>";
        $valid_upload = false;
      }
      else
      {
        $valid_upload = true;
      } //end if($check_image == false)

      if (file_exists($target_file)) //checks if the image has already been uploaded
      {
          $file_error = "<label class='text-danger'>Image already exists on system. Please choose an image that hasn't already been uploaded.</p>";
          $valid_upload = false;
      } //end if (file_exists($target_file))

      if(file_exists('product_data.json')) //checks if product_data is present
       {
          $current_product_data = file_get_contents('product_data.json'); //stores contents of JSON file
          $array_data = json_decode($current_product_data, true); //decodes the JSON data into a PHP array
          $new_product[$_POST["id"]] = array( //creates new associative array with key ("id")
               'id'               =>     $_POST["id"],
               'title'          =>     $_POST["title"], //takes POST variables that were submitted in form and stores them in key>value pairs in array
               'description'     =>     $_POST["description"],
               'price'           =>     $_POST["price"],
               'image'            =>    $_FILES["image"]["name"]
          );
          $array_data[] = $new_product;
          $updated_product_data = json_encode($array_data); //converts PHP array to JSON object and stores in updated_product_data

          if($valid_upload == true)
          {
              if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) && file_put_contents('product_data.json', $updated_product_data)) //trys move_uploade_file and file_put_contents methods
              {
                $message = "<label class='text-success'>Product submitted!</p>"; //if successful, sets message variable
              }
              else
              {
                $message = "<label class='text-danger'>There was a problem submitting your product.</p>"; //otherwise prints error message
              }
          }
          else
          {
              $message = $file_error; //sets message to file_error (file is not an image)
          }
       }
       else
       {
          $message = "<label class='text-danger'>Data file could not be found.</p>";
       }//end if(file_exists('product_data.json'))

   } //end if(isset($_POST["submit"]))

?>

<html lang="en">
<head>
    <title>Submit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index/noindex"> <!--omits page from search results, since it's only accessible to administrators-->
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
                <a class="nav-link" href="products.php">Products > Submit<span class="sr-only">(current)</span></a>
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
<div class="jumbotron">
  <div class="container">
    <h1 class="display-4">Submit a product</h1>
    <p class="lead">Here you can submit a new product using the form provided below.</p>
    <hr class="my-4">
    <p>Make sure to include a relevant picture, description and ID tag.</p>
    <p class="lead">
    </p>
  </div>
</div>

<!--page content-->
<div class="container">
      <h1 class="display-4">New product</h1>
      <div class="row">
        <div class="col-xl-12">
          <form method="post" action="submit-product.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="productID">Product ID</label>
                <input type="number" name="id" class="form-control" min="0" max="999" placeholder="001" autofocus required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" placeholder="TADA68" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" step="0.01" min="0" placeholder="59.99" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="description">Description <span class="text-muted">(Max length 150 chars.)</span></label>
              <textarea class="form-control" name="description" rows="3" maxlength="150" placeholder="The TADA68 is a compact 68% board that doesn't compromise on functionality." required></textarea>
            </div>
            <div class="mb-3">
              <label for="imageUpload">Product image <span class="text-muted" required>(Make sure it matches the product)</span></label>
              <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="image" required>
                <label class="custom-file-label" for="image">Choose image</label>
              </div>
            </div>
            <input type="submit" name="submit" value="Submit product" class="btn btn-primary btn-lg btn-block"></input>
            <?php
              if(isset($message))
              {
                echo $message; //prints contents of message variable, which is either product submitted, file not found, file not an image, etc. depending of outcome of above PHP script
              }
            ?>
          </form>
        </div>
      </div>
    </div>
    <br>
</body>

</html>
