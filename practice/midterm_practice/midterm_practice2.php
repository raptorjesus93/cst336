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
            main{
                display: flex;

            }
            body{
                text-align: center;
            }
            div{
                border: 1px solid black;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <h1>Records</h1>
    
        <?php
            $sql = "SELECT * FROM 1_quotes WHERE author = 'Albert Einstein'";
            $result = $conn->query($sql);
            
            while($row = $result->fetch_assoc()){
                echo $row['quote'] ;
            }
        ?>
    
        <?php
           /* $sql = "SELECT * FROM mp_town";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                echo $row['population'];
            }*/
        ?>
    
    </body>
</html>
