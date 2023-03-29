<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>

	<title>Student Registration</title>
	<link rel="stylesheet" tye="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

	<body>
	<style type="text/css">
    	section
    	{
    		margin-top: -20px;	
    	}
    </style>
</head> 
<body>
	
<section>
	<div class="reg_img" style="height: 720px;">
		<br>
		<div class="box2">
			<h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;color: white;">Library Management System</h1>
			<h1 style="text-align:center;font-size: 25px;color: white;">User Registration Form</h1><br>
			<form name="Registration" action="" method="post">
				<br>
				<div class="login">
					<input class="form-control" type="text" name="first" placeholder="First Name" required=""><br>
					<input class="form-control" type="text" name="last" placeholder="Last Name" required=""><br>
				<input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
				<input class="form-control" type="password" name="password" placeholder="password" required=""> <br>
				<input class="form-control" type="text" name="roll" placeholder="Roll No." required><br>
				<input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
				<input class="form-control" type="text" name="contact" placeholder="Phone No" required=""><br>
				<input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 40px;"></div>
			</form>
	</div>
   </div>
  </section>
  <?php
  if(isset($_POST['submit']))
  {
  	$count=0;
  	$sql="select username from student";
  	$res=mysqli_query($db,$sql);

  	while($row=mysqli_fetch_assoc($res))
  	{
  		if($row['username']==$_POST['username'])
  		{
  			$count=$count+1;
  		}
  	}

  	if($count==0)
  	{
  	mysqli_query($db,"insert into `student` values('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[roll]', '$_POST[email]', '$_POST[contact]','19.jpg');");
  ?>
<script type="text/javascript">
	alert("Registration Successful");
</script>
  <?php
}
else
{
	?>
<script type="text/javascript">
	alert("The username already exists");
</script>
  <?php
}

}

?>

</body>