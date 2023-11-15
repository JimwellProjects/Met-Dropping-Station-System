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
			header("Location: loginpage.php?error=Username is required");
			exit();


	}elseif (empty($passw)) {
			header("Location: loginpage.php?error=Password is required");
			exit();


	}else{
		
		$sql = "SELECT * FROM logintbl WHERE user_name='$uname' AND password='$passw'";

			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) === 1) {
				$row = mysqli_fetch_assoc($result);

				if ($row['user_name'] === $uname && $row['password'] === $passw) {
					
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['id'] = $row['id'];

					header("Location: home.php");
					exit();


				}else{
					header("Location: loginpage.php?error=Incorrect Username and Password");
					exit();
			}

	}else{
		header("Location: loginpage.php?error=Incorrect Username and Password");
			exit();
	}

}
		
}else{
	header("Location: loginpage.php");
	exit();
}
?>