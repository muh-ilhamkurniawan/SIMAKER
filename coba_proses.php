<?php
$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "kai_keterlambatan";
$koneksi    = mysqli_connect($host, $user, $password, $database);
require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

ini_set("display_errors",0);
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
error_reporting(0);
 
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
 
    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
    $extension = end($arr_file);
 
    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
 
    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
     
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
	for($i = 1;$i < count($sheetData);$i++)
	{
        $no_ka = $sheetData[$i]['1'];
        $nama = $sheetData[$i]['2'];
        $tujuan = $sheetData[$i]['3'];
        $kelas = $sheetData[$i]['4'];
        $kedatangan = $sheetData[$i]['5'];
        $keberangkatan = $sheetData[$i]['6'];
        mysqli_query($koneksi,"insert into kereta values ('$no_ka','$nama','$tujuan','$kelas','$kedatangan','$keberangkatan')");
    }
    echo '<script>alert("Berhasil mengimport data."); 
    document.location="home.php?r=data_kereta_kategori&kelas=semua";</script>';
}
?>