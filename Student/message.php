<?php  
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Message</title>
	<meta name = "viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body
		{
			background-image: url("image/msg.jpg");
		}
		.wrapper
		{
			border-radius: 20px;
			height: 680px;
			width: 500px;
			background-color:#2c4052;
			opacity: .8;
			color: white;
			margin: -20px auto;
			padding: 10px;
			padding-top: 5px; 
		}
		.form-control
		{
			height: 47px;
			width: 76%;
		}
		.msg
		{
			height: 500px;
			overflow-y: scroll;
		}
		.chat
		{
			display: flex;
			flex-flex: row wrap;
		}
		.user .chatbox
		{
			height: 50px;
			width: 400px;
			padding: 13px 10px;
			border-radius: 10px;
			background-color: white;
			color: black;
			order: -1;
		}
		.admin .chatbox
		{
			height: 50px;
			width: 400px;
			padding: 13px 10px;
			border-radius: 10px;
			background-color: black;
		}
		.btn
		{
			color: #5578f0;
			background-color: white;
		}
	</style>
</head>
<body>
	<?php  
		if(isset($_POST['submit']))
		{
			mysqli_query($db,"INSERT INTO `library`.`message` VALUES ('','$_SESSION[login_user]','$_POST[message]','no','student','admin');");

			$res=mysqli_query($db,"SELECT * from message where username='$_SESSION[login_user]' or receiver = '$_SESSION[login_user]';");
		}
		else
		{
			$res=mysqli_query($db,"SELECT * from message where username='$_SESSION[login_user]' or receiver = '$_SESSION[login_user]';");
		}
		mysqli_query($db,"UPDATE message set status = 'yes' where sender = 'admin' and receiver='$_SESSION[login_user]';");
	?>
	<br><br>
	<div class="wrapper">
		<div style="height: 60px; width: 100%;border-radius: 10px; background-color:  #5578f0">
			<h3 style=" padding-top: 10px; text-align: center;">Admin</h3>
		</div>

		<div class="msg">
			<br>
			<?php
				$res=mysqli_query($db,"SELECT * from message where username='$_SESSION[login_user]' or receiver = '$_SESSION[login_user]';");  
				while ($row=mysqli_fetch_assoc($res)) 
				{	
					//$res=mysqli_query($db,"SELECT * from message where username='$_SESSION[login_user]';");
					if($row['sender']=='student')
					{

			?>
			<!------------------student--------------------->
			<div class="chat user">
				<div style="float: left; padding-top:5px;">
					&nbsp
					<?php
						echo "<img class ='img-circle profile_img' height=40 width=40 src='image/".$_SESSION['pic']."'>";
					?>
					&nbsp
				</div>
				<div style="float: right;" class="chatbox">
					<?php
						echo $row['message'];
					?>
				</div>				
			</div>
			<br>  
		<?php
		}
		 else
		{
	?>
			<!------------------Admin--------------------->
			
			<div class="chat admin">
				<div style="float: left; padding-top:5px;">
					&nbsp
					<img style="height: 40px; width: 40px;border-radius: 50%;" src="image/user.jpg">
					&nbsp
				</div>
				<div style="float: right;" class="chatbox">
					<?php
						echo $row['message'];
					?>
				</div>				
			</div>
			<br>
			<?php
				}
				}
			?>
		</div>

		<div style="height: 100px;padding-top: 20px;padding-left: 6px;">
			<form action="" method="post">
				<input type="text" name="message" class="form-control" required="" placeholder="Write Message...." style="float: left;">&nbsp
				<button class="btn btn-info btn-lg" type="submit" name="submit"><span class="glyphicon glyphicon-send"></span>&nbsp Send</button>
			</form>
		</div>
	</div>
	
</body>
</html>