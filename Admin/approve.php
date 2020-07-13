<?php
	include "connection.php";
	include "navbar.php";
?>	
<!DOCTYPE html>
<html>
<head>
	<title>Approve Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Books</title>
	<style type="text/css">
		.srch
		{
			padding-left: 900px;

		}
		.form-control
		{
			width: 250px;

		}
		body {
			background-image: url("image/a.jpg"); 

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
		.container
		{
			height: 600px;
			background-color: black;
			opacity: .6;
			color: white;
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
	<center>
	<div class="container">
		<h3 style="text-align: center;">Approve Request</h3><br>
		<form class="Approve" action="" method="post">
			<input class="form-control" type="text" name="approve" placeholder="Yes or No" required=""><br>
			<input class="form-control" type="text" name="issue" placeholder="Issue Date yyyy-mm-dd"><br>
			<input class="form-control" type="text" name="return" placeholder="Return Date yyyy-mm-dd"><br>
			<button class="btn btn-default" type="submit" name="submit">Approve</button>
		</form>
	</div>
	</center>
</div>
<?php
  if(isset($_POST['submit']))
  {
  	
    mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  '$_POST[approve]', `issue` =  '$_POST[issue]', `return` =  '$_POST[return]' WHERE username='$_SESSION[name]' and bid ='$_SESSION[bid]';");
    
    mysqli_query($db,"UPDATE books SET quantity = quantity-1 where bid='$_SESSION[bid]' ;");

    $res=mysqli_query($db,"SELECT quantity from books where bid='$_SESSION[bid];");

    while($row=mysqli_fetch_assoc($res))
    {
      if($row['quantity']==0)
      {
        mysqli_query($db,"UPDATE books SET status='not-available' where bid='$_SESSION[bid]';");
      }
    }
    ?>
     <script type="text/javascript">
        alert("Updated successfully.");
        window.location="request.php";
      </script>
    <?php
  }
?>
</body>
</html>