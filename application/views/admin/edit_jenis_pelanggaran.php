          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Jenis Pelanggaran</h1>
          </div>

          <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
          <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('jenispelanggaran/update'); ?>" method="POST">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    
                        <div class="input-group mb-3 col-md-12">
                            <div class="input-group-prepend">
                                <input type="text" class="form-control"  name="id_jenis_pelanggaran" value="<?= $data['id_jenis_pelanggaran']; ?>" disabled>
                                <input type="text" class="form-control"  name="id_jenis_pelanggaran" value="<?= $data['id_jenis_pelanggaran']; ?>" hidden>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-3">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Kategori Pelanggaran</span>
                                </div>
                                <?php $choseRole = $this->db->get('ripel')->result_array(); ?>
           
                                <select class="custom-select" id="id_kategori_pelanggaran" name="id_kategori_pelanggaran">
                                  <?php foreach($choseRole as $role) : ?>
                                      <option value="<?= $role['id_kategori_pelanggaran'] ?>" <?= $role['id_kategori_pelanggaran'] == $data['id_kategori_pelanggaran'] ? 'selected' : ''; ?> ><?= $role['kategori_pelanggaran'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>


                        <div class="input-group mb-3 col-md-3">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Jenis Pelanggaran</span>
                                </div>
                                <input type="text" class="form-control"  name="jenis_pelanggaran" value="<?= $data['jenis_pelanggaran']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Bobot Poin</span>
                                </div>
                                <input type="number" class="form-control"  name="bobot_poin" value="<?= $data['bobot_poin']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-12">
                            <a href="<?= base_url('jenispelanggaran'); ?>" class="btn btn-secondary mr-2">Kembali</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    
                </div>
            </div>
        </div>
        </form>
    
      