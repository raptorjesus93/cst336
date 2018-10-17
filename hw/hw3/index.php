-<?php

	include "functions.php";
	
	$winner = '';
	$player = "";
	$boxes = array("");
	
	if (!empty($_POST['player'])){
		$player = $_POST['player'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tic Tac Toe</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<header>
		<img src="img/tictactoe.png" alt="tic tac toe " height="150">
	</header>
	<hr>

	<?php
	if (empty($_POST['name']) and isset($_POST['submit'])){
		echo "<h2>You must enter your name</h2>";
	}
	else if (empty($_POST['player']) and isset($_POST['submit'])){
		echo "<h2>You must pick either 'x' or 'o'</h2>";
	}
	else{
		playGame();
	}
	
	?>
	<form name="tictactoe" method="post" action="index.php">
		
		<div class="main"> 
			<div class="playerInfo"></div>
				Enter your name: <input class="playerName" type="text" name="name" placeholder="Name" value="<?= $_POST['name'] ?>">
				<br>
				<input class="player" type="radio" name="player" value="x" <?php if (isset($_POST['player']) && $_POST['player'] == 'x') echo 'checked'; ?>> Player 'X'
				<br>
				<input class="player" type="radio" name="player" value ="o" <?php if (isset($_POST['player']) && $_POST['player'] == 'o') echo 'checked'; ?>> Player 'O'
				<br>
			</div> 
	
			<div class="game">
				<?php
					displayGame();
					if ($winner == ''){
						echo '<input class="button" type="submit" name="submit" value="Go">';
					}
					else{
						echo '<input class="button" type="submit" name="reset" value="Play again">';
					}
				?>
			</div>
		</div>
	</form>
	
	
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