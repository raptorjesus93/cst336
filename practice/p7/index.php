<?php
include "../../inc/dbConnection.php";

$dbConn = startConnection("Practice7");

function displayCategories(){
    global $dbConn;
    
    $sql = "SELECT DISTINCT category FROM p1_quotes ORDER BY category";
    $stmt = $dbConn -> prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    //print_r($records);
    foreach ($records as $record){
        echo "<option value='" .$record['category']. "'>" . $record['category'] . "</option>";
    }
}
function getQuotes(){
    global $dbConn;
    
     if (isset($_GET['submit'])){
        echo "<h3> Quotes found: <h3>";
        
        $namedParameters = array();
        $quote = $_GET['keyword'];
        
        $sql = "SELECT * FROM p1_quotes WHERE 1";
        
        if(!empty($_GET['keyword'])){
            $sql .= " AND quote LIKE :keyword";
            $namedParameters[':keyword'] = "%$quote%";
        }
        if(!empty($_GET['category'])){
            $sql .= " AND category = :category";
            $namedParameters[':category'] = $_GET['category'];
        }
        if(isset($_GET['order'])){
            if($_GET['order'] == "A"){
                $sql .= " ORDER BY quote";
            }
            else{
                $sql .= " ORDER BY quote DESC";
            }
        }
        $stmt = $dbConn -> prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record){
            echo "<li>" . $record['quote'] . "</li><br><br>";
        }
     }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Practice 7</title>
        <meta charset="utf-8">
        <style>
            h3{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Famous Quote Finder</h1>
        
        <form>
            Enter Quote Keyword: <input type="text" name="keyword">
            <br>
            
            Category: 
            <select name="category">
                <option>Select One</option>
                <?php displayCategories(); ?>
            </select>
            <br>
            Order: <br>
            <input type="radio" name="order" value="A"> A-Z
            <input type="radio" name="order" value="Z"> Z-A
            
            <br>
            <input type="submit" name="submit" value="Display Quotes!">
        </form>
        <hr>
        <ul>
        <?php getQuotes(); ?>
        </ul>
    </body>
</html>