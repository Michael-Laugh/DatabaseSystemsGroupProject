<?php
session_start();
?>

<html>
<head>
<title>Add team</title>
</head>
<body>

<form method = "POST">
<p><label for="teamName">Team Name:</label>
<input type="text" name="teamName" id="teamName"></p>

<p><label for="teamCaptain">Team Captain:</label>
<input type="text" name="teamCaptain" id="teamCaptain"></p>

<p><label for="winNum">Number of Wins:</label>
<input type="text" name="winNum" id="winNum"></p>

<p><label for="loseNum">Number of Loses:</label>
<input type="text" name="loseNum" id="loseNum"></p>

<input type="submit" name="submitButton" value="Add Team">
</form>

<form method="POST" action = "addStudent.php">
<p><input type="submit" value="<--- Add Students"></p>
</form>

<form method="POST" action = "addGame.php">
<p><input type="submit" value="Add Game -->"></p>
</form>

<?php
//Conection
$dbh = new PDO("mysql:host=localhost;dbname=project", "csc313", "dbadmin");
if(isset($_POST["teamName"]) && isset($_POST["teamCaptain"])){
	$stmt = $dbh->prepare("INSERT INTO teams (name, captain, wins, loses) VALUES (?,?,?,?)");
	$stmt->execute(array($_POST["teamName"], $_POST["teamCaptain"], $_POST["winNum"], $_POST["loseNum"]));
	$stmt = null;
}
$dbh = null;
?>
</body>
</html>