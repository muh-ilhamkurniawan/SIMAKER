      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
            <?php
                $nis = $conn->real_escape_string($_GET['nis']);
                $nama = $conn->real_escape_string($_GET['nama']);
                $kelas = $conn->real_escape_string($_GET['kelas']);
                $kedatangan = $conn->real_escape_string($_GET['kedatangan']);
                $keberangkatan = $conn->real_escape_string($_GET['keberangkatan']);
                $tgl1 = $conn->real_escape_string($_GET['tgl1']);
                $tgl2 = $conn->real_escape_string($_GET['tgl2']);
                ?>
              <h2 class="mb-2 page-title">Detail Laporan Keterlambatan Kereta</h2>
              <p class="card-text">Lihat Data Keterlambat <?php echo $kelas;?> <?php echo $nama;?>-<?php echo $nis;?><br>Kedatangan: <?php echo $kedatangan;?> - Keberangkatan: <?php echo $keberangkatan;?> <br/> Dari <?php echo $tgl1;?> Sampai <?php echo $tgl2;?>
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
                          <th>ID</th>
                                <th>Tanggal</th>
                                <th>Kedatangan Real</th>
                                <th>Keberangkatan Real</th>
                                <th>Keterlambatan Datang</th>
                                <th>Keterlambatan Berangkat</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sqldetail = "select distinct transaksitelat.nis,transaksitelat.id, kereta.nama,kereta.kelas, kereta.kedatangan, kereta.keberangkatan,transaksitelat.tanggal,transaksitelat.lama_datang,transaksitelat.lama_berangkat,transaksitelat.kedatangan as real_datang, transaksitelat.keberangkatan as real_berangkat, transaksitelat.alasan from transaksitelat join kereta on transaksitelat.nis = kereta.nis where transaksitelat.nis ='".$nis."' and transaksitelat.tanggal between '".$tgl1."' and '".$tgl2."' order by transaksitelat.id asc";
                            $resultDetail = $conn->query($sqldetail);
                            if ($resultDetail->num_rows>0) {
                                while ($rowDetail=$resultDetail->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $rowDetail['id'];?></td>
                                        <td><?php
                                        $tgl1 = str_replace('-', '/', $rowDetail['tanggal']);
                                        $date1 = date('d/m/Y', strtotime($tgl1));
                                        echo $date1;
                                        ?></td>
                                        <td><?php echo $rowDetail['real_datang'];?></td>
                                        <td><?php echo $rowDetail['real_berangkat'];?></td>
                                        <td><?php echo $rowDetail['lama_datang'];?> menit</td>
                                        <td><?php echo $rowDetail['lama_berangkat'];?> menit</td>
                                        <td><?php echo $rowDetail['alasan'];?></td>
                                        <td>
                                          <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="././home.php?r=edit_keterlambatan&id=<?php echo $rowDetail['id'];?>">Edit</a>
                                            <a class="dropdown-item" href="././hapus.php?k=hapus_detail&id=<?php echo $rowDetail['id'];?>" onclick="return confirm('Yakin Hapus Data?')">Hapus</a>
                                          </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                      </table>
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