          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Siswa</h1>
            <a href="<?= base_url('laporansiswa/laporankeseluruhan'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm "><i class="fas fa-download fa-sm text-white-50"></i> Laporan Data Siswa</a>
            <a href="#" data-toggle="modal" data-target="#tambahModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Laporan Data Siswa Dari Kelas</a>
            <a href="<?= base_url('laporansiswa/laporannilaisosial'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm "><i class="fas fa-download fa-sm text-white-50"></i> Laporan Data Nilai Sosial</a>
            <a href="#" data-toggle="modal" data-target="#tambahModal2" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Laporan Data Nilai Sosial Dari Kelas</a>
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
                      <td><?= $key['kelas'] . ' ' . $key['jurusan'] ?></td>
                      <td><?= $key['nisn'] ?></td>
                      <td><?= $key['nama_siswa'] ?></td>
                      <td><?= $key['jenis_kelamin'] ?></td>
                      <td><?= $key['alamat'] ?></td>
                      <td><?= $key['tgl_lahir'] ?></td>
                      <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="<?= base_url('laporansiswa/laporanSiswa'); ?>" method="GET">
                                <input type="text" class="form-control" name="id_siswa" id="id" value="<?= $key['id_siswa']; ?>" hidden>
                                <button href="#" class="btn btn-info btn-circle btn-sm mr-1">
                                  <i class="fas fa-info-circle"></i>
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
          <h5 class="modal-title" id="tambahSubMenuModalLabel">Cetak Laporan Siswa Bedasarkan Kelas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('laporansiswa/laporansiswabykelas'); ?>" method="GET"><br>
            <?php $choseRole = $this->db->get('kelas')->result_array(); ?>
            <div class="input-group mb-3">
              <select class="custom-select" id="id_kelas" name="id_kelas">
                <?php foreach($choseRole as $role) : ?>
                    <option value="<?= $role['id_kelas'] ?>"><?= $role['kelas'] . ' ' . $role['jurusan'] ?></option>
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
          <h5 class="modal-title" id="tambahSubMenuModalLabel">Cetak Data Nilai Sosial Bedasarkan Kelas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('laporansiswa/laporannilaisosialbykelas'); ?>" method="GET"><br>
            <?php $choseRole = $this->db->get('kelas')->result_array(); ?>
            <div class="input-group mb-3">
              <select class="custom-select" id="id_kelas" name="id_kelas">
                <?php foreach($choseRole as $role) : ?>
                    <option value="<?= $role['id_kelas'] ?>"><?= $role['kelas'] . ' ' . $role['jurusan'] ?></option>
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