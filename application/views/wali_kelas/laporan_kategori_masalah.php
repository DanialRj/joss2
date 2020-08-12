          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Kategori Masalah</h1>
            <a href="<?= base_url('laporankategorimasalah/laporankeseluruhan'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Laporan Kategori Masalah</a>
          </div>

          <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
          <?= $this->session->flashdata('message'); ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data List Kategori Masalah</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kategori Masalah</th>
                      <th>Bobot Dari</th>
                      <th>Bobot Sampai</th>
                      <th>Sanksi</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Kategori Masalah</th>
                      <th>Bobot Dari</th>
                      <th>Bobot Sampai</th>
                      <th>Sanksi</th>
                      <th>Keterangan</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php $i = 1; foreach ($data as $key) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $key['kategori_masalah'] ?></td>
                      <td><?= $key['bobot_dari'] ?></td>
                      <td><?= $key['bobot_sampai'] ?></td>
                      <td><?= $key['sanksi'] ?></td>
                      <td><?= $key['ket'] ?></td>
                    </tr>
                      <?php $i++; endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
