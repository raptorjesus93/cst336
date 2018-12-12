<?php
session_start();

include 'inc/functions.php';
validateSession();


?>
<!DOCTYPE html>
<html>
<head>
    <title>Final Project</title>
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
        
        function confirmDelete() {
            
            return confirm("Are you sure you want to delete this product?");
        }
        
    </script>
</head>
<body>
    <?php  include("inc/header.php"); ?>
    
	<main role="main" class="container">
	  <div class="row">
	    <div class="col-md-4">
            <h3>Reports</h3>
            
            <h4> Average price: $<?= getAverage(); ?></h4> <br>
            <h4> Total number of items: <?= getCount(); ?></h4> <br>
            <h4> Highest price: $<?= getMax(); ?></h4><br>
            
            <form action="addProduct.php">
                <button type="submit" class="btn btn-primary">add new product</button>
            </form>
        
	    </div>
	    
	    <div class="col-md-8">
	      <div class="content-section">
	        <h3>Items in database</h3>
	        <table class="table table-dark">
	            <?= displayAllProducts() ?>
	        </table>
	        
	      </div>
	    </div>
	
	  </div>
	</main>
    
    <?php include("inc/footer.php"); ?>
</body>
</html>