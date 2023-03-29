<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 830px;
		}
body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 80px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
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
.img-circle
{
	margin-left: 20px;
}	
.h:hover
{
	color: white;
	width:260px;
	height: 70px;
	background-color: sandybrown;
	
}
</style>
</head>
<body>
  <!----------------sidenav--------------------->
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

<div style="color: white; margin-left: 60px; font-size: 30px;text-align: center;">
					<img src="">
					<?php
					if(isset($_SESSION['login_user']))
					{
					echo "<img class='img-circle profile_img' height=80px width=80px src='images/".$_SESSION['pic']."'>";
					echo "</br>";
					echo "Welcome &nbsp &nbsp ".$_SESSION['login_user'];
				}
					?>
</div><br>

  <div class="h"><a href="add.php">Add Books</a></div>
  <div class="h"><a href="delete.php">Delete Books</a></div>
  <div class="h"><a href="#">Books Requested</a></div>
  <div class="h"><a href="#">Issue Info</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
	<!-- _________________search bar__________________ -->

	<div class="srch">
		

		<form class="navbar-form" method="post" name="form1">

				<input class="form-control" type="text" name="bid" placeholder="Enter Book ID" required="" >
				<button style="background-color: #c5882299;" type="submit" name="submit1" class="btn btn-default">
					Delete
				</button>
		</form>
	</div>

	<h2>List of Books</h2>
	<?php


		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' ");
			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry, no books found! Try again.";
			}
			else
			{
				echo "<table class='table table-bordered table-hover' >";
	echo "<tr style='background-color: #c5882299;'>";

		echo "<th>"; echo "ID"; echo "</th>";
		echo "<th>"; echo "Book Name"; echo "</th>";
		echo "<th>"; echo "Author"; echo "</th>";
		echo "<th>"; echo "Edition"; echo "</th>";
		echo "<th>"; echo "Status"; echo "</th>";
		echo "<th>"; echo "Quantity"; echo "</th>";
		echo "<th>"; echo "Department"; echo "</th>";
	echo "</tr>";

	while ($row=mysqli_fetch_assoc($q)) 
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
	echo "</table>";
			}
		}
		/* if button is not pressed*/
		else
		{
			$res=mysqli_query($db,"select * from `books` order by `books`.`name` asc;");
	echo "<table class='table table-bordered table-hover' >";
	echo "<tr style='background-color: #c5882299;'>";

		echo "<th>"; echo "ID"; echo "</th>";
		echo "<th>"; echo "Book Name"; echo "</th>";
		echo "<th>"; echo "Author"; echo "</th>";
		echo "<th>"; echo "Edition"; echo "</th>";
		echo "<th>"; echo "Status"; echo "</th>";
		echo "<th>"; echo "Quantity"; echo "</th>";
		echo "<th>"; echo "Department"; echo "</th>";
	echo "</tr>";

	while ($row=mysqli_fetch_assoc($res)) 
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
	echo "</table>";
		}
		if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				mysqli_query($db,"delete from books where bid='$_POST[bid]';");
				?>
				<script type="text/javascript">
					alert("Delete Successful");
				</script>
				<?php
			}
			else
		{
			?>
				<script type="text/javascript">
					alert("Please Login First");
				</script>
				<?php
		}
		}
		
	?>
  </div>
</body>
</html>




















