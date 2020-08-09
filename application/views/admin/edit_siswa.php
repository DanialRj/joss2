          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Siswa</h1>
          </div>

          <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
          <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('siswa/update'); ?>" method="POST">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    
                        <div class="input-group mb-3 col-md-12">
                            <div class="input-group-prepend">
                                <input type="text" class="form-control"  name="id_siswa" value="<?= $data['id_siswa']; ?>" disabled>
                                <input type="text" class="form-control"  name="id_siswa" value="<?= $data['id_siswa']; ?>" hidden>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Kelas</span>
                                </div>
                                <?php $choseRole = $this->db->get('kelas')->result_array(); ?>
           
                                <select class="custom-select" id="id_kelas" name="id_kelas">
                                  <?php foreach($choseRole as $role) : ?>
                                      <option value="<?= $role['id_kelas'] ?>" <?= $role['id_kelas'] == $data['id_kelas'] ? 'selected' : ''; ?> ><?= $role['kelas'] . ' ' . $role['jurusan'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>


                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nomor Induk</span>
                                </div>
                                <input type="text" class="form-control"  name="nisn" value="<?= $data['nisn']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nama</span>
                                </div>
                                <input type="text" class="form-control"  name="nama_siswa" value="<?= $data['nama_siswa']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Alamat</span>
                                </div>
                                <input type="text" class="form-control"  name="alamat" value="<?= $data['alamat']; ?>">
                            </div>
                        </div>
                        
                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Tanggal Lahir</span>
                                </div>
                                <input type="date" class="form-control"  name="tgl_lahir" value="<?= $data['tgl_lahir']; ?>">
                            </div>
                        </div><br>

                        <div class="input-group mb-3 col-md-12">
                            <div class="form-group">
                                <span class="input-group-text" id="basic-addon1">Jenis Kelamin</span>
                                <div class="form-check">
                                    <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'checked' : ''; ?> >Laki-laki</label>
                                    <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'checked' : ''; ?> >Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-12">
                            <a href="<?= base_url('siswa'); ?>" class="btn btn-secondary mr-2">Kembali</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    
                </div>
            </div>
        </div>
        </form>
    
      