<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
    
	//mysql credential
    $mysql_host = "localhost";
    $mysql_username = "jordanksg";
    $mysql_password = "Nolan#4343";
    $mysql_database = "Gamestop";
	
	//delcare PHP variables

	$Name = $_POST["Name"];
	$Game = $_POST["Game"];
	$Type = $_POST["Type"];
	$postButton = $_POST["Submit"];
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);	
	//Open a new connection to the MySQL server
    
	//Output any connection error
	if ($mysql->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	if ($Type == Disc){
	$statement = $mysqli->prepare("INSERT INTO Disc (Type, Name, Game) VALUES(?, ?, ?)"); //prepare sql insert query
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('sss', $Type, $Name, $Game);
		if($statement->execute()){
		//print output text
		echo nl2br("Hello ". $Name . " Your " .$Type. " order of ". $Game. " has been placed");
		}
		else{
		print $mysqli->error; 
		}
	}
	else{
	$statement = $mysqli->prepare("INSERT INTO Digital_Download (Type, Name, Game) VALUES(?, ?, ?)"); //prepare sql insert query
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('sss', $Type, $Name, $Game);
	if($statement->execute()){
	//print output text
	echo nl2br("Hello ". $Name . " Your " . $Type . " order of " . $Game . " has been placed");
	}
	else{
		print $mysqli->error; 
	 }
	 }
}
?>