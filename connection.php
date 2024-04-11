<?php
global $conn;
$conn = new mysqli("localhost", "root", "", "frenzone");
if (mysqli_connect_errno()) {
	die("Failed to connect: ". mysqli_connect_error());
	//exit();
}