<?php
include 'koneksi.php';
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $conn->query("SELECT nis,nama,kelas,kedatangan,keberangkatan FROM siswa WHERE nama LIKE '%".$searchTerm."%' or nis LIKE '%".$searchTerm."%'");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['nis'].", ".$row['nama'].",".$row['kelas'].", KEDATANGAN(".$row['kedatangan']."), KEBERANGKATAN(".$row['keberangkatan'].")";
}
//return json data
echo json_encode($data);
?>