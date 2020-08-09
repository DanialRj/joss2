<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->model('TimSTP2KModel');
        $this->load->model('LilasModel');
    }

    public function index ()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if( $this->form_validation->run() == FALSE ) 
        {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }   
    }

    public function _login ()
    {
        $email = htmlspecialchars($this->input->post('email', TRUE));
        $password = htmlspecialchars($this->input->post('password', TRUE));

        $login1 = $this->AdminModel->getUser($email);
        $login2 = $this->TimSTP2KModel->getUser($email);
        $login3 = $this->LilasModel->getUser($email);

        if ( $login1 == 1 )
        {
            $dataUser = $this->AdminModel->getDataUser($email);

            if ( $password ==  $dataUser['password'] )
            {
                $data = [
                            'id' => $dataUser['id_admin'],
                            'username' => $dataUser['username'],
                        ];
                $this->session->set_userdata($data);

                redirect('AdminDashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('auth');
            }
        } elseif ( $login2 == 1 )
        {
            $dataUser = $this->TimSTP2KModel->getDataUser($email);

            if ( $password == $dataUser['password'] )
            {
                $data = [
                            'id' => $dataUser['id_tim'],
                            'username' => $dataUser['username'],
                        ];
                $this->session->set_userdata($data);
                
                redirect('TimDashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('auth');
            }
        } elseif ( $login3 == 1 )
        {
            $dataUser = $this->LilasModel->getDataUser($email);

            if ( $password ==  $dataUser['password'] )
            {
                $data = [
                            'id' => $dataUser['id_wali_kelas'],
                            'username' => $dataUser['username'],
                        ];
                $this->session->set_userdata($data);
                
                redirect('WaliDashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function logout ()
    {
        $this->session->sess_destroy();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }
}
