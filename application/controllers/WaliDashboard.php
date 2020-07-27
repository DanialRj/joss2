<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WaliDashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index ()
    {
        $this->load->view('layout/header');
        $this->load->view('wali_kelas/side_menu');
        $this->load->view('wali_kelas/index');
        $this->load->view('layout/footer');
    }
}
