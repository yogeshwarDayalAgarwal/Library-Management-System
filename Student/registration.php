<?php 
	include "connection.php";
	include "navbar.php";
?>	

<!DOCTYPE html>
<html>
<head>
	
	<title>Student Registration</title>
	<link rel="stylesheet" type="t  ext/css" href="style.css">
	<meta charset="utf-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/ jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</head>
<body>
<section>
	<div class="reg_img">
		<br><br>
		<div class="box2">
			<h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">LIBRARY MANAGEMENT SYSTEM</h1><br>
			<h1 style="text-align: center; font-size: 25px;">User Registration Form</h1><br>
			<FORM name="Registration" action ="" method="post">
				<div class="login">
					<input class="form-control" type="text" name="first" placeholder="First Name" required=""><br>
					<input class="form-control" type="text" name="last" placeholder="Last Name" required=""><br>
					<input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
					<input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
					<input class="form-control" type="text" name="roll" placeholder="Roll No" required=""><br>
					<input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
					<input class="form-control" type="text" name="contact" placeholder="Phone No" required=""><br>

					<input clas="btn btn-default"type="submit" name="submit" value="Sign Up" style="color: #be6539; width: 80px; height: 30px;background-color: #061321;">
				</div>
			</FORM> 
		</div>
	</div>
</section>

	<?php
		
		if(isset($_POST['submit']))
		{
			$count=0;
			$sql="SELECT username FROM student";
			$res=mysqli_query($db,$sql);

			while($row=mysqli_fetch_assoc($res))
			{
				if($row['username']==$_POST['username'])
				{
					$count=$count+1;
				}
			}
			if($count==0)
			{
				mysqli_query($db,"INSERT INTO `student` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[roll]', '$_POST[email]', '$_POST[contact]', 'user.jpg');");
			
	?>
		<script type="text/javascript">
			alert("Registration Successful!!!");
		</script>
		<?php
	}
			else
			{
				?>
					<script type="text/javascript">
					alert("Username already exits.");
					</script>
				<?php
			}
		}


	?>

</body>