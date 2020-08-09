          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Admin</h1>
          </div>

          <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
          <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('admin/update'); ?>" method="POST">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    
                        <div class="input-group mb-3 col-md-12">
                            <div class="input-group-prepend">
                                <input type="text" class="form-control"  name="id_admin" value="<?= $data['id_admin']; ?>" disabled>
                                <input type="text" class="form-control"  name="id_admin" value="<?= $data['id_admin']; ?>" hidden>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-4">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nama</span>
                                </div>
                                <input type="text" class="form-control"  name="nama_admin" value="<?= $data['nama_admin']; ?>">
                            </div>
                        </div>


                        <div class="input-group mb-3 col-md-4">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Email</span>
                                </div>
                                <input type="text" class="form-control"  name="username" value="<?= $data['username']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-4">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Password</span>
                                </div>
                                <input type="text" class="form-control"  name="password" value="<?= $data['password']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-12">
                            <a href="<?= base_url('admin'); ?>" class="btn btn-secondary mr-2">Kembali</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    
                </div>
            </div>
        </div>
        </form>
    
      