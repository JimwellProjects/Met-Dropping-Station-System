<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Recieved Buyers</title>
	<link rel="stylesheet" type="text/css" href="Add.css?v=<?php echo time(); ?>">

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>

		<?php

			$id=$_GET['id'];

			include "dbhelper.php";

			$result=mysqli_query($conn,"SELECT * FROM sellertbl WHERE Buyer_Id=$id");

			$Buyer_ID="";

			while ($row=mysqli_fetch_array($result)) {

				$Buyer_ID=$row['Buyer_ID'];

				$Items=$row['Items'];
				$Buyer_name=$row['Buyer_name'];
				$Buyer_cnumber=$row['Buyer_cnumber'];
				$Amount=$row['Amount'];
				$Drop_fee=$row['Drop_fee'];
				$E_date=$row['E_date'];
				$Seller_Fullname=$row['Seller_Fullname'];

				}
			?>

			<?php

			if (isset($_POST['insert'])){

				include "dbhelper.php";

				$recieveddate=date('Y-m-d');

						if (mysqli_connect_error()) {

					    		die("Database connection failed: " . mysqli_connect_error());
								}

							else{

							$sql = "INSERT INTO history (Items,Buyer_name,Contact_no, Amount, DroppingFee, Date, Seller_Fullname, Recieveddate)
								values ('$Items','$Buyer_name','$Buyer_cnumber','$Amount','$Drop_fee','$E_date','$Seller_Fullname','$recieveddate')";

							$sql1 = "DELETE FROM sellertbl WHERE Buyer_ID=$id";


								if($conn->query($sql)) {
									
								}
								if($conn->query($sql1)) {
									header("location:HistoryDetails.php");
									
								}
								else{
									
								}


								$conn->close();
							}

			}

			?>
 
<header>
	

			<nav style="background:	#202020;">
			  
					  <a href="HistoryDetails.php" style="margin-left: 240px;">History Details</a>
					  <a href="ViewAll.php">View All</a>
					  <a href="Add.php">Add Customer</a>
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

	<form action="" method="POST"  style="width: 35%; height: 100%; background:#ffbb34; border-radius: 10px; box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52);-webkit-box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52);-moz-box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52); margin-left: 35%; margin-right: 35%; margin-top: 6%;">


	<table width="100%">



		<tr>
			<td>
				<div align="center">
				
					<img src="logo1.jpg" style="border-radius: 10px; width: 27%; height: 15vh; margin-top: 1%;">

				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div align="center">
					<h2>
						Information of Buyers

					</h2>
				</div>

			</td>
		</tr>


	<tr>
			<td>
				<table width='100%'  style='background: transparent; border:hidden; border-bottom: solid; margin-top: 5%; padding: 3%;'>

																
							<tr>
								<td style='width: 30%;'><h3 style='color: black;'>Buyer Name</h3></td>
								<td style='width: 20%;'><h3 style='color: black;'>:</h3></td>
								<td style='width: 50%;'><h3 style='color: black;'><?php echo $Buyer_name ?></h3></td>
							</tr>

							<tr>
								<td style='width: 30%;'><h3 style='color: black; margin-top: 5%;'>Item Name</h3></td>
								<td style='width: 20%;'><h3 style='color: black; margin-top: 5%;'>:</h3></td>
								<td style='width: 50%;'><h3 style='color: black; margin-top: 5%;'><?php echo $Items ?></h3></td>
							</tr>

							<tr>
								<td style='width: 30%;'><h3 style='color: black; margin-top: 5%;'>Contact Number</h3></td>
								<td style='width: 20%;'><h3 style='color: black;margin-top: 5%;'>:</h3></td>
								<td style='width: 50%;'><h3 style='color: black;margin-top: 5%;'><?php echo $Buyer_cnumber ?></h3></td>
							</tr>


							<tr>
								<td style='width: 30%;'><h3 style='color: black;margin-top: 5%;'>Amount</h3></td>
								<td style='width: 20%;'><h3 style='color: black;margin-top: 5%;'>:</h3></td>
								<td style='width: 50%;'><h3 style='color: black;margin-top: 5%;'><?php echo $Amount ?></h3></td>
							</tr>



							<tr>
								<td style='width: 30%;'><h3 style='color: black;margin-top: 5%;'>Dropping Fee</h3></td>
								<td style='width: 20%;'><h3 style='color: black;margin-top: 5%;'>:</h3></td>
								<td style='width: 50%;'><h3 style='color: black;margin-top: 5%;'><?php echo $Drop_fee ?></h3></td>
							</tr>



							<tr>
								<td style='width: 30%;'><h3 style='color: black;margin-top: 5%;'>Date</h3></td>
								<td style='width: 20%;'><h3 style='color: black;margin-top: 5%;'>:</h3></td>
								<td style='width: 50%;'><h3 style='color: black;margin-top: 5%;'><?php echo $E_date ?></h3></td>
							</tr>

							<tr>
								<td style='width: 30%;'><h3 style='color: black;margin-top: 5%;'>Seller Name</h3></td>
								<td style='width: 20%;'><h3 style='color: black;margin-top: 5%;'>:</h3></td>
								<td style='width: 50%;'><h3 style='color: black;margin-top: 5%;'><?php echo $Seller_Fullname ?></h3></td>
							</tr>

				</table>
			</td>
	</tr>
	
		<tr>
		
			<td>
				
			<div align="center" style="margin-top: 10px;">
			<input type="submit" name="insert" value="Recieved" style="background: #414143; width: 60%; height: 45px; border:hidden; border-radius: 15px; color: white; font-size: 25px; margin-bottom: 10px; margin-top: 10px;"></div>

			</td>

		</tr>

	</table>



		</form>
	</body>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script>

		$(document).ready(function(){

			$("#myNum").keypress(function(){

				if (this.value.length == 11) {
					return false;
				}
			})
		})
		
	</script>
</html>


<?php 
}else{
     header("Location: loginpage.php");
     exit();
}
 ?>
