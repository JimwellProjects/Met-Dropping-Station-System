<?php 
session_start();

if (isset($_SESSION['Id']) && isset($_SESSION['Username'])) {

 ?><!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>

<style type="text/css">
	.error{
		background: #fff;
		color: 	#FF0000;
		padding: 10px;
		width: 52.5%;
		border-radius: 5px;
	}
</style>


<body style=" background-size: cover;
  background-attachment: fixed; background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url(prettyu.jpg); object-fit: contain;">


<form action="login.php" method="POST"  style="width: 30%; height: auto; background:#505050; border-radius: 10px; box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52);
	-webkit-box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52);-moz-box-shadow: -1px -1px 20px -1px rgba(0,0,0,0.52); margin-left: 35%; margin-right: 35%; margin-top: 12%;">

	<table width="100%">

		<tr>
			<td>
				<div align="center">
				
					<img src="logo.png" style="border-radius: 10px; width: 40%; margin-top: 7%;">

					<?php if (isset($_GET['error'])) { ?>
						<p class="error"><?php echo $_GET['error']; ?></p>
						
					<?php } ?>

				</div>
			</td>
		</tr>

	<tr>
		<td colspan="1">
				
				<input  type="text" name="username" placeholder="Username" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;
		 		border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%; margin-top: 15px;">
		</td>

	</tr>

		<tr>
		<td colspan="1">
				
				<input  type="password" name="pass" placeholder="Password" style="height: 35px; width: 90%; font-size: 17px; border-radius: 5px; border:solid; border-width: 1px;
		 		border-color: #A9A9A9;margin-bottom: 5px; margin-left: 3%; margin-top: 10px;">
		</td>

	</tr>
		
		<tr>
		
		<td>
		<div align="center" style="margin-top: 10px;">
			<input type="submit" name="login" value="Login" style="background:  #F88400; width:40%; height: 40px; border:hidden; border-radius: 5px; font-size: 20px;  color: white;">

			</div>
		</td>

	</tr>

			<tr>
		
		<td>
		<div align="center" style="margin-top: 10px;">
			<Button style="background:  #F88400; width:60%; height: 40px; border:hidden; border-radius: 5px; font-size: 20px;  color: white; margin-bottom: 10px;"><a href="SellerLogin.php" style=" text-decoration: none; color: white;">I am a seller</a></Button>

			</div>
		</td>

	</tr>

	</table>
</form>


</body>
</html>