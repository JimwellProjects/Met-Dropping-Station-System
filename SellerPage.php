<?php 
session_start();

if (isset($_SESSION['SellerId']) && isset($_SESSION['Seller_Fullname'])) {



 ?><!DOCTYPE html>
<html>
<head>
	<title>SellerPage</title>
	<link rel="stylesheet" type="text/css" href="viewall.css?v=<?php echo time();?>">

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>



	<style type="text/css">

		body{
			background: #303030;
		}
				
		.viewallcontainer{
		  width: 96%;
		  background: #231F1F;
		  margin-right:2%;
		  margin-left: 2%;
		  margin-top: 1%;
		  height: 60%;
		  border-radius: 20px;
		  border: hidden;


		}

		.containerrr{
			width: 65%;
		  position: absolute;
		  top: 55%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		  height: 80%;

		}
	</style>

<header>
	

			<nav style="background:#202020; ">
			  
					  <a href="SellerPage.php"  style="border:solid; height: 5px; border-top: hidden;border-right: hidden;border-left:hidden;margin-left: 240px;">View All</a>
					  <a href="SellerAddBuyers.php"  >Add Buyers</a>
					  <a href="SellerAddProducts.php">Add Products</a>
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

		<div class="containerrr">

			<h1 style="text-align: left; margin-top: 3%;color: #eb8d00; font-size: 250%; margin-left: 3%;" >Profile</h3>

				<div class="viewallcontainer" align="center">

					<p style="color: #383838">.</p>

					<table width='80%'  style='background: transparent; margin-top: 3%; height: auto;'>

																
															<tr>
																<td style='width: 26.6%;'><p style='color: #eb8d00;font-size: 25px;'>Name</p></td>
																<td style='width: 26.6%;'><p style='color: #eb8d00;font-size: 25px;'>:</p></td>
																<td style='width: 26.6%;'><p style='color: #eb8d00;font-size: 25px;'>



														<?php

															$CustomerFullname=$_SESSION['Seller_Fullname'];

															include "dbhelper.php";

															$sql = "SELECT Seller_Fullname, Seller_FullAddress, SellerGender, SellerContactNumber FROM sellerprofile WHERE Seller_Fullname='$CustomerFullname'";

															$result = $conn->query($sql);

															if ($result->num_rows > 0) {


															while($row = mysqli_fetch_array($result)) {

															echo $row['Seller_Fullname'];


															}

														}
												?>


																		


																	</p></td>
															</tr>

															<tr>
																<td style='width: 26.6%;'><p style='color: #eb8d00;margin-top: 15%;font-size: 25px;'>Address</p></td>
																<td style='width: 26.6%;'><p style='color: #eb8d00;margin-top: 15%;font-size: 25px;'>:</p></td>
																<td style='width: 26.6%;'><p style='color: #eb8d00;margin-top: 15%;font-size: 25px;'>
																	
															<?php

															$CustomerFullname=$_SESSION['Seller_Fullname'];


															include "dbhelper.php";

															$sql = "SELECT Seller_Fullname, Seller_FullAddress, SellerGender, SellerContactNumber FROM sellerprofile WHERE Seller_Fullname='$CustomerFullname'";

															$result = $conn->query($sql);

															if ($result->num_rows > 0) {


															while($row = mysqli_fetch_array($result)) {

															echo $row['Seller_FullAddress'] ;


															}

														}
												?>


																</p>



																</td>
															</tr>


															<tr>
																<td style='width: 26.6%;'><p style='color: #eb8d00;margin-top: 15%;font-size: 25px;'>Gender</p></td>
																<td style='width: 26.6%;'><p style='color: #eb8d00;margin-top: 15%;font-size: 25px;'>:</p></td>
																<td style='width: 33.3%;'><p style='color: #eb8d00;margin-top: 15%;font-size: 25px;'>
															<?php

															$CustomerFullname=$_SESSION['Seller_Fullname'];


															include "dbhelper.php";

															$sql = "SELECT Seller_Fullname, Seller_FullAddress, SellerGender, SellerContactNumber FROM sellerprofile WHERE Seller_Fullname='$CustomerFullname'";

															$result = $conn->query($sql);

															if ($result->num_rows > 0) {


															while($row = mysqli_fetch_array($result)) {

															echo $row['SellerGender'] ;


															}

														}


												?>

																</p></td>
															</tr>

															<tr>
																<td style='width: 26.6%;'><p style='color: #eb8d00;margin-top: 15%;font-size: 25px;'>Contact Number</p></td>
																<td style='width: 26.6%;'><p style='color: #eb8d00;margin-top: 15%;font-size: 25px;'>:</p></td>
																<td style='width: 26.6%;'><p style='color: #eb8d00;margin-top: 15%;font-size: 25px;'>
																	
															<?php

															$CustomerFullname=$_SESSION['Seller_Fullname'];


															include "dbhelper.php";

															$sql = "SELECT Seller_Fullname, Seller_FullAddress, SellerGender, SellerContactNumber FROM sellerprofile WHERE Seller_Fullname='$CustomerFullname'";

															$result = $conn->query($sql);

															if ($result->num_rows > 0) {


															while($row = mysqli_fetch_array($result)) {

															echo $row['SellerContactNumber'] ;


															}

														}


												?>

																</p></td>
															</tr>

													</table>

				</div>

																	<table style="width: 40%; margin-top:3%;  float: right;">

														<tr>
															<td style="width: 20%;">
																<a href="SellerViewProducts.php"><button style="background:#eb8d00; border: none; height: 40px; border-radius: 5px; width: 70%;">VIEW PRODUCTS</button></a>
															</td>

															<td style="width: 20%;">
																
																<a href="SellerViewBuyers.php"><button style="background:#eb8d00; border: none; height: 40px; border-radius: 5px; width: 70%;">VIEW BUYERS</button></a>
															</td>

			</tr>	
			
		</div>

</body>
</html>

<?php 
}else{
     header("Location: SellerLogin.php");
     exit();
}
 ?>
