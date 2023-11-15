<!DOCTYPE html>
<html>
<head>
	<title>Function</title>
	<link rel="stylesheet" type="text/css" href="viewall.css?v=<?php echo time();?>">

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>

<style type="text/css">
	

		.tbl{
			width: 18%;
			border:hidden;
			border-right: solid 1px;
			

		}

			.tbll{
			width: 18%;
			border:hidden;
			

		}

		input[type="checkbox"]{
  display: none;
}
.itemcontainer{
	  display: none;
	  background: gray;
      background:rgba(0,0,0,0.9);
	  width: 30%;
	  padding: 30px;
	  box-shadow: 0 0 8px rgba(0,0,0,0.1);
	  height: 40%;
	  position: absolute;
	  top: 80%;
	  left: 50%;
	  transform: translate(-50%, -50%);
	  color: white;
	  text-align: left;
	  width: auto;
}

.itemcontainer .close-btn{
  position: absolute;
  right: 20px;
  top: 15px;
  font-size: 20px;
  cursor: pointer;
  background:orange;
  width: 8%;
  height: 20px;
  text-align: center;

}
.itemcontainer .close-btn:hover{
  color: #3498db;
}

.boxcontainer{
  width: 94%;
  border: ridge;
  border-style: inset;
  border-width: 1px;
  background-color: gray;
  background: rgb(0,0,0);
  background: rgba(0,0,0,0.3);
  margin-right:3%;
  margin-left: 3%;
  margin-top: 5%;
  height: 100%;
  margin-bottom: 30px;
  border-radius: 5px;

}


</style>
<body>
 
<header>
	

			<nav style="background:#202020; ">
			  
					  <a href="HistoryDetails.php" style="margin-left: 240px;">History Details</a>
					  <a href="View All.php">View All</a>
					  <a href="Add.php"  >Add Customer</a>
					  <a href="home.php" style="margin-left: 5px">Home</a>



					  <div class="search-box">

					  	<input class="search-txt" type="search" name="" placeholder="Search...">
					  </div>

					  

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
				<li><a href="#"><i class="fas fa-qrcode"></i> Dashboard</a></li>

				<li><a href="#"><i class="fas fa-link"></i>Customers</a></li>

				<li><a href="#"><i class="fas fa-bars"></i> Settings</a></li>

				<li><a href="#"><i class="fas fa-calendar"></i> Events</a></li>
				
				</ul>
			</div>

			<p>.</p>

	



		<div class="boxcontainer" align="center">

			<table width="100%"  style="background: transparent; border:hidden; border-bottom: solid;">

				<tr align="center">
					<td style="width: 18%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%;">SellerName</h2></td>
					<td style="width: 18%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%;">BuyerName</h2></td>
					<td style="width: 18%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%;">Items</h2></td>
					<td style="width: 18%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%;">Contact No.</h2></td>
					<td style="width: 18%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%;">Amount</h2></td>
					<td style="width: 18%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%;">Dropping Fee</h2></td>


				</tr>

			</table>



		  	<?php

		$conn = mysqli_connect("localhost", "root", "", "projectsystem");
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT Items,Buyer_name,Buyer_cnumber,Amount,Drop_fee,Choose_seller,Buyer_ID FROM sellertbl";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {


		while($row = $result->fetch_assoc()) {

						if ($row["Choose_seller"]=='seller1') {


						echo "<table style='background: #505050; margin-top: 1.2%; border-radius: 10px; height: 50px; color:orange; width:90%; text-align:center;'>";

						echo "<tr><td class='tbl'>" . $row["Buyer_name"] . "</td>";

						echo "<td class='tbl'>


						<input type='checkbox' id='".$row['Choose_seller'].$row['Drop_fee'].$row['Buyer_ID']."'>
								<BUTTON style='background:#282828; color: #eb8d00; border:hidden; width: 90%; height: 40px; border-radius: 10px;''>
										<label for='".$row['Choose_seller'].$row['Drop_fee'].$row['Buyer_ID']."' class='show-btn' style='ext-decoration: none; color: #eb8d00; font-size: 17px;'>View Items</label></BUTTON>
												<div class='itemcontainer'>".


												"<table align='center' width='90%''  style='background: transparent; text-align: center; border-color: orange; width:auto;'>

													<tr>
														<th  style='width: 45%;''><h2 style='background: transparent; color: #eb8d00; border-bottom:solid 3px;'>Item Name</h2></th>
														<th  style='width: 45%;'> <h2 style='background: transparent; color: #eb8d00;border-bottom:solid 3px;'>Amount</h2></th>

													</tr>

													<tr>
														<td  style='width: 45%; '><p style='background: transparent; color: white; font-size:30px; margin-top:10%;'>".$row['Items']."</p></td>
														<td  style='width: 45%; '> <p style='background: transparent; color: white; font-size:30px; widt:auto; margin-top:10%;'>".$row['Amount']."</p></td>

													</tr>

												</table>

													"."<label for='".$row['Choose_seller'].$row['Drop_fee'].$row['Buyer_ID']."' class='close-btn fas fa-times' title='close'></label>

											</div>

								</td>";

						echo "<td class='tbl'>" . $row["Buyer_cnumber"]. "</td><td class='tbl'>". $row["Amount"]. "</td><td class='tbll'>". $row["Drop_fee"]. "</td></tr> </table>";


						echo "<style>#".$row['Choose_seller'].$row['Drop_fee'].$row['Buyer_ID'].":checked ~ .itemcontainer{display: block;visibility: visible;}</style>";

				}

			}
		} else { echo "0 results"; }
		$conn->close();

	?>


</table>


			<input type="checkbox" id="addpopup">
		      						<center><BUTTON style="background:#282828; color: #eb8d00; border:hidden; width: 25%; height: 40px; border-radius: 10px; margin-top: 10%;"><label for="addpopup" class="show-btn" style="text-decoration: none; color: #eb8d00; font-size: 17px;">Add Sellers</label></BUTTON></center>
		      							<div class="addsellercontainer">
		        							<label for="addpopup" class="close-btn fas fa-times" title="close"></label>

		        								<form action="function.php" method="POST" style="background:#ffbb34;height: 90%; margin-top: 5%; border-radius: 10px;" >

		        									<center><h1>Seller Information</h1></center>

		        									<table width="90%">

		        										<tr>

																<td style="font-size:20px;">
																	<p style="margin-top: 20%;">Seller Full Name:</p>      
																</td>

		        											<td><input required type="text" name="SellerFullname" placeholder="Sellername" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden; margin-top: 20%;"></td>
		        										</tr>


		        										<tr>


																<td style="font-size:20px;">
																	Seller Address:      
																</td>
		        											<td><input required type="text" name="SellerFullAddress" placeholder="Address" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;"></td>
		        										</tr>



		        										<tr>


																<td style="font-size:18px;">
																	Seller Contacr Number:      
																</td>
		        											<td><input required type="text" name="SellerContactnumber" placeholder="SellerContactnumber" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;"></td>
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

</body>
</html>