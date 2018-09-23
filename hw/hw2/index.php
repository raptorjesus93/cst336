<?php
	$winner = '';
	$boxes = array("");
	if(isset($_POST['submit'])){
		for($i = 1; $i < 10; $i++){
			array_push($boxes, $_POST["box$i"]);
		}
		if(($boxes[1] == 'o' && $boxes[2] == 'o' && $boxes[3] == 'o') || ($boxes[4] == 'o' && $boxes[5] == 'o' && $boxes[6] == 'o')
			|| ($boxes[7] == 'o' && $boxes[8] == 'o' && $boxes[9] == 'o') || ($boxes[1] == 'o' && $boxes[4] == 'o' && $boxes[7] == 'o')
			|| ($boxes[2] == 'o' && $boxes[5] == 'o' && $boxes[8] == 'o') || ($boxes[3] == 'o' && $boxes[6] == 'o' && $boxes[9] == 'o')
			|| ($boxes[1] == 'o' && $boxes[5] == 'o' && $boxes[9] == 'o') || ($boxes[3] == 'o' && $boxes[5] == 'o' && $boxes[7] == 'o'))
		{
			$winner = 'o';
		}
		
		$blankBoxes = 0;
		for($i = 1; $i < count($boxes); $i++){
			if ($boxes[$i] == ''){
				$blankBoxes = 1;
			}
		}
		if ($blankBoxes == 1 && $winner == ''){
			$randomValue = rand(1, 9);
			while($boxes[$randomValue] != ''){
				$randomValue = rand(1, 9);
			}
			$boxes[$randomValue] = "x";
			if(($boxes[1] == 'x' && $boxes[2] == 'x' && $boxes[3] == 'x') || ($boxes[4] == 'x' && $boxes[5] == 'x' && $boxes[6] == 'x')
				|| ($boxes[7] == 'x' && $boxes[8] == 'x' && $boxes[9] == 'x') || ($boxes[1] == 'x' && $boxes[4] == 'x' && $boxes[7] == 'x')
				|| ($boxes[2] == 'x' && $boxes[5] == 'x' && $boxes[8] == 'x') || ($boxes[3] == 'x' && $boxes[6] == 'x' && $boxes[9] == 'x')
				|| ($boxes[1] == 'x' && $boxes[5] == 'x' && $boxes[9] == 'x') || ($boxes[3] == 'x' && $boxes[5] == 'x' && $boxes[7] == 'x'))
			{
				$winner = 'x';
			}
		}
		else if ($winner == '' && $blankBoxes == 0){
			$winner = 'tied';
			echo "tied";
		}
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
		<h1>Tic Tac Toe</h1>
	</header>
	<hr>
	
	<?php
	if ($winner == 'o'){
		echo "<h2>Player 'o' is the winner!</h2>";
	}
	else if ($winner == 'x'){
		echo "<h2>Player 'x' is the winner!</h2>";
	}
	else if($winner == 'tied'){
		echo "<h2>The game is a tie.</h2>";
	}
	?>
	<form name="tictactoe" method="post" action="index.php">
		<?php
			for($i = 1; $i < 10; $i++){
				echo "<input class='text' type='text' name='box$i' value='$boxes[$i]'>";
				if ($i % 3 == 0){
					echo "<br>";
				}
			}
			if ($winner == ''){
				echo '<input class="button" type="submit" name="submit" value="Go">';
			}
			else{
				echo '<input class="button" type="submit" name="reset" value="Play again">';
			}
		?>
	</form>
</body>
</html>