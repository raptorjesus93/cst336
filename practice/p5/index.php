<?php
    session_start();
    if (!isset($_SESSION['passwords'])){
        $_SESSION['passwords'] = array();
    }
    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $pass = array();
    
    if(isset($_POST['createPasswords'])){
        for ($i = 0; $i < $_POST['numPasswords']; $i++){
            $pass = array();
            for ($i = 0; $i < $_POST['length']; $i++){
                $n = rand(0, strlen($alphabet) - 1);
                $pass[] = $alphabet[$n];
            }
            //$_SESSION['passwords'][] =  $pass;
            array_push($_SESSION['passwords'], implode($pass));

        }
    }
    

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Practice 5</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1> Custom Password Generator</h1>
        
        <br>
        
        <form action="index.php" method="post">
            How many passwords? <input type="text" name="numPasswords" >
         
        <?php  
        if (isset($_POST['numPasswords'])){
            if ($_POST['numPasswords'] > 8){
                echo "<h2> Must be a max of 8 passwords </h2>";
            }
        }
        ?>
    
            
            <h2>Password length</h2>
            <input type="radio" name="length" value="6"> 6 characters
            <input type="radio" name="length" value="8"> 8 characters
            <input type="radio" name="length" value="10"> 10 characters
            <br>
            <input type="checkbox" name="includeDigits"> include digits.
            <br>

            <input type="submit" value="Create Password" name="createPasswords">
            <br><br>
            <input type="submit" value="Display Pasword History">

        </form>
        <?php
            if (isset($_POST['numPasswords'])){
                foreach ($_SESSION['passwords'] as $password){
                    echo $password;
                    echo "<br>";
                }
            }
        ?>
    </body>
</html>