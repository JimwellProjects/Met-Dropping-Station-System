<?php

$sname = "localhost";
$unmae = "root";
$password ="";

$db_name = "projectsystem";

$conn = mysqli_connect($sname, $unmae, $password, $db_name );

if (!$conn) {

	echo "Connecttion Failed!";

}

?>