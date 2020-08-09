          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Siswa</h1>
            <a href="#" data-toggle="modal" data-target="#tambahModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data Siswa</a>
          </div>

          <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
          <?= $this->session->flashdata('message'); ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data List Siswa</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kelas</th>
                      <th>NISN</th>
                      <th>Nama Siswa</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Tanggal Lahir</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Kelas</th>
                      <th>NISN</th>
                      <th>Nama Siswa</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Tanggal Lahir</th>
                      <th>Opsi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php $i = 1; foreach ($data as $key) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $key['id_kelas'] ?></td>
                      <td><?= $key['nisn'] ?></td>
                      <td><?= $key['nama_siswa'] ?></td>
                      <td><?= $key['jenis_kelamin'] ?></td>
                      <td><?= $key['alamat'] ?></td>
                      <td><?= $key['tgl_lahir'] ?></td>
                      <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="<?= base_url('siswa/edit'); ?>" method="GET">
                                <input type="text" class="form-control" name="id_siswa" id="id" value="<?= $key['id_siswa']; ?>" hidden>
                                <button href="#" class="btn btn-info btn-circle btn-sm mr-1">
                                  <i class="fas fa-info-circle"></i>
                                </button>
                            </form>

                            <form action="<?= base_url('siswa/deleteData'); ?>" method="POST">
                                <input type="text" class="form-control" name="id_siswa" id="id" value="<?= $key['id_siswa']; ?>" hidden>
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
          <h5 class="modal-title" id="tambahSubMenuModalLabel">Tambah Data Siswa</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('siswa/saveData'); ?>" method="POST"><br>
            <?php $choseRole = $this->db->get('kelas')->result_array(); ?>
            <div class="input-group mb-3">
              <select class="custom-select" id="id_kelas" name="id_kelas">
                <?php foreach($choseRole as $role) : ?>
                    <option value="<?= $role['id_kelas'] ?>"><?= $role['kelas'] . ' ' . $role['jurusan'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            
            <div class="input-group mb-3">
              <input type="number" class="form-control" placeholder="Nomor Induk Siswa" name="nisn">
            </div>

            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Nama Siswa" name="nama_siswa">
            </div>

            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Alamat" name="alamat">
            </div>

            <div class="input-group mb-3">
              <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir">
            </div>

            <div class="form-group">
                <div class="form-check">
                    <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki</label>
                    <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan</label>
                </div>
            </div>

            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>