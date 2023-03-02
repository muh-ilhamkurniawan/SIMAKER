<?php
include "koneksi.php";
session_start();
    $log = $_SESSION['d_log'];
    $query = "UPDATE activity_log SET waktu_logout = now() WHERE id = '$log'";    
    $result = $conn->query($query);
if(session_destroy()) // Destroying All Sessions
{
header("Location: login.php"); // Redirecting To Home Page
}
?>