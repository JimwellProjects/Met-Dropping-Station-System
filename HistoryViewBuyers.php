<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>History View Buyers</title>
	<link rel="stylesheet" type="text/css" href="home.css?v=<?php echo time(); ?>">


	<script src="https://kit.fontawesome.com/a076d05399.js"></script>


</head>

<style >
	.productcontainer{
		  width: 70%;
		  background: #231F1F;
		  margin-top: 3%;
		  height: auto;
		  border-top-left-radius: 15px;
		  border-top-right-radius: 15px;
		  border-bottom-right-radius:5px; 
		  border-bottom-left-radius:5px;
		  border: hidden;
		  position: absolute;
		  top: 52%;
		  left: 50%;
		  transform: translate(-50%, -50%);

}

input[type="checkbox"]{
  display: none;
}
.itemcontainer{
	  display: none;
	  background: gray;
      background:rgba(0,0,0,0.9);
	  width: 50%;
	  padding: 30px;
	  box-shadow: 0 0 8px rgba(0,0,0,0.1);
	  position: absolute;
	  top: 60%;
	  left: 50%;
	  transform: translate(-50%, -50%);
	  color: white;
	  height:auto;
}

.itemcontainer .close-btn{
  position: absolute;
  right: 20px;
  top: 15px;
  font-size: 20px;
  cursor: pointer;
  background:#eb8d00;
  width: 6%;
  height: 25px;
  text-align: center;

}
.itemcontainer .close-btn:hover{
  color: #3498db;
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

				<li><a href="ViewAll.php"><i class="fas fa-users"></i>Sellers</a></li>

				<li><a href="AdminAccountSettings.php"><i class="fas fa-cog "></i>Account Settings</a></li>

				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
				
				</ul>
			</div>

			<p>.</p>

			<table width="50%"  style="background: transparent; border:hidden; margin-top: 5%; margin-left: 10%;">

				<tr>
						<td style="width: 25%;"><img src="profile.png" style="width: 30%; margin-top: 7%;"></td>
						<td style="width: 25%;"><h1 align="center" style="margin-left: -50%; color: #eb8d00; margin-top: 10%; border-bottom: solid; width: 80%;">



				<?php

					include "dbhelper.php";
					if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
					}
					$sql = "SELECT Seller_Fullname,Buyer_ID FROM sellertbl";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {


						echo $_POST['name'];}?>
						

					</h1></td>

				</tr>


			</table>

				<div class="productcontainer" align="center">

			<table width="100%"  style="background: #505050; border:hidden; border-bottom: solid; border-color: #eb8d00; border-top-left-radius: 15px; border-top-right-radius: 15px; margin-bottom: 40px;">

				<tr>
					<td align="center" style="width: 33%;"><h2 style="background: transparent; color: #eb8d00; margin-top: 3%; ">Buyer Name</h2></td>
					<td align="center" style="width: 33%;"><h2 style="background: transparent; color: #eb8d00; margin-top: 3%; ">Date Recieved</h2></td>
					<td align="center" style="width: 33%;"><h2 style="background: transparent; color: #eb8d00; margin-top: 3%; ">More Info</h2></td>

				</tr>

			</table>


		<?php

		include "dbhelper.php";
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT * FROM history";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {


		while($row = $result->fetch_assoc()) {

						if ($row["Seller_Fullname"]==$_POST['name']) {

					echo "<table style='background: #505050; margin-top: 1%; border-radius: 10px; height: 50px; color:white; width:99%; text-align:center;'>";

					echo "<tr>
					<td style='width:33%;'><h3>" . $row["Buyer_name"] . "</h3></td>
					<td style='width:33%;'<h3>" . $row["Recieveddate"] . "</h3></td>
					<td style='width:33%;'>

							<input type='checkbox' id='"."a".$row['Id']."'>
								<BUTTON style='background:#282828; color: #eb8d00; border:hidden; width: 35%; height: 40px; border-radius: 10px;''>
										<label for='"."a".$row['Id']."' class='show-btn' style='text-decoration: none; color: #eb8d00; font-size: 17px;'>View More Info</label></BUTTON>
														<div class='itemcontainer'>



															<label for='"."a".$row['Id']."' class='close-btn fas fa-times' title='close'></label>

																<h2 style='background: transparent; color: #eb8d00; margin-top: 1%; text-align:center;  border:hidden; border-bottom: solid;'>More Information</h2>



															<table width='100%'  style='background: transparent; margin-top:5%;'>

																
															<tr>
																<td style='width: 40%;'><h3 style='color: white;'>Buyer Name</h3></td>
																<td style='width: 10%;'><h3 style='color: white;'>:</h3></td>
																<td style='width: 50%;'><h3 style='color: white;'>".$row['Buyer_name']."</h3></td>
															</tr>

															<tr>
																<td style='width: 40%;'><h3 style='color: white; margin-top:4%;'>Items</h3></td>
																<td style='width: 10%;'><h3 style='color: white; margin-top:4%;'>:</h3></td>
																<td style='width: 50%;'><h3 style='color: white; margin-top:4%;'>".$row['Items']."</h3></td>
															</tr>

															<tr>
																<td style='width: 40%;'><h3 style='color: white; margin-top:4%;'>Buyer Contact Number</h3></td>
																<td style='width: 10%;'><h3 style='color: white; margin-top:4%;'>:</h3></td>
																<td style='width: 50%;'><h3 style='color: white; margin-top:4%;'>".$row['Contact_no']."</h3></td>
															</tr>

															<tr>
																<td style='width: 40%;'><h3 style='color: white; margin-top:4%;'>Amount</h3></td>
																<td style='width: 10%;'><h3 style='color: white; margin-top:4%;'>:</h3></td>
																<td style='width: 50%;'><h3 style='color: white; margin-top:4%;'>".$row['Amount']."</h3></td>
															</tr>


															<tr>
																<td style='width: 40%;'><h3 style='color: white; margin-top:4%;'>Dropping Fee</h3></td>
																<td style='width: 10%;'><h3 style='color: white; margin-top:4%;'>:</h3></td>
																<td style='width: 50%;'><h3 style='color: white; margin-top:4%;'>".$row['DroppingFee']."</h3></td>
															</tr>


															<tr>
																<td style='width: 40%;'><h3 style='color: white; margin-top:4%;'>Date</h3></td>
																<td style='width: 10%;'><h3 style='color: white; margin-top:4%;'>:</h3></td>
																<td style='width: 50%;'><h3 style='color: white; margin-top:4%;'>".$row['Date']."</h3></td>
															</tr>




															


													</table>


					</td>";

					echo "</tr></table>";

					echo "<style>#"."a".$row['Id'].":checked ~ .itemcontainer{display: block;visibility: visible;}</style>";
						}
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

