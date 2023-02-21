<?php
include 'koneksi.php';
$key = $_GET['e'];
if ($key=='export_transaksi') {
	$tgl1 = $_GET['date1'];
	$tgl2 = $_GET['date2'];
	$kelas = $_GET['kelas'];
	$hari = date("d-m-Y");
	$sqlsiswatelat = "";
    if ($kelas=="semua") {
        $sqlsiswatelat = "select transaksitelat.nis,transaksitelat.lama_datang, transaksitelat.lama_berangkat, siswa.nama,siswa.kelas,transaksitelat.tanggal, siswa.kedatangan, siswa.keberangkatan, transaksitelat.kedatangan as real_datang, transaksitelat.keberangkatan as real_berangkat, transaksitelat.alasan from transaksitelat join siswa on transaksitelat.nis = siswa.nis where transaksitelat.tanggal between '".$tgl1."' and '".$tgl2."' order by transaksitelat.id asc";
    }
    else{
        $sqlsiswatelat = "select transaksitelat.nis, siswa.nama,siswa.kelas,transaksitelat.tanggal,transaksitelat.alasan from transaksitelat join siswa on transaksitelat.nis = siswa.nis where siswa.kelas = '".$kelas."' and transaksitelat.tanggal between '".$tgl1."' and '".$tgl2."' order by transaksitelat.id asc";
    }
    // Fungsi header dengan mengirimkan raw data excel
	header("Content-type: application/vnd-ms-excel");
 
	// Mendefinisikan nama file ekspor "hasil-export.xls"
	header("Content-Disposition: attachment; filename=Data Keterlambatan Kereta $tgl1 sampai $tgl2.xls");
	?>
	<table bordered="1">
		<thead>
			<tr>
				<th>No</th>
				<th>No KA</th>
				<th>Nama KA</th>
				<th>Kategori</th>
				<th>Tanggal</th>
				<th>Kedatangan</th>
				<th>Keberangkatan</th>
				<th>Realisasi Kedatangan</th>
				<th>Realisasi Keberangkatan</th>
				<th>Telat Datang</th>
				<th>Telat Berangkat</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$ab = 1;
			$resultsiswatelat = $conn->query($sqlsiswatelat);
            if ($resultsiswatelat->num_rows>0) {
                while ($row = $resultsiswatelat->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $ab;?></td>
                    <td><?php echo $row['nis'];?></td>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['kelas'];?></td>
                    <td><?php
                    $tanggal1 = str_replace('-', '/', $row['tanggal']);
                    $hasiltanggal = date('d/m/Y', strtotime($tanggal1));
                    echo $hasiltanggal;
                    ?></td>
					<td><?php echo $row['kedatangan']; ?></td>
					<td><?php echo $row['keberangkatan'];?></td>
					<td><?php echo $row['real_datang']; ?></td>
					<td><?php echo $row['real_berangkat'];?></td>
					<td><?php echo $row['lama_datang']; echo " menit";?></td>
					<td><?php echo $row['lama_berangkat']; echo " menit";?></td>
                    <td><?php echo $row['alasan'];?></td>
                </tr>
                <?php
                $ab++;
            	}
            }
            ?>
		</tbody>
	</table>
	<?php
}
?>