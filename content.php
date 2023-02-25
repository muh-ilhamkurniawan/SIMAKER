<?php
if (isset($_GET['r'])) {
	$key = $_GET['r'];
	if ($key == 'beranda') {
		include 'beranda.php';
	}
	if ($key == 'input_kategori') {
		include 'modul/kategori/input_kategori.php';
	}
	if ($key == 'data_kategori') {
		include 'modul/kategori/data_kategori.php';
	}

	
	if ($key == 'input_kereta') {
		include 'modul/kereta/input_kereta.php';
	}
	if ($key=='import_kereta') {
		include 'modul/kereta/import_kereta.php';
	}
	if ($key=='data_kereta') {
		include 'modul/kereta/kereta.php';
	}
	if ($key=='data_kereta_kategori') {
		include 'modul/kereta/data_kereta.php';
	}
	if ($key=='edit_kereta') {
		include 'modul/kereta/edit_kereta.php';
	}
	if ($key=='hapus_data_kereta') {
		include 'modul/kereta/hapus.php';
	}
	if ($key=='input_kereta_hadir') {
		include 'modul/transaksi/inputtelat.php';
	}
	if ($key=='laporan_kereta_hadir') {
		include 'modul/transaksi/laporan.php';
	}
	if ($key=='data_kereta_hadir') {
		include 'modul/transaksi/datalaporan.php';
	}
	if ($key=='detail_kereta_hadir') {
		include 'modul/transaksi/detailtelat.php';
	}
	


	if ($key=='input_pengguna') {
		include 'modul/pengguna/input_pengguna.php';
	}
	if ($key=='data_pengguna') {
		include 'modul/pengguna/data_pengguna.php';
	}
	if ($key=='edit_pengguna') {
		include 'modul/pengguna/edit_pengguna.php';
	}
	if ($key=='aktivitas_pengguna') {
		include 'modul/pengguna/aktivitas_pengguna.php';
	}



	
	if ($key=='kenaikan_kelulusan_kereta') {
		include 'modul/kereta/kelasLulus.php';
	}
	if ($key=='proses_kenaikan_kelulusan_kereta') {
		include 'modul/kereta/prosesKelasLulus.php';
	}


	if ($key=='input_keterlambatan') {
		include 'modul/keterlambatan/input_telat.php';
	}
	if ($key=='keterlambatan') {
		include 'modul/keterlambatan/keterlambatan.php';
	}
	if ($key=='data_keterlambatan') {
		include 'modul/keterlambatan/data_laporan.php';
	}
	if ($key=='detail_keterlambatan') {
		include 'modul/keterlambatan/detail_laporan.php';
	}
	if ($key=='edit_keterlambatan') {
		include 'modul/keterlambatan/edit_telat.php';
	}


	if ($key=='input_hadir') {
		include 'modul/transaksi/hadir.php';
	}
	if ($key=='hadir') {
		include 'modul/transaksi/inputhadir.php';
	}

}
?>