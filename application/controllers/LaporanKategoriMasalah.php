<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanKategoriMasalah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');

        $this->load->model('RilahModel');
    }

    public function index ()
    {
        $data = $this->RilahModel->getAllData();

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('admin/side_menu');
        $this->load->view('admin/laporan_kategori_masalah');
        $this->load->view('layout/footer');
    }

    public function laporanKeseluruhan()
    {
        $data = $this->RilahModel->getAllData();

        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',15);
        $pdf->Cell(190,5,'LAPORAN DAFTAR KATEGORI MASALAH',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(40,6,'Kategori Masalah',1,0,'C');
        $pdf->Cell(20,6,'Bobot Dari',1,0,'C');
        $pdf->Cell(23,6,'Bobot Sampai',1,0,'C');
        $pdf->Cell(75,6,'Sanksi',1,0,'C');
        $pdf->Cell(23,6,'Keterangan',1,1,'C');

        $pdf->SetFont('Times','',10);
        $i = 1;
        foreach ($data as $row){
            $pdf->Cell(8,6,$i,1,0,'C');
            $pdf->Cell(40,6,$row['kategori_masalah'],1,0);
            $pdf->Cell(20,6,$row['bobot_dari'],1,0);
            $pdf->Cell(23,6,$row['bobot_sampai'],1,0);
            $pdf->Cell(75,6,$row['sanksi'],1,0); 
            $pdf->Cell(23,6,$row['ket'],1,1); 

            $i++;
        }

        $pdf->Output();
    }
}