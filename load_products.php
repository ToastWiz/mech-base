<?php //php script which loads data from JSON product_data file by each object, creating a bootstrap card element to contain the data from each
$file = file_get_contents("product_data.json");
$data = json_decode($file, true);

if(empty($data))
{
  echo "<label class='text-danger'>No products found!</p>"; //checks if PHP array is empty and echos warning text if so
}
else
{
  foreach($data as $key) //loops through the arrays contained in the JSON file by key
  {
    foreach ($key as $value) //loops through the nested array of each key to return the values
    {
     echo '<div class="col-xl-4 col-lg-6 col-md-12">
              <div class="card">
                 <img class="card-img-top" src="resources/uploaded_images/'.$value["image"].'" alt="Card image cap">
                 <div class="card-body">
                   <h5 class="card-title">'.$value["title"].'</h5>
                   <p class="card-text">Description: '.$value["description"].'</p>
                 </div>
                 <ul class="list-group list-group-flush">
                   <li class="list-group-item">Price: $'.$value["price"].'</li>
                   <li class="list-group-item">ID: '.$value["id"].'</li>
                 </ul>
                 <div class="card-body">
                 <form method="post" action="view-product.php" enctype="multipart/form-data">
                 <input type="hidden" name="image" value="'.$value["image"].'"></input>
                 <input type="hidden" name="title" value="'.$value["title"].'"></input>
                 <input type="hidden" name="description" value="'.$value["description"].'"></input>
                 <input type="hidden" name="price" value="'.$value["price"].'"></input>
                 <input type="hidden" name="id" value="'.$value["id"].'"></input>
                 <input type="submit" id="view" name="'.$value["id"].'"value="View" class="btn btn-outline-primary btn-sm"></input>
                 </form>
                 </div>
              </div>
            </div>'; //echos a bootstrap card div for each product in the JSON array containing all the values from the array 
                      //this php file is loaded into a div on product.php using JQuery's AJAX .load() method (in /js/products.js)
                        //hidden inputs above are for storing values currently on product card, so that card contents can be transferred to view-product page via POST
    }
  }
}

?>
