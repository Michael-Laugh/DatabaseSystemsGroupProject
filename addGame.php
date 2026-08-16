<?php
session_start();
?>

<html>
<head>
<title>Add game</title>
</head>
<body>
<form method="POST">
<p><label for="gameDate">Game Date (YYYY-MM-DD):</label>
<input type="text" name="gameDate" id="gameDate"></p>

<p><label for="gameHost">Game Host:</label>
<input type="text" name="gameHost" id="gameHost"></p>

<p><label for="gameGuests">Game Guests:</label>
<input type="text" name="gameGuests" id="gameGuests"></p>

<p><label for="gameScore">Game Score:</label>
<input type="text" name="gameScore" id="gameScore"></p>

<input type="submit" name="submitButton" value="Add Game">
</form>

<form method="POST" action = "addTeam.php">
<p><input type="submit" value="<-- Add Team"></p>
</form>

<form method="POST" action = "changeCaptain.php">
<p><input type="submit" value="Change Captain -->"></p>
</form>

<?php
//Conection
$dbh = new PDO("mysql:host=localhost;dbname=project", "csc313", "dbadmin");
if(isset($_POST["gameScore"]) && isset($_POST["gameDate"]) && isset($_POST["gameHost"]) && isset($_POST["gameGuests"])){
	$stmt = $dbh->prepare("INSERT INTO games (score, date, host, guest) VALUES (?,?,?,?)");
	$stmt->execute(array($_POST["gameScore"], $_POST["gameDate"], $_POST["gameHost"], $_POST["gameGuests"]));
	$stmt = null;
}
$dbh = null;
?>
</body>
</html>
