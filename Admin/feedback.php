<?php
	include "connection.php";
	include "navbar.php";
?>	
<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>

	<link rel="stylesheet" type="t  ext/css" href="style.css">
	<meta charset="utf-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
	<style type="text/css">
		body
		{
			background-image: url("image/feed.jpg");
		}
		.wrapper
		{
			border-radius: 25px;
			width: 900px;
			height: 600px;
			background-color: #6f7374;
			color: black;
			opacity: .8;
			padding: 10px;
			margin: 20px auto; 
		}
		.form-control
		{
			border-radius: 25px;
			height: 70px;
			width: 60%;
		}
		.scroll
		{
			height: 300px;
			width: 100%;
			overflow: auto;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<center>
		<h3>If you have any suggestions or questions please write below.</h3>
		<form style="" action="" method="post"> 
			<input class="form-control" type="text" name="comment" placeholder="commment here."><br>
			<input class="btn btn-default"type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;">
		</form>
		</center>
		<br>
	<div class="scroll">
		<?php
			if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `comments` VALUES('', 'Admin', '$_POST[comment]');";
				if(mysqli_query($db,$sql))
				{
					$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
					$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
							echo "<td>"; echo $row['username']; echo "</td>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
				}

			}

			else
			{
				$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC"; 
					$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
							echo "<td>"; echo $row['username']; echo "</td>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
			}
		?>
	</div>
	</div>
</body>
</html>