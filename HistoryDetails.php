<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>History Of Customers</title>
	<link rel="stylesheet" type="text/css" href="HistoryDetails.css?v=<?php echo time();?>">

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>
<header>


			<nav style="background:#202020; ">
			  
					  <a href="HistoryDetails.php" style="margin-left: 240px; border:solid; height: 5px; border-top: hidden;border-right: hidden;border-left:hidden;">History Details</a>
					  <a href="ViewAll.php" >View All</a>
					  <a href="Add.php"  >Add Customer</a>
					  <a href="home.php" style="margin-left: 5px">Home</a>

					  

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

				<li><a href="ViewAll.php"><i class="fas fa-users"></i>Sellers</a></li>

				<li><a href="AdminAccountSettings.php"><i class="fas fa-cog "></i>Account Settings</a></li>

				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
				
				</ul>
			</div>

			<p>.</p>



			<h1 style="text-align: left; margin-top: 7%;color: white; font-size: 40px; margin-left: 8%;" >History</h3>




		<div class="historycontainer" align="center">

			<table width="90%"  style="background: transparent; border:hidden; border-bottom: solid; border-color: #eb8d00;">

				<tr align="center">

					<td  style="width: 30%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%; margin-left: -40%;">Profile</h2></td>
					<td  style="width: 30%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%; margin-left: -90%;">Name</h2></td>
					<td  style="width: 30%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%; ">Buyer History</h2></td>
				</tr>

			</table>

				<?php

		include 'dbhelper.php';


		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT Seller_Fullname FROM sellerprofile";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {


		while($row = $result->fetch_assoc()) {

			echo "<table width='90%'  style='background: 	#505050; margin-top: 1%; border-radius: 10px; height: 60px;'>

				<tr align='center'>
					<td style='width: 30%; '> <img src='profile.png' style='width: 16%; height: 45px; border-radius: 50% 50%; margin-left: -40%;'></td>	
					<td style='width: 30%; '> <h3 style='margin-left: -90%; color: #eb8d00; '>".$row['Seller_Fullname']."</h3></td>


				<form  action='HistoryViewBuyers.php' method='POST'>

						<input type='hidden' name='name' value='".$row['Seller_Fullname']."'>

							<td style='width: 27%; padding: 0; margin: 0;'> <input type='submit' value='ViewBuyers' name='".$row['Seller_Fullname']."' style='background:#eb8d00;  border:hidden; width: 65%; height: 40px; border-radius: 10px; font-size:17px;'></td>

							</form>

							

				</tr>

			</table>";


		}

	}

			?>



			<p>.</p>

		</div>


</body>
</html>

<?php 
}else{
     header("Location: loginpage.php");
     exit();
}
 ?>