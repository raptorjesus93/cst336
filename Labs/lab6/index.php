<?php
include "../../inc/dbConnection.php";

$dbConn = startConnection("ottermart");
function displayCategories(){
    global $dbConn;
    
    $sql = "SELECT * FROM om_category ORDER BY catName";
    $stmt = $dbConn -> prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    //print_r($records);
    foreach ($records as $record){
        echo "<option value='" .$record['catId']. "'>" . $record['catName'] . "</option>";
    }
}
function filterProducts(){
    global $dbConn;
    if (isset($_GET['submit'])){
        echo "<h3> Products Found: <h3>";
        
        $namedParameters = array();
        $product = $_GET['productName'];
        
        $sql = "SELECT * FROM om_product WHERE 1";
        
        if(!empty($_GET['productName'])){
            $sql .= " AND productName LIKE :product OR productDescription LIKE :product";
            $namedParameters[':product'] = "%$product%";
        }
        if(!empty($_GET['category'])){
            $sql .= " AND catId = :categoryId";
            $namedParameters[':categoryId'] = $_GET['category'];
        }
        if(!empty($_GET['priceFrom'])){
            $sql .= " AND price >= :priceFrom";
            $namedParameters[':priceFrom'] = $_GET['priceFrom'];
        }
        if(!empty($_GET['priceTo'])){
            $sql .= " AND price <= :priceTo";
            $namedParameters[':priceTo'] = $_GET['priceTo'];
        }
        if(isset($_GET['orderBy'])){
            if($_GET['orderBy'] == "price"){
                $sql .= " ORDER BY price";
            }
            else{
                $sql .= " ORDER BY productName";
            }
        }
        
        $stmt = $dbConn -> prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record){
            echo "<a href=\"purchaseHistory.php?productId=".$record["productId"]. "\"> History </a>";
            echo $record['productName'] . " " . $record['productDescription'] . " $" . $record['price'] . "<br><br>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <div>
        <h1>Ottermart Product Search </h1>
        
        <form>
            Product: <input type="text" name="productName" placeholder="Product keyword">
            <br>
            Category:
            <select name="category">
                <option value="">Select one</option>
                <?= displayCategories(); ?>
            </select>
            <br>
            
            Price: From <input type-"text" name="priceFrom" size="7"> 
                   To <input type-"text" name="priceTo" size="7">
            
            <br>
            Order result by:
            <br>
            
            <input type="radio" name="orderBy" value="price"> Price <br>
            <input type="radio" name="orderBy" value="name"> Name
            
            <br><br>
            <input type="submit" name="submit" value="Search">
        </form>
        
        <br>
        </div>
        <br>
        
        <hr>
        <?= filterProducts(); ?>
        
       <footer>
            <hr>
             
            <span>cst 336, 2018&copy; Fernandez <br>
            <strong>Disclaimer:</strong> The information in this website is fictitous. <br>
            It is used for academic purposes only.</span>
            <br>
            
            <img src="../../img/csumb_logo.png" alt="CSUMB logo">
            <img src="../../img/buddy_verified.png" alt="buddy badge">
        
        </footer>

    </body>
</html>