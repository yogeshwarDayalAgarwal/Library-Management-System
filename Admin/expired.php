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
		.h:hover
		{
			color: white;
			width: 300px;
			height: 50px;
			background-color: #4a0876;
		}
		.container
		{
			height: 700px;
			background-color: black;
			opacity: .6;
			color: white;
			margin-top: -42px;
		}
		.scroll{
			width: 100%;
			height: 500px;
			overflow: auto;	
		}
		th,td
		{
			width: 10%;
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
	<div class ="container">
	<?php
		if(isset($_SESSION['login_user']))
		{
			?>
			<div style="float: left;padding:25px;">
				<form method="post" action ="">
				<button name="submit2" type="submit" class="btn btn-default" style="background-color: #06861a;color: yellow">RETURNED</button>&nbsp&nbsp
				<button name="submit3" type="submit" class="btn btn-default" style="background-color: red;color: yellow">EXPIRED</button>
				</form>
			</div>
			<!--
			<div style="float: right;padding-top: 10px;">
				<h2>Your fine is:
					<?php  
						//echo "$ ".($_SESSION['day']*.10);
					?>		
				</h2>
			-->
			<div class="srch">
			<form method="post" action="" name="form1">
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
			<button class="btn btn-default" name="submit" type="submit">Submit</button><br>
			</form>
			</div>
			<?php
			if(isset($_POST['submit']))
			{
				$res=mysqli_query($db,"SELECT * FROM `issue_book` where username = '$_POST[username]'and bid='$_POST[bid]';");
				while($row= mysqli_fetch_assoc($res))
				{
					$date=strtotime($row['return']);
					$c=strtotime(date("y-m-d"));
					$dif=$c-$date;
					if(dif>=0)
					{
						$day=floor($diff/(60*60*24));
						$fine = $day*.10;

						$x =  date("y-m-d");
						mysqli_query($db,"INSERT INTO `fine` values ('$_POST[username]','$_POST[bid]','$x','$day'.'$fine','not paid');");
						$var1='<p style="color:yellow; background-color: green">RETURNED</p>';
						mysqli_query($db,"UPDATE issue_book SET approve = '$var1' where username = '$_POST[username]' and bid='$_POST[bid]';");
					//echo $d.;
						mysqli_query($db,"UPDATE books set quantity = quantity +1 where bid='$_POST[bid]' ");
					}
				}
			}
		}
	?>
		
		<!--h2 style = "text-align: center;"> Date Expired List </h2><br>-->
	<br>
	<?php  
	$c=0;
		if(isset($_SESSION['login_user']))
		{
			$ret='<p style="color:yellow; background-color: green">RETURNED</p>';
			$exp='<p style="color:yellow; background-color: red">EXPIRED</p>';
			if(isset($_POST['submit2']))
			{
				$sql = "SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book on student.username = issue_book.username inner join books on  issue_book.bid=books.bid where  issue_book.approve ='$ret' ORDER BY `issue_book`.`return` DESC";
				$res = mysqli_query($db,$sql);
			}
			else if(isset($_POST['submit3']))
			{
				$sql = "SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book on student.username = issue_book.username inner join books on  issue_book.bid=books.bid where  issue_book.approve ='$exp' ORDER BY `issue_book`.`return` DESC";
				$res = mysqli_query($db,$sql);
			}
			else
			{
				$sql = "SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book on student.username = issue_book.username inner join books on  issue_book.bid=books.bid where issue_book.approve !='yes' and issue_book.approve !='' ORDER BY `issue_book`.`return` DESC";
				$res = mysqli_query($db,$sql);
			}

			//$res = mysqli_query($db,$sql);
			
			echo "<table class='table table-bordered' style='width: 99.5%' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Roll No";  echo "</th>";
				echo "<th>"; echo "BID";  echo "</th>";
				echo "<th>"; echo "Book Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Return Date";  echo "</th>";
				
			echo "</tr>";	
			echo "</table>";

			echo "<div class='scroll'>";
			echo "<table class='table table-bordered' >";
			while($row=mysqli_fetch_assoc($res))
			{
				 
				
				echo "<tr>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['roll']; echo "</td>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['approve']; echo "</td>";
				echo "<td>"; echo $row['issue']; echo "</td>";
				echo "<td>"; echo $row['return']; echo "</td>";

				echo "</tr>";
			}
			
		echo "</table>";
		echo "</div>";
		}
		else
		{
			?>
			<h3 style="text-align: center">Login to see Information </h3>
			<?php  
		}
	?>
	</div>
</div>
</body>
</html>
