          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Pelanggaran</h1>
          </div>

          <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
          <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('pelanggaran/update'); ?>" method="POST">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                        <div class="input-group mb-3 col-md-12">
                            <div class="input-group-prepend">
                                <input type="text" class="form-control"  name="id_pelanggaran" value="<?= $data['id_pelanggaran']; ?>" disabled>
                                <input type="text" class="form-control"  name="id_pelanggaran" value="<?= $data['id_pelanggaran']; ?>" hidden>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Kategori Masalah</span>
                                </div>
                                <?php $choseRole = $this->db->get('rilah')->result_array(); ?>
           
                                <select class="custom-select" id="id_kategori_masalah" name="id_kategori_masalah">
                                  <?php foreach($choseRole as $role) : ?>
                                      <option value="<?= $role['id_kategori_masalah'] ?>" <?= $role['id_kategori_masalah'] == $data['id_kategori_masalah'] ? 'selected' : ''; ?> ><?= $role['kategori_masalah'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Pelapor</span>
                                </div>
                                <?php $choseRole = $this->db->get('tim_stp2k')->result_array(); ?>
           
                                <select class="custom-select" id="id_tim" name="id_tim">
                                  <?php foreach($choseRole as $role) : ?>
                                      <option value="<?= $role['id_tim'] ?>" <?= $role['id_tim'] == $data['id_tim'] ? 'selected' : ''; ?> ><?= $role['nama_tim'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nama Siswa</span>
                                </div>
                                <?php $choseRole = $this->db->get('siswa')->result_array(); ?>
           
                                <select class="custom-select" id="id_siswa" name="id_siswa" disabled>
                                  <?php foreach($choseRole as $role) : ?>
                                      <option value="<?= $role['id_siswa'] ?>" <?= $role['id_siswa'] == $data['id_siswa'] ? 'selected' : ''; ?> ><?= $role['nama_siswa'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nilai Sosial</span>
                                </div>
                                <?php $choseRole = $this->db->get('nilai_sosial')->result_array(); ?>
           
                                <select class="custom-select" id="id_nilai_sosial" name="id_nilai_sosial" disabled>
                                  <?php foreach($choseRole as $role) : ?>
                                      <option value="<?= $role['id_nilai_sosial'] ?>" <?= $role['id_nilai_sosial'] == $data['id_nilai_sosial'] ? 'selected' : ''; ?> ><?= $role['nilai_sosial'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Jenis Pelanggaran</span>
                                </div>
                                <?php $choseRole = $this->db->get('nipel')->result_array(); ?>
           
                                <select class="custom-select" id="id_jenis_pelanggaran" name="id_jenis_pelanggaran">
                                  <?php foreach($choseRole as $role) : ?>
                                      <option value="<?= $role['id_jenis_pelanggaran'] ?>" <?= $role['id_jenis_pelanggaran'] == $data['id_jenis_pelanggaran'] ? 'selected' : ''; ?> ><?= $role['jenis_pelanggaran'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-4">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Bobot Poin</span>
                                </div>
                                <input type="text" class="form-control"  name="bobot_poin" value="<?= $data['bobot_poin']; ?>" disabled>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-4">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Tanggal Pelanggaran</span>
                                </div>
                                <input type="date" class="form-control"  name="at" value="<?= $data['at']; ?>">
                            </div>
                        </div><br>

                        <div class="input-group mb-3 col-md-12">
                            <a href="<?= base_url('pelanggaran'); ?>" class="btn btn-secondary mr-2">Kembali</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    
                </div>
            </div>
        </div>
        </form>
    
      