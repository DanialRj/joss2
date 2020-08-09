<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SiswaModel');
    }

    public function index ()
    {
        $data = $this->SiswaModel->getAllData();

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/tambah_siswa');
        $this->load->view('layout/footer');
    }

    public function edit()
    {
        $id = $this->input->get('id_siswa');

        $data = $this->SiswaModel->getDataUserById($id);

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/edit_siswa');
        $this->load->view('layout/footer');
    }

    public function saveData ()
    {
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('nisn', 'Nomor Induk Siswa', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nomor Induk Siswa', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            return $this->index();
        } else {

            $data = $this->input->post();

            $this->SiswaModel->InsertData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Added</div>');
            redirect('siswa');
        }
    }

    public function deleteData()
    {
        $data = $this->input->post();

        $this->SiswaModel->destroyData($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Deleted</div>');
        redirect('siswa');
        
    }

    public function update()
    {
        $id = $this->input->post('id_siswa');
        $data = $this->input->post();

        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('nisn', 'Nomor Induk Siswa', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nomor Induk Siswa', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error!! Tidak Boleh Kosong.</div>');
            redirect("siswa/edit?id_siswa=$id");
        } else {
            $this->SiswaModel->updateById($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Updated</div>');
            redirect('siswa');
        }
    }
}