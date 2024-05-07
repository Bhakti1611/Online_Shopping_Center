<html>
<?php
	require_once "dbconfig.php";
	try{
	if(isset($_POST['signup']))
	{
		$sql = "INSERT INTO userdetail (`u_name`, `u_uname`, `u_email`, `u_pwd`, `u_mobile`, `u_add`) VALUES (:u_name, :u_uname, :u_email, :u_pwd, :u_mobile, :u_add)";
		$statement = $pdo->prepare($sql);
		$statement->bindParam(':u_name', $_REQUEST['u_name']);
		$statement->bindParam(':u_uname', $_REQUEST['u_uname']);
		$statement->bindParam(':u_email', $_REQUEST['u_email']);
		$statement->bindParam(':u_pwd', $_REQUEST['u_pwd']);
		$statement->bindParam(':u_mobile', $_REQUEST['u_mobile']);
		$statement->bindParam(':u_add', $_REQUEST['u_add']);
		$statement->execute();
	}
	if(isset($_POST['login']))
	{
		$sql = "SELECT * FROM userdetail WHERE u_uname=:u_uname AND u_pwd=:u_pwd";
        $res = $pdo->prepare($sql);
        $res->bindParam(':u_uname',$_REQUEST['u_uname']);
        $res->bindParam(':u_pwd',$_REQUEST['u_pwd']);
        $res->execute();
        if($res->rowCount()==1)
        {
            header("location:dashbord.php");
        }
		else
		{
			echo '<script type ="text/JavaScript">';  
			echo 'alert("Username and Password is Invalid")';  
			echo '</script>';  
		}
	}
	}
	catch(PDOException $e1){}
?>
<head>
    <link rel="stylesheet" href="css/loginStyle.css">
    <title>MBA SHOPPING CENTER</title>
</head>
<body>
    
    <h2>MBA SHOPPING CENTER</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="post">
			<h1>Create Account</h1>
			<input type="text" name="u_name" id="u_name" placeholder="Name" required />
			<input type="text" name="u_uname" id="u_uname" placeholder="Username" required />
			<input type="email" name="u_email" id="u_email" placeholder="Email" required />
			<input type="password" name="u_pwd" id="u_pwd" placeholder="Password" required />
			<input type="tel" name="u_mobile" id="u_mobile" placeholder="Mobile" required />
			<input type="text" name="u_add" id="u_add" placeholder="Address" required />
			<button name="signup">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="post">
			<h1>Login in</h1>
			<input type="text" name="u_uname" id="u_uname" placeholder="Username" required />
			<input type="password" name="u_pwd" id="u_pwd" placeholder="Password" required />
			<button name="login">Login</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Login</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script src="js/loginJS.js"></script>
</body>
</html>