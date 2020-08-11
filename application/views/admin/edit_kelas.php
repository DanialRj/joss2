          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Kelas</h1>
          </div>

          <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
          <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('kelas/update'); ?>" method="POST">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    
                        <div class="input-group mb-3 col-md-12">
                            <div class="input-group-prepend">
                                <input type="text" class="form-control"  name="id_kelas" value="<?= $data['id_kelas']; ?>" disabled>
                                <input type="text" class="form-control"  name="id_kelas" value="<?= $data['id_kelas']; ?>" hidden>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Kelas</span>
                                </div>
                                <?php $choseRole = $this->db->get('lilas')->result_array(); ?>
           
                                <select class="custom-select" id="id_wali_kelas" name="id_wali_kelas">
                                  <?php foreach($choseRole as $role) : ?>
                                      <option value="<?= $role['id_wali_kelas'] ?>" <?= $role['id_wali_kelas'] == $data['id_wali_kelas'] ? 'selected' : ''; ?> ><?= $role['username'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>


                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nomor Induk</span>
                                </div>
                                <input type="text" class="form-control"  name="kelas" value="<?= $data['kelas']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nama</span>
                                </div>
                                <input type="text" class="form-control"  name="jurusan" value="<?= $data['jurusan']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-12">
                            <a href="<?= base_url('kelas'); ?>" class="btn btn-secondary mr-2">Kembali</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    
                </div>
            </div>
        </div>
        </form>
    
      