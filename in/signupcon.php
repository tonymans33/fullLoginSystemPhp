<?php

include_once "conn.php";


$name = $_POST['name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$pwd_re = $_POST['pwd-re'];

$reg = "INSERT INTO inf (name, password, email) VALUES ('$name', '$pwd', '$email') ";

$result = mysqli_query($conn,$reg);


if($result)
{
    header("Location: ../login.php");
}

?>




    









    else
    {
    	  if (strlen($_POST["pwd"]) <= '8') 
    	  {
            $result = "<p style='color:red;'>Your Password Must Contain At Least 8 Characters!</p>";
          }
          elseif(!preg_match("#[0-9]+#",$pwd)) 
          {
         
             $result = "<p style='color:red;'>Your Password Must Contain At Least 1 Number!</p>";
          }
          elseif(!preg_match("#[A-Z]+#",$pwd)) 
          {
            
            $result = "<p style='color:red;'>Your Password Must Contain At Least 1 Capital Letter!</p>";
          }
          elseif(!preg_match("#[a-z]+#",$pwd)) 
         {
         
            $result = "<p style='color:red;'>Your Password Must Contain At Least 1 Lowercase Letter!</p>";
         }
     else
    {
    	
	    else
	    {
	    	
	    	else
	    	{
	    		
	    		else
	    		{
	    			

	    		}

	    	}
	    }

    }
}

	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup page</title>
	<link rel="stylesheet" type="text/css" href="in/style.css">
</head>
<body>

	<div class="group">
	<center>
		<?php
	    if(isset($result)) echo $result;
	    ?>
		<h1>Sign Up</h1>
	    <form action="#" method="POST">
		<input type="text" name="name" placeholder="Username" required><br><br>
		<input type="text" name="email" placeholder="E-mail" required><br><br>
		<input type="password" name="pwd" placeholder="Password" required=><br><br>
		<input type="password" name="pwd-re" placeholder="Confirm Password" required=><br><br>
		<button type="submit" name="sign_submit" id="but">Sign up</button><br><br>
	    </form>
	    <br>
	    <a href="login.php">Aleady have an account</a>
	    <br><br>
	    <a href="index.php">Back to index page</a>
	  
	</center>
    </div>

</body>
</html>