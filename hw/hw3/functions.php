<?php 

function displayGame(){
    global $boxes;
	for($i = 1; $i < 10; $i++){
			
		echo "<select name='category$i' class='text'>";
		echo "<option value='$boxes[$i]'>$boxes[$i]</option>";
		echo "<option value='x'>X</option>";
		echo "<option value='o'>O</option>";
		echo "</select>";
				
		if ($i % 3 == 0){
			echo "<br>";
		}
	}
}
function playGame(){
    global $winner;
    global $boxes;
    global $player;

    
    if ($player == 'x'){
    	$computer = 'o';
    }
    else{
    	$computer = 'x';
    }
    
	if(isset($_POST['submit'])){
		for($i = 1; $i < 10; $i++){
			array_push($boxes, $_POST["category$i"]);
		}
		if(($boxes[1] == $player && $boxes[2] == $player && $boxes[3] == $player) || ($boxes[4] == $player && $boxes[5] == $player && $boxes[6] == $player)
			|| ($boxes[7] == $player && $boxes[8] == $player && $boxes[9] == $player) || ($boxes[1] == $player && $boxes[4] == $player && $boxes[7] == $player)
			|| ($boxes[2] == $player && $boxes[5] == $player && $boxes[8] == $player) || ($boxes[3] == $player && $boxes[6] == $player && $boxes[9] == $player)
			|| ($boxes[1] == $player && $boxes[5] == $player && $boxes[9] == $player) || ($boxes[3] == $player && $boxes[5] == $player && $boxes[7] == $player))
		{
			$winner = $player;
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
			$boxes[$randomValue] = $computer;
			if(($boxes[1] == $computer && $boxes[2] == $computer && $boxes[3] == $computer) || ($boxes[4] == $computer && $boxes[5] == $computer && $boxes[6] == $computer)
				|| ($boxes[7] == $computer && $boxes[8] == $computer && $boxes[9] == $computer) || ($boxes[1] == $computer && $boxes[4] == $computer && $boxes[7] == $computer)
				|| ($boxes[2] == $computer && $boxes[5] == $computer && $boxes[8] == $computer) || ($boxes[3] == $computer && $boxes[6] == $computer && $boxes[9] == $computer)
				|| ($boxes[1] == $computer && $boxes[5] == $computer && $boxes[9] == $computer) || ($boxes[3] == $computer && $boxes[5] == $computer && $boxes[7] == $computer))
			{
				$winner = $computer;
			}
		}
		else if ($winner == '' && $blankBoxes == 0){
			$winner = 'tied';
			echo "tied";
		}
	}
	determineWinner($computer);
}
function determineWinner($computer){
	global $winner;
	global $player;
	
	if ($player != '' and $winner != ''){
		if ($winner == $player){
			echo "<h2>Congratulations! ". $_POST['name'] . " is the winner!</h2>";
		}
		else if ($winner == $computer){
			echo "<h2>You lose!</h2>";
			echo "<img src='img/smiley.jpg' alt='A smiley.'>";
		}
		else if($winner == 'tied'){
			echo "<h2>The game is a tie.</h2>";
		}
	}
}
?>