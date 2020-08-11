          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Proses Pelanggaran</h1>
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
                      <th>Opsi</th>
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
                      <th>Opsi</th>
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
                      <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                          <form action="<?= base_url('pelanggaran3/proses'); ?>" method="GET">
                                <input type="text" class="form-control" name="id_pelanggaran" id="id" value="<?= $key['id_pelanggaran']; ?>" hidden>
                                <button href="#" class="btn btn-warning btn-circle btn-sm mr-1" <?= $key['id_kategori_masalah'] !== NULL ? 'hidden' : '' ?>>
                                  <i class="fas fa-info"></i>
                                </button>
                            </form>
                        </div>
                      </>
                    </tr>
                      <?php $i++; endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          