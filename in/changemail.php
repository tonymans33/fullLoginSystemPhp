<?php
if(isset($_POST['c_mail']))
{
	require_once "conn.php";

	session_start();

    $id = $_SESSION['id'];
	$new_mail = $_POST['new_mail'];

	if(!filter_var($new_mail,FILTER_VALIDATE_EMAIL))
    {
	    $result =  "<p style='color:red;'>Invalid E-mail!</p>";
    }
    else
    {
    	$updated_mail = "UPDATE inf SET email ='$new_mail' WHERE id = '$id' ";
	    $res = mysqli_query($conn,$updated_mail);
	    if($res)
	    {
		   $result =  "<p style='color:green;'>Email has been updated </p>";
	    }
    }

	

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>E-mail change</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="mail">
	<center>
		<?php
	    if(isset($result)) echo $result;
	    ?>
	<form method="POST" action="#">
		<input type="text" name="new_mail" placeholder="New E-mail"><br><br>
		<button type="submit" name="c_mail" id="but">Change</button><br><br>
	</form>
	<br>
	<a href="../login.php">Back to login page</a>
	</center>
	</div>
</body>
</html>