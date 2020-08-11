<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriMasalah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('RilahModel');
    }

    public function index ()
    {
        $data = $this->RilahModel->getAllData();

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/tambah_kategori_masalah');
        $this->load->view('layout/footer');
    }

    public function edit()
    {
        $id = $this->input->get('id_kategori_masalah');

        $data = $this->RilahModel->getDataUserById($id);

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/edit_kategori_masalah');
        $this->load->view('layout/footer');
    }

    public function saveData ()
    {
        $this->form_validation->set_rules('kategori_masalah', 'Kategori Masalah', 'required');
        $this->form_validation->set_rules('bobot_dari', 'Bobot Dari', 'required');
        $this->form_validation->set_rules('bobot_sampai', 'Bobot Sampai', 'required');
        $this->form_validation->set_rules('sanksi', 'Sanksi', 'required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            return $this->index();
        } else {

            $data = $this->input->post();

            $this->RilahModel->InsertData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Added</div>');
            redirect('kategorimasalah');
        }
    }

    public function deleteData()
    {
        $data = $this->input->post();

        $this->RilahModel->destroyData($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Deleted</div>');
        redirect('kategorimasalah');
        
    }

    public function update()
    {
        $id = $this->input->post('id_kategori_masalah');
        $data = $this->input->post();

        $this->form_validation->set_rules('kategori_masalah', 'Kategori Masalah', 'required');
        $this->form_validation->set_rules('bobot_dari', 'Bobot Dari', 'required');
        $this->form_validation->set_rules('bobot_sampai', 'Bobot Sampai', 'required');
        $this->form_validation->set_rules('sanksi', 'Sanksi', 'required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error!! Tidak Boleh Kosong.</div>');
            redirect("kategorimasalah/edit?id_kategori_masalah=$id");
        } else {
            $this->RilahModel->updateById($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Updated</div>');
            redirect('kategorimasalah');
        }
    }
}