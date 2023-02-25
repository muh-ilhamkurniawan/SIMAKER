<?php
include 'koneksi.php';
$error = "";
if (isset($_POST['login'])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$user = $conn->real_escape_string($user);
	$pass = $conn->real_escape_string($pass);
	$pass = md5($pass);
	$sql = "select username,password,level,nama from admin where username='".$user."' and password='".$pass."'";
	$hasil = $conn->query($sql);
	if ($hasil->num_rows == 1) {
		header('location: home.php?r=beranda');
		session_start();
		$row = $hasil->fetch_assoc();
		$_SESSION['a_user']=$row['username'];
		$_SESSION['b_level']=$row['level'];
		$_SESSION['c_nama']=$row['nama'];
		$level = $row['level'];
		$query = "INSERT INTO activity_log VALUES ('','$user','$level',now(),'')";	
		$result = $conn->query($query);

		$activity_id = mysqli_fetch_array(mysqli_query($conn,"SELECT id FROM activity_log ORDER BY id DESC LIMIT 1;"));
		$id = $activity_id['id'];
		$_SESSION['d_log'] = $id;

	}
	else{
		echo "<script>window.alert('username atau Password Salah');window.location=('login.php')</script>";
	}
}
?>