<?php
if(isset($_POST["sign_submit"]))
{
	include_once "in/conn.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwd_re = $_POST['pwd-re'];

    $sql = "SELECT * FROM inf WHERE name = '$name'";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res) == 1)
    {
    	$result =  "<p style='color:red;'>Username Already taken!</p>";
    }
    else
    {
    	if(!preg_match('/[a-zA-Z0-9 ]/', $name))
	    {
	    	 $result =  "<p style='color:red;'>Invalid Characters in Username!</p>";
	    }
	    else
	    {
	    	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	    	{
	    		$result =  "<p style='color:red;'>Invalid E-mail!</p>";
	    	}
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
                	if($pwd != $pwd_re)
	                {
		               $result =  "<p style='color:red;'>The two password dosen't match!</p>";
	                }
	                else
	                {
	                	$reg = "INSERT INTO inf (name, password, email) VALUES ('$name', '$pwd', '$email') ";

                        $result = mysqli_query($conn,$reg);

                        $result =  "<p style='color:green;'>Registration Successful</p>";
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