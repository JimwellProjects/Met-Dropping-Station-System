<?php 
session_start();

if (isset($_SESSION['SellerId']) && isset($_SESSION['Seller_Fullname'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SellerHomePage</title>
	<link rel="stylesheet" type="text/css" href="home.css?v=<?php echo time(); ?>">


	<script src="https://kit.fontawesome.com/a076d05399.js"></script>


</head>
<body>

<header>
	

			<nav style="background:		#202020;">


					  <a href="SellerPage.php" style="margin-left: 240px;">View All</a>
					  <a href="SellerAddBuyers.php"  >Add Buyers</a>
					  <a href="SellerAddProducts.php">Add Products</a>
					  <a href="SellerHome.php" style="border:solid; height: 5px; border-top: hidden;border-right: hidden;border-left:hidden; ">Home</a>

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




			<p style="margin-top: 100px; color: #eb8d00; margin-left: 23%; font-size: 40px;">MET PRETTY U</p>

			<h1 style="margin-top: 10px; color: #eb8d00; margin-left: 17%; font-size: 50px;">DROPPING STATION</h1>

			<p style="color: white; margin-left: 17%; font-size: 20px;">Preloved, Clothes, Appliances, Food, Brand new etc.....</p>


			<div style="margin-left: 20%;">
				
				<table width="30%" style="margin-top: 5%;">
						<tr>

							<td style="width: 25%;" align="center">
								<div style="width: 90%; height: 150px; background: #505050; color: #eb8d00;  border-radius: 20px;">

									<p style="color: #505050">.</p>
									<h2>Total Buyers</h2>
									<h1 style="width: 70%; margin-top: 15px; font-size: 50px; border-bottom: solid 5px; border-color: #eb8d00;">

						<?php 

							$CustomerFullname=$_SESSION['Seller_Fullname'];
							include "dbhelper.php";
					        $conn = $conn->query("SELECT * FROM sellertbl WHERE Seller_Fullname='$CustomerFullname'");
					        echo $conn->num_rows > 0 ? $conn->num_rows : "0";
					    ?>
    	

    					</h1>
									
									
								</div>
							</td>


						</tr>
					</table>
			</div>

			<p style="width: 40%; height: 100px; border:solid 5px; border-color: #eb8d00; border-left: hidden; margin-top: 4%;"></p>

			<p style="width: 9%; height: 290px; border:solid 5px; border-color: #eb8d00;margin-top: -70px;
			margin-left: 25%;"></p>

			<img style="float: right; margin-top: -38%; width:38%; height:35%; border-radius: 20px;" src="image1.png">


</body>
</html>

<?php 
}else{
     header("Location: SellerLogin.php");
     exit();
}
 ?>









