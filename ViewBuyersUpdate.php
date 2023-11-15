<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
$sellernum=$_SESSION['id'];
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Update Buyers Details</title>
	<link rel="stylesheet" type="text/css" href="Add.css?v=<?php echo time(); ?>">

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>
 
<header>
	

			<nav style="background:	#202020;">
			  
					  <a href="HistoryDetails.php" style="margin-left: 240px;">History Details</a>
					  <a href="ViewAll.php">View All</a>
					  <a href="Add.php">Add Customer</a>
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
				<li><a href="home"><i class="fas fa-list"></i>Dashboard</a></li>
				
				<li><a href="ViewAll.php"><i class="fas fa-users"></i>Sellers</a></li>

				<li><a href="AdminAccountSettings.php"><i class="fas fa-cog "></i>Account Settings</a></li>

				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
				
				</ul>
			</div>

			<p>.</p>



	<form action="" method="POST"  style="width: 33%; height: 100%; background:#ffbb34; border-radius: 10px; box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52);-webkit-box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52);-moz-box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52); margin-left: 35%; margin-right: 35%; margin-top: 6%;">


		<?php
			$id=$_GET['id'];

			include "dbhelper.php";

			$result=mysqli_query($conn,"SELECT * FROM sellertbl WHERE Buyer_Id=$id");

			while ($row=mysqli_fetch_array($result)) {

				$Items=$row['Items'];
				$Buyer_name=$row['Buyer_name'];
				$Buyer_cnumber=$row['Buyer_cnumber'];
				$Amount=$row['Amount'];
				$Drop_fee=$row['Drop_fee'];
				$E_date=$row['E_date'];

			}
			?>

			<?php
			if(isset($_POST['editinsert'])){

				$id=$_POST['id'];
				$edititems=$_POST['edititems'];
				$editbuyername=$_POST['editbuyername'];
				$editbuyercnum=$_POST['editbuyercnum'];
				$editamount=$_POST['editamount'];
				$editdropfee=$_POST['editdropfee'];
				$editedate=$_POST['editedate'];


				$result = "UPDATE `sellertbl` SET Items='$edititems', Buyer_name='$editbuyername', Buyer_cnumber='$editbuyercnum', Amount='$editamount',
				Drop_fee='$editdropfee', E_date='$editedate' WHERE Buyer_Id='$id' ";
			  	$result_run = mysqli_query($conn,$result);

				if($result_run){
					header("location:ViewAll.php");
				}
				else{
				echo "<div align='center'><p style='color:white; text-align:center; margin-top:3%; background:gray;  width:50%; border-radius:5px;'>Not Updated</p></div>";
				}
			}
			?>

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
						Update the Details of Buyers


					</h3>
				</div>

			</td>
		</tr>


	<tr>
		<td colspan="1">
				
				<input required type="text" name="edititems" placeholder="Items: __ __ __ __ __" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;
		 		border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%; margin-top: 20px; border:hidden;" value="<?php echo $Items ?>"></td>
		</td>

	</tr>


		<tr>
		<td colspan="1">
				
				<input required  type="text" name="editbuyername" placeholder="Buyer Name: __ __ __ __ __" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;
		 		border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;" value="<?php echo $Buyer_name ?>"></td>
		</td>

	</tr>

	<tr>
		<td colspan="1">
				
				<input required  type="number" maxlength="11" name="editbuyercnum" placeholder="Buyer Contact Number: __ __ __ __ __" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;" value="<?php echo $Buyer_cnumber ?>"></td>
		</td>

	</tr>
		<tr>
		<td colspan="1">
				
				<input required  type="number" name="editamount" placeholder="Amount: __ __ __ __ __" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;"
				value="<?php echo $Amount ?>"></td>
		</td>

	</tr>


			<tr>
		<td colspan="1">
				
				<input required   type="text" name="editdropfee" placeholder="Dropping Fee: __ __ __ __ __" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden;"
				value="<?php echo $Drop_fee ?>"></td>
		</td>

	</tr>

		<tr>
		<td colspan="1">
				
				<h3 style="margin-left: 3%;">Input Date</h3>

	</tr>

	<tr>
		<td colspan="1">
				
				<input min="1000-01-01" max="50000-12-31" required type="date" name="editedate" style="height: 35px; width: 35%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;
		 		border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%;border:hidden; " value="<?php echo $E_date ?>"></td>
		</td>

	</tr>

			        								<tr>
		        													<td>
		        														<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		        													</td>
		        												</tr>

	
				<tr>
		
			<td>
				
			<div align="center" style="margin-top: 10px;">
			<input type="submit" name="editinsert" value="Insert" style="background: #414143; width: 60%; height: 45px; border:hidden; border-radius: 15px; color: white; font-size: 25px; margin-bottom: 10px; margin-top: 10px;"></div>

			</td>

		</tr>

	</table>



		</form>
	</body>
</html>


<?php 
}else{
     header("Location: loginpage.php");
     exit();
}
 ?>
