<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisPelanggaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('NipelModel');
    }

    public function index ()
    {
        $data = $this->NipelModel->getAllData();

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/tambah_jenis_pelanggaran');
        $this->load->view('layout/footer');
    }

    public function edit()
    {
        $id = $this->input->get('id_jenis_pelanggaran');

        $data = $this->NipelModel->getDataUserById($id);

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/edit_jenis_pelanggaran');
        $this->load->view('layout/footer');
    }

    public function saveData ()
    {
        $this->form_validation->set_rules('id_kategori_pelanggaran', 'Kategori Pelanggaran', 'required');
        $this->form_validation->set_rules('jenis_pelanggaran', 'Jenis Pelanggaran', 'required');
        $this->form_validation->set_rules('bobot_poin', 'Bobot Poin', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            return $this->index();
        } else {

            $data = $this->input->post();

            $this->NipelModel->InsertData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Added</div>');
            redirect('jenispelanggaran');
        }
    }

    public function deleteData()
    {
        $data = $this->input->post();

        $this->NipelModel->destroyData($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Deleted</div>');
        redirect('jenispelanggaran');
        
    }

    public function update()
    {
        $id = $this->input->post('id_jenis_pelanggaran');
        $data = $this->input->post();

        $this->form_validation->set_rules('id_kategori_pelanggaran', 'Kategori Pelanggaran', 'required');
        $this->form_validation->set_rules('jenis_pelanggaran', 'Jenis Pelanggaran', 'required');
        $this->form_validation->set_rules('bobot_poin', 'Bobot Poin', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error!! Tidak Boleh Kosong.</div>');
            redirect("jenispelanggaran/edit?id_jenis_pelanggaran=$id");
        } else {
            $this->NipelModel->updateById($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Updated</div>');
            redirect('jenispelanggaran');
        }
    }
}