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
//-------------------------------------//
echo "<table id='kalba' class='kalba'><tr><th>Žaidimas:</th><th>";
echo "<form action='edit.php' method='post'><select name='kalba'>";
//------------------------------------//
while ($row = mysqli_fetch_row($result)) echo "<option>".$row[0]; // kalbu loop.
//-----------------------------------//
echo "</th></select><th><button type='submit' id='button' class='float'>Pasirinkti</button></form></th></tr></table>";
//----------------------------------//
mysqli_close($conn);
?> 