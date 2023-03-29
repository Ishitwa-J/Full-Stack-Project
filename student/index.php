<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Online Library Management System
	</title>
	<link rel="stylesheet" tye="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
	line-height: 80px;
}
</style>
</head>
<style type="text/css">
	
</style>
<body>
	<div class="wrapper">

		<header>
		<div class="logo">
		<img src="images/img3.jpg">
		<h1 style="color: white;font-size: 30px;">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
		</div>
			<?php
				if(isset($_SESSION['login_user']))
				{
					?>
				<nav>
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="books.php">BOOKS</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
					<li><a href="feedback.php">FEEDBACK</a></li>
				</ul>
			</nav>
			<?php
				}
				else
				{
				?>
					<nav>
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="books.php">BOOKS</a></li>
					<li><a href="student_login.php">STUDENT_LOGIN</a></li>
					<li><a href="feedback.php">FEEDBACK</a></li>
				</ul>
			</nav>
				<?php
			}
			?>
		</header>
		<section>	
		<div class="sec_img">
			<body style="background-color: black;">
		

			<br><br><br>
			<div class="box">
				<br><br><br>
				<h1 style="text-align: center;font-size: 35px;">Welcome to the Library</h1><br>
				<h1 style="text-align: center;font-size: 25px;">Opens at 09:00</h1><br>
				<h1 style="text-align: center;font-size: 25px;">Closes at 22:00</h1><br>
			</div>
		</div>
		</section>
</div>
	<?php 
		include "footer.php";
	?>
</body>
</html>