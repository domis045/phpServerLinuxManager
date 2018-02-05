<?php
require_once 'config/db.php';


// Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}

$sql = "SHOW TABLES FROM $dbname";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_row($result)) {
	//echo $row[0];
}
mysqli_close($conn);
?> 