<?php

session_start();
include '../inc/dbConnection.php';
$dbConn = startConnection("final_project");

function validateSession(){
    if (!isset($_SESSION['adminFullName'])) {
        header("Location: index.php");  //redirects users who haven't logged in 
        exit;
    }
}
function displaySearchResults()
{
    global $dbConn;
    
    if (isset($_GET['search']))
    {
        $namedParamters = array();
        
        $sql = "SELECT * FROM products WHERE 1";
        
        if (!empty($_GET['name']))
        {
            $sql .= " AND name LIKE :name OR description LIKE :description";
            
            $namedParamters[":name"] = "%" . $_GET['name'] . "%";
            $namedParamters[":description"] = "%" . $_GET['name'] . "%";
        }
        if (!empty($_GET['price']))
        {
            $sql .= " AND price >= :price";
            
            $namedParamters[":price"] = "%" . $_GET['price'] . "%";
        }
        if (!empty($_GET['category']))
        {
            $sql .= " AND category_Id = :catId";
            $namedParamters[":catId"] = $_GET['category'];
        }
        
        if (isset($_GET['sort']))
        {
            // checks how to sort
            if ($_GET['sort'] == "asc")
            {
                $sql .= " ORDER BY name ASC";
            }
            else
            {
                $sql .= " ORDER BY name DESC";
            }
        }
        
        $statement = $dbConn->prepare($sql);
        $statement->execute($namedParamters);
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record)
        {
            echo "<tr>";
            echo /*"<a onclick='openModal()' target='productModal' href = 'display.php?id=".$record['prodId']."'>" .*/"<td>" . $record["name"] . "</td>" . "<td>" . $record["description"] . "</td> <td> $" . $record["price"] . "</td>"; /*. "<img src='" . $record["image"] . " width ='200' height='400'>" . "</a><br/>";*/
            echo "</tr>";
        }
    }
}
function displayAllProducts(){
    global $dbConn;
    
    $sql = "SELECT * FROM products ORDER BY name";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records

    foreach ($records as $record) {
        echo "<tr>";
        
        echo "<td>";
        echo $record['name'];
        echo "</td>";
        
        echo "<td>";
        echo $record[description];
        echo "</td>";
        
        echo "<td>";
        echo " $" . $record[price];
        echo "</td>";
        
        echo "<td> <a class='btn btn-primary' role='button' href='updateProduct.php?productId=".$record['id']."'>Update</a> </td>";
        //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
        echo "<td>";
        echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
        echo "   <input type='hidden' name='productId' value='".$record['id']."'>";
        echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form>";
        echo "</td>";
        
        echo "</tr>";
    }
}
function getProductInfo($productId) {
     global $dbConn;
    
    $sql = "SELECT * FROM products WHERE id = $productId";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
     
    
}
function getCategories() {
    global $dbConn;
    
    $sql = "SELECT * FROM categories ORDER BY name";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $records;
    
}
function getAverage(){
    global $dbConn;
    $average = 0;
    
    $sql = "SELECT price FROM products WHERE 1";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    foreach ($records as $record) {
        $average += $record['price'];
    }
    $average /= count($records);
    echo intval($average);
}
function getCount(){
    global $dbConn;
    
    $sql = "SELECT * FROM products WHERE 1";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    echo count($records);
}
function getMax(){
    global $dbConn;
    $max = 0;
    
    $sql = "SELECT price FROM products WHERE 1";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    foreach ($records as $record) {
        if ($max <= $record['price']){
            $max = $record['price'];
        }
    }
    echo $max;
}
?>