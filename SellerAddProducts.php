<?php 
session_start();

if (isset($_SESSION['SellerId']) && isset($_SESSION['Seller_Fullname'])) {

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Seller Add Products</title>
	<link rel="stylesheet" type="text/css" href="Add.css?v=<?php echo time(); ?>">

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>
 
<header>
	

			<nav style="background:	#202020;">
			  
					  <a href="SellerPage.php" style="margin-left: 240px;">View All</a>
					  <a href="SellerAddBuyers.php">Add Buyers</a>
					  <a href="SellerAddProducts.php"  style="border:solid; height: 5px; border-top: hidden;border-right: hidden;border-left:hidden; ">Add Products</a>
					  <a href="SellerHome.php" style="margin-left: 5px;">Home</a>

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
				<li><a href="SellerHome.php"><i class="fas fa-list"></i>Dashboard</a></li>
				
				<li><a href="SellerViewBuyers.php"><i class="fas fa-users"></i>Buyers</a></li>

				<li><a href="#"><i class="fas fa-cog "></i>Account Settings</a></li>

				<li><a href="Sellerlogout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
				
				</ul>
			</div>

			<p>.</p>

	<form action="SellerAddProducts.php" method="POST"  style="width: 30%; height: 100%; background:#ffbb34; border-radius: 10px; box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52);-webkit-box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52);-moz-box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52); margin-left: 35%; margin-right: 35%; margin-top: 10%;">




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
						Insert A Product
					</h3>
				</div>


			<?php

					if (isset($_POST['insert'])) {
						
						$Products = $_POST['products'];
						$Buyername = $_POST['buyername'];
						$Buyercnum = $_POST['buyercnum']; 
						$Pickupdate = $_POST['pickupdate']; 
						
					   

							include "dbhelper.php";

							if (mysqli_connect_error()) {

					    		die("Database connection failed: " . mysqli_connect_error());
								}

							else{
								$sql = "INSERT INTO sellerproducts (Products,BuyerName,BuyerContactNumber,DatePickUp)
								values ('$Products','$Buyername','$Buyercnum','$Pickupdate')";

								if($conn->query($sql)) {
									echo "

									<div align='center'><p style='color:white; text-align:center; margin-top:3%; background:gray;  width:50%; border-radius:5px;'>New Added Product</p></div>";
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

			<label ><h3 style="margin-left: 3%;">Product:</h3></label>
				
				<input required type="text" name="products"  style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;
		 		border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%; border:hidden;"></td>
		</td>

	</tr>

	<tr>
		<td colspan="1">

			<label ><h3 style="margin-left: 3%;">Buyer Name:</h3></label>
				
				<input required  type="text" name="buyername"  style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;
		 		border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;"></td>
		</td>

	</tr>

	<tr>
		<td colspan="1">

						<label ><h3 style="margin-left: 3%;">Buyer Contact Number:</h3></label>
				
				<input required  type="number" id="myNum"  name="buyercnum"  style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;"></td>
		</td>

</tr>


	<tr>
		<td colspan="1">

			<label ><h3 style="margin-left: 3%;">When To Pick Up</h3></label>
				
				<input min="1000-01-01" max="50000-12-31" required type="date" name="pickupdate" style="height: 35px; width: 50%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;
		 		border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden; "></td>
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
		
	</script>
</html>

<?php 
}else{
     header("Location: SellerLogin.php");
     exit();
}
 ?>
