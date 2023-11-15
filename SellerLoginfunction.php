<?php
session_start();
include "dbhelper.php";


if (isset($_POST['username']) && isset($_POST['pass'])) {

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname = validate($_POST['username']);
	$passw = validate($_POST['pass']);

	if (empty($uname)) {
			header("Location: SellerLogin.php?error=Username is required");
			exit();

	}elseif (empty($passw)) {
			header("Location: SellerLogin.php?error=Password is required");
			exit();

	}else{

		$result = mysqli_query($conn, $sql);
		
		$sql = "SELECT * FROM sellerprofile WHERE Seller_Fullname='$uname' AND SellerContactNumber='$passw'" ;

			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) === 1) {
				$row = mysqli_fetch_assoc($result);

				if ($row['Seller_Fullname'] === $uname && $row['SellerContactNumber'] === $passw) {
					
					$_SESSION['Seller_Fullname'] = $row['Seller_Fullname'];
					$_SESSION['SellerId'] = $row['SellerId'];

					header("Location: SellerPage.php");
					exit();

				}else{
					header("Location: SellerLogin.php?error=Incorrect Username and Password");
					exit();
			}

	}else{
		header("Location: SellerLogin.php?error=Incorrect Username and Password");
			exit();
	}

}
		
}else{
	header("Location: SellerLogin.php");
	exit();
	}
?>