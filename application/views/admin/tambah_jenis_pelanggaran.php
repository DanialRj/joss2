          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Jenis Pelanggaran</h1>
            <a href="#" data-toggle="modal" data-target="#tambahModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Jenis Pelanggaran</a>
          </div>

          <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
          <?= $this->session->flashdata('message'); ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data List Jenis Pelanggaran</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kategori Pelanggaran</th>
                      <th>Jenis Pelanggaran</th>
                      <th>Poin</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Kategori Pelanggaran</th>
                      <th>Jenis Pelanggaran</th>
                      <th>Poin</th>
                      <th>Opsi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php $i = 1; foreach ($data as $key) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $key['kategori_pelanggaran'] ?></td>
                      <td><?= $key['jenis_pelanggaran'] ?></td>
                      <td><?= $key['bobot_poin'] ?></td>
                      <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="<?= base_url('jenispelanggaran/edit'); ?>" method="GET">
                                <input type="text" class="form-control" name="id_jenis_pelanggaran" id="id" value="<?= $key['id_jenis_pelanggaran']; ?>" hidden>
                                <button href="#" class="btn btn-info btn-circle btn-sm mr-1">
                                  <i class="fas fa-info-circle"></i>
                                </button>
                            </form>

                            <form action="<?= base_url('jenispelanggaran/deleteData'); ?>" method="POST">
                                <input type="text" class="form-control" name="id_jenis_pelanggaran" id="id" value="<?= $key['id_jenis_pelanggaran']; ?>" hidden>
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
          <h5 class="modal-title" id="tambahSubMenuModalLabel">Tambah Data Jenis Pelanggaran</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('jenispelanggaran/saveData'); ?>" method="POST"><br>

            <?php $choseRole = $this->db->get('ripel')->result_array(); ?>
            <div class="input-group mb-3">
              <select class="custom-select" id="id_kategori_pelanggaran" name="id_kategori_pelanggaran">
                <?php foreach($choseRole as $role) : ?>
                    <option value="<?= $role['id_kategori_pelanggaran'] ?>"><?= $role['kategori_pelanggaran'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Nama Jenis Pelanggaran" name="jenis_pelanggaran">
            </div>

            <div class="input-group mb-3">
              <input type="number" class="form-control" placeholder="Bobot poin" name="bobot_poin">
            </div>

            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>