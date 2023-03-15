<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <!-- <h2>Section title</h2> -->
              <h2 class="h5 page-title">Dashboard</h2>
              <p class="text-muted">Informasi sistem yang sudah terkumpul hingga saat ini.</p>
              <div class="row">
              <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-box text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-muted mb-0">Total Kereta</p>
                          <span class="h3 mb-0">
                          <?php
                            $resultcount = $conn->query("select count(no_ka) as total from kereta");
                            $totalcount = $resultcount->fetch_assoc();
                            echo $totalcount['total'];
                            ?>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-grid text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-muted mb-0">Kategori</p>
                          <span class="h3 mb-0">
                          <?php
                            $resultcount = $conn->query("select count(kode_kelas) as total from kelas");
                            $totalcount = $resultcount->fetch_assoc();
                            echo $totalcount['total'];
                            ?>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-pie-chart text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col">
                          <p class="small text-muted mb-0">Keterlambatan</p>
                          <div class="row align-items-center no-gutters">
                            <div class="col-auto">
                              <span class="h3 mr-2 mb-0">
                              <?php
                                $resultcount = $conn->query("select count(no_ka) as total from transaksitelat");
                                $totalcount = $resultcount->fetch_assoc();
                                echo $totalcount['total'];
                                ?>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                if ($_SESSION['b_level']=='admin') {?>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-user text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col">
                          <p class="small text-muted mb-0">Pengguna</p>
                          <span class="h3 mb-0">
                          <?php
                            $resultcount = $conn->query("select count(id_admin) as total from admin");
                            $totalcount = $resultcount->fetch_assoc();
                            echo $totalcount['total'];
                            ?>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php 
                  }
                ?>
              </div> <!-- end section -->
              <!-- info small box -->
              <div class="row">
                <!-- Recent orders -->
                <div class="col-md-12">
                  <h6 class="mb-3">Data Keterlambatan Terbaru</h6>
                  <table class="table table-borderless table-striped">
                    <thead>
                      <tr role="row">
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Nama Kereta</th>
                        <th>Keterlambatan Datang</th>
                        <th>Keterlambatan Berangkat</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                            $sqldetail = "select distinct transaksitelat.no_ka,transaksitelat.id, kereta.nama,kereta.kelas, kereta.kedatangan, kereta.keberangkatan,transaksitelat.tanggal,transaksitelat.lama_datang,transaksitelat.lama_berangkat,transaksitelat.kedatangan as real_datang, transaksitelat.keberangkatan as real_berangkat, transaksitelat.alasan from transaksitelat join kereta on transaksitelat.no_ka = kereta.no_ka order by transaksitelat.id desc limit 5";
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
                                        <td><?php echo $rowDetail['nama'];?></td>
                                        <td><?php echo $rowDetail['lama_datang'];?> menit</td>
                                        <td><?php echo $rowDetail['lama_berangkat'];?> menit</td>
                                        <td><?php echo $rowDetail['alasan'];?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                    </tbody>
                  </table>
                </div> <!-- / .col-md-3 -->
              </div> <!-- end section -->
              <h6 class="mb-3">Informasi Aplikasi</h6>
              <p class="text-muted"></p>
              <div class="row">
                <div class="col-md-12 mb-4">
                  <div class="card profile shadow">
                    <div class="card-body my-4">
                      <div class="row align-items-center">
                        <div class="col-md-3 text-center mb-5">
                          <a href="#!" class="avatar avatar-xl">
                            <img src="./assets/avatars/kai.png" alt="..." class="avatar-img rounded-circle">
                          </a>
                        </div>
                        <div class="col">
                          <div class="row align-items-center">
                            <div class="col-md-7">
                              <h4 class="mb-1">Tentang SIMAKA</h4>
                              <p class="small mb-3"><span class="badge badge-dark">Sistem Informasi Manajemen Keterlambatan Kereta</span></p>
                            </div>
                            <div class="col">
                            </div>
                          </div>
                          <div class="row mb-4">
                            <div class="col-md-7">
                              <p class="text-muted">Sistem Informasi Manajamen Keterlambatan Kereta Api merupakan sebuah sistem informasi berbasis website yang berfungsi untuk mencatat, mengedit, serta melihat laporan keterlambatan kereta api di wilayah Daop 5 Purwokerto, khususnya pada stasiun Kutoarjo. </p>
                            </div>
                            <div class="col">
                              <p class="small mb-0 text-muted">PT Kereta Api Indonesia(Persero)</p>
                              <p class="small mb-0 text-muted">Daop 5 Purwokerto</p>
                              <p class="small mb-0 text-muted">(0281) 636031</p>
                            </div>
                          </div>
                          <div class="row align-items-center">
                            <div class="col-md-7 mb-2">
                              <span class="small text-muted mb-0">Dibuat sebagai hasil kerja praktek </br>Mahasiswa Informatika Universitas Jendral Soedirman </br> @2023</span>
                            </div>
                            <div class="col mb-2">
                              <a href="https://drive.google.com/drive/folders/1tPgN_U5jQ-GrAbes7q9glwA6_E55qiLZ?usp=sharing" target="_blank">
                              <button type="button" class="btn btn-primary">Unduh Panduan</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div> <!-- / .row- -->
                    </div> <!-- / .card-body - -->
                  </div> <!-- / .card- -->
                </div> <!-- / .col- -->
              </div> <!-- end section -->
            </div>
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