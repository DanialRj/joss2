<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriPelanggaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('RipelModel');
    }

    public function index ()
    {
        $data = $this->RipelModel->getAllData();

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/tambah_kategori_pelanggaran');
        $this->load->view('layout/footer');
    }

    public function edit()
    {
        $id = $this->input->get('id_kategori_pelanggaran');

        $data = $this->RipelModel->getDataUserById($id);

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/edit_kategori_pelanggaran');
        $this->load->view('layout/footer');
    }

    public function saveData ()
    {
        $this->form_validation->set_rules('kategori_pelanggaran', 'Kategori Pelanggaran', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            return $this->index();
        } else {

            $data = $this->input->post();

            $this->RipelModel->InsertData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Added</div>');
            redirect('kategoripelanggaran');
        }
    }

    public function deleteData()
    {
        $data = $this->input->post();

        $this->RipelModel->destroyData($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Deleted</div>');
        redirect('kategoripelanggaran');
        
    }

    public function update()
    {
        $id = $this->input->post('id_kategori_pelanggaran');
        $data = $this->input->post();

        $this->form_validation->set_rules('kategori_pelanggaran', 'Kategori Pelanggaran', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error!! Tidak Boleh Kosong.</div>');
            redirect("kategoripelanggaran/edit?id_kategori_pelanggaran=$id");
        } else {
            $this->RipelModel->updateById($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Updated</div>');
            redirect('kategoripelanggaran');
        }
    }
}