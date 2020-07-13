<?php  
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
	<link rel="stylesheet" type="t  ext/css" href="style.css">
	<meta charset="utf-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
	<style type="text/css">
		nav
		{
			word-spacing: 10px;
		}
	</style>
</head>
<body>
<?php  
	//$r=mysqli_query($db,"SELECT COUNT(status) as total FROM message where status ='no' and sender = 'admin'and username='$_SESSION[login_user]' ;");
	//$c = mysqli_fetch_assoc($r);
?>
	<nav class="navbar navbar-inverse" style="margin-bottom: 0px;">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand ">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
			</div>
			<ul class="nav navbar-nav active">
				<li><a href="index.php">HOME</a></li>
				<li><a href="books.php">BOOKS</a></li>
				<li><a href="feedback.php">FEEDBACK</a></li>
			</ul>

			<?php  
				if(isset($_SESSION['login_user']))
				{
					?>
						<ul class="nav navbar-nav active">
							<li><a href="profile.php">PROFILE</a></li>
							<li><a href="fine.php">FINE</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span>&nbsp<span class="badge bg-green">
								<?php 
									//echo $c['total'];
								?>
							</span></a></li>
							<li><a href="profile.php">
								<div style="color: white;">
									<?php
										echo "<img class ='img-circle profile_img' height=30 width=30 src='image/".$_SESSION['pic']."'>";
										echo " " .$_SESSION['login_user'];
									?>
								</div>
							</a></li>
							<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
						</ul>
					<?php
				}
				else
				{
					?>

						<ul class="nav navbar-nav navbar-right">

							<li><a href="student_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
							<li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>

						</ul>
					<?php
				}
			?>
			
		</div>
	</nav>

</body>
</html>