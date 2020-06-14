<?php
if(isset($_POST['login_submit']))
{
include_once "in/conn.php";

$name = $pwd = "";

$name = $_POST['name'];
$pwd = $_POST['pwd'];

$sql = " SELECT * FROM inf WHERE name ='$name' AND password = '$pwd' ";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$id = $row['id'];
		$name = $row['name'];
		$pwd = $row['password'];
		session_start();
		$_SESSION['name'] = $name;
		$_SESSION['id'] = $id;
		$_SESSION['password'] = $pwd;

	}
	header("location:welcome.php");
}
else
{
	$result =  "<p style='color:red;'>Invalid Username or password!</p>";
}

}

?>


<!DOCTYPE html>

<html>
<head>
	<title>Login page</title>
	<link rel="stylesheet" type="text/css" href="in/style.css">
</head>
<body>
	<div class="grouplogin">
	<center>
    <?php
	if(isset($result)) echo $result;
	 ?>
	<h1>Login</h1>
	<form action="#" method="POST">
		<input type="text" name="name" placeholder="Username" required><br><br>
		<input type="password" name="pwd" placeholder="Password" required><br><br>
		<button type="submit" name="login_submit" id="but">Login</button><br><br>
	</form>
	<br>
	<a href="signup.php">Don't have an account</a><br><br>
	<a href="index.php">Back to index page</a>
    </center>
    </div>
</body>
</html>