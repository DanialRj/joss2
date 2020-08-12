<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiSosial3 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('NilaiSosialModel');
    }

    public function index ()
    {
        $data = $this->NilaiSosialModel->getAllData();

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('wali_kelas/side_menu');
        $this->load->view('admin/tambah_nilai_sosial');
        $this->load->view('layout/footer');
    }

    public function edit()
    {
        $id = $this->input->get('id_nilai_sosial');

        $data = $this->NilaiSosialModel->getDataUserById($id);

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/edit_nilai_sosial');
        $this->load->view('layout/footer');
    }

    public function saveData ()
    {
        $this->form_validation->set_rules('id_siswa', 'Nama Siswa', 'required|is_unique[nilai_sosial.id_siswa]');
        $this->form_validation->set_rules('catatan_perilaku', 'Catatan Perilaku', 'required');
        $this->form_validation->set_rules('btr_sikap_spiritual', 'Nilai Sikap Spiritual', 'required');
        $this->form_validation->set_rules('btr_sikap_sosial', 'Nilai Sikap Sosial', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            return $this->index();
        } else {

            $data = $this->input->post();
            $data = array_merge( $data, [
                    'nilai_sosial' => ( $this->input->post('btr_sikap_spiritual') + $this->input->post('btr_sikap_sosial') ) / 2
                ]
            );

            $this->NilaiSosialModel->InsertData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Added</div>');
            redirect('nilaisosial');
        }
    }

    public function deleteData()
    {
        $data = $this->input->post();

        $this->NilaiSosialModel->destroyData($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Deleted</div>');
        redirect('nilaisosial');
        
    }

    public function update()
    {
        $id = $this->input->post('id_nilai_sosial');
        $data = $this->input->post();

        $this->form_validation->set_rules('catatan_perilaku', 'Catatan Perilaku', 'required');
        $this->form_validation->set_rules('btr_sikap_spiritual', 'Nilai Sikap Spiritual', 'required');
        $this->form_validation->set_rules('btr_sikap_sosial', 'Nilai Sikap Sosial', 'required');

        if( $this->form_validation->run() == FALSE )
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error!! Tidak Boleh Kosong.</div>');
            redirect("nilaisosial/edit?id_nilai_sosial=$id");
        } else {
            $data = array_merge( $data, [
                    'nilai_sosial' => ( $this->input->post('btr_sikap_spiritual') + $this->input->post('btr_sikap_sosial') ) / 2
                ]
            );

            $this->NilaiSosialModel->updateById($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Data has been Updated</div>');
            redirect('nilaisosial');
        }
    }
}