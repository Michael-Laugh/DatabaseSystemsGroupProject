<?php
session_start();
?>

<html>
<head>
<title>Edit Captain</title>
</head>
<body>
<form method="POST">
<p><label for="teamName">Team Name:</label>
<input type="text" name="teamName" id="teamName"></p>

<p><label for="captainName">New Captain Name:</label>
<input type="text" name="captainName" id="captainName"></p>

<input type="submit" name="submitButton" value="Submit Change">
</form>
<form method="POST" action = "addGame.php">
<p><input type="submit" value="<-- Add Game"></p>
</form>

<form method="POST" action = "showRecords.php">
<p><input type="submit" value="Win/Lose Records -->"></p>
</form>

<?php
//Conection
$dbh = new PDO("mysql:host=localhost;dbname=project", "csc313", "dbadmin");
if(isset($_POST["teamName"]) && isset($_POST["captainName"])){
	$stmt = $dbh->prepare("UPDATE teams SET captain = ? WHERE name = ?");
	$stmt->execute(array($_POST["captainName"], $_POST["teamName"]));
	$stmt = null;
}
$dbh = null;
?>
</body>
</html>