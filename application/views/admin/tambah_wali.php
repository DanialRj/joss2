          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Wali Kelas</h1>
            <a href="#" data-toggle="modal" data-target="#tambahModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Wali Kelas</a>
          </div>

          <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
          <?= $this->session->flashdata('message'); ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data List Wali Kelas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Username</th>
                      <th>Nama Wali Kelas</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Username</th>
                      <th>Nama Wali Kelas</th>
                      <th>Opsi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php $i = 1; foreach ($data as $key) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $key['username'] ?></td>
                      <td><?= $key['nama_wali_kelas'] ?></td>
                      <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="<?= base_url('wali/edit'); ?>" method="GET">
                                <input type="text" class="form-control" name="id_wali_kelas" id="id" value="<?= $key['id_wali_kelas']; ?>" hidden>
                                <button href="#" class="btn btn-info btn-circle btn-sm mr-1">
                                  <i class="fas fa-info-circle"></i>
                                </button>
                            </form>

                            <form action="<?= base_url('wali/deleteData'); ?>" method="POST">
                                <input type="text" class="form-control" name="id_wali_kelas" id="id" value="<?= $key['id_wali_kelas']; ?>" hidden>
                                <button href="#" class="btn btn-danger btn-circle btn-sm mr-1" onclick="return confirm('Are you sure you want to delete this item?');">
                                  <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                      </td>
                    </tr>
                      <?php $i++; endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content p-3">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahSubMenuModalLabel">Tambah Data Wali Kelas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('wali/saveData'); ?>" method="POST"><br>            
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email Wali Kelas" name="username">
            </div>
            
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>

            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Nama Wali Kelas" name="nama_wali_kelas">
            </div>

            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>