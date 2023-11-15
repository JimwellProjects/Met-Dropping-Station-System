<!DOCTYPE html>
<html>
<head>
	<title>Seller1Buyers</title>
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

</style>
<body>
 
<header>
	

			<nav style="background:#202020; ">
			  
					  <a href="HistoryDetails.php" style="margin-left: 240px;">History Details</a>
					  <a href="View All.php">View All</a>
					  <a href="Add.php"  >Add Customer</a>
					  <a href="home.php" style="margin-left: 5px">Home</a>



					 <form method="POST" action="">

					  	<input class="search-txt" type="text" name="" placeholder="Search...">
					  	<input type="submit" name="btn_search" value="Search" style="width: 7%;">
					  			
					  </form>



					  

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

	

		<table width="50%"  style="background: transparent; border:hidden; margin-top: 5%; margin-left: 10%;">

				<tr>
						<td style="width: 25%;"><img src="profile.png" style="width: 30%; margin-top: 7%;"></td>
						<td style="width: 25%;"><h1 style="margin-left: -50%; color: #eb8d00; margin-top: 10%;">Seller1Name</h1></td>

				</tr>


			</table>
			

			<h1 style="text-align: left; margin-top: 4%;color: white; font-size: 40px; margin-left: 8%;" >Buyers</h3>



		<div class="container" align="center">

			<table width="90%"  style="background: transparent; border:hidden; border-bottom: solid;">

				<tr align="center">
					<td style="width: 18%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%;">Name</h2></td>
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
		$sql = "SELECT Items,Buyer_name,Buyer_cnumber,Amount,Drop_fee,Seller_Fullname,Buyer_ID FROM sellertbl";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {


		while($row = $result->fetch_assoc()) {

			if (isset($_POST['btn_search'])) {


						if ($row["Seller_Fullname"]==$_POST['name']) {


						echo "<table style='background: #505050; margin-top: 1.2%; border-radius: 10px; height: 50px; color:orange; width:90%; text-align:center;'>";

						echo "<tr><td class='tbl'>" . $row["Buyer_name"] . "</td>";

						echo "<td class='tbl'>


						<input type='checkbox' id='".$row['Seller_Fullname'].$row['Drop_fee'].$row['Buyer_ID']."'>
								<BUTTON style='background:#282828; color: #eb8d00; border:hidden; width: 90%; height: 40px; border-radius: 10px;''>
										<label for='".$row['Seller_Fullname'].$row['Drop_fee'].$row['Buyer_ID']."' class='show-btn' style='ext-decoration: none; color: #eb8d00; font-size: 17px;'>View Items</label></BUTTON>
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

													"."<label for='".$row['Seller_Fullname'].$row['Drop_fee'].$row['Buyer_ID']."' class='close-btn fas fa-times' title='close'></label>

											</div>

								</td>";

						echo "<td class='tbl'>" . $row["Buyer_cnumber"]. "</td><td class='tbl'>". $row["Amount"]. "</td><td class='tbll'>". $row["Drop_fee"]. "</td></tr> </table>";


						echo "<style>#".$row['Seller_Fullname'].$row['Drop_fee'].$row['Buyer_ID'].":checked ~ .itemcontainer{display: block;visibility: visible;}</style>";


					}

				}

			}
		} else { echo "0 results"; }
		$conn->close();

				

	?>

	<p>.</p>

</div>





</body>
</html>