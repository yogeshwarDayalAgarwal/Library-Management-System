<?php	
	include "connection.php";
	include "navbar.php";
	
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Student Login</title>
	<link rel="stylesheet" type="t  ext/css" href="style.css">
	<meta charset="utf-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

</head>
<body>
<section>
	<div class="log_img">
		<br><br>
		<div class="box1">
			<h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">LIBRARY MANAGEMENT SYSTEM</h1><br>
			<h1 style="text-align: center; font-size: 25px;">User Login Form</h1><br>
			<FORM name="login" action ="" method="post">
				<div class="login">
					<input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
					<input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
					<input clas="btn btn-default"type="submit" name="submit" value="Login" style="color: #be6539; width: 80px; height: 30px;background-color: #061321;"></div>
			
			<p style="color: white;padding-left: 15px;">
				<br><br> 
				<a style="color:white;"href="update_password.php">Forgot password</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				New to this website?<a style="color:white;"href="registration.php">&nbspSign Up</a>

			</p>
			</FORM>
		</div>
	</div>
</section>
	<?php
		
		if(isset($_POST['submit']))
		{
			$count=0;
			$res=mysqli_query($db,"SELECT * FROM `student` where username= '$_POST[username]' and password ='$_POST[password]' ;");
			$row= mysqli_fetch_assoc($res);
			$count=mysqli_num_rows($res);

			if($count==0)
			{
				?>

					<script type="text/javascript">
						alert("The username and password doesn't match.");
					</script>
				
				<?php
			}
			else
			{
				/*----if username & password matches ---------- */
				$_SESSION['login_user'] = $_POST['username'];
				$_SESSION['pic']=$row['pic'];
				?>
					
					<script type="text/javascript">
						window.location='index.php'
					</script>
				
				<?php
			}
		}

	?>
</body>
</html> 