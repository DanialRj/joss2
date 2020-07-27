<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index ()
    {
        $this->load->view('layout/header');
        $this->load->view('admin/side_menu');
        $this->load->view('admin/index');
        $this->load->view('layout/footer');
    }
}
