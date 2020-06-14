<?php

include_once "conn.php";

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
	header("location:../welcome.php");
}
else
{
	echo "Invalid name or password";
}


?>























?>