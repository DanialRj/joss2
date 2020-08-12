          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Nilai Sosial</h1>
            <a href="#" data-toggle="modal" data-target="#tambahModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data Nilai Sosial</a>
          </div>

          <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
          <?= $this->session->flashdata('message'); ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data List Nilai Sosial</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Siswa</th>
                      <th>Catatan Perilaku</th>
                      <th>Nilai Sikap Spiritual</th>
                      <th>Nilai Sikap Sosial</th>
                      <th>Nilai Sosial</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Nama Siswa</th>
                      <th>Catatan Perilaku</th>
                      <th>Nilai Sikap Spiritual</th>
                      <th>Nilai Sikap Sosial</th>
                      <th>Nilai Sosial</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php $i = 1; foreach ($data as $key) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $key['nama_siswa'] ?></td>
                      <td><?= $key['catatan_perilaku'] ?></td>
                      <td><?= $key['btr_sikap_spiritual'] ?></td>
                      <td><?= $key['btr_sikap_sosial'] ?></td>
                      <td><?= $key['nilai_sosial'] ?></td>
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
          <h5 class="modal-title" id="tambahSubMenuModalLabel">Tambah Data Nilai Sosial</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('nilaisosial/saveData'); ?>" method="POST"><br>
            <?php $choseRole = $this->db->get('siswa')->result_array(); ?>
            <div class="input-group mb-3">
              <select class="custom-select" id="id_siswa" name="id_siswa">
                <?php foreach($choseRole as $role) : ?>
                    <option value="<?= $role['id_siswa'] ?>"><?= $role['nisn']; ?> - <?= $role['nama_siswa']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Catatan Perilaku" name="catatan_perilaku">
            </div>

            <div class="input-group mb-3">
              <input type="number" class="form-control" placeholder="Nilai Sikap Spiritual" name="btr_sikap_spiritual">
            </div>

            <div class="input-group mb-3">
              <input type="number" class="form-control" placeholder="Nilai Sikap Sosial" name="btr_sikap_sosial">
            </div>

            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>