<?php
include 'koneksi.php';
$ip = $_GET['ip'];
$sql="";
if ($ip=="input_kategori") {
	$kelas = $_POST['kelas'];
	$kelas = strtoupper($kelas);
	$sql = "SELECT nama_kelas FROM kelas where nama_kelas='".$kelas."'";
	$cekKelas = $conn->query($sql);
	if($cekKelas->num_rows > 0) {
        echo "<script>window.alert('Maaf Data Sudah Ada');
        window.location=('home.php?r=input_kategori')</script>";
    } else{
        $sql = "insert into kelas (kode_kelas,nama_kelas) values(NULL,'".$kelas."')";
		if ($conn->query($sql)===TRUE) {
			echo "<script>window.alert('Data Tersimpan');
			window.location=('home.php?r=input_kategori')</script>";
		}
		else{
			echo "error".$conn->error;
		}
    }
	
}
if ($ip=='import_siswa') {
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file, "r");
	$c = 0;
	try {
		while (($filename = fgetcsv($handle, 10000, ","))!==FALSE) {
			$c++;
			if ($c>1) {
				$namaString = $conn->real_escape_string($filename[2]);
				$sql = "insert into siswa value('".$filename[0]."','".$filename[1]."','".$namaString."','".$filename[3]."','".$filename[4]."')";
				if ($conn->query($sql)===TRUE) {
					
				}
				else{
					echo "error".$conn->error;
				}
			}
		}
		echo "<script>window.alert('Data Siswa Tersimpan');
        window.location=('home.php?r=import_siswa')</script>";
	} catch (Exception $e) {
		echo "error";
	}
}
if ($ip=='input_kereta') {
	$nis = strtoupper($_POST['nis']);
	$nama = strtoupper($_POST['nama']);
	$jk = strtoupper($_POST['jk']);
	$kelas = $_POST['kelas'];
	$berangkat = $_POST['berangkat'];
	$datang = $_POST['datang'];
	$nama = $conn->real_escape_string($nama);
	$sql = "SELECT nis FROM siswa where nis='".$nis."'";
	$cekNis = $conn->query($sql);
	if($cekNis->num_rows > 0) {
        echo "<script>window.alert('Maaf No KA Sudah Ada');
        window.location=('home.php?r=input_kereta')</script>";
    } else{
		$sqlInputKereta = "insert into siswa value('".$nis."','".$nama."','".$jk."','".$kelas."','".$datang."','".$berangkat."')";
		if ($conn->query($sqlInputKereta)===TRUE) {
			echo "<script>window.alert('Data Tersimpan');
			window.location=('home.php?r=input_kereta')</script>";
		}
		else{
			echo "<script>window.alert('eror ".$conn->error."');
			window.location=('home.php?r=input_kereta')</script>";
		}
    }


}
if ($ip=='edit_kereta') {
	// $no = $_POST['no'];
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$nama = $conn->real_escape_string($nama);
	$jk = $_POST['jk'];
	$kelas = $_POST['kelas'];
	$sql = "update siswa set nama = '".$nama."', jk = '".$jk."', kelas = '".$kelas."' WHERE nis = '".$nis."'";
	if ($conn->query($sql)===TRUE) {
		echo "<script>window.alert('Data Edit Kereta Tersimpan');
        window.location=('home.php?r=data_kereta')</script>";
	}
	else{
		echo "error".$conn->error;
	}
}
if ($ip=='input_keterlambatan') {
	$var = $_POST['tgl'];
	$nis = $_POST['nistelat'];
	$kedatangan = $_POST['kedatangan'];
	$keberangkatan = $_POST['keberangkatan'];
	$real_kedatangan = $_POST['real_datang'];
	$real_keberangkatan = $_POST['real_berangkat'];
	$alasan = $_POST['alasan'];
	$alasan = $conn->real_escape_string($alasan);
	$tgl = str_replace('/', '-', $var);
	$date = date('Y-m-d', strtotime($tgl));
	$nisi = explode(',', $nis);

	$datang = strtotime($real_kedatangan) - strtotime($kedatangan);
	$lama_datang = floor($datang / 60);
	$berangkat = strtotime($real_keberangkatan) - strtotime($keberangkatan);
	$lama_berangkat = floor($berangkat / 60);

	$sqltransaksi = "insert into transaksitelat value(NULL,'".$nisi[0]."','".$date."','".$real_kedatangan."','".$real_keberangkatan."','".$lama_datang."','".$lama_berangkat."','".$alasan."')";
	if ($conn->query($sqltransaksi)===TRUE) {

		function alertWindow($ld,$lb) {
			echo "<script type ='text/JavaScript'>";
			echo "alert('Data Tersimpan \\nLama Keterlambatan Kedatangan : $ld menit\\nLama Keterlambatan Keberangkatan : $lb menit')";  
			echo "</script>";   
		}
			alertWindow($lama_datang,$lama_berangkat);  

		echo "<script>
        window.location=('home.php?r=input_keterlambatan');
		</script>";
	}
	else{
		echo "error".$conn->error;
	}
	
}
if ($ip=='edit_keterlambatan') {
	$id = $_POST['id'];
	$var = $_POST['tgl'];
	$nis = $_POST['nistelat'];
	// $lama = $_POST['lamatelat'];
	$kedatangan = $_POST['kedatangan'];
	$keberangkatan = $_POST['keberangkatan'];
	$real_kedatangan = $_POST['real_datang'];
	$real_keberangkatan = $_POST['real_berangkat'];
	$alasan = $_POST['alasan'];
	$alasan = $conn->real_escape_string($alasan);
	$tgl = str_replace('/', '-', $var);
	$date = date('Y-m-d', strtotime($tgl));
	$nisi = explode(',', $nis);

	$datang = strtotime($real_kedatangan) - strtotime($kedatangan);
	$lama_datang = floor($datang / 60);
	$berangkat = strtotime($real_keberangkatan) - strtotime($keberangkatan);
	$lama_berangkat = floor($berangkat / 60);
	$sqltransaksi = "update transaksitelat set kedatangan = '".$real_kedatangan."', keberangkatan = '".$real_keberangkatan."', lama_datang = '".$lama_datang."', lama_berangkat = '".$lama_berangkat."', alasan = '".$alasan."' WHERE id = '".$id."'";
	if ($conn->query($sqltransaksi)===TRUE) {

		function alertWindow($ld,$lb) {
			echo "<script type ='text/JavaScript'>";
			echo "alert('Data Diperbarui \\nLama Keterlambatan Kedatangan : $ld menit\\nLama Keterlambatan Keberangkatan : $lb menit')";  
			echo "</script>";   
		}
			alertWindow($lama_datang,$lama_berangkat);  

		echo "<script>
		window.location=('home.php?r=keterlambatan');
		</script>";
	}
	else{
		echo "error".$conn->error;
	}
	
}
if ($ip =='input_pengguna') {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];
	$nama=$_POST['nama'];
	$username = $conn->real_escape_string($username);
	$password = $conn->real_escape_string($password);
	$password = md5($password);
	$nama = $conn->real_escape_string($nama);
	$sql = "SELECT username FROM admin where username='".$username."'";
	$cekAdmin = $conn->query($sql);
	if($cekAdmin->num_rows > 0) {
        echo "<script>window.alert('Maaf Username Sudah Ada');
        window.location=('home.php?r=input_pengguna')</script>";
    } else{
		$sqlAdmin = "insert into admin value(NULL,'".$username."','".$password."','".$level."','".$nama."')";
		if ($conn->query($sqlAdmin)===TRUE) {
			echo "<script>window.alert('Data Tersimpan');
			window.location=('home.php?r=input_pengguna')</script>";
		}
		else{
			echo "<script>window.alert('eror ".$conn->error."');
			window.location=('home.php?r=input_pengguna')
			</script>";
			
		}
    }
}
if ($ip=='edit_admin') {
	$id_admin = $_POST['id_admin'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];
	$nama = $_POST['nama'];
	$nama = $conn->real_escape_string($nama);
	$username = $conn->real_escape_string($username);
	if ($password==NULL) {
		$sql = "update admin set username = '".$username."', level = '".$level."', nama = '".$nama."' WHERE id_admin = '".$id_admin."'";
		if ($conn->query($sql)===TRUE) {
			echo "<script>window.alert('Data Edit Pengguna Tersimpan');
			window.location=('home.php?r=lihat_admin')</script>";
		}
		else{
			echo "error".$conn->error;
		}
	} else {
		$password = $conn->real_escape_string($password);
		$password = md5($password);
		$sql = "update admin set username = '".$username."', password = '".$password."', level = '".$level."', nama = '".$nama."' WHERE id_admin = '".$id_admin."'";
		if ($conn->query($sql)===TRUE) {
			echo "<script>window.alert('Data Edit Pengguna Tersimpan');
			window.location=('home.php?r=lihat_admin')</script>";
		}
		else{
			echo "error".$conn->error;
		}
	}
	
}
if ($ip=='update_kelas') {
	$kelas = $_POST['kelas'];
	foreach ($_POST['naik'] as $naik) {
		$updateKelas = "update siswa set kelas = '".$kelas."' where nis ='".$naik."'";
		if ($conn->query($updateKelas)===TRUE) {
		}
		else{
			echo "error".$updateKelas."<br/>".$conn->error;
		}
	}
	echo "<script>window.alert('Data Update Tersimpan');
        window.location=('home.php?r=kenaikan_kelulusan_siswa')</script>";
}
if ($ip=='hadir') {
	$var = $_POST['tgl'];
	$alasan='';
	if (empty($_POST['alasan'])) {
		$alasan = '-';
	}
	else{
		$alasan = $_POST['alasan'];
	}
	$alasan = $conn->real_escape_string($alasan);
	$tgl = str_replace('/', '-', $var);
	$date = date('Y-m-d', strtotime($tgl));
	foreach ($_POST['naik'] as $naik) {
		$updateKelas = "insert into transaksitelat value(NULL,'".$naik."','".$date."','".$alasan."')";
		if ($conn->query($updateKelas)===TRUE) {
		}
		else{
			echo "error".$updateKelas."<br/>".$conn->error;
		}
	}
	echo "<script>window.alert('Data Tersimpan');
        window.location=('home.php?r=input_hadir')</script>";
}
$conn->close();
?>