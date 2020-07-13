<?php
	include "connection.php";
	include "navbar.php";
?>	
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Books</title>
	<style type="text/css">
		.srch
		{
			padding-left: 1200px;

		}
		body {
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
		  padding: 16px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}
		.h:hover
		{
			color: white;
			width: 300px;
			height: 50px;
			background-color: #4a0876;
		}
	</style>
</head>
<body>
	<!--                   sidenav bar                     ---->

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
	  <div class="h"><a href="add.php">Add Books</a></div>
	  <div class="h"><a href="request.php">Book Request</a></div>
	  <div class="h"><a href="issue_info.php">Issue Information</a></div>
	  <div class="h"><a href="expired.php">Expired List</a></div>
	</div>

	<div id="main">
	  
	  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
	

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





	<!--                   search bar                     ---->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1"> 

				<input class="form-control" type="text" name="search" placeholder="Search Books.." required="">
				<button style="background-color: #478796" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
		<form class="navbar-form" method="post" name="form1"> 

				<input class="form-control" type="text" name="bid" placeholder="Enter Book ID.." required="">
				<button style="background-color: #478796" type="submit" name="submit1" class="btn btn-default">
					Delete
				</button>
		</form>
	</div>


	<h2>List Of Books</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q = mysqli_query($db,"SELECT * FROM `books` WHERE name like '%$_POST[search]%'");
			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Search again. ";
			}
			else
			{
				echo "<table class='table table-bordered table-hover'>";
				echo "<tr style='background-color: #478796;'>";
					//table
					echo "<th>"; echo"ID"; echo "</th>";
					echo "<th>"; echo"Book-Name"; echo "</th>"; 
					echo "<th>"; echo"Authors Name"; echo "</th>";
					echo "<th>"; echo"Edition"; echo "</th>";
					echo "<th>"; echo"Status"; echo "</th>";
					echo "<th>"; echo"Quantity"; echo "</th>";
					echo "<th>"; echo"Department"; echo "</th>";
				echo "</tr>";		

				while($row=mysqli_fetch_assoc($q))
				{
					echo "<tr>";

					echo "<td>"; echo $row['bid']; echo "</td>";
					echo "<td>"; echo $row['name']; echo "</td>";
					echo "<td>"; echo $row['authors']; echo "</td>";
					echo "<td>"; echo $row['edition']; echo "</td>";
					echo "<td>"; echo $row['status']; echo "</td>";
					echo "<td>"; echo $row['quantity']; echo "</td>";
					echo "<td>"; echo $row['department']; echo "</td>";

					echo "</tr>";
				}
				echo"</table>";
			}
		}

		/*  if button is no presssed     */
		else
		{
			$res=mysqli_query($db,"SELECT * FROM books ORDER BY books.bid ASC;");
			echo "<table class='table table-bordered table-hover'>";
			echo "<tr style='background-color: #478796;'>";
				//table
				echo "<th>"; echo"ID"; echo "</th>";
				echo "<th>"; echo"Book-Name"; echo "</th>"; 
				echo "<th>"; echo"Authors Name"; echo "</th>";
				echo "<th>"; echo"Edition"; echo "</th>";
				echo "<th>"; echo"Status"; echo "</th>";
				echo "<th>"; echo"Quantity"; echo "</th>";
				echo "<th>"; echo"Department"; echo "</th>";
			echo "</tr>";		

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";

				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
			echo"</table>";
			if(isset($_POST['submit1']))
			{
				if(isset($_SESSION['login_user']))
				{
					mysqli_query($db,"DELETE FROM `books` where bid='$_POST[bid]';");
					?>
						<script type="text/javascript">
							alert("Delted Successfully.");
						</script>
					<?php
				}
				else
				{
					?>
						<script type="text/javascript">
							alert("Please Login First.");
						</script>
					<?php	
				}
			}
		}
	?> 
	</div>
</body>
</html>