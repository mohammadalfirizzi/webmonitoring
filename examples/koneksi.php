<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "u7973178_airwatcher2";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn) {
	echo "";
}
else{
	echo "Tidak";
}

?>
