  
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#00FFC0">
      <td>1</td>
      <td>The report shows all quotes from Albert Einstein in descending order</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#00FFC0">
      <td>2</td>
      <td>The report shows all quotes that have the words  "life" in it.</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#00FFC0">
      <td>3</td>
      <td>The report all quotes in alphabetical order</td>
      <td width="20" align="center">10</td>
    </tr>     
    <tr style="background-color:#00FFC0">
      <td>4</td>
      <td>The report shows the most liked quote in the database.</td>
      <td width="20" align="center">10</td>
    </tr>
    <tr style="background-color:#00FFC0">
      <td>5</td>
      <td>Show a random quote from the database</td>
      <td width="20" align="center">10</td>
    </tr>    
    
    <tr style="background-color:#00FF99">
      <td>6</td>
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

$servername = "localhost";
$dbname = "midterm_practice";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT * FROM mp_town ORDER BY RAND() LIMIT 1";

//$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Midterm Program  2</title>
        <meta charset="utf-8">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
        -<style>
            h1, h2{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Records</h1>
        <h2>Quotes by Albert Einstein</h2>
        <ul>
        <?php
            $sql = "SELECT * FROM q_quotes WHERE author = 'Albert Einstein' ORDER BY quote DESC";
            $result = $conn->query($sql);
            
            while($row = $result->fetch_assoc()){
                echo "<li>" . $row['quote'] . "<.li>";
            }
        ?>
        </ul>

        <h2>Quotes about life</h2>
        <ul>
        <?php
            $sql = "SELECT * FROM q_quotes WHERE quote Like '%life%'";
            $result = $conn->query($sql);
            
            while($row = $result->fetch_assoc()){
                echo "<li>" . $row['quote'] . "<.li>";
            }
        ?>
        </ul>
        
       <h2>Quotes in alphabetical order</h2>
        <ul>
        <?php
            $sql = "SELECT * FROM q_quotes ORDER BY quote";
            $result = $conn->query($sql);
            
            while($row = $result->fetch_assoc()){
                echo "<li>" . $row['quote'] . "<.li>";
            }
        ?>
        </ul>
        
       <h2>Most liked quote</h2>
        <ul>
        <?php
            $sql = "SELECT * FROM q_quotes ORDER BY quote";
            $result = $conn->query($sql);
            $max = 0;
            $quote = "";
            
            while($row = $result->fetch_assoc()){
                //echo "<li>" . $row['quote'] . "<.li>";
                if ($row['num_likes'] > $max){
                    $max = $row['num_likes'];
                    $quote = $row['quote'];
                }
            }
            echo "<li>" . $quote . "</li>";
        ?>
        </ul>
        
       <h2>Random Quote</h2>
        <ul>
        <?php
            $sql = "SELECT * FROM q_quotes ORDER BY RAND() LIMIT 1";
            $result = $conn->query($sql);
            
            while($row = $result->fetch_assoc()){
                echo "<li>" . $row['quote'] . "<.li>";
            }
        ?>
        </ul>

    
    </body>
</html>