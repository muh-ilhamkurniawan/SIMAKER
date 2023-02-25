<?php
include "koneksi.php";
session_start();
    // $user = $_SESSION['a_user'];
    // $user = $row['username'];
    // $activity_id = mysqli_fetch_array(mysqli_query($conn,"SELECT id FROM activity_log ORDER BY id DESC LIMIT 1;"));
    $log = $_SESSION['d_log'];
    // $id = $activity_id['id'];

        // $query = "UPDATE activity_log SET waktu_logout = now() WHERE id = '$id'";
        $query = "UPDATE activity_log SET waktu_logout = now() WHERE id = '$log'";
        
        $result = $conn->query($query);
if(session_destroy()) // Destroying All Sessions
{
header("Location: login.php"); // Redirecting To Home Page
}
?>