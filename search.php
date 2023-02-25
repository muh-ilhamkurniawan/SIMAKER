<?php
include 'koneksi.php';
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $conn->query("SELECT no_ka,nama,kelas,kedatangan,keberangkatan FROM kereta WHERE nama LIKE '%".$searchTerm."%' or no_ka LIKE '%".$searchTerm."%'");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['no_ka'].", ".$row['nama'].",".$row['kelas'].", KEDATANGAN(".$row['kedatangan']."), KEBERANGKATAN(".$row['keberangkatan'].")";
}
//return json data
echo json_encode($data);
?>