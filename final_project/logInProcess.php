<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

$username = $_POST['username'];
$password = sha1($_POST['password']);
                 
$sql = "SELECT * FROM p10_admin
                 WHERE username = :username 
                 AND  password = :password ";                 
$np = array();
$np[':username'] = $username;
$np[':password'] = $password;

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);

if (empty($record)) {
    header("location: index.php?submit=true");
        //echo "Wrong username or password!!";
} else {
   
   $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
   header('Location: admin.php'); //redirects to another program
    
}
?>