<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran extends CI_Controller {

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
        $data = $this->PelanggaranModel->getAllData();

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/tambah_pelanggaran');
        $this->load->view('layout/footer');
    }

    public function edit()
    {
        $id = $this->input->get('id_pelanggaran');

        $data = $this->PelanggaranModel->getDataUserById($id);

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/edit_pelanggaran');
        $this->load->view('layout/footer');
    }

    public function saveData ()
    {
        $this->form_validation->set_rules('id_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('id_tim', 'Nama Pelapor', 'required');
        $this->form_validation->set_rules('id_jenis_pelanggaran', 'Jenis Pelanggaran', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            return $this->index();
        } else {

            $data = $this->input->post();

            $poin = $this->NipelModel->getDataUserById( $this->input->post('id_jenis_pelanggaran') );
            $nilaiSosial = $this->NilaiSosialModel->getDataUserByIdSiswa( $this->input->post('id_siswa') );
            $kelas = $this->SiswaModel->getDataUserById( $this->input->post('id_siswa') );
            $kelas = $this->KelasModel->getDataUserById( $kelas['id_kelas']);
            $waliKelas = $this->LilasModel->getDataUserById( $kelas['id_wali_kelas']);

            $data = array_merge($data, [
                    'bobot_poin' => $poin['bobot_poin'],
                    'id_nilai_sosial' => $nilaiSosial['id_nilai_sosial'],
                    'at' => date("Y-m-d H:i:s")
                ]
            );

            $data2 = ['alert' => date("Y-m-d H:i:s")];

            $this->LilasModel->updateById($waliKelas['id_wali_kelas'], $data2);
            $this->PelanggaranModel->InsertData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Added</div>');
            redirect('pelanggaran');
        }
    }

    public function deleteData()
    {
        $data = $this->input->post();

        $this->PelanggaranModel->destroyData($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Deleted</div>');
        redirect('pelanggaran');
        
    }

    public function update()
    {
        $id = $this->input->post('id_pelanggaran');
        $data = $this->input->post();

        $poin = $this->NipelModel->getDataUserById( $this->input->post('id_jenis_pelanggaran') );

        $data = array_merge($data, [
                'bobot_poin' => $poin['bobot_poin'],
            ]
        );

        $this->PelanggaranModel->updateById($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Updated</div>');
        redirect('pelanggaran');
    
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