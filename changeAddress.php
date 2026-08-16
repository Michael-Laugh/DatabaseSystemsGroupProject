<?php
session_start();
?>
<html>
<head>
<title>Change Address</title>
</head>
<body>
<form method="POST">
<p><label for="studentName">Student Name:</label>
<input type="text" name="studentName" id="studentName"></p>

<p><label for="newAddress">New Address:</label>
<input type="text" name="newAddress" id="newAddress"></p>

<input type="submit" name="submitButton" value="Submit Address Change">
</form>

<form method="POST" action = "showRecords.php">
<p><input type="submit" value="<-- Display Win/Lose Records"></p>
</form>


<?php
//Conection
$dbh = new PDO("mysql:host=localhost;dbname=project", "csc313", "dbadmin");
if(isset($_POST["newAddress"]) && isset($_POST["studentName"])){
	$stmt = $dbh->prepare("UPDATE students SET address = ? WHERE name = ?");
	$stmt->execute(array($_POST["newAddress"], $_POST["studentName"]));
	$stmt = null;
}
$dbh = null;
?>
</body>
</html>