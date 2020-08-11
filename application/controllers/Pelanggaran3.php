<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran3 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PelanggaranModel');
        $this->load->model('NipelModel');
        $this->load->model('NilaiSosialModel');
        $this->load->model('KelasModel');
        $this->load->model('SiswaModel');
        $this->load->model('LilasModel');
    }

    public function index ()
    {
        $idWali = $this->session->userdata('id');
        $kelas = $this->KelasModel->getDataUserByIdWali($idWali);
        $siswa = $this->SiswaModel->getAllDataByKelas($kelas['id_kelas']);

        $siswa = array_column($siswa, 'id_siswa');
        
        $data = $this->PelanggaranModel->getAllData3($siswa);

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('wali_kelas/side_menu');
        $this->load->view('wali_kelas/tambah_pelanggaran');
        $this->load->view('layout/footer');
    }

    public function proses()
    {
        $id = $this->input->get('id_pelanggaran');

        $data = $this->PelanggaranModel->getDataUserById($id);

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/proses_pelanggaran');
        $this->load->view('layout/footer');
    }
}