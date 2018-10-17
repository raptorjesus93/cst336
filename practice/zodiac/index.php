<?php
if (!empty($_GET['start'])){
    
    $start = $_GET['start'];
}
if (!empty($_GET['end'])){
    
    $end = $_GET['end'];
}
function displayYears($start, $end){
        $sum = $start;
        $count = 0;
        $animals = array("rat.png", "ox.png", "tiger.png", "rabbit.png", "dragon.png", "snake.png", "horse.png", "goat.png", "monkey.;ng", "rooster.png", "dog.png", "pig.png");
           
            for ($i = $start; $i <= $end; $i++){
                $sum += $i;
                
              /*  if ($i % 4 == 0){
                     echo "<img src='img/$animals[$count]'>";

                }
                if ($count == 11){
                    $count = 0;
                }
                else{
                    $count++;
                }
                echo "<br>";*/
                if ($i == 1776){
                     echo "<li> Year $i <strong> USA Independence</strong></li>";

                }
                else{
                     echo "<li> Year $i </li>";

                }
                if ($i % 100 == 0){
                    echo "Happy new century";
                }
            }
       // return $sum;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Chinese Zodiac</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form method="GET">
            Start Year: <input type="text" name="start">
            End year: <input type="text" name="end">
            <br>
            How many rows:  <input type="text" name="rows">
            how many columns:  <input type="text" name="columns">
            
            <input type="submit" value="Submit">

        </form>
        <ul>
        <?php
            displayYears($start, $end);
        ?>
        </ul>
    </body>
</html>