<?php
ini_set("display_errors",0);
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
error_reporting(0);
include 'koneksi.php';
$key = $_GET['k'];
$no_ka = $_GET['id'];
$no_ka = $conn->real_escape_string($no_ka);
if ($key=='hapus_kereta') {
	$sqlhapus = "delete from kereta where no_ka ='".$no_ka."'";
	if ($conn->query($sqlhapus)===TRUE) {
		echo "<script>window.alert('Data Kereta Terhapus');
        window.location=('home.php?r=data_kereta_kategori&kelas=semua')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($key=='hapus_kereta_kategori') {
	$namaKelas = $_GET['id'];
	$namaKelas = $conn->real_escape_string($namaKelas);
	$sqlHapusSiswaKategori = "";
	$sqlHapusSiswaKategori = "delete from kereta where kelas ='".$namaKelas."'";
	if ($conn->query($sqlHapusSiswaKategori)===TRUE) {
		echo "<script>window.alert('Data Siswa Terhapus');
        window.location=('home.php?r=data_kereta')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($key=='hapus_detail') {
	$idTelat = $_GET['id'];
	$sqlHapusDetail = "delete from transaksitelat where id ='".$idTelat."'";
	if ($conn->query($sqlHapusDetail)===TRUE) {
		echo "<script>window.alert('Data Terhapus');
        window.location=('home.php?r=keterlambatan')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if($key=='hapus_detail_semua'){
	$no_ka = $_GET['no_ka'];
	$tgl1 = $_GET['tgl1'];
	$tgl2 = $_GET['tgl2'];
	$sqlHapusSemuaLog = "delete from transaksitelat where no_ka ='".$no_ka."' and tanggal between '".$tgl1."' and '".$tgl2."'";
	if ($conn->query($sqlHapusSemuaLog)===TRUE) {
		echo "<script>window.alert('Semua Laporan Keterlambatan Berhasil di Hapus');
        window.location=('home.php?r=keterlambatan')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($key=='hapus_pengguna') {
	$idAdmin = $_GET['id'];
	$sqlHapusAdmin = "delete from admin where id_admin = '".$idAdmin."'";
	if ($conn->query($sqlHapusAdmin)===TRUE) {
		echo "<script>window.alert('Data Terhapus');
        window.location=('home.php?r=data_pengguna')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($key=='hapus_kelas') {
	$idKelas = $_GET['id'];
	$sqlHapusKelas = "delete from kelas where kode_kelas = '".$idKelas."'";
	if ($conn->query($sqlHapusKelas)===TRUE) {
		echo "<script>window.alert('Data Terhapus');
        window.location=('home.php?r=data_kategori')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if($key=='hapus_kategori_semua'){
	$sqlHapusSemuaKategori = "delete from kelas";
	if ($conn->query($sqlHapusSemuaKategori)===TRUE) {
		echo "<script>window.alert('Semua Kategori Berhasil di Hapus');
        window.location=('home.php?r=data_kategori')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($key=='hapus_aktivitas') {
	$idLog = $_GET['id'];
	$sqlHapusLog = "delete from activity_log where id = '".$idLog."'";
	if ($conn->query($sqlHapusLog)===TRUE) {
		echo "<script>window.alert('Data Terhapus');
        window.location=('home.php?r=aktivitas_pengguna')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if($key=='hapus_log_semua'){
	$sqlHapusSemuaLog = "delete from activity_log";
	if ($conn->query($sqlHapusSemuaLog)===TRUE) {
		echo "<script>window.alert('Semua Aktivitas Berhasil di Hapus');
        </script>";
	}
	else{
		echo "error".$conn->error;
	}
}
$conn->close();
?>