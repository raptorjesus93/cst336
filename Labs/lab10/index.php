<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
            body {
                text-align: center;
            }
            .carousel {
                width:640px;
                height:360px;
                margin: 0 auto;
            }
        </style>
   
    </head>
    <body>
        
	  <?php 
	    include 'inc/header.php';
	    
	    $files = array();
        foreach (new DirectoryIterator('img') as $fileInfo) {
            if($fileInfo->isDot() || !$fileInfo->isFile() || $fileInfo->getExtension() == "gif"){
              continue;  
            } 
            $files[] = $fileInfo->getFilename();
        }
        //print_r($files);
	  ?>
	  
        <!-- Display Carousel here  -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <?php
                for($i = 1; $i < count($files); $i++){
                    echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
                }
            ?>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="img/<?=$files[0]?>"  alt="First slide" width="640" height="360">
            </div>
            <?php
                for($i = 1; $i < count($files); $i++){
                    echo "<div class='carousel-item'>";
                    echo "<img class=\"d-block w-100\" src=\"img/".$files[$i]."\" alt=\"Second slide\" width=\"640\" height=\"360\">";
                    echo "</div>";
                }
            ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        
        <a class="btn btn-outline-success" href="pets.php" role="button">Adopt Now</a>
        <br><br><br>
        <?php
        include 'inc/footer.php';
        
        ?>
        </body>

</html>