<?php  
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<style type="text/css">
		body
		{
			height: 650px;
			background-image: url("image/.jpg"); 
			background-repeat: no-repeat;
		}
		.wrapper
		{
			width: 400px;
			height: 400px;
			margin: 150px auto;
			background-color: black;
			opacity: .7; 
			color: white; 
			padding: 27px 15px;
		}
		.form-control
		{
			width: 300px;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div style="text-align: center;">
		<h1 style="font-size: 30px; font-family: Lucida Console;">CHANGE YOUR PASSWORD</h1><br>
		</div>
		<form action="" method="post">
			<center>
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
			<input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>	
			<button class="btn btn-defaut" type="submit" name="submit"style="color: black;">Update</button>
			</center>
		</form>
	</div>
	<?php  
		if(isset($_POST['submit']))
		{
			if(mysqli_query($db,"UPDATE `student` SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]';"))
			{
				?>
					<script type="text/javascript">
						alert("The Password has been Updated!");
					</script>
				<?php
			}
		}
	?>
</body>
</html>