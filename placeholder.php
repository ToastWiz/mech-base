<?php //php script which loads data from JSON product_data file by each object, creating a bootstrap card element to contain the data from each
$file = file_get_contents("product_data.json");
$data = json_decode($data, true);
foreach($data as $row)
{
   echo '<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card">
               <img class="card-img-top" src="resources/uploaded_images/'.$row["image"].'" alt="Card image cap">
               <div class="card-body">
                 <h5 class="card-title">'.$row["title"].'</h5>
                 <p class="card-text">Description: '.$row["description"].'</p>
               </div>
               <ul class="list-group list-group-flush">
                 <li class="list-group-item">Price: $'.$row["price"].'</li>
                 <li class="list-group-item">ID: '.$row["id"].'</li>
               </ul>
               <div class="card-body">
               <form method="post" action="products.php" enctype="multipart/form-data">
                 <input type="submit" name="'.$row["id"].'" value="View" class="btn btn-outline-primary btn-sm"></input>
                 <input type="submit" name="'.$row["id"].'" value="Edit" class="btn btn-outline-primary btn-sm"></input>
               </form>
               </div>
            </div>
          </div>';
}
?>
