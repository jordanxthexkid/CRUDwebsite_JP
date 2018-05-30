<?php 
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {//Check it is coming from a form
    
	//mysql credential
    $mysql_host = "localhost";
    $mysql_username = "jordanksg";
    $mysql_password = "Nolan#4343";
    $mysql_database = "Gamestop";
	
	//delcare PHP variables

	$Name = $_DELETE["Name"];
	$Game = $_DELETE["Game"];
	$Type = $_DELETE["Type"];
	$Delete_Type = $_DELETE["Delete"]; 
    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);	
	
	if ($mysql->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	
	if ($Delete_Type == Disc){
	$statement = $mysqli->prepare("DELETE FROM Disc WHERE type=Disc"); 
	$statement->bind_param($Type, $Name, $Game);
		if($statement->execute()){
		echo nl2br("Hello ". $Name . " Your " .$Type. " order of ". $Game. " has been Withdrawn");
		}
		else{
		print $mysqli->error; 
		}
	}
	else{
	$statement = $mysqli->prepare("DELETE FROM Digital_Download WHERE type=Digital Download"); 
	$statement->bind_param($Type, $Name, $Game);
	if($statement->execute()){
	echo nl2br("Hello ". $Name . " Your " . $Type . " order of " . $Game . " has been Withdrawn");
	}
	else{
		print $mysqli->error; 
	 }
	 }
	}
?>