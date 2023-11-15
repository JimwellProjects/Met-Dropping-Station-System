<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?><!DOCTYPE html>
<html>
<head>
	<title>Seller Buyers</title>
	<link rel="stylesheet" type="text/css" href="viewall.css?v=<?php echo time();?>">

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>

<style type="text/css">
	

		.tbl{
			width: 14.3%;
			border:hidden;
			border-right: solid 1px;
			

		}

			.tbll{
			width: 7%;
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
	  top: 60%;
	  left: 50%;
	  transform: translate(-50%, -50%);
	  color: white;
	  text-align: center;
	  height:40%;
}

.itemcontainer .close-btn{
  position: absolute;
  right: 20px;
  top: 10px;
  font-size: 20px;
  cursor: pointer;
  background:orange;
  width: 7%;
  height: 25px;
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
					  <a href="ViewAll.php">View All</a>
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
				
				<li><a href="ViewAll.php"><i class="fas fa-users"></i>Sellers</a></li>

				<li><a href="AdminAccountSettings.php"><i class="fas fa-cog "></i>Account Settings</a></li>

				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
				
				</ul>
			</div>

			<p>.</p>

	

		<table width="50%"  style="background: transparent; border:hidden; margin-top: 5%; margin-left: 10%;">

				<tr>
						<td style="width: 25%;"><img src="profile.png" style="width: 30%; margin-top: 7%;"></td>
						<td style="width: 25%;"><h1 style="margin-left: -50%; color: #eb8d00; margin-top: 10%;"><?php

					include "dbhelper.php";
					if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
					}
					$sql = "SELECT Seller_Fullname,Buyer_ID FROM sellertbl";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {


						echo $_POST['name'];}?>
						

					</h1></td>

				</tr>


			</table>
			

		<h1 style="text-align: left; margin-top: 4%;color: white; font-size: 40px; margin-left: 8%;" >Buyers</h3>


		<div class="container" align="center">

			<table width="98%"  style="background: transparent; border:hidden; border-bottom: solid; border-color: #eb8d00;">

				<tr align="center">
					<td style="width: 14.2%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%;">Name</h2></td>
					<td style="width: 14.2%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%;">Items</h2></td>
					<td style="width: 14.2%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%;">Contact No.</h2></td>
					<td style="width: 14.2%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%;">Amount</h2></td>
					<td style="width: 14.2%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%;">Dropping Fee</h2></td>
					<td style="width: 14.2%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%;">Date</h2></td>
					<td style="width: 14%;"> <h2 style="background: transparent; color: #eb8d00; margin-top: 5%;"></h2></td>



				</tr>

			</table>
		<p>.</p>



		<?php

		include "dbhelper.php";
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT Items,Buyer_name,Buyer_cnumber,Amount,Drop_fee,Seller_Fullname,Buyer_ID, E_date FROM sellertbl";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {


		while($row = $result->fetch_assoc()) {

						if ($row["Seller_Fullname"]==$_POST['name']) {

						echo "<table style='background: #505050; margin-top: .5%; border-radius: 10px; height: 50px; color:white; width:98%; text-align:center;'>";

						echo "<tr><td class='tbl'><h3>" . $row["Buyer_name"] . "</h3></td>";

						echo "<td class='tbl'>


						<input type='checkbox' id='"."a".$row['Buyer_ID']."'>
								<BUTTON style='background:#282828; color: #eb8d00; border:hidden; width: 90%; height: 40px; border-radius: 10px;''>
										<label for='"."a".$row['Buyer_ID']."' class='show-btn' style='ext-decoration: none; color: #eb8d00; font-size: 17px;'>View Items</label></BUTTON>
												<div class='itemcontainer'>".


												"<table width='100%'  style='background: transparent;border-color: orange; margin-top:5%;'>

													<tr>
														<td  style='width: 50%;''><h2 style='background: transparent; color: #eb8d00; border-bottom:solid 3px;'>Item Name</h2></th>
														<th  style='width: 50%;'> <h2 style='background: transparent; color: #eb8d00;border-bottom:solid 3px;'>Amount</h2></th>

													</tr>

													<tr>
														<td  style='width: 45%; '><h3 style='background: transparent; color: white; font-size:30px; margin-top:10%;'>".$row['Items']."</h3></td>
														<td  style='width: 45%; '> <h3 style='background: transparent; color: white; font-size:30px; widt:auto; margin-top:10%;'>".$row['Amount']."</h3></td>

													</tr>

												</table>

													"."<label for='"."a".$row['Buyer_ID']."' class='close-btn' title='close'><img src='close.png' style='width:70%; height:25px;'></label>

											</div>

								</td>";

						echo "<td class='tbl'><h3>" . $row["Buyer_cnumber"]. "</h3></td><td class='tbl'><h3>". $row["Amount"]. "</h3></td><td class='tbl'><h3>". $row["Drop_fee"]. "</h3></td><td class='tbl'><h3>". $row["E_date"]. "</h3></td><td class='tbll'>


						<a href=\"ViewBuyersUpdate.php?id=$row[Buyer_ID]\"><input type='submit' value='Edit Details' style='width:80%; margin-top:10%; height:25px; background:#282828; color: #eb8d00; border:hidden; border-radius: 2px;'></a>


						</td><td class='tbll'>


						<a href=\"RecievedBuyers.php?id=$row[Buyer_ID]\"><input type='submit' value='Recieve' style='width:80%; margin-top:10%; height:25px; background:#eb8d00 ; color: #282828; border:hidden; border-radius: 2px;'></a>


						</td></tr> </table>";


						echo "<style>#"."a".$row['Buyer_ID'].":checked ~ .itemcontainer{display: block;visibility: visible;}</style>";

				}

			}
		} else { echo "No Records Inserted"; }
		$conn->close();

	?>
	<p style="font-size: 10px;">.</p>
</div>

</body>
</html>

<?php 
}else{
     header("Location: loginpage.php");
     exit();
}
 ?>

