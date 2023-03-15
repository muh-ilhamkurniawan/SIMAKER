      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="mb-2 page-title">Laporan Keterlambatan Kereta</h2>
              <p class="card-text">Data Kereta Terlambat Dari 
              <?php
                    $var1 = $_POST['tgl1'];
                    $var2 = $_POST['tgl2'];
                    $kelas = $_POST['kelas'];
                    $tgl1 = str_replace('/', '-', $var1);
                    $date1 = date('Y-m-d', strtotime($tgl1));
                    $tgl2 = str_replace('/', '-', $var2);
                    $date2 = date('Y-m-d', strtotime($tgl2));
                    echo $var1." Sampai ".$var2;
                    ?>
              </p>
              <a href="home.php?r=keterlambatan" class="btn btn-danger">Kembali</a>
              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                      <!-- table -->
                      <table class="table datatables" id="dataTable-1">
                        <thead>
                          <tr>
                                <th>No</th>
                                <th>No KA</th>
                                <th>Nama KA</th>
                                <th>Kategori</th>
                                <th>Jumlah Terlambat</th>
                                <th>Total Waktu Keterlambatan Kedatangan</th>
                                <th>Total Waktu Keterlambatan Keberangkatan</th>
                                <th>Detail</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            
                            $sqlkeretatelat = "";
                            $ab = 1;
                            if ($kelas=="semua") {
                                $sqlkeretatelat = "select distinct transaksitelat.no_ka, kereta.nama,kereta.kelas, kereta.kedatangan, kereta.keberangkatan from transaksitelat join kereta on transaksitelat.no_ka = kereta.no_ka where transaksitelat.tanggal between '".$date1."' and '".$date2."' order by transaksitelat.no_ka asc";
                            }
                            else{
                                $sqlkeretatelat = "select distinct transaksitelat.no_ka, kereta.nama,kereta.kelas, kereta.kedatangan, kereta.keberangkatan from transaksitelat join kereta on transaksitelat.no_ka = kereta.no_ka where kereta.kelas = '".$kelas."' and transaksitelat.tanggal between '".$date1."' and '".$date2."' order by transaksitelat.no_ka asc";
                            }
                            $resultkeretatelat = $conn->query($sqlkeretatelat);
                            if ($resultkeretatelat->num_rows>0) {
                                while ($row = $resultkeretatelat->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $ab;?></td>
                                        <td><?php echo $row['no_ka'];?></td>
                                        <td><?php echo $row['nama'];?></td>
                                        <td><?php echo $row['kelas'];?></td>
                                        <td>
                                            <?php
                                            $resultcount = $conn->query("select count(no_ka) as total from transaksitelat where no_ka = '".$row['no_ka']."' and tanggal between '".$date1."' and '".$date2."'");
                                            $totalcount = $resultcount->fetch_assoc();
                                            echo $totalcount['total'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $resultsum = $conn->query("select sum(lama_datang) as jumlah from transaksitelat where no_ka = '".$row['no_ka']."' and tanggal between '".$date1."' and '".$date2."'");
                                            $totalsum = $resultsum->fetch_assoc();
                                            echo $totalsum['jumlah'];
                                            echo " menit";
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $resultsum = $conn->query("select sum(lama_berangkat) as jumlah from transaksitelat where no_ka = '".$row['no_ka']."' and tanggal between '".$date1."' and '".$date2."'");
                                            $totalsum = $resultsum->fetch_assoc();
                                            echo $totalsum['jumlah'];
                                            echo " menit";
                                            ?>
                                        </td>
                                        <td><a href="././home.php?r=detail_keterlambatan&no_ka=<?php echo $row['no_ka'];?>&nama=<?php echo $row['nama'];?>&kelas=<?php echo $row['kelas'];?>&kedatangan=<?php echo $row['kedatangan'];?>&keberangkatan=<?php echo $row['keberangkatan'];?>&tgl1=<?php echo $date1;?>&tgl2=<?php echo $date2;?>" class="btn btn-primary">Detail</a></td>
                                    </tr><?php $ab++;
                                }
                            }
                            ?>
                        </tbody>
                      </table>
                      <a href="././export.php?e=export_transaksi&date1=<?php echo $date1;?>&date2=<?php echo $date2;?>&kelas=<?php echo $kelas;?>" target="_blank" class="btn btn-success text-white">Export Excell</a>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-box fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Package has uploaded successfull</strong></small>
                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-download fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Widgets are updated successfull</strong></small>
                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-inbox fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Notifications have been sent</strong></small>
                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-link fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Link was attached to menu</strong></small>
                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                </div> <!-- / .list-group -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->