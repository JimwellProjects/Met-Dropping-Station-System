<?php 
session_start();

if (isset($_SESSION['SellerId']) && isset($_SESSION['Seller_Fullname'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Seller View Products</title>
	<link rel="stylesheet" type="text/css" href="viewall.css?v=<?php echo time();?>">

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>
	<style type="text/css">
		
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
		  top: 40%;
		  left: 50%;
		  transform: translate(-50%, -50%);

}



	</style>
 
<header>
	
			<nav style="background:#202020; ">
			  
					  <a href=" SellerPage.php"style="margin-left: 240px;">View All</a>
					  <a href="SellerAddBuyers.php"  >Add Buyers</a>
					  <a href="SellerAddProducts.php">Add Products</a>
					  <a href="SellerHome.php" style="margin-left: 5px">Home</a>
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



			<h1 style="text-align: left; margin-top: 7%;color: white; font-size: 40px; margin-left: 10%;" >Products</h3>



		<div class="productcontainer" align="center">

			<table width="100%"  style="background: #505050; border:hidden; border-bottom: solid; border-color: #eb8d00; border-top-left-radius: 15px; border-top-right-radius: 15px; margin-bottom: 40px;">

				<tr>
					<td align="center" style="width: 25%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 3%; ">Product</h2></td>
					<td align="center" style="width: 25%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 3%; ">BuyerName</h2></td>
					<td align="center" style="width: 25%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 3%; ">Contact Number</h2></td>
					<td align="center" style="width: 25%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 3%; ">Pick Up Date</h2></td>	

				</tr>

			</table>


			<?php


		include "dbhelper.php";

		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT * FROM sellerproducts";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {


		while($row = mysqli_fetch_array($result)) {

			echo "<table width=' 96%' style='background: #404040; margin-top: 1%; border-radius: 10px; height: 60px;'>

				<tr>
					<td align='center' style='width: 24%; '><h3 style='color: white;'>".$row['Products']."</h3></td>	
					<td align='center' style='width: 24%; '><h3 style='color: white;'>".$row['BuyerName']."</h3></td>
					<td align='center' style='width: 24%; '><h3 style='color: white;'>".$row['BuyerContactNumber']."</h3></td>
					<td align='center' style='width: 24%; '><h3 style='color: white;'>".$row['DatePickUp']."</h3></td>

		  		</tr>

			</table>";

		}

	}

			?>

			<p style="color: #231F1F;">.</p>

	</div>

</body>

</html>

<?php 
}else{
     header("Location: SellerLogin.php");
     exit();
}
 ?>
