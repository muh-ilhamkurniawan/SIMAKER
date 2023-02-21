<?php
include 'koneksi.php'; 
?>
<section class="content-header">
    <h1>Sistem Informasi Manajamen Keterlambatan Kereta Api</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
</section><!--section conten header-->
<!--main content-->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box" style="text-align:center;">
                    <img src="dist/img/kai-edit.png" alt="" style="max-width: 200px; margin-top:3%;">
                    <div class="box-header" style="text-align:left;">
                        <h3>Tentang Aplikasi</h3>
                        <p>Sistem Informasi Manajamen Keterlambatan Kereta Api merupakan sebuah sistem informasi berbasis website yang berfunsgi untuk mencatat, mengedit, serta melihat laporan keterlambatan kereta api di wilayah Daop 5 Purwokerto, khususnya pada stasiun Kutoarjo.</p>
                    
                </div>
            </div>
            <div style="text-align:center; float:left; width:49.5%;">
                <div class="box" style="float:left; width:49%;">
                    <div class="box-header">
                        <h1><b><?php
                        $resultcount = $conn->query("select count(nis) as total from siswa");
                        $totalcount = $resultcount->fetch_assoc();
                        echo $totalcount['total'];
                        ?></b>
                        </h1>
                <p>Jadwal Keberangkatan</p>
                        <a href="https://www.kai.id/" target="_blank" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
                <div class="box" style="float:right; width:49%;">
                    <div class="box-header">
                    <h1><b><?php
                        $resultcount = $conn->query("select count(kode_kelas) as total from kelas");
                        $totalcount = $resultcount->fetch_assoc();
                        echo $totalcount['total'];
                        ?></b>
                        </h1>
                <p>Kategori</p>
                        <a href="https://www.kai.id/" target="_blank" class="btn btn-primary">Selengkapnya</a>
                      
                    </div>
                </div>
            </div>
            <div style="text-align:center; float:right; width:49.5%;">
                <div class="box" style="float:left; width:49%;">
                    <div class="box-header">
                    <h1><b><?php
                        $resultcount = $conn->query("select count(nis) as total from transaksitelat");
                        $totalcount = $resultcount->fetch_assoc();
                        echo $totalcount['total'];
                        ?></b>
                        </h1>
                <p>Keterlambatan</p>
                        <a href="https://www.kai.id/" target="_blank" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
                <div class="box" style="float:right; width:49%;">
                    <div class="box-header">
                    <h1><b><?php
                        $resultcount = $conn->query("select count(id_admin) as total from admin");
                        $totalcount = $resultcount->fetch_assoc();
                        echo $totalcount['total'];
                        ?></b>
                        </h1>
                <p>Pengguna</p>
                        <a href="home.php?r=lihat_admin" target="_blank" class="btn btn-primary">Selengkapnya</a>
                      
                    </div>
                </div>
            </div>
            <div class="box" style="float:left; width:49%;">
                    <div class="box-header">
                        <h3>Tutorial Aplikasi</h3>
                        <p></p>
                        <a href="https://www.kai.id/" target="_blank" class="btn btn-primary">Tutorial Penggunaan</a>
                    </div>
                </div>
                <div class="box" style="float:right; width:49%;">
                    <div class="box-header">
                        <h3>Kontak Kami</h3>
                        <p></p>
                        <a href="https://www.kai.id/" target="_blank" class="btn btn-primary">Situs KAI</a>
                      
                    </div>
                </div>

            </div>
        </div>
    </div><!--row-->
</section><!--main content-->
