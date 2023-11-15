<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Seller Information</title>
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

.addsellerupdate{
      background: none;
	  width: 35%;
	  padding: 30px;
	  box-shadow: 0 0 8px rgba(0,0,0,0.1);
	  height: 400px;
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  transform: translate(-50%, -50%);
}

	</style>
 
<header>
	

			<nav style="background:#202020; ">
			  
					  <a href="HistoryDetails.php" style="margin-left: 240px;">History Details</a>
					  <a href="ViewAll.php">View All</a>
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

<div class="addsellerupdate">

	<form action="" method="POST" style="background:#ffbb34;height: auto; margin-top: 5%; border-radius: 10px;" >

		   <center><h1>Update Seller Information</h1></center>

		        									
		<?php
			$id=$_GET['id'];

			include "dbhelper.php";

			$result=mysqli_query($conn,"SELECT * FROM sellerprofile WHERE SellerId=$id");

			while ($row=mysqli_fetch_array($result)) {

				$SellerId=$row['SellerId'];
				$Seller_Fullname=$row['Seller_Fullname'];
				$Seller_FullAddress=$row['Seller_FullAddress'];
				$SellerContactNumber=$row['SellerContactNumber'];
				$SellerGender=$row['SellerGender'];
			}
			?>

			<?php
			if(isset($_POST['editsellersubmit'])){

				$id=$_POST['id'];
				$editSellerFullname=$_POST['editSellerFullname'];
				$editSellerFullAddress=$_POST['editSellerFullAddress'];
				$editSellerContactnumber=$_POST['editSellerContactnumber'];
				$editGender=$_POST['editGender'];


				$result = "UPDATE `sellerprofile` SET Seller_Fullname='$editSellerFullname', Seller_FullAddress='$editSellerFullAddress', SellerContactNumber='$editSellerContactnumber', SellerGender='$editGender' WHERE SellerId='$id' ";
			  	$result_run = mysqli_query($conn,$result);

				if($result_run){
					header("location:ViewAll.php");
				}
				else{
														echo "

									<div align='center'><p style='color:white; text-align:center; margin-top:3%; background:gray;  width:50%; border-radius:5px;'>Not Updated</p></div>";
				}
			}
			?>


		        									<table width="90%">

		        										<tr>

																<td style="font-size:18px;">
																	<p style="margin-top: 20%; margin-left: 5%;">Seller Full Name:</p>      
																</td>

		        											<td><input required type="text" name="editSellerFullname" placeholder="Sellername" style="height: 35px; width: 100%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden; margin-top: 20%;" value="<?php echo $Seller_Fullname ?>">


		        											</td>
		        										</tr>


		        										<tr>


																<td style="font-size:18px;">
																	<p style="margin-left: 5%;">Seller Address:</p>      
																</td>
		        											<td><input required type="text" name="editSellerFullAddress" placeholder="Address" style="height: 35px; width: 100%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;" value="<?php echo $Seller_FullAddress ?>"></td>
		        										</tr>



		        										<tr>


																<td style="font-size:18px;">
																	<p style=" margin-left: 5%;">Seller Contact Number:</p> 
																</td>
		        											<td><input required  type="text" name="editSellerContactnumber" placeholder="SellerContactnumber" style="height: 35px; width: 100%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;" value="<?php echo $SellerContactNumber ?>"></td>
		        										</tr>


		        										<tr>


																<td style="font-size:18px;">
																	<p style=" margin-left: 5%;">Gender:</p> 
																</td>
		        											<td>
		        												<select style="height: 35px; width: 100%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden" name="editGender" value="<?php echo $SellerGender ?>">
		        													<option value="Male">Male</option>
		        													<option value="Female">Female</option>
		        												</select>

		        											</td>
		        										</tr>

		        									</table>


		        											<table width="100%">

		        												<tr>
		        													<td>
		        														<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		        													</td>
		        												</tr>


		        												<tr>
		        													<td><center><input type="submit" name="editsellersubmit" value="Save" style="width: 40%; height: 30px; margin-top: 10%; font-size: 20px; border-radius: 5px; border:hidden; margin-bottom:20px;"></center></td>

		        												</tr>

		        												
		        											</table>


		        										</form>
	


</div>


</body>
</html>

<?php 
}else{
     header("Location: loginpage.php");
     exit();
}
 ?>