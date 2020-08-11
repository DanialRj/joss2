          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Nilai Sosial</h1>
          </div>

          <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
          <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('nilaisosial/update'); ?>" method="POST">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    
                        <div class="input-group mb-3 col-md-12">
                            <div class="input-group-prepend">
                                <input type="text" class="form-control"  name="id_nilai_sosial" value="<?= $data['id_nilai_sosial']; ?>" disabled>
                                <input type="text" class="form-control"  name="id_nilai_sosial" value="<?= $data['id_nilai_sosial']; ?>" hidden>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nama siswa</span>
                                </div>
                                <?php $choseRole = $this->db->get_where('siswa', ['id_siswa' => $data['id_siswa']])->row_array(); ?>
                                
                                <input type="text" class="form-control"  name="id_siswa" value="<?= $choseRole['nama_siswa']; ?>" disabled>
                            </div>
                        </div>


                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Catatan perilaku</span>
                                </div>
                                <input type="text" class="form-control"  name="catatan_perilaku" value="<?= $data['catatan_perilaku']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nilai Sikap Spiritual</span>
                                </div>
                                <input type="text" class="form-control"  name="btr_sikap_spiritual" value="<?= $data['btr_sikap_spiritual']; ?>">
                            </div>
                        </div>

                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nilai Sikap Sosial</span>
                                </div>
                                <input type="text" class="form-control"  name="btr_sikap_sosial" value="<?= $data['btr_sikap_sosial']; ?>">
                            </div>
                        </div>
                        
                        <div class="input-group mb-3 col-md-2">
                            <div class="input-group-prepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nilai Sosial</span>
                                </div>
                                <input type="number" class="form-control"  name="tgl_lahir" value="<?= $data['nilai_sosial']; ?>" disabled>
                            </div>
                        </div><br>

                        <div class="input-group mb-3 col-md-12">
                            <a href="<?= base_url('nilaisosial'); ?>" class="btn btn-secondary mr-2">Kembali</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    
                </div>
            </div>
        </div>
        </form>
    
      