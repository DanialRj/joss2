<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wali extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LilasModel');
    }

    public function index ()
    {
        $data = $this->LilasModel->getAllData();

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/tambah_wali');
        $this->load->view('layout/footer');
    }

    public function edit()
    {
        $id = $this->input->get('id_wali_kelas');

        $data = $this->LilasModel->getDataUserById($id);

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/edit_wali');
        $this->load->view('layout/footer');
    }

    public function saveData ()
    {
        $this->form_validation->set_rules('username', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            return $this->index();
        } else {

            $data = $this->input->post();

            $this->LilasModel->InsertData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Added</div>');
            redirect('wali');
        }
    }

    public function deleteData()
    {
        $data = $this->input->post();

        $this->LilasModel->destroyData($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Deleted</div>');
        redirect('wali');
        
    }

    public function update()
    {
        $id = $this->input->post('id_wali_kelas');
        $data = $this->input->post();

        $this->form_validation->set_rules('username', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error!! Tidak Boleh Kosong.</div>');
            redirect("wali/edit?id_wali_kelas=$id");
        } else {
            $this->LilasModel->updateById($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Updated</div>');
            redirect('wali');
        }
    }
}