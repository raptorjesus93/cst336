<?php
session_start();

include 'inc/functions.php';
validateSession();

if (isset($_GET['addProduct'])) { //checks whether the form was submitted
    
    $productName = $_GET['productName'];
    $description =  $_GET['description'];
    $price =  $_GET['price'];
    $catId =  $_GET['catId'];
    
    
    $sql = "INSERT INTO products (name, description, price, category_id) 
            VALUES (:productName, :productDescription, :price, :catId);";
    $np = array();
    $np[":productName"] = $productName;
    $np[":productDescription"] = $description;
    $np[":price"] = $price;
    $np[":catId"] = $catId;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    //echo "New Product was added!";
    header("location: admin.php");
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Final Project</title>
    	<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        
        <script>
            $("document").ready(function(){
                $("#button").html("Log Out");
                $("#button").attr("href", "logOut.php");
                
            });
        </script>
    </head>
    <body>
        <?php  include("inc/header.php"); ?>
        
    <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">
          
        <form class="col-4">
            
          <div class="form-group">
            <label for="formGroupExampleInput">Product Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="productName">
          </div>
          <div class="form-group">
              <label for="exampleFormControlTextarea1">Description</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="description" cols="50" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Price</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="price">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Categories</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="catId">
              <option value="">Select One</option>
              
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option value='".$category['id']."'>" . $category['name'] . "</option>";
                  
              }
              
              ?>
                
            </select>
          </div>
          
          
          <button type="submit" class="btn btn-primary" name="addProduct">add product</button>
          
        </form>   
      </div>
    </div>
        
        <?php  include("inc/footer.php"); ?>
    </body>
</html>