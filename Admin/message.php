<?php 
	include"connection.php";
	include"navbar.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>message</title>
 </head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <style type="text/css">
 	.left_box
 	{
 		height: 105%;
 		width: 40%;
 		background-color: #8ecdd2;
 		margin-top: 50px;
 		float: left;
 	}	
 	.left_box2
 	{
 		height: 98.5%;
 		width: 75%;
 		background-color: #537890;
 		border-radius: 30px;
 		float: right;
 		margin-right: 20px;
 		padding-top: 20px;
 		padding-right: 5px;

 	}
 	.list
 	{
 		height: 80%;
 		width: 100%;
 		background-color: #537890;
 		float: right;
 		color: white;
 		padding: 10px;
 		overflow-y: scroll;
 		overflow-x: hidden;

 	}
 	.left_box input
 	{
 		width: 150px;
 		height: 50px;
 		background-color: #537890;
 		padding: 10px;
 		margin: 10px;
 		border-radius: 10px;
 	}
 	.right_box
 	{
 		height: 107%;
 		float: left;
 	
 		width: 60%;
 		margin-top: 40px;
 		padding: 10px;
 		background-color: #8ecdd2;
 	}
 	.right_box2
 	{
 		margin-top: 0px;
 		height: 100%;
 		width: 85%;
 		border-radius: 30px;
 		background-color: #537890;
 		float: left;
 	}
 	tr:hover
 	{
 		background-color: #1e3f54;
 		cursor: pointer;
 	}	
 	.form-control
		{
			height: 45px;
			width: 79%;

		}
		.msg
		{
			height: 440px;
			overflow: scroll;
		}
		.btn-info
		{
			background-color: #02c5b6;
		}
		.chatbox
		{
			display: flex;
			flex-flow: row wrap;
		}
		.user .chatbox
		{
			height: 50px;
			width: 400px;
			padding: 13px 10px;
			color: white;
			background-color: #ffa700;
			border-radius: 10px;
			float: right;
		}
		.admin .chatbox
		{
			height: 50px;
			width: 400px;
			padding: 13px 10px;
			color: white;
			background-color: #ffa700;
			border-radius: 10px;
			float: right;
		}
 </style>

 <body style="width: 100%x; height: 600px; background-color: #8ecdd2">
 <?php
 	$sql1=mysqli_query($db,"SELECT student.pic,message.username from student inner join message on student.username=message.username group by username order by status;");
 ?>
 <!-----   left box   --------->

 <div class="left_box">
 	<div class="left_box2">
 		<div style="color: white;"><center>
 			<form method="post" encrypte="multipart/form-data">
 				<input type="text" name="username" id="uname">
 				<button type="submit" name="submit1" class="btn btn-default">SHOW</button>
 			</center></form>
 		</div>
 		<div class="list">
 			<?php
 				echo "<table id='table' class='table'> ";
 				while ($res1=mysqli_fetch_assoc($sql1)) 
 				{
 					echo "<tr>";
 						echo "<td>"; echo "<img class='img-circle profile_img' height=60 width=60 src='image/".$res1['pic']."'> ";
 						echo "</td>";

 						echo "<td style='padding-top: 30px;'>";
 							echo $res1['username'];
 						echo "</td>";
 					echo "</tr>";
 				}
 				echo "</table>";
 			?>
 		</div>
 	</div>
 </div>
 	

<!-----    right box   -------->

 <div class="right_box">
 	<div class="right_box2">
 		<br>
 		
 		<?php

