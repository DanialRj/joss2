<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
    }

    public function index ()
    {
        $data = $this->AdminModel->getAllData();

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/tambah_admin');
        $this->load->view('layout/footer');
    }

    public function edit()
    {
        $id = $this->input->get('id_admin');

        $data = $this->AdminModel->getDataUserById($id);

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/edit_admin');
        $this->load->view('layout/footer');
    }

    public function saveData ()
    {
        $this->form_validation->set_rules('nama_admin', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            return $this->index();
        } else {

            $data = $this->input->post();

            $this->AdminModel->InsertData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Added</div>');
            redirect('admin');
        }
    }

    public function deleteData()
    {
        $data = $this->input->post();

        $this->AdminModel->destroyData($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Deleted</div>');
        redirect('admin');
        
    }

    public function update()
    {
        $id = $this->input->post('id_admin');
        $data = $this->input->post();

        $this->form_validation->set_rules('nama_admin', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error!! Tidak Boleh Kosong.</div>');
            redirect("admin/edit?id_admin=$id");
        } else {
            $this->AdminModel->updateById($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Updated</div>');
            redirect('admin');
        }
    }
}
