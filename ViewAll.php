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
	<style type="text/css">
		
.viewallcontainer{
  width: 80%;
  border: ridge;
  border-style: inset;
  border-width: 1px;
  background-color: gray;
  background: rgb(0,0,0);
  background: rgba(0,0,0,0.3);
  margin-right:10%;
  margin-left: 10%;
  margin-top: 1%;
  height: 100%;
  margin-bottom: 30px;
  border-radius: 5px;

}
	</style>
 
<header>
	
			<nav style="background:#202020; ">
			  
					  <a href="HistoryDetails.php" style="margin-left: 240px;">History Details</a>
					  <a href="ViewAll.php" style="border:solid; height: 5px; border-top: hidden;border-right: hidden;border-left:hidden;">View All</a>
					  <a href="Add.php"  >Add Customer</a>
					  <a href="home.php" style="margin-left: 5px;">Home</a>

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



			<h1 style="text-align: left; margin-top: 7%;color: white; font-size: 40px; margin-left: 8%;" >Sellers</h3>

				<input type="checkbox" id="addpopup">
		      						<BUTTON style="background: #eb8d00; border:hidden; width: 10%; height: 40px; border-radius: 10px; margin-left: 70%;"><label for="addpopup" class="show-btn" style="text-decoration: none; color: white ; font-size: 17px;">Add Sellers</label></BUTTON>
		      							<div class="addsellercontainer">
		        							<label for="addpopup" class="close-btn fas fa-times" title="close"></label>

		        								<form action="ViewAll.php" method="POST" style="background:#ffbb34;height: auto; margin-top: 5%; border-radius: 10px;" >

		        									<p style="color:#ffbb34;">.</p>

		        									<center><h1>Seller Information</h1></center>

		        									<table width="90%">

		        										<tr>

																<td style="font-size:18px;">
																	<p style="margin-top: 5%; margin-left: 5%;">Seller Full Name:</p>      
																</td>

		        											<td><input required type="text" name="SellerFullname" placeholder="Sellername" style="height: 35px; width: 100%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden; margin-top: 5%;"></td>
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
		        											<td><input required type="number" id="sellernum" name="SellerContactnumber" placeholder="SellerContactnumber" style="height: 35px; width: 100%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;"></td>
		        										</tr>

		        										<tr>


																<td style="font-size:16px;">
																	<p style=" margin-left: 5%;">Gender</p> 
																</td>
		        												<td>
		        												<select style="height: 35px; width: 100%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden" name="Gender" value="<?php echo $SellerGender ?>">
		        													<option value="Male">Male</option>
		        													<option value="Female">Female</option>
		        												</select>
		        												</td>
		        										</tr>
		        								
												</table>


		        											<table width="100%">


		        												<tr>
		        													<td><center><input type="submit" name="sellersubmit" value="Insert" style="width: 40%; height: 30px; margin-top: 10%; font-size: 20px; border-radius: 5px; border:hidden; margin-bottom: 15px;"></center></td>

		        												</tr>

		        												
		        											</table>

		        													 <?php

		        													 include "dbhelper.php";

																	 if (isset($_POST['sellersubmit'])) {
																		
																		$sellerFullname= $_POST['SellerFullname'];
																		$sellerFullAddress = $_POST['SellerFullAddress'];
																		$gender = $_POST['Gender'];
																		$sellerContactnumber = $_POST['SellerContactnumber']; 


																			$sql = "SELECT Seller_Fullname FROM sellerprofile WHERE Seller_Fullname='$sellerFullname' ";
																			$result = $conn-> query($sql);

																			if ($result-> num_rows == 0) {

																				include "dbhelper.php";
																				$sql=mysqli_query($conn, "insert into sellerprofile(Seller_Fullname,Seller_FullAddress,Sellergender,SellerContactnumber)
																				values ('$sellerFullname','$sellerFullAddress','$gender','$sellerContactnumber')");

																				echo "<p style='text-align:center; margin-top:-60%;'>Successfully Added Seller</p>";


																																							

																		}else{

																			echo "<p style='text-align:center; margin-top:-60%; color:	#FF0000;'>Already Have A Name</p>";
																		}
																		$conn-> close();

																	}

																	  ?>




		        											</form>
		        										
		        									
		        						</div>





		<div class="viewallcontainer" align="center">

			<table width="90%"  style="background: transparent; border:hidden; border-bottom: solid; border-color: #eb8d00;">

				<tr>
					<td> <h2 style="background: transparent; color: #eb8d00; margin-top: 3%; margin-left: 5%;">Profile</h2></td>
					<td> <h2 style="background: transparent; color: #eb8d00; margin-top: 3%; margin-left: -70%;">Name</h2></td>

				</tr>

			</table>





			<?php


		include "dbhelper.php";

		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT Seller_Fullname, Seller_FullAddress, SellerGender, SellerContactNumber, SellerId FROM sellerprofile";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {


		while($row = mysqli_fetch_array($result)) {

			echo "<table width='90%' style='background: 	#505050; margin-top: 1%; border-radius: 10px; height: 60px;'>

				<tr>
					<td style='width: 22.5%; padding: 0;'> <img src='profile.png' style='width: 16%; height: 45px; border-radius: 50% 50%; margin-left: 13%;'></td>	
					<td style='width: 22.5%; padding: 0;'> <h3 style='margin-left: -20%; color: #eb8d00;'>".$row['Seller_Fullname']."</h3></td>

					<td style='width: 22.5%; padding: 0; margin: 0;'>

					    
		      				<input type='checkbox' id='"."a".$row['SellerId']."'>
		      						<BUTTON style='background:#282828; color: #eb8d00; border:hidden; width: 65%; height: 40px; border-radius: 10px;'><label for='"."a".$row['SellerId']."'class='show-btn'style='text-decoration: none; color: #eb8d00; font-size: 17px;'>Check Profile</label></BUTTON>
		      							<div class='container1'>
		        							<label for='"."a".$row['SellerId']."' class='close-btn' title='close'><img src='close.png' style='width:70%; height:25px;'></label>



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

													</table>

													<table width='100%'>

														<tr>

															<td style='width: 100%;'><center><a href=\"Addsellerupdate.php?id=$row[SellerId]\"><input type='submit' value='Edit Details' style='width:30%; margin-top:10%; height:25px;'></a></center></td>

														</tr>


													</table>";

														


											echo "<style>#"."a".$row['SellerId'].":checked ~ .container1{display: block;visibility: visible;}</style>



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
		} else { echo "No Records Inserted"; }
		$conn->close();

						

?>
<p>.</p>
		</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script>

		$(document).ready(function(){

			$("#sellernum").keypress(function(){

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