<?php

$conn = mysqli_connect("localhost","root","","address-book");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
} 

?>