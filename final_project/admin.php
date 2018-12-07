<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

include 'inc/functions.php';
validateSession();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Final Project</title>
	<meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
    <h3>Search</h3>
    <form>
        Name: <input type="text" name="name"><br>
        Price <br>
        From: <input type="text" name="from">
        To: <input type="text" name="to">
    </form>

	<form action="logOut.php">
        <input type="submit" value="log out">
	</form>
</body>
</html>