<?php
$conn = new mysqli("localhost","root","","kai_keterlambatan");
if (!$conn) {
	die("connection failed".$conn->connect_error());
}
?>