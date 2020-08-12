<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanJenisPelanggaran3 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');

        $this->load->model('NipelModel');
    }

    public function index ()
    {
        $data = $this->NipelModel->getAllData();

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('wali_kelas/side_menu');
        $this->load->view('wali_kelas/laporan_jenis_pelanggaran');
        $this->load->view('layout/footer');
    }

    public function laporanKeseluruhan()
    {
        $data = $this->NipelModel->getAllData();

        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',15);
        $pdf->Cell(190,5,'LAPORAN DAFTAR JENIS PELANGGARAN',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(40,6,'Kategori Pelanggaran',1,0,'C');
        $pdf->Cell(20,6,'NISN',1,0,'C');
        $pdf->Cell(25,6,'Kelas Jurusan',1,1,'C');

        $pdf->SetFont('Times','',10);
        $i = 1;
        foreach ($data as $row){
            $pdf->Cell(8,6,$i,1,0,'C');
            $pdf->Cell(40,6,$row['kategori_pelanggaran'],1,0);
            $pdf->Cell(20,6,$row['jenis_pelanggaran'],1,0);
            $pdf->Cell(25,6,$row['bobot_poin'],1,1,'C'); 

            $i++;
        }

        $pdf->Output();
    }

    public function laporanbykategori()
    {
        $id = $this->input->get('id_kategori_pelanggaran');
        $data = $this->NipelModel->getAllDataByKategori($id);

        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',15);
        $pdf->Cell(190,5,'LAPORAN DAFTAR JENIS PELANGGARAN',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(40,6,'Kategori Pelanggaran',1,0,'C');
        $pdf->Cell(20,6,'NISN',1,0,'C');
        $pdf->Cell(25,6,'Kelas Jurusan',1,1,'C');

        $pdf->SetFont('Times','',10);
        $i = 1;
        foreach ($data as $row){
            $pdf->Cell(8,6,$i,1,0,'C');
            $pdf->Cell(40,6,$row['kategori_pelanggaran'],1,0);
            $pdf->Cell(20,6,$row['jenis_pelanggaran'],1,0);
            $pdf->Cell(25,6,$row['bobot_poin'],1,1,'C'); 

            $i++;
        }

        $pdf->Output();
    }
}