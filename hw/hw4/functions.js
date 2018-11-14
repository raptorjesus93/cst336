
		var winValues = [7, 56, 73, 84, 146, 273, 292, 448];
		var xPoints = 0;
		var oPoints = 0;
		var winner = "";
		var turns = 0;

		function fillCell(id, points){
			if (id.innerHTML == ""){
				id.innerHTML = "<span>x</span>";
				xPoints += points;
				turns++;
				if(turns == 5){
					document.getElementById("heading").innerHTML = "The game is a tie!";
					createButton();
				}
				if (!checkWinner()){
					computerTurn();
				}
				else{
					document.getElementById("heading").innerHTML = "Player '" + winner + "' wins!";
					createButton();
				}
			}
			
		}
		function checkWinner(){
			for (var i = 0; i < winValues.length; i++){
				if ((winValues[i] & xPoints) == winValues[i]){
					winner = "x";
					return true;
				}
				if ((winValues[i] & oPoints) == winValues[i]){
					winner = "o";
					return true;
				}
			}
			return false;
		}
		function findEmptyCell(){
			for (var i = 1; i < 10; i++){
				if (document.getElementById("div" + i).innerHTML == ""){
					return true;
				}
			}
			return false;
		}
		function computerTurn(){
			
			if (findEmptyCell()){
				var x = getRandomArbitrary(1, 10);
				while (document.getElementById("div" + x).innerHTML != ""){
					x = getRandomArbitrary(1, 10);
				}
				document.getElementById("div" + x).innerHTML = "<span>o</span>";

				switch (x){
					case 1:
						oPoints += 1;
						break;
					case 2:
						oPoints += 2;
						break;
					case 3:
						oPoints += 4;
						break;
					case 4:
						oPoints += 8;
						break;
					case 5:
						oPoints += 16;
						break;
					case 6:
						oPoints += 32;
						break;
					case 7:
						oPoints += 64;
						break;
					case 8:
						oPoints += 128;
						break;
					case 9:
						oPoints += 256;
						break;
					default:
						break;
				}
			}
			if (checkWinner()){
				document.getElementById("heading").innerHTML = "Player '" + winner + "' wins!";
				createButton();
			}
			
		}
		function getRandomArbitrary(min, max) {
    		return Math.floor(Math.random() * (max - min) + min);
		}
		function getValue(id){
			return document.getElementById(id).innerHTML;
		}
		function createButton(){
			var button = document.createElement("INPUT");
			button.setAttribute("type", "submit");
			button.setAttribute("value", "Play again");
			document.getElementById("form").appendChild(button);
		}