/*--------------- if submit1 is pressed --------*/

 			if(isset($_POST['submit1']))
 			{

	 			$res=mysqli_query($db,"SELECT * FROM `message` WHERE username='$_SESSION[login_user]' AND receiver='$_SESSION[username]' or username='$_SESSION[username]';");	

	 			mysqli_query($db,"UPDATE message set status='yes' where sender='student' and username='$_POST[username]' ;");

	 				if($_POST['username'] != '') 
	 				{
	 					$_SESSION['username']=$_POST['username'];
	 				
	 		?>


	 					<div style="height: 70px; width: 100%; text-align: center; color: white;">
	 						<h3><?php echo $_SESSION['username']; ?></h3>
	 					</div>

	 		<!-------  display message  --------->
	 					<div class="msg">
						<br>

				<?php

				
						$res=mysqli_query($db,"SELECT * FROM `message` WHERE username='$_SESSION[login_user]' AND receiver='$_SESSION[username]' or username='$_SESSION[username]';");	

						while($row=mysqli_fetch_assoc($res))
						{

							if($row['sender']=='admin')
							{

				?>	
			<!------   student    -------->

							<div class="chat user">
								
								<div style="float: right; margin-left: 5px;" class="chatbox">
								
								<?php
									echo $row['message'];
								?>			
								</div>

							</div>
							<br><br><br>

						<?php

							}
							
							else
							
							{

						?>

						<!-------    admin    ------>

							<div class="chat admin">
								
								<div style="float: left; margin-left: 5px;" class="chatbox">
						
							<?php

								echo $row['message'];
							
							?>			
							
								</div>
							</div>
							<br><br><br>

						<?php
							}	
						}
				 
						?>		
			</div>		
	 				<div>
	 					<form action="" method="post">
				 			<input type="text" name="message" class="form-control" required="" placeholder="write message..." style="float: left; margin-left: 7px;">&nbsp
							<button class="btn btn-info btn-lg" type="submit" name="submit"><span class="glyphicon glyphicon-send"> Send</span></button>
						</form>
	 				</div>
	 		<?php

	 				
	 				}
	 				else
	 				{
	 				
 					?>
 						<center>
 						<img src="image/giphy.gif" style="margin-top: 35px; height: 80%; width: 90%; border-radius: 50%;"></center>
 					<?php	

	 				}
	 		}
	 		else
	 		{
	 			if(isset($_POST['submit']))
	 			{
	 				mysqli_query($db,"INSERT into `library`.`message` values('', '$_SESSION[login_user]', '$_POST[message]', 'no', 'admin', '$_SESSION[username]' );");
	 				$res=mysqli_query($db,"SELECT * FROM `message` WHERE username='$_SESSION[login_user]' AND receiver='$_SESSION[username]' or username='$_SESSION[username]' ;");
	 			
	 				?>


	 				 <div style="height: 70px; width: 100%; text-align: center; color: white;">
	 					<h3><?php echo $_SESSION['username']; ?></h3>
	 				</div>
 				
	 				<div class="msg">
					<br>
					<?php
											//$res=mysqli_query($db,"SELECT * FROM `queries` WHERE username='$_SESSION[login_user]' AND receiver='$_SESSION[username]' or username='$_SESSION[username]' ;");	

						while($row=mysqli_fetch_assoc($res))
						{

							if($row['sender']=='admin')
							{

					?>	
			<!------   student    -------->

								<div class="chat user">
								
									<div style="float: right; margin-left: 5px;" class="chatbox">
								
									<?php
										echo $row['message'];
									?>			
									</div>

								</div>
								<br><br><br>

						<?php

							}
							
							else
							{

						?>

						<!-------    admin    ------>

								<div class="chat admin">
								
									<div style="float: left; margin-left: 5px;" class="chatbox">
						
									<?php

										echo $row['message'];
									
									?>			
							
									</div>
								</div>
								<br><br><br>

						<?php
							}	
						}
				 
						?>		
					</div>		
		
	 				<div>
	 					<form action="" method="post">
				 			<input type="text" name="message" class="form-control" required="" placeholder="write message..." style="float: left; margin-left: 7px;">&nbsp
							<button class="btn btn-info btn-lg" type="submit" name="submit"><span class="glyphicon glyphicon-send"> Send</span></button>
						</form>
	 				</div>
	 		

	 			<?php	
	 			}
	 			else
	 			{
	 			?>
 						<center>
 						<img src="image/giphy.gif" style="margin-top: 35px; height: 80%; width: 90%; border-radius: 50%;"></center>
 					<?php	
		 				//$res=mysqli_query($db,"SELECT * FROM `queries` WHERE username='$_SESSION[login_user]' AND receiver='$_SESSION[username]' or username='$_SESSION[username]' ;");
	 			}	
	 		}	
			?>	
</div></div></center></div>
				
	 	</div>
 </div>

 <script type="text/javascript">
 	var table=document.getElementById('table'),eIndex;
 	for(var i=0; i<table.rows.length; i++)
 	{
 		table.rows[i].onclick = function()
 		{
 			rIndex = this.rowIndex;
 			document.getElementById("uname").value = this.cells[1].innerHTML; 
 		}
 	}
 </script>
 </body>
 </html> 






