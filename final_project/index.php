<?php
    include "inc/functions.php";
    
    if ($_GET['submit']){
        echo "Wrong username or password!!";
    }
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
        $("document").ready(function() {

                $.ajax({

                    type: "GET",
                    url: "api/getCategories.php",
                    dataType: "json",
                    data: { "": "" },
                    success: function(data, status) {
                        var id = 0;
                        //alert();
                        $("#exampleFormControlSelect1").html("Select a category");
                        $("#exampleFormControlSelect1").append("<option value=''>" + "Select one" + "</option>");
                        for (var i = 0; i < data.length; i++) {
                            id = i + 1;
                            $("#exampleFormControlSelect1").append("<option value='" + id + "'>" + data[i].name + "</option>");
                        }
                        
                    },
                    complete: function(data, status) { //optional, used for debugging purposes
                        //alert(status);
                    }

                }); //ajax
        }); //documentReady
    </script>
</head>
<body>
    <?php  include("inc/header.php"); ?>
    
	<main role="main" class="container">
	  <div class="row">
	    <div class="col-md-2">
            <h3>Search</h3>
            
            <form>
              <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="name">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Price</label>
                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput2" name="price">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Categories</label>
                <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="category">
                
                </select>
              </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="sort" id="inlineRadio1" value="asc">
                  <label class="form-check-label" for="inlineRadio1">Ascending</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="sort" id="inlineRadio2" value="desc">
                  <label class="form-check-label" for="inlineRadio2">Descending</label>
                </div>
                
                <button type="submit" class="btn btn-primary" name="search" value="Search" id="search">Search</button>
        
              </form>
	    </div>
	    
	    <div class="col-md-8">
	      <div class="content-section">
	        <h3>Search Results</h3>
          <table id="table" class="table table-dark">
              <?php displaySearchResults(); ?>
          </table>
	      </div>
	    </div>
	
	  </div>
	</main>
    
    <?php include("inc/footer.php"); ?>
</body>
</html>