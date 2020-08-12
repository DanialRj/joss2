          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Jenis Pelanggaran</h1>
            <a href="<?= base_url('laporanjenispelanggaran/laporankeseluruhan'); ?>"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Laporan Jenis Pelanggaran</a>
            <a href="#" data-toggle="modal" data-target="#tambahModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Laporan Jenis Pelanggaran Dari Kategori</a>
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
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Kategori Pelanggaran</th>
                      <th>Jenis Pelanggaran</th>
                      <th>Poin</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php $i = 1; foreach ($data as $key) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $key['kategori_pelanggaran'] ?></td>
                      <td><?= $key['jenis_pelanggaran'] ?></td>
                      <td><?= $key['bobot_poin'] ?></td>
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
        <form action="<?= base_url('laporanjenispelanggaran/laporanbykategori'); ?>" method="GET"><br>

            <?php $choseRole = $this->db->get('ripel')->result_array(); ?>
            <div class="input-group mb-3">
              <select class="custom-select" id="id_kategori_pelanggaran" name="id_kategori_pelanggaran">
                <?php foreach($choseRole as $role) : ?>
                    <option value="<?= $role['id_kategori_pelanggaran'] ?>"><?= $role['kategori_pelanggaran'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>