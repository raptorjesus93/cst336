

<?php
session_start();
if (!isset($_SESSION['itinerary'])){
    $_SESSION['itinerary'] = array();
}
$months = array("November"=>30, "December"=>31, "January"=>31, "February"=>29);

$images = array();


//print_r($France);
//$France = array("img/France/bordeaux.png");

function displayCalendar($month){
    global $months;
    global $France;
    
    $country = $_GET['country'];
    $resource = opendir("img/$country");
    while ($entry = readdir($resource)){
        $images[] = $entry;
    }
    
    $count = 1;
    $days = $months[$month];
    $randomValues = array();
    $locations = $_GET['numLocations'];

    
    for ($i = 0; $i < $_GET['numLocations']; $i++){
        $randomValues[] = rand(1, $days);
    }
    
    
    echo "<h1>" . $month . " Itinerary </h1>";
    echo "<h2> Visiting " . $_GET['numLocations'] . " places in " . $_GET['country'];
    
    echo "<tr>";

    for ($i = 1; $i <= $days; $i++){ 
        if ($count == 8 or $count == 15 or $count == 22 or $count == 29){
            echo "<tr>";
        }
        echo "<td>";
        echo $count;
        
        foreach($randomValues as $value){
            if ($value == $count){
                echo "<img src='img/$country/$images[0]'>";
                break;
            }
        }
        
        echo "</td>";
        $count++;

        if ($count == 8 or $count == 15 or $count == 22 or $count == 29){
            echo "</tr>";
            echo "<br>";
        }
    }
}
function displayHistory(){
    echo "<h2>Monthly Itinerary</h2>";
    foreach ($_SESSION['itinerary'] as $itinerary){
        echo "Month: " . $itinerary['month'] . ", Visiting " . $itinerary['numLocations'] . " in " . $itinerary['country']; 
        echo "<br>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Midterm Practice 1</title>
        <meta charset="UTF-8">
        
        <style>
            body{
                text-align: center;
            }
            table tr td{
                border: 1px solid black;
                
            }
            table{
                margin: 0 auto;
            }
            td{
                width: 200px;
                height: 200px;
            }
        </style>
    </head>
    <body>
        <h1>Winter Vacation Plannnr !</h1>
        <form>
            Select Month
            <select name="month">
                <option>Selecct a Month</option>
                <option value="November">November</option>
                <option value="December">December</option>
                <option value="January">January</option>
                <option value="February">February</option>
            </select>
            
            <br><br>
            
            Number of locations
            <input type="radio" name="numLocations" value="3"> <strong>Three</strong>
            <input type="radio" name="numLocations" value="4"> <strong>Four</strong>
            <input type="radio" name="numLocations" value="5"> <strong>Five</strong>
            <br><br>
            
            Select Country
            <select name="country">
                <option value="">Select one</option>
                <option value="USA">USA</option>
                <option value="Mexico">Mexico</option>
                <option value="France">France</option>
            </select>
            
            <br><br>
            Visit locations in alphabetical order
            <input type="radio" name="order" value="3"> <strong>A-Z</strong>
            <input type="radio" name="order" value="4"> <strong>Z-A</strong>
            <br><br>
            
            <input type="submit" name="submit" value="Create Itinerary">
            
        </form>
        
        <div class="table">
            <table>
                <?php
                if (isset($_GET['country']) && isset($_GET['month'])){
                    displayCalendar($_GET['month']);
                    $itinerary = array();
                }
                
                ?>
            </table>
        </div>
                <?php
                if (isset($_GET['country']) && isset($_GET['month'])){
                    
                    $itinerary = array();
                    $itinerary['country'] = $_GET['country'];
                    $itinerary['month'] = $_GET['month'];
                    $itinerary['numLocations'] = $_GET['numLocations'];
                    $_SESSION['itinerary'][] = $itinerary;
                    displayHistory();
                }
                
                ?>
    </body>
</html>
