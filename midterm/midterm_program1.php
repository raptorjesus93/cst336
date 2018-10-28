  
    <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#00FFC0">
      <td>1</td>
      <td>The page includes the form elements as the Program Sample: checkbox, radio buttons, etc.</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:#00FFC0">
      <td>2</td>
      <td>Error is displayed if team gender is not submitted.</td>
      <td width="20" align="center">5</td>
    </tr> 
    <tr style="background-color:#00FFC0">
      <td>3</td>
      <td>Error is displayed if team size is less than 1 or left blank </td>
      <td align="center">5</td>
    </tr>    
   <tr style="background-color:#00FFC0">
      <td>4</td>
      <td>Error is displayed if team size is greater than 5 AND gender is not coed, or if size is greater than 10 AND gender is coed </td>
      <td align="center">5</td>
    </tr>
    <tr style="background-color:#00FFC0">
      <td>5</td>
      <td>Header is displayed with info submitted (team size and gender) </td>
      <td align="center">5</td>
    </tr>    
	<tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>A random NOT coed team is displayed properly when selecting Male or Female as gender </td>
      <td align="center">15</td>
    </tr> 
   	<tr style="background-color:#FFC0C0">
      <td>7</td>
      <td>If selecting "coed" as gender, there is at least one male and one female team member </td>
      <td align="center">15</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>8</td>
      <td>The names are ordered alphabetically as chosen by the user (asc/desc)</td>
      <td align="center">10</td>
    </tr>
    <tr style="background-color:#FFC0C0">
      <td>9</td>
      <td>Team member's images are displayed if corresponding checkbox is checked</td>
      <td align="center">10</td>
    </tr>       
    <tr style="background-color:#FFC0C0">
      <td>10</td>
      <td>Team members are displayed in a two-column table</td>
      <td align="center">15</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>11</td>
      <td>A second form allows users to see the history of generated teams</td>
      <td align="center">15</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>12</td>
      <td>The web page uses Bootstrap and has a nice look. </td>
      <td align="center">5</td>
    </tr>        
    <tr style="background-color:#00FF99">
      <td>13</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>   
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>

<?php
session_start();
if (!isset($_SESSION['history'])){
    $_SESSION['history'] = array();
}
$femaleHeros = array("RaY", "Gamora", "Wonder Woman", "Xena", "Blossom");
$maleHeros = array("Leo", "Mario", "Monte", "Spiderman", "Goku");

function displayTeam(){
    global $maleHeros;
    global $femalHeros;
    
    $teamSize = $_GET['size'];
    
    echo "<tr>";

    for ($i = 0; $i <= $teamSize; $i++){ 
        if ($i == 3 or $i == 5 or $i == 7 or $i == 9){
            echo "<tr>";
        }
        echo "<td>";
        echo $maleHeros[$i] . "<br>";
        
        echo "</td>";

        if ($i == 3 or $i == 5 or $i == 7 or $i == 9){
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
        <title>Midterm Program 1</title>
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
        <h1>Superhero Team Generator</h1>
        <form>
            <?php
                if (isset($_GET['generate']) and intval($_GET['size']) < 1 or empty($_GET['size'])){
                    echo "You must enter a team size that is atleast 1!" . "<br>";
                }
                if (isset($_GET['generate']) and intval($_GET['size']) > 5 and $_GET['gender'] != "Coed"){
                    echo "Team size is too big!!" . "<br>";
                }
                if (isset($_GET['generate']) and intval($_GET['size']) > 10 and $_GET['gender'] == "Coed"){
                    echo "Team size is too big!!" . "<br>";
                }
            ?>
            
            Team Size: <input type="text" name="size">
            <br><br>
            
            <?php
                if (isset($_GET['generate']) and empty($_GET['gender'])){
                    echo "You must select a gender!" . "<br>";
                }
            ?>
            Team Gender:
            <input type="radio" name="gender" value="Female"> <strong>Female</strong>
            <input type="radio" name="gender" value="Male"> <strong>Male</strong>
            <input type="radio" name="gender" value="Coed"> <strong>Coed</strong>
            <br><br>
            
            Display teamd in alphabetical order
            <input type="radio" name="order" value="A-Z"> <strong>A-Z</strong>
            <input type="radio" name="order" value="Z-A"> <strong>Z-A</strong>
            <br><br>
            
            <input type="checkbox" name="displayImages" value="displayImages"> Display Images
            <br><br>
            
            <input type="submit" name="generate" value="Generate Team">
            
            <br><br>
            
            <input type="submit" name="history" value="Display History">
        </form>
        <?php
            if (isset($_GET['generate'])){
                echo "<h2> Generating a team of " . $_GET['size'] . " " . $_GET['gender'] . " Members</h2><br>";
            }
        ?>
        
        <div class="table">
            <table>
                <?php
                if (isset($_GET['generate'])){
                    displayTeam();
                }
                
                ?>
            </table>
        </div>

    </body>
</html>