<?php
session_start();

include 'inc/functions.php';

validateSession();
$namedParameters = array();

if (isset($_GET['updateProduct'])){  //user has submitted update form
    $productName = $_GET['name'];
    $description = $_GET['description'];
    $price =  $_GET['price'];
    $catId =  $_GET['category_id'];
    
    $sql = "UPDATE products 
            SET name= :productName,
               description = :productDescription,
               price = :price,
               category_id = :catId
            WHERE id = " . $_GET['productId'];
    
    $namedParameters[":productName"] = $productName;
    $namedParameters[":productDescription"] = $description;
    $namedParameters[":price"] = $price;
    $namedParameters[":catId"] = $catId;
    
    $stmt= $dbConn->prepare($sql);
    $stmt->execute($namedParameters);

    header("location: admin.php");
}


if (isset($_GET['productId'])) {

  $productInfo = getProductInfo($_GET['productId']);    
  
 // print_r($productInfo);
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Final Project </title>
        <meta charset="utf-8">
        
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
    <?php include 'inc/header.php'; ?>

    <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">

        <form class="col-4">
            <input type="hidden" name="productId" value="<?=$productInfo['id']?>">
          <div class="form-group">
            <label for="formGroupExampleInput">Product Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="<?= $productInfo['name'] ?>">
          </div>
          <div class="form-group">
              <label for="exampleFormControlTextarea1">Description</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="description" cols="50" rows="3" ><?= $productInfo['description'] ?></textarea>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Price</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="price" value="<?= $productInfo['price'] ?>">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Categories</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="category_id">
              <option value="">Select One</option>
              
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option  "; 
                  echo  ($category['id']==$productInfo['category_id'])?"selected":"";
                  echo " value='".$category['id']."'>" . $category['name'] . "</option>";
                  
              }
              
              ?>
                
            </select>
          </div>
          
          
          <button type="submit" class="btn btn-primary" name="updateProduct">update product</button>
          
        </form>   
      </div>
    </div>
        
        <?php include 'inc/footer.php'; ?>
    </body>
</html>