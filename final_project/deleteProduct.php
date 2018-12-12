<?php
session_start();

include 'inc/functions.php';
validateSession();

$sql = "DELETE FROM products WHERE id = " . $_GET['productId'];
$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: admin.php");

?>