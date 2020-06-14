<?php
if(isset($_POST['c_pwd']))
{
	require_once "conn.php";

	session_start();

    $id = $_SESSION['id'];
    $old_pwd = $_SESSION['password'];
	$new_pwd = $_POST['new_pwd'];
	$new_pwd_re = $_POST['new_pwd_re'];
	$old = $_POST['old_pwd'];
   
    if($old != $old_pwd)
    {
    	$result =  "<p style='color:red;'>The old password isn't correct!</p>";
    }
    else
    {
    	 if (strlen($_POST["new_pwd"]) <= '8') 
    	  {
            $result = "<p style='color:red;'>Your Password Must Contain At Least 8 Characters!</p>";
          }
          elseif(!preg_match("#[0-9]+#",$new_pwd)) 
          {
         
             $result = "<p style='color:red;'>Your Password Must Contain At Least 1 Number!</p>";
          }
          elseif(!preg_match("#[A-Z]+#",$new_pwd)) 
          {
            
            $result = "<p style='color:red;'>Your Password Must Contain At Least 1 Capital Letter!</p>";
          }
          elseif(!preg_match("#[a-z]+#",$new_pwd)) 
         {
         
            $result = "<p style='color:red;'>Your Password Must Contain At Least 1 Lowercase Letter!</p>";
         }
         else
         {
         	if($new_pwd != $new_pwd_re)
         	{
         		$result = "<p style='color:red;'>The two password dosen't match!</p>";
         	}
         	else
         	{
         		 $updated_pwd = "UPDATE inf SET password ='$new_pwd' WHERE id = '$id' ";
                 $res = mysqli_query($conn,$updated_pwd);
	             if($res)
	             {
                     $result = "<p style='color:green;'>Password has been updated </p>";
                 } 

         	}
         }

    }


	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Password change</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="pwd">
	<center>
		<?php
	    if(isset($result)) echo $result;
	    ?>
	<form method="POST" action="#">
		<input type="password" name="old_pwd" placeholder="Old Password"><br><br>
		<input type="password" name="new_pwd" placeholder="New Password"><br><br>
		<input type="password" name="new_pwd_re" placeholder="Confirm New Password"><br><br>
		<button type="submit" name="c_pwd" id="but">Change</button><br><br>
	</form>
	<a href="../login.php">Back to login page</a><br>
	</center>
	</div>
</body>
</html>