<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TimDashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index ()
    {
        $this->load->view('layout/header');
        $this->load->view('tim_spt2k/side_menu');
        $this->load->view('tim_spt2k/index');
        $this->load->view('layout/footer');
    }
}
