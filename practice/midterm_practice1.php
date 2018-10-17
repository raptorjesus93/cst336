<?php
$months = array("November"=>30, "December"=>31, "January"=>31, "February"=>29);
function displayCalendar($month){
    global $months;
    echo "<tr>";
    $count = 1;
    $days = $months[$month];


    for ($i = 1; $i <= $days; $i++){ 
        if ($count == 8 or $count == 15 or $count == 22 or $count == 29){
            echo "<tr>";
        }
        echo "<td>" . $count . "</td>";
        $count++;

        if ($count == 8 or $count == 15 or $count == 22 or $count == 29){
            echo "</tr>";
            echo "<br>";
        }
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
                <option>Select one</option>
                <option value="USA">USA</option>
                <option value="Mexico">Mexico</option>
            </select>
            
            <br><br>
            Visit locations in alphabetical order
            <input type="radio" name="order" value="3"> <strong>A-Z</strong>
            <input type="radio" name="order" value="4"> <strong>Z-A</strong>
            <br><br>
            
            <input type="submit" name="submit" value="Create Itinerary">
            
        </form>
        
        <table>
            <?php
            if (isset($_GET['country']) && isset($_GET['month'])){
                displayCalendar($_GET['month']);
            }
            ?>
        </table>
    </body>
</html>