<?php

if (isset($_POST['insert'])) {
	
	$Item = $_POST['items'];
	$Sellername = $_POST['sellername'];
	$Buyername = $_POST['buyername'];
	$Buyercnum = $_POST['buyercnum']; 
	$Amount = $_POST['amount']; 
	$Dropfee = $_POST['dropfee'];
	$Choosesellers = $_POST['sellers'];  
 

		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "projectsystem";

		$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

		if (mysqli_connect_error()) {

    		die("Database connection failed: " . mysqli_connect_error());
			}

		else{
			$sql = "INSERT INTO seller1tbl (Items,Seller_name,Buyer_name,Buyer_cnumber, Amount, Drop_fee, Choose_seller)
			values ('$Item','$Sellername','$Buyername','$Buyercnum','$Amount','$Dropfee','$Choosesellers')";

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

<!DOCTYPE html>
<html>
<head>
<title>Result Data </title>

	<style>
		table {
			border-collapse: collapse;
			width: 100%;
			color: #588c7e;
			font-family: monospace;
			font-size:15px;
			text-align: left;
		}

		th {
		background-color: #588c7e;
		color: white
		}

		tr:nth-child(even) {background-color: #f2f2f2;}


</style>


</head>
<body>
<table>
		<tr>
			<th>Item</th>
			<th>Name</th>
			<th>Firstname</th>
			<th>Classcode</th>
			<th>Subject</th>
			<th>Time</th>
			<th>Time</th>
		</tr>

		  	<?php

		$conn = mysqli_connect("localhost", "root", "", "projectsystem");
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT Items,Seller_name,Buyer_name,Buyer_cnumber,Amount,Drop_fee,Choose_seller FROM seller1tbl";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {


		while($row = $result->fetch_assoc()) {

						if ($row["Choose_seller"]=='seller6') {


						echo "<tr st><td>" . $row["Items"] . "</td><td>". $row["Seller_name"]. "</td><td>". $row["Buyer_name"]. "</td><td>" . $row["Buyer_cnumber"]. "</td><td>". $row["Amount"]. "</td><td>". $row["Drop_fee"]. "</td><td>". $row["Choose_seller"]. "</td></tr>";
			}

		}
		echo "</table>";
		} else { echo "0 results"; }
		$conn->close();

	?>


</table>
</body>

</html>