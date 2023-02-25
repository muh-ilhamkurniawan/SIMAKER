      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Edit Keterlambatan Kereta</h2>
              <p class="text-muted">Edit Data Keterlambatan Kereta.</p>
              <?php
                $id=$_GET['id'];
                $sqledit = "select * from transaksitelat where id = '".$id."'";
                $hasiledit = $conn->query($sqledit);
                $show = $hasiledit->fetch_assoc();
                ?>
              <div class="row">
              <div class="col-md-6">
                <div class="card shadow mb-4">
                <div class="card-header">
                      <strong class="card-title">Form Edit</strong>
                    </div>
                  <div class="card-body">
                    <form method="post" action="././simpan.php?ip=edit_keterlambatan">
                    <div class="form-group">
                        <label for="inputAddress">ID</label>
                        <input class="form-control" id="id" name="id" placeholder="ID" value="<?php echo $show['id'];?>"  readonly>
                      </div>
                      <div class="form-group">
                        <label for="tgl">Tanggal</label>
                        <input class="form-control " type="date"  id="tgl" name="tgl" placeholder="Tanggal" value="<?php echo $show['tanggal'];?>" readonly>
                      </div>
                      <div class="form-group"> 
                      <?php
                          $sqljadwal = "select nama, kedatangan, keberangkatan from kereta where no_ka = '".$show['no_ka']."'";
                          $hasiljadwal = $conn->query($sqljadwal);
                          $showjdw = $hasiljadwal->fetch_assoc();
                    ?>
                        <label for="no_katelat">No KA</label>
                        <input type="text" class="form-control" id="no_katelat" name="no_katelat"  placeholder="No KA" value="<?php echo $showjdw['nama'];?>-<?php echo $show['no_ka'];?>" onchange='changeValue(this.value)' readonly>
                      </div>
                      <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="kedatangan" >Jam Kedatangan</label>
                              <input type="time" class="form-control" id="kedatangan" name="kedatangan" value="<?php echo $showjdw['kedatangan'];?>" readonly>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="keberangkatan">Jam Keberangkatan</label>
                              <input type="time" class="form-control" id="keberangkatan" name="keberangkatan" value="<?php echo $showjdw['keberangkatan'];?>"  readonly>
                          </div>
                      </div>
                      <div class="form-group" style="text-align:center;">
                        <label for="no_katelat" >Realisasi</label>
                      </div>
                      <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="kedatangan" >Jam Kedatangan</label>
                              <input type="time" class="form-control" id="real_datang" name="real_datang" value="<?php echo $show['kedatangan'];?>" required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="keberangkatan">Jam Keberangkatan</label>
                              <input type="time" class="form-control" id="real_berangkat" name="real_berangkat" value="<?php echo $show['keberangkatan'];?>" required>
                          </div>
                      </div>
                      <div class="form-group" style="text-align:center;">
                        <label for="lama_terlambat" >Lama Keterlambatan Dalam Menit</label>
                      </div>
                      <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="kedatangan" >Kedatangan</label>
                              <input type="number" class="form-control" id="lamadatang" name="lamadatang" value="<?php echo $show['lama_datang'];?>" readonly>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="keberangkatan">Keberangkatan</label>
                              <input type="number" class="form-control" id="lamaberangkat" name="lamaberangkat" value="<?php echo $show['lama_berangkat'];?>" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                        <label or="alasan">Keterangan</label>
                        <textarea class="form-control" id="alasan" name="alasan" onkeyup="this.value = this.value.toUpperCase()" placeholder="keterangan" required><?php echo $show['alasan'];?></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                  </div>
                </div>
              </div> <!-- / .card-desk-->
              <div class="col-md-6">
                  <div class="card shadow">
                  <div class="card-header">
                      <strong class="card-title">Data Kereta</strong>
                    </div>
                    <div class="card-body">
                      <!-- table -->
                      <table class="table datatables" id="dataTable-1">
                        <thead>
                          <tr>
                              <th>No KA</th>
                              <th>Nama KA</th>
                               <th>Tujuan</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sqlkereta = "select no_ka,nama,tujuan,kelas,kedatangan,keberangkatan from kereta order by no_ka asc";
                            $resultkereta = $conn->query($sqlkereta);
                            if ($resultkereta->num_rows>0) {
                                while ($row = $resultkereta->fetch_assoc()) {
                                    ?>
                                    <tr>
                                    <td><?php echo $row['no_ka'];?></td>
                                        <td><?php echo $row['nama'];?></td>
                                        <td><?php echo $row['tujuan'];?></td>
                                    </tr><?php
                                }
                            }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div>
            </div> <!-- .col-12 -->
            
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
          </div>
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