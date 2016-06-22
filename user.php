<?php
session_start();
if (isset($_SESSION['id'])){
	$userId = $_SESSION['id'];
	$username = $_SESSION['username'];
}
else {
	header('Location: index.php');
	die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome user</title>
</head>
<body>
<h3>Welcome <?php echo $username; ?>. Your user Id is <?php echo $userId; ?> </h3>
<form action="logout.php">
	<input type="submit" name="logout" value="Logout"> 
</form>

</body>
</html>