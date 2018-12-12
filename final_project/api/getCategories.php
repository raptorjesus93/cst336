<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("final_project");

$sql ="SELECT * FROM categories";
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting just one record
//print_r($record);

//print_r($record);
echo json_encode($record);
?>