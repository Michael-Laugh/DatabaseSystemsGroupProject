<?php
session_start();
?>

<html>
<head>
<title>Add Student</title>
</head>
<body>

<form method = "POST">
<p><label for="studentName">Student Name:</label>
<input type="text" name="studentName" id="studentName"></p>

<p><label for="studentAddress">Student Address:</label>
<input type="text" name="studentAddress" id="studentAddress"></p>

<p><label for="captainToggle">Captain?:</label>
<input type="checkbox" value = '1' name="captainToggle" id="captainToggle"></p>

<input type="submit" name="submitButton" value="Add Student">
</form>

<form method="POST" action = "addTeam.php">
<p><input type="submit" value="Add Team --->"></p>
</form>

<?php
//Conection
$dbh = new PDO("mysql:host=localhost;dbname=project", "csc313", "dbadmin");
if(isset($_POST["studentName"]) && isset($_POST["studentAddress"])){
    if(isset($_POST["captainToggle"]) == NULL){
        $stmt = $dbh->prepare("INSERT INTO students (address, name, captain) VALUES (?,?,0)");
        $stmt->execute(array($_POST["studentAddress"], $_POST["studentName"]));
    }else{
        $stmt = $dbh->prepare("INSERT INTO students (address, name, captain) VALUES (?,?,1)");
        $stmt->execute(array($_POST["studentAddress"], $_POST["studentName"]));
    }
    $stmt = null;
}
$dbh = null;
?>
</body>
</html>
