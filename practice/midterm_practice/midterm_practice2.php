<?php
include "../../inc/dbConnection.php";

$dbConn = startConnection("midterm_pratice");

//global $dbConn;
    
$sql = "SELECT * FROM om_category ORDER BY catName";
$stmt = $dbConn -> prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Midterm practice 2</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Records</h1>
        
    </body>
</html>
