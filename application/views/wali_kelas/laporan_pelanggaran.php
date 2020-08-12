          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Pelanggaran</h1>
          </div>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="<?= base_url('laporanpelanggaran/laporankeseluruhan'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Laporan Data Pelanggaran</a>
            <a href="<?= base_url('laporanpelanggaran/laporankeseluruhan5'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Laporan Data Pelanggaran Belum Terproses</a>
            <a href="#" data-toggle="modal" data-target="#tambahModal2" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Laporan Data Pelanggaran Dari Jenis Masalah</a>
            <a href="#" data-toggle="modal" data-target="#tambahModal3" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Laporan Data Pelanggaran Dari Jenis Pelanggaran</a>
            <a href="#" data-toggle="modal" data-target="#tambahModal4" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Laporan Data Pelanggaran Dari Pelapor</a>
          </div>

          <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
          <?= $this->session->flashdata('message'); ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data List Pelanggaran</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Masalah </th>
                      <th>Nama Pelapor</th>
                      <th>Nama Siswa</th>
                      <th>Nilai Sosial</th>
                      <th>Jenis Pelanggaran</th>
                      <th>Bobot Poin</th>
                      <th>Tanggal</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Masalah </th>
                      <th>Nama Pelapor</th>
                      <th>Nama Siswa</th>
                      <th>Nilai Sosial</th>
                      <th>Jenis Pelanggaran</th>
                      <th>Bobot Poin</th>
                      <th>Tanggal</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php $i = 1; foreach ($data as $key) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <?php $choseRole = $this->db->get_where('rilah', ['id_kategori_masalah' => $key['id_kategori_masalah']])->row_array(); ?>
                      <td><?= $choseRole['kategori_masalah'] ?></td>

                      <?php $choseRole = $this->db->get_where('tim_stp2k', ['id_tim' => $key['id_tim']])->row_array(); ?>
                      <td><?= $choseRole['nama_tim'] ?></td>

                      <?php $choseRole = $this->db->get_where('siswa', ['id_siswa' => $key['id_siswa']])->row_array(); ?>
                      <td><?= $choseRole['nama_siswa'] ?></td>

                      <?php $choseRole = $this->db->get_where('nilai_sosial', ['id_nilai_sosial' => $key['id_nilai_sosial']])->row_array(); ?>
                      <td><?= $choseRole['nilai_sosial'] ?></td>

                      <?php $choseRole = $this->db->get_where('nipel', ['id_jenis_pelanggaran' => $key['id_jenis_pelanggaran']])->row_array(); ?>
                      <td><?= $choseRole['jenis_pelanggaran'] ?></td>
                      <td><?= $key['bobot_poin'] ?></td>
                      <td><?= $key['at'] ?></td>
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
          <h5 class="modal-title" id="tambahSubMenuModalLabel">Cetak Laporan Tambah Data Pelanggaran Bedasarkan Kelas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('laporanpelanggaran/laporanbykelas'); ?>" method="GET"><br>
            <?php $choseRole = $this->db->get('kelas')->result_array(); ?>
            <div class="input-group mb-3">
              <select class="custom-select" id="id_kelas" name="id_kelas">
                <?php foreach($choseRole as $role) : ?>
                    <option value="<?= $role['id_kelas'] ?>"><?= $role['kelas']; ?> <?= $role['jurusan']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Cetak</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tambahModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content p-3">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahSubMenuModalLabel">Cetak Laporan Data Pelanggaran Bedasarkan Jenis Masalah</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('laporanpelanggaran/laporanbyforigen'); ?>" method="GET"><br>
            <?php $choseRole = $this->db->get('rilah')->result_array(); ?>
            <div class="input-group mb-3">
              <select class="custom-select" id="id" name="id">
                <?php foreach($choseRole as $role) : ?>
                    <option value="<?= $role['id_kategori_masalah'] ?>"><?= $role['kategori_masalah']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Cetak</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tambahModal3" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content p-3">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahSubMenuModalLabel">Cetak Laporan Data Pelanggaran Bedasarkan Jenis Masalah</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('laporanpelanggaran/laporanbyjenispelanggaran'); ?>" method="GET"><br>
            <?php $choseRole = $this->db->get('nipel')->result_array(); ?>
            <div class="input-group mb-3">
              <select class="custom-select" id="id" name="id">
                <?php foreach($choseRole as $role) : ?>
                    <option value="<?= $role['id_jenis_pelanggaran'] ?>"><?= $role['jenis_pelanggaran']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Cetak</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tambahModal4" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content p-3">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahSubMenuModalLabel">Cetak Laporan Data Pelanggaran Bedasarkan Jenis Masalah</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('laporanpelanggaran/laporanbypelapor'); ?>" method="GET"><br>
            <?php $choseRole = $this->db->get('tim_stp2k')->result_array(); ?>
            <div class="input-group mb-3">
              <select class="custom-select" id="id" name="id">
                <?php foreach($choseRole as $role) : ?>
                    <option value="<?= $role['id_tim'] ?>"><?= $role['nama_tim']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Cetak</button>
            </div>
        </form>
      </div>
    </div>
  </div>