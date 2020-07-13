<?php
	include "connection.php";
	include "navbar.php";
?>	
<!DOCTYPE html>
<html>
<head>
	<title>Expired List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Books</title>
	<style type="text/css">
		.srch
		{
			padding-left: 78%;

		}
		.form-control
		{
			width: 250px;

		}
		body {
			background-image: url("image/c.jpg"); 

		  font-family: "Lato", sans-serif;
		  transition: background-color .5s;
		}

		.sidenav {
		  height: 100%;
		  margin-top: 60px;
		  width: 0;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  left: 0;
		  background-color: #222222;
		  overflow-x: hidden;
		  transition: 0.5s;
		  padding-top: 60px;
		}

		.sidenav a {
		  padding: 8px 8px 8px 32px;
		  text-decoration: none;
		  font-size: 25px;
		  color: #818181;
		  display: block;
		  transition: 0.3s;
		}

		.sidenav a:hover {
		  color: #f1f1f1;
		}

		.sidenav .closebtn {
		  position: absolute;
		  top: 0;
		  right: 25px;
		  font-size: 36px;
		  margin-left: 50px;
		}

		#main {
		  transition: margin-left .5s;
		  padding-left: 10px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}
		
	</style>
</head>
<body>
<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<div style="color: white; text-align: center;font-size: 20px;">

		<?php
		if(isset($_SESSION['login_user']))
			{
				echo "<img class ='img-circle profile_img' height=120 width=120 src='image/".$_SESSION['pic']."'>";
				echo "<br>";
				echo " welcome " .$_SESSION['login_user'];
			}
		?>
		<br><br>
	</div>
	  <div class="h"><a href="books.php">Books</a></div>
	  <div class="h"><a href="request.php">Book Request</a></div>
	  <div class="h"><a href="issue_info.php">Issue Information</a></div>
	  <div class="h"><a href="expired.php">Expired List</a></div>
	</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
</div>
	<!--        -----search bar-----       -->

	
	<center><h2><b><u>FINE INFORMATION</u></b></h2></center>
	<br><br>

	<?php
		//echo "hi chutiyo ";
		$res=mysqli_query($db,"SELECT * FROM `fine` where username='$_SESSION[login_user]';");

		echo"<table class ='table table-bordered table-hover'>";
		echo "<tr style='background-color: #9cb5e6;'>";
			echo"<th>"; echo"Username"; echo"</th>";
				echo"<th>"; echo"BID"; echo"</th>";
			echo"<th>"; echo"Return Date"; echo"</th>";
			echo"<th>"; echo"Days exceeded"; echo"</th>";
			echo"<th>"; echo"Fine"; echo"</th>";
			echo"<th>"; echo"Status"; echo"</th>";
		echo"</tr>";
	
		while($row=mysqli_fetch_assoc($res))
		{
			echo"<tr>";
			echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['returned']; echo "</td>";
				echo "<td>"; echo $row['day']; echo "</td>";
				echo "<td>"; echo $row['fine']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo"</tr>";
		}	

		echo"</table>";


	?>
</div>
</body>
</html>
