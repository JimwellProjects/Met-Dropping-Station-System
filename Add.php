<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Add Customer</title>
	<link rel="stylesheet" type="text/css" href="Add.css?v=<?php echo time(); ?>">

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>
 
<header>
	

			<nav style="background:	#202020;">
			  
					  <a href="HistoryDetails.php" style="margin-left: 240px;">History Details</a>
					  <a href="ViewAll.php">View All</a>
					  <a href="Add.php"  style="border:solid; height: 5px; border-top: hidden;border-right: hidden;border-left:hidden;">Add Customer</a>
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

	<form action="Add.php" method="POST"  style="width: 33%; height: 100%; background:#ffbb34; border-radius: 10px; box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52);-webkit-box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52);-moz-box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52); margin-left: 35%; margin-right: 35%; margin-top: 6%;">




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
					<h3>
						Insert A New Customer


					</h3>
				</div>


			<?php

					if (isset($_POST['insert'])) {
						
						$Item = $_POST['items'];
						$Buyername = $_POST['buyername'];
						$Buyercnum = $_POST['buyercnum']; 
						$Amount = $_POST['amount']; 
						$Dropfee = $_POST['dropfee'];
						$Edate = $_POST['edate']; 
						$seller_Fullname = $_POST['sellers'];
					   

							include "dbhelper.php";

							if (mysqli_connect_error()) {

					    		die("Database connection failed: " . mysqli_connect_error());
								}

							else{
								$sql = "INSERT INTO Sellertbl (Items,Buyer_name,Buyer_cnumber, Amount, Drop_fee, E_date,Seller_Fullname)
								values ('$Item','$Buyername','$Buyercnum','$Amount','$Dropfee','$Edate','$seller_Fullname')";

								if($conn->query($sql)) {
									echo "

									<div align='center'><p style='color:white; text-align:center; margin-top:3%; background:gray;  width:50%; border-radius:5px;'>New Added Customer</p></div>";
								}
								else{
									echo "Error : ".sql ."<br>". $conn->error;
								}
								$conn->close();
							}


						}

  					?>
			</td>
		</tr>


	<tr>
		<td colspan="1">
				
				<input required type="text" name="items" placeholder="Items: __ __ __ __ __" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;
		 		border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%; margin-top: 20px; border:hidden;"></td>
		</td>

	</tr>


		<tr>
		<td colspan="1">
				
				<input required  type="text" name="buyername" placeholder="Buyer Name: __ __ __ __ __" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;
		 		border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;"></td>
		</td>

	</tr>

	<tr>
		<td colspan="1">
				
				<input required  type="number" id="myNum"  name="buyercnum" placeholder="Buyer Contact Number: __ __ __ __ __" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;"></td>
		</td>

	</tr>
		<tr>
		<td colspan="1">
				
				<input required  type="number" name="amount" placeholder="Amount: __ __ __ __ __" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;
		 		border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;"></td>
		</td>

	</tr>


			<tr>
		<td colspan="1">
				
				<input required   type="number" id="drop_fee" name="dropfee" placeholder="Dropping Fee: __ __ __ __ __" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;
		 		border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;"></td>
		</td>

	</tr>

		<tr>
		<td colspan="1">
				
				<h3 style="margin-left: 3%;">Input Date</h3>

	</tr>

	<tr>
		<td colspan="1">
				
				<input min="1000-01-01" max="50000-12-31" required type="date" name="edate" style="height: 35px; width: 35%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;
		 		border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden; "></td>
		</td>

	</tr>

	<tr>
		<td>
			<h3 style="margin-top: 3%; margin-left: 3%;">Choose A Seller:</h3>
		</td>
	</tr>

	<tr>
		<td rowspan="1" width="30%" style="margin-left: 3%;">
			<select   name="sellers" style="width: 60%;height: 35px;border-radius: 5px; border:solid; border-width: 1px;
		 		border-color: #A9A9A9; margin-left: 3%; border:hidden;">

						<?php

					include "dbhelper.php";

					if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
					}
					$sql = "SELECT Seller_Fullname FROM sellerprofile";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {


					while($row = $result->fetch_assoc()) {

						echo "<option name='".$row['Seller_Fullname']."'>".$row['Seller_Fullname']."</option>";


						}
					} else { echo "0 results"; }
					$conn->close();
						?>
			
			</select>
		</td>

	</tr>
	
		
		<tr>
		
			<td>
				
			<div align="center" style="margin-top: 10px;">
			<input type="submit" name="insert" value="Insert" style="background: #414143; width: 60%; height: 45px; border:hidden; border-radius: 15px; color: white; font-size: 25px; margin-bottom: 10px; margin-top: 10px;"></div>

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


		$(document).ready(function(){

			$("#drop_fee").keypress(function(){

				if (this.value.length == 2) {
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
