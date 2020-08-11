          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Kategori Masalah</h1>
          </div>

          <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
          <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('kategorimasalah/update'); ?>" method="POST">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    
                        <div class="input-group mb-3 col-md-12">
                            <div class="input-group-prepend">
                                <input type="text" class="form-control"  name="id_kategori_masalah" value="<?= $data['id_kategori_masalah']; ?>" disabled>
                                <input type="text" class="form-control"  name="id_kategori_masalah" value="<?= $data['id_kategori_masalah']; ?>" hidden>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Kategori Masalah</span>
                                </div>
                                <input type="text" class="form-control"  name="kategori_masalah" value="<?= $data['kategori_masalah']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Bobot Dari</span>
                                </div>
                                <input type="number" class="form-control"  name="bobot_dari" value="<?= $data['bobot_dari']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Bobot Sampai</span>
                                </div>
                                <input type="text" class="form-control"  name="bobot_sampai" value="<?= $data['bobot_sampai']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Sanksi</span>
                                </div>
                                <input type="text" class="form-control"  name="sanksi" value="<?= $data['sanksi']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Keterangan</span>
                                </div>
                                <input type="text" class="form-control"  name="ket" value="<?= $data['ket']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-12">
                            <a href="<?= base_url('kategorimasalah'); ?>" class="btn btn-secondary mr-2">Kembali</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    
                </div>
            </div>
        </div>
        </form>
    
      