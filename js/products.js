$(document).ready(function()
{
  $("#catalog").load("load_products.php");//jquery's ajax load method which loads data from an external file asynchronously
 //here it loads the contents of load_products.php into a div on products.php with unique id 'catalog'.
});
