<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Account Settings</title>
	<link rel="stylesheet" type="text/css" href="home.css?v=<?php echo time(); ?>">


	<script src="https://kit.fontawesome.com/a076d05399.js"></script>


</head>

<style>


			.admincontainer{
		background: #eb8d00; 
		width: 35%;
		position: absolute;
		top: 55%;
		left: 50%;
		transform: translate(-50%, -50%);
		height: 55%;
		border-radius: 20px;

		}
</style>
<body>

<header>
	

			<nav style="background:		#202020;">

			  
					  <a href="HistoryDetails.php" style="margin-left: 240px;">History Details</a>
					  <a href="ViewAll.php">View All</a>
					  <a href="Add.php">Add Customer</a>
					  <a href="home.php">Home</a>

			  </nav> 

			  </header>


	<input type="checkbox" name="" id="check">

	<label for="check">

		<i class="fas fa-bars" id="btn"></i>
		<i class="fas fa-times" id="cancel"></i>

	</label>

	<div class="sidebar">
		<header>Dropping Station</header>
			<ul>
				<li><a href="home.php"><i class="fas fa-list"></i>Dashboard</a></li>

				<li><a href="View All.php"><i class="fas fa-users"></i>Sellers</a></li>

				<li><a href="AdminAccountSettings.php"><i class="fas fa-cog "></i>Account Settings</a></li>

				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
				
				</ul>
			</div>

			<p>.</p>


			<div class="admincontainer" align="center">

				<h1 style="margin-top: 5%;">Admin Account Details</h1>

				<table style="width: 60%; margin-top: 5%; margin-right: 20%; margin-left: 20%;">

					<tr>
						<td style="width: 30%;" align="center">
							<h3>Username:</h3>
						</td>
						<td style="width: 30%;" align="center">

							<h3 style="color: white;">
								

						<?php 

					 include "dbhelper.php";
					$sql = "SELECT id, user_name FROM logintbl";
					$result = $conn->query($sql);

					if ($row = mysqli_fetch_array($result)) {

					        echo $row['user_name'];

					    }
					    ?>

					    							</h3>
						</td>


					</tr>


					<tr>
						<td align="center">
							<h3 style="margin-top: 10%;">Password:</h3>
						</td>

						<td align="center">
							<h3 style="color: white; margin-top: 10%;">
								
							
						<?php 

					 include"dbhelper.php";
					$sql = "SELECT id, password FROM logintbl";
					$result = $conn->query($sql);

					if ($row = mysqli_fetch_array($result)) {
						
					        echo $row['password'];

					    }
					    ?>

					    </h3>
						</td>
					</tr>
					
					
				</table>

				<?php 

					 include"dbhelper.php";
					$sql = "SELECT id, password FROM logintbl";
					$result = $conn->query($sql);

					if ($row = mysqli_fetch_array($result)) {
						
					        echo "<a href=\"AdminAccountUpdate.php?id=$row[id]\"><input type='submit' value='Change Username and Password' style='width:45%; margin-top:30%; height:30px; border-radius:2px; border:hidden;'></a>";

					    }


					    ?>

			</div>

</body>
</html>

<?php 
}else{
     header("Location: loginpage.php");
     exit();
}
 ?>










