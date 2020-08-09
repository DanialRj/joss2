<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tim extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('TimSTP2KModel');
    }

    public function index ()
    {
        $data = $this->TimSTP2KModel->getAllData();

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/tambah_tim');
        $this->load->view('layout/footer');
    }

    public function edit()
    {
        $id = $this->input->get('id_tim');

        $data = $this->TimSTP2KModel->getDataUserById($id);

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/edit_tim');
        $this->load->view('layout/footer');
    }

    public function saveData ()
    {
        $this->form_validation->set_rules('nama_tim', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            return $this->index();
        } else {

            $data = $this->input->post();

            $this->TimSTP2KModel->InsertData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Added</div>');
            redirect('tim');
        }
    }

    public function deleteData()
    {
        $data = $this->input->post();

        $this->TimSTP2KModel->destroyData($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Deleted</div>');
        redirect('tim');
        
    }

    public function update()
    {
        $id = $this->input->post('id_tim');
        $data = $this->input->post();

        $this->form_validation->set_rules('nama_tim', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error!! Tidak Boleh Kosong.</div>');
            redirect("tim/edit?id_tim=$id");
        } else {
            $this->TimSTP2KModel->updateById($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Updated</div>');
            redirect('tim');
        }
    }
}