<?php
    include 'api/pixabayAPI.php';

    $backgroundImage = 'img/sea.jpg';
    
    if (isset($_GET['keyword'])){
        $keyword = $_GET["keyword"];
        
        if(!empty($_GET['category'])){
            $keyword = $_GET['category'];
        }
        
        $imageURLs = getImageURLs($keyword, $_GET['layout']);
        shuffle($imageURLs);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    function isValid(){
        if(empty($_GET['category']) && $_GET['keyword'] == ''){
            echo " <h1>You must type a keyword or select a category.</h1>";
            return false;
        }
        return true;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lab 4</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <style>
            @import url('css/styles.css');
            body{
                background-image: url('<?= $backgroundImage ?>');
                background-size: cover;
                opacity:0.9;
                width:100%;
                text-align:center;
                color: white;
            }
        </style>
    </head>
    <body>
        
        <br>
        
        <form method="GET">
            <input type="text" name="keyword" placeholder="keyword">
            
            <div class="radio">
                <input type="radio" name="layout" value="horizontal"> Horizontal
                <br>
                <input type="radio" name="layout" value="vertical"> Vertical
            </div>
            
            <br>
            
            <select name="category">
                <option value=""> Select One </option>
                <option>Dog</option>
                <option>Cat</option>
                <option>Horse</option>
                <option>Lion</option>
                
            </select>
            
            <br>

            <input type="submit"name="submitBtn" value="Submit">
        </form>
        
        <?php
        if (isset($imageURLs) && isValid()){ ?>
        
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php
                    for($i = 1; $i < 7; $i++){
                        echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
                    }
                ?>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="<?=$imageURLs[0]?>" alt="First slide">
                </div>
                <?php
                    for($i = 1; $i < 7; $i++){
                        echo "<div class='carousel-item'>";
                        echo "<img class=\"d-block w-100\" src=\"".$imageURLs[$i]."\" alt=\"Second slide\">";
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
        <?php
        }
        ?>
        
        <footer>
            <hr>
             
            <span>cst 336, 2018&copy; Fernandez <br>
            <strong>Disclaimer:</strong> The information in this website is fictitous. <br>
            It is used for academic purposes only.</span>
            <br>
            
            <img src="../../img/csumb_logo.png" alt="CSUMB logo">
            <img src="../../img/buddy_verified.png" alt="buddy badge">
        
        </footer>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>