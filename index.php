<?php
session_start();

if($_POST['submit']) {
	include_once('connection.php');
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);

	$sql = "SELECT id,username,password FROM members where username = '$username' LIMIT 1";
	$query = mysqli_query($db, $sql);
	if($query) {
		$row = mysqli_fetch_row($query);
		$userId= $row[0];
		$dbUserName = $row[1];
		$dbPassword = $row[2];
	}
	if($username == $dbUserName && $password == $dbPassword) {
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $userId;
		header('Location: user.php');
	}
	else {
		echo "<b><i>Incorrect credentials</i><b>";

	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>PHP-SQL Login</title>
</head>
<body>
<h1>Login</h1>
<form method="post" action="index.php">
	<input type="text" name = "username" placeholder="Enter username">
	<input type="password" name="password" placeholder="Enter password here">
	<input type="submit" name="submit" value="Login">
</form>

<a href="register.php" >Register</a>

</body>
</html>