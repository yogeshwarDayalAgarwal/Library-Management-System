<?php 
	session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>
		ONLINE LIBRARY MANAGEMENT SYSTEM 
	</title>
	<link rel="stylesheet" type="t  ext/css" href="style.css">
	<meta charset="utf-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1">
	
<style type="text/css">
	nav
	{
		float: right;
		word-spacing: 30px;
		padding: 20px;  
	}
	nav li
	{
		display: inline-block;
		line-height: 90px;
	}
	a:hover 
	{
  		background-color: #2a587a;
	}
	.logo img
	{
		padding-left: 125px;
	}
</style>
</head>


<body>
	<div class="wrapper">
		<header>
			<div class="logo">
				<img src ="image/1.png">
				<h2 style="color: white;">ONLINE LIBRARY MANAGEMENT SYSTEM</h2>
			</div>

			<?php  
				if(isset($_SESSION['login_user']))
				{
					?>
						<nav>
							<ul>
								<li><h3><a href="index.php">HOME</a></h3></li>
								<li><h3><a href="books.php">BOOKS</a></h3></li>
								<li><h3><a href="logout.php">LOGOUT</a></h3></li>
								<li><h3><a href="feedback.php">FEEDBACK</a></h3></li>
							</ul>
						</nav>
					<?php
				}
				else
				{
					?>
						<nav>
							<ul>
								<li><h3><a href="index.php">HOME</a></h3></li>
								<li><h3><a href="books.php">BOOKS</a></h3></li>
								<li><h3><a href="admin_login.php">LOGIN</a></h3></li>
								<li><h3><a href="feedback.php">FEEDBACK</a></h3></li>
							</ul>
						</nav>

					<?php
				}
			?>
		</header>
		<section>
			<div class="sec_image">
				<br><br><br>
				<div class="box">
					<br><br><br><br>
					<h1 style="text-align: center;font-size: 35px;">Welcome to Library!</h1><br>
					<h1 style="text-align: center;font-size: 25px;">Opens at : 09: 00</h1><br>
					<h1 style="text-align: center;font-size: 25px;">Closes at : 15: 00</h1><br>
				</div>  
			</div>	
		</section> 
	</div> 
	<?php 
		include "footer.php"
	?>
	
</body>
</html>