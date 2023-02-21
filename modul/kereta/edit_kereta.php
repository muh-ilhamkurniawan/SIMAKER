      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Edit Kereta</h2>
              <p class="text-muted">Edit Data Kereta.</p>
              <?php
                  $id=$_GET['id'];
                  $sqledit = "select * from siswa where nis = '".$id."'";
                  $hasiledit = $conn->query($sqledit);
                  $show = $hasiledit->fetch_assoc();
                  ?>
              <div class="card-deck col-md-8">
                <div class="card shadow mb-4">
                  <div class="card-body">
                    <form method="post" action="././simpan.php?ip=edit_kereta">
                      <div class="form-group">
                        <label for="inputAddress">No KA</label>
                        <input type="text" class="form-control" id="nis" name="nis" placeholder="No KA" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $show['nis'];?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress">Nama KA</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama KA" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $show['nama'];?>" required>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress">Tujuan</label>
                        <input type="text" class="form-control" id="jk" name="jk" placeholder="tujuan" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $show['jk'];?>" required>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress2">Kategori</label>
                        <select name="kelas" class="form-control" required>
                        <?php
                          $sql = "select nama_kelas from kelas";
                          $hasil = $conn->query($sql);
                          ?>
                          <?php
                          if ($hasil->num_rows>0) {
                            while ($row = $hasil->fetch_assoc()) {
                              if ($row['nama_kelas']==$show['kelas']) {
                              ?>
                                <option value="<?php echo $show['kelas'];?>" selected><?php echo $show['kelas'];?></option>
                              <?php
                              }
                              else{
                                ?>
                                <option value="<?php echo $row['nama_kelas'];?>"><?php echo $row['nama_kelas'];?></option>
                                <?php
                              }
                            }
                          }
                          ?>
                          </select>
                          </div>
                          <div class="form-group">
                        <label for="inputAddress">Jam Keberangkatan</label>
                        <input type="time" class="form-control" id="inputAddress" placeholder="tujuan" value="<?php echo $show['kedatangan'];?>" required>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress">Jam Keberangkatan</label>
                        <input type="time" class="form-control" id="inputAddress" placeholder="tujuan" value="<?php echo $show['keberangkatan'];?>" required>
                      </div>
                      <a href="home.php?r=data_kereta" class="btn btn-danger">Batal</a>
                      <button type="submit" class="btn btn-primary">Perbarui</button>
                    </form>
                  </div>
                </div>
              </div> <!-- / .card-desk-->
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