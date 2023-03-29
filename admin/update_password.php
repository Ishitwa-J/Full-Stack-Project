<?php
include "connection.php";
include "navbar.php";

?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Change Password</title>

	<style type="text/css">
		body
		{
			
			height: 650px;
			background-color: grey;
			background-image: url("images/c7.jpg");

		}
		.wrapper
		{
			width: 400px;
			height: 370px;
			margin: 100 auto;
			margin-left: 500px;
			margin-top: 100px;
			background-color: black;
			opacity: 0.5;
			color: white;

		}
		.form-control
		{
			width: 300px;

		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div  style="text-align:center;">
		
		<h1 style="text-align: center; font-size: 40px;font-family: Lucida Console;color: white;">Change Your Password</h1><br>
		</div>
		<div style="padding-left: 50px;">
		<form action="" method="post">
			<input type="text" name="username" placeholder="Username" required="" class="form-control"><br>
			<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
			<input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
			<button class="btn btn-default" type="submit" name="submit">Update</button>
		</form></div>
	</div>
	<?php
		if(isset($_POST['submit']))
		{
			if(mysqli_query($db,"UPDATE admin set password='$_POST[password]' where username='$_POST[username]' and email='$_POST[email]'; "))
			{
				?>
					<script type="text/javascript">
						alert("Password is updated successfully");
					</script>
				<?php
			}
		}
	?>
</body>
</html>
