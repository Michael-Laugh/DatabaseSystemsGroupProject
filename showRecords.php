<?php
session_start();
?>
<html>
<head>
<title>Display Records</title>
</head>
<body>
<form method="POST">
<?php
$dbh = new PDO("mysql:host=localhost;dbname=project", "csc313", "dbadmin");
echo "<table>";
echo "<tr><th>Team</th><th>Wins</th><th>Loses</th></tr>";
$stmt = $dbh->query("SELECT name,wins,loses FROM teams");
while($row = $stmt->fetch()){
	echo "<tr><td>" . $row['name'] . "</td><td>" . $row['wins']. "</td><td>" . $row['loses'] . "</tr></td>";
}
echo "</table>";
?>
</form>

<form method="POST" action = "changeCaptain.php">
<p><input type="submit" value="<-- Change Captain"></p>
</form>

<form method="POST" action = "changeAddress.php">
<p><input type="submit" value="Change Address -->"></p>
</form>

</body>
</html>