<?php
require_once "in/conn.php";

session_start();

$id = $_SESSION['id'];

$name = $pwd = $email = '';

$sql = "SELECT * FROM inf WHERE id ='$id' ";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$name = $row["name"];
		$pwd = $row["password"];
		$email = $row["email"];
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome page</title>
	<link rel="stylesheet" type="text/css" href="in/style.css">
</head>
<body>
	<div class="jumbotron">
	<center>
		<h1>Welcome <?php echo $name; ?></h1>
		<a href="logout.php"><button id="but">Logout</button></a><br><br>
		<h1>Your Data : </h1>
		<p>Your name : <?php echo $name; ?> </p><a href="in/changename.php"><button id="but">Change username</button></a>
		<p>Your email : <?php echo $email; ?> </p><a href="in/changemail.php"><button id="but">Change email</button></a>
		<p>Your password : <?php echo $pwd; ?> </p><a href="in/changepwd.php"><button id="but">Change password</button></a>
		</form>
		
	</center>
	
		
    </div>

</body>
</html>
