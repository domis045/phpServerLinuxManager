<?php
//-------------------------------//
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "server";
//-------------------------------//

$connection = mysqli_connect($servername, $username, $password, $dbname);
//$connection->set_charset('utf8');
if(!$connection)
{
	echo "Can't connect to the db";
}
?>