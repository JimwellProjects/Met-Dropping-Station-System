<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>View All</title>
	<link rel="stylesheet" type="text/css" href="viewall.css?v=<?php echo time();?>">

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>
 
<header>
	

			<nav style="background:#202020; ">
			  
					  <a href="HistoryDetails.php" style="margin-left: 240px;">History Details</a>
					  <a href="View All.php" style="border:solid; height: 5px; border-top: hidden;border-right: hidden;border-left:hidden;">View All</a>
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

				<li><a href="View All.php"><i class="fas fa-users"></i> Customers</a></li>

				<li><a href="#"><i class="fas fa-cog "></i> Settings</a></li>

				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
				</ul>
			</div>

			<p>.</p>



			<h1 style="text-align: left; margin-top: 7%;color: white; font-size: 40px; margin-left: 8%;" >Sellers</h3>

				<input type="checkbox" id="addpopup">
		      						<BUTTON style="background: #eb8d00; border:hidden; width: 10%; height: 40px; border-radius: 10px; margin-left: 70%;"><label for="addpopup" class="show-btn" style="text-decoration: none; color: white ; font-size: 17px;">Add Sellers</label></BUTTON>
		      							<div class="addsellercontainer">
		        							<label for="addpopup" class="close-btn fas fa-times" title="close"></label>

		        								<form action="View All.php" method="POST" style="background:#ffbb34;height: 90%; margin-top: 5%; border-radius: 10px;" >

		        									<center><h1>Seller Information</h1></center>

		        									<table width="90%">

		        										<tr>

																<td style="font-size:18px;">
																	<p style="margin-top: 20%; margin-left: 5%;">Seller Full Name:</p>      
																</td>

		        											<td><input required type="text" name="SellerFullname" placeholder="Sellername" style="height: 35px; width: 100%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden; margin-top: 20%;"></td>
		        										</tr>


		        										<tr>


																<td style="font-size:18px;">
																	<p style="margin-left: 5%;">Seller Address:</p>      
																</td>
		        											<td><input required type="text" name="SellerFullAddress" placeholder="Address" style="height: 35px; width: 100%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;"></td>
		        										</tr>



		        										<tr>


																<td style="font-size:16px;">
																	<p style=" margin-left: 5%;">Seller Contact Number:</p> 
																</td>
		        											<td><input required type="text" name="SellerContactnumber" placeholder="SellerContactnumber" style="height: 35px; width: 100%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;"></td>
		        										</tr>

		        										<table width="40%" align="left" style="margin-left: 5%;">
		        											<tr>
		        													<td style="font-size: 18px;">
		        														Gender
		        													</td>
		        												</tr>

		        											<tr>
		        												<td><input  type="radio" name="Gender" value="Male"><label style="font-size: 15px;">Male</label></td>
		        												<td><input  type="radio" name="Gender" value="Female"><label style="font-size: 15px;">Female</label></td>
		        											</tr>
		        											
		        										</table>

		        											<table width="90%">


		        												<tr>
		        													<td><center><input type="submit" name="sellersubmit" value="SellerSubmit" style="width: 40%; height: 30px; margin-top: 10%;"></center></td>

		        												</tr>

		        												
		        											</table>


		        								</form>
		        										
		        									</table>
		        									<?php

																	if (isset($_POST['sellersubmit'])) {
																		
																		$sellerFullname= $_POST['SellerFullname'];
																		$sellerFullAddress = $_POST['SellerFullAddress'];
																		$gender = $_POST['Gender'];
																		$sellerContactnumber = $_POST['SellerContactnumber']; 
																	 

																			$host = "localhost";
																			$dbusername = "root";
																			$dbpassword = "";
																			$dbname = "projectsystem";

																			$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

																			if (mysqli_connect_error()) {

																	    		die("Database connection failed: " . mysqli_connect_error());
																				}

																			else{
																				$sql = "INSERT INTO sellerprofile (Seller_Fullname,Seller_FullAddress,Sellergender,SellerContactnumber)
																				values ('$sellerFullname','$sellerFullAddress','$gender','$sellerContactnumber')";

																				if($conn->query($sql)) {
																					echo "New Record Inserted";
																				}
																				else{
																					echo "Error : ".sql ."<br>". $conn->error;
																				}
																				$conn->close();
																			}


																		}



																	  ?>


		        						</div>





		<div class="container" align="center">

			<table width="90%"  style="background: transparent; border:hidden; border-bottom: solid;">

				<tr>
					<td> <h2 style="background: transparent; color: #eb8d00; margin-top: 3%; margin-left: 5%;">Profile</h2></td>
					<td> <h2 style="background: transparent; color: #eb8d00; margin-top: 3%; margin-left: -70%;">Name</h2></td>
				</tr>

			</table>



			<?php


		$conn = mysqli_connect("localhost", "root", "", "projectsystem");
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT Seller_Fullname, Seller_FullAddress, SellerGender, SellerContactNumber FROM sellerprofile";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {


		while($row = $result->fetch_assoc()) {

			echo "<table width='90%' style='background: 	#505050; margin-top: 1%; border-radius: 10px; height: 60px;'>

				<tr>
					<td style='width: 22.5%; padding: 0;'> <img src='profile.png' style='width: 16%; height: 45px; border-radius: 50% 50%; margin-left: 13%;'></td>	
					<td style='width: 22.5%; padding: 0;'> <h3 style='margin-left: -20%; color: #eb8d00;'>".$row['Seller_Fullname']."</h3></td>

					<td style='width: 22.5%; padding: 0; margin: 0;'>

					    
		      				<input type='checkbox' id='".$row['Seller_Fullname']."'>
		      						<BUTTON style='background:#282828; color: #eb8d00; border:hidden; width: 65%; height: 40px; border-radius: 10px;'><label for='".$row['Seller_Fullname']."'class='show-btn'style='text-decoration: none; color: #eb8d00; font-size: 17px;'>Check Profile</label></BUTTON>
		      							<div class='container1'>
		        							<label for='".$row['Seller_Fullname']."' class='close-btn fas fa-times' title='close'></label>



		        									<h1 style='text-align: center; color: white; margin-top: 1%;'>Profile</h1> 
		        									  									
													      <table width='90%'  style='background: transparent; border:hidden; border-bottom: solid; margin-top: 4%;'>

																
															<tr>
																<td style='width: 45%;'><img src='profile.png' style='width: 30%; height: 50px; border-radius: 50% 50%;'></td>
																<td style='width: 45%;'> <h2 style='background: transparent; color: #eb8d00; margin-top: 3%; margin-left: -50%;'>".$row['Seller_Fullname']."</h2></td>
															</tr>

														</table>

													<table width='100%'  style='background: transparent; border:hidden; border-bottom: solid; margin-top: 10%;'>

																
															<tr>
																<td style='width: 33.3%;'><p style='color: white;'>Name</p></td>
																<td style='width: 33.3%;'><p style='color: white;'>:</p></td>
																<td style='width: 33.3%;'><p style='color: white;'>".$row['Seller_Fullname']."</p></td>
															</tr>

															<tr>
																<td style='width: 30%;'><p style='color: white;margin-top: 10%;'>Address</p></td>
																<td style='width: 10%;'><p style='color: white;margin-top: 10%;'>:</p></td>
																<td style='width: 60%;'><p style='color: white;margin-top: 10%;'>".$row['Seller_FullAddress']."</p></td>
															</tr>


															<tr>
																<td style='width: 33.3%;'><p style='color: white; margin-top: 10%;'>Gender</p></td>
																<td style='width: 33.3%;'><p style='color: white;margin-top: 10%;'>:</p></td>
																<td style='width: 33.3%;'><p style='color: white;margin-top: 10%;'>".$row['SellerGender']."</p></td>
															</tr>

															<tr>
																<td style='width: 33.3%;'><p style='color: white;margin-top: 10%;'>Contact Number</p></td>
																<td style='width: 33.3%;'><p style='color: white;margin-top: 10%;'>:</p></td>
																<td style='width: 33.3%;'><p style='color: white;margin-top: 10%;'>".$row['SellerContactNumber']."</p></td>
															</tr>

														</table>";


											echo "<style>#".$row['Seller_Fullname'].":checked ~ .container1{display: block;visibility: visible;}</style>



										</div>
								
					</td>


						<form  action='ViewBuyers1.php' method='POST'>

						<input type='hidden' name='name' value='".$row['Seller_Fullname']."'>

							<td style='width: 22.5%; padding: 0; margin: 0;'> <input type='submit' value='ViewBuyers' name='".$row['Seller_Fullname']."' style='background:#282828; color: #eb8d00; border:hidden; width: 80%; height: 40px; border-radius: 10px; font-size:16px;'></td>


							


							";
							

					echo "</form>
				</tr>

			</table>";


			}
		} else { echo "0 results"; }
		$conn->close();


						

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