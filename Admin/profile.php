<?php  
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
		.wrapper
		{
			width: 500px;
			margin: 30px auto;
			background-color:black;	
			opacity: 0.5;
			color: white;
			height: 600px;
			padding: 20px;
		}
	</style>
</head>
<body style="background-image: url(image/profile.jpg);"><!--#189d8d  #fdc016-->
	<div class="container">
		<form action="" method="post">
			<br>
			<button class="btn btn-default" style="float: right; width: 80px; "name="submit1" type="submit">
				Edit
			</button>
		</form>
		<div class="wrapper">
			<?php

				if(isset($_POST['submit1']))
				{
					?>
					<script type="text/javascript">
						window.location = "edit.php";
					</script> 
					<?php
				}
				
				$q=mysqli_query($db,"SELECT * FROM `admin` where username='$_SESSION[login_user]' ");
			
			?>
			<h2 style="text-align: center;">My Profile</h2>
			<?php
				$row=mysqli_fetch_assoc($q);

				echo "<div style='text-align: center'>
					<img class='img-circle profile_img' height=110 width=120 src='image/".$_SESSION['pic']."'>
				</div>";
			?>
			<div style="text-align: center;"><b><br>Welcome</b>
				<h2>
					<?php  
						echo $_SESSION['login_user'];
					?>
				</h2>
			</div>
			<?php  
				echo "<br>";
				echo "<table class='table table-bordered'>";
					echo "<tr>";
						echo "<td>";
							echo "<b>FIRST NAME </b>";
						echo "</td>";
						echo "<td>";
							echo $row['first'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "<b>LAST NAME </b>";
						echo "</td>";
						echo "<td>";
							echo $row['last'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "<b>USERNAME </b>";
						echo "</td>";
						echo "<td>";
							echo $row['username'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "<b>PASSWORD </b>";
						echo "</td>";
						echo "<td>";
							echo $row['password'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "<b>EMAIL </b>";
						echo "</td>";
						echo "<td>";
							echo $row['email'];
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "<b>CONTACT </b>";
						echo "</td>";
						echo "<td>";
							echo $row['contact'];
						echo "</td>";
					echo "</tr>";
				echo "</table>";
				echo "</b>";
			?>
		</div>
	</div>
</body>
</html>