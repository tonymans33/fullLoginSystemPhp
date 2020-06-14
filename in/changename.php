<?php
if(isset($_POST['c_name']))
{
	require_once "conn.php";

	session_start();

    $id = $_SESSION['id'];
	$new_name = $_POST['new_name'];

	$sql = "SELECT * FROM inf WHERE name = '$new_name'";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res) == 1 )
    {
    	$result =  "<p style='color:red;'>Username Already taken!</p>";
    }
    else
    {
    	if(!preg_match('/[a-zA-Z0-9 ]/', $new_name))
    	{
    		$result =  "<p style='color:red;'>Invalid Characters in Username!</p>";
    	}
    	else
    	{
    		$updated_name = "UPDATE inf SET name ='$new_name' WHERE id = '$id' ";
	        $resu = mysqli_query($conn,$updated_name);
 
	        if($resu)
	        {
	         	$result =  "<p style='color:green;'>Username has been updated!</p>";	
	        }

    	}
    }

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>name change</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="name">
	<center>
		<?php
	    if(isset($result)) echo $result;
	    ?>
	<form method="POST" action="#">
		<input type="text" name="new_name" placeholder="New Username"><br><br>
		<button type="submit" name="c_name" id="but">Change</button><br><br>
	</form>
	<a href="../login.php">Back to login page</a><br>
	</center>
	</div>
</body>
</html>