<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPelanggaran2 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');

        $this->load->model('PelanggaranModel');
        $this->load->model('SiswaModel');
    }

    public function index ()
    {
        $data = $this->PelanggaranModel->getAllData2($this->session->userdata('id'));

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('tim_spt2k/side_menu');
        $this->load->view('tim_spt2k/laporan_pelanggaran');
        $this->load->view('layout/footer');
    }

    public function laporanKeseluruhan()
    {
        $data = $this->PelanggaranModel->getAllData();

        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',15);
        $pdf->Cell(190,5,'LAPORAN DAFTAR PELANGGARAN',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(35,6,'Kategori Masalah',1,0,'C');
        $pdf->Cell(40,6,'Nama Pelapor',1,0,'C');
        $pdf->Cell(23,6,'Nama Siswa',1,0,'C');
        $pdf->Cell(19,6,'Nilai Sosial',1,0,'C');
        $pdf->Cell(30,6,'Pelanggaran',1,0,'C');
        $pdf->Cell(15,6,'Poin',1,0,'C');
        $pdf->Cell(20,6,'Tanggal',1,1,'C');

        $pdf->SetFont('Times','',10);
        $i = 1;
        foreach ($data as $row){
            $pdf->Cell(8,6,$i,1,0,'C');
            $choseRole = $this->db->get_where('rilah', ['id_kategori_masalah' => $row['id_kategori_masalah']])->row_array();
            $pdf->Cell(35,6,$choseRole['kategori_masalah'],1,0);
            $choseRole = $this->db->get_where('tim_stp2k', ['id_tim' => $row['id_tim']])->row_array();
            $pdf->Cell(40,6,$choseRole['nama_tim'],1,0);
            $choseRole = $this->db->get_where('siswa', ['id_siswa' => $row['id_siswa']])->row_array();
            $pdf->Cell(23,6,$choseRole['nama_siswa'],1,0);
            $choseRole = $this->db->get_where('nilai_sosial', ['id_nilai_sosial' => $row['id_nilai_sosial']])->row_array();
            $pdf->Cell(19,6,$choseRole['id_nilai_sosial'],1,0); 
            $choseRole = $this->db->get_where('nipel', ['id_jenis_pelanggaran' => $row['id_jenis_pelanggaran']])->row_array();
            $pdf->Cell(30,6,$choseRole['jenis_pelanggaran'],1,0); 
            $pdf->Cell(15,6,$row['bobot_poin'],1,0,'C'); 
            $pdf->Cell(20,6,$row['at'],1,1,'C'); 

            $i++;
        }

        $pdf->Output();
    }

    public function laporanByKelas()
    {
        $id = $this->input->get('id_kelas');

        $siswa = $this->SiswaModel->getAllDataByKelas($id);
        $data = [];
        foreach ($siswa as $key) {
            $data[] = $this->PelanggaranModel->getAllDataByIdSiswa($key['id_siswa']);
        }

        
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',15);
        $pdf->Cell(190,5,'LAPORAN DAFTAR PELANGGARAN',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(35,6,'Kategori Masalah',1,0,'C');
        $pdf->Cell(40,6,'Nama Pelapor',1,0,'C');
        $pdf->Cell(23,6,'Nama Siswa',1,0,'C');
        $pdf->Cell(19,6,'Nilai Sosial',1,0,'C');
        $pdf->Cell(30,6,'Pelanggaran',1,0,'C');
        $pdf->Cell(15,6,'Poin',1,0,'C');
        $pdf->Cell(20,6,'Tanggal',1,1,'C');

        $pdf->SetFont('Times','',10);
        $i = 1;

        if( $data == NULL) {
            $pdf->Cell(190,6,'Tidak ada data.',1,0,'C');
        } else {
            foreach ($data as $row){
                $pdf->Cell(8,6,$i,1,0,'C');
                $choseRole = $this->db->get_where('rilah', ['id_kategori_masalah' => $row['id_kategori_masalah']])->row_array();
                $pdf->Cell(35,6,$choseRole['kategori_masalah'],1,0);
                $choseRole = $this->db->get_where('tim_stp2k', ['id_tim' => $row['id_tim']])->row_array();
                $pdf->Cell(40,6,$choseRole['nama_tim'],1,0);
                $choseRole = $this->db->get_where('siswa', ['id_siswa' => $row['id_siswa']])->row_array();
                $pdf->Cell(23,6,$choseRole['nama_siswa'],1,0);
                $choseRole = $this->db->get_where('nilai_sosial', ['id_nilai_sosial' => $row['id_nilai_sosial']])->row_array();
                $pdf->Cell(19,6,$choseRole['id_nilai_sosial'],1,0); 
                $choseRole = $this->db->get_where('nipel', ['id_jenis_pelanggaran' => $row['id_jenis_pelanggaran']])->row_array();
                $pdf->Cell(30,6,$choseRole['jenis_pelanggaran'],1,0); 
                $pdf->Cell(15,6,$row['bobot_poin'],1,0,'C'); 
                $pdf->Cell(20,6,$row['at'],1,1,'C'); 

                $i++;
            }
        }

        $pdf->Output();
    }

    public function laporanByMasalah()
    {
        $id = $this->input->get('id');

        $data = $this->PelanggaranModel->getAllDataByIdForigen($id, 'id_kategori_masalah');
        

        
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',15);
        $pdf->Cell(190,5,'LAPORAN DAFTAR PELANGGARAN',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(35,6,'Kategori Masalah',1,0,'C');
        $pdf->Cell(40,6,'Nama Pelapor',1,0,'C');
        $pdf->Cell(23,6,'Nama Siswa',1,0,'C');
        $pdf->Cell(19,6,'Nilai Sosial',1,0,'C');
        $pdf->Cell(30,6,'Pelanggaran',1,0,'C');
        $pdf->Cell(15,6,'Poin',1,0,'C');
        $pdf->Cell(20,6,'Tanggal',1,1,'C');

        $pdf->SetFont('Times','',10);
        $i = 1;

        if( $data == NULL) {
            $pdf->Cell(190,6,'Tidak ada data.',1,0,'C');
        } else {
            foreach ($data as $row){
                $pdf->Cell(8,6,$i,1,0,'C');
                $choseRole = $this->db->get_where('rilah', ['id_kategori_masalah' => $row['id_kategori_masalah']])->row_array();
                $pdf->Cell(35,6,$choseRole['kategori_masalah'],1,0);
                $choseRole = $this->db->get_where('tim_stp2k', ['id_tim' => $row['id_tim']])->row_array();
                $pdf->Cell(40,6,$choseRole['nama_tim'],1,0);
                $choseRole = $this->db->get_where('siswa', ['id_siswa' => $row['id_siswa']])->row_array();
                $pdf->Cell(23,6,$choseRole['nama_siswa'],1,0);
                $choseRole = $this->db->get_where('nilai_sosial', ['id_nilai_sosial' => $row['id_nilai_sosial']])->row_array();
                $pdf->Cell(19,6,$choseRole['id_nilai_sosial'],1,0); 
                $choseRole = $this->db->get_where('nipel', ['id_jenis_pelanggaran' => $row['id_jenis_pelanggaran']])->row_array();
                $pdf->Cell(30,6,$choseRole['jenis_pelanggaran'],1,0); 
                $pdf->Cell(15,6,$row['bobot_poin'],1,0,'C'); 
                $pdf->Cell(20,6,$row['at'],1,1,'C'); 

                $i++;
            }
        }

        $pdf->Output();
    }

    public function laporankeseluruhan5()
    {

        $data = $this->PelanggaranModel->getAllDataByIdMasalah();
        
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',15);
        $pdf->Cell(190,5,'LAPORAN DAFTAR PELANGGARAN',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(35,6,'Kategori Masalah',1,0,'C');
        $pdf->Cell(40,6,'Nama Pelapor',1,0,'C');
        $pdf->Cell(23,6,'Nama Siswa',1,0,'C');
        $pdf->Cell(19,6,'Nilai Sosial',1,0,'C');
        $pdf->Cell(30,6,'Pelanggaran',1,0,'C');
        $pdf->Cell(15,6,'Poin',1,0,'C');
        $pdf->Cell(20,6,'Tanggal',1,1,'C');

        $pdf->SetFont('Times','',10);
        $i = 1;

        if( $data == NULL) {
            $pdf->Cell(190,6,'Tidak ada data.',1,0,'C');
        } else {
            foreach ($data as $row){
                $pdf->Cell(8,6,$i,1,0,'C');
                $choseRole = $this->db->get_where('rilah', ['id_kategori_masalah' => $row['id_kategori_masalah']])->row_array();
                $pdf->Cell(35,6,$choseRole['kategori_masalah'],1,0);
                $choseRole = $this->db->get_where('tim_stp2k', ['id_tim' => $row['id_tim']])->row_array();
                $pdf->Cell(40,6,$choseRole['nama_tim'],1,0);
                $choseRole = $this->db->get_where('siswa', ['id_siswa' => $row['id_siswa']])->row_array();
                $pdf->Cell(23,6,$choseRole['nama_siswa'],1,0);
                $choseRole = $this->db->get_where('nilai_sosial', ['id_nilai_sosial' => $row['id_nilai_sosial']])->row_array();
                $pdf->Cell(19,6,$choseRole['id_nilai_sosial'],1,0); 
                $choseRole = $this->db->get_where('nipel', ['id_jenis_pelanggaran' => $row['id_jenis_pelanggaran']])->row_array();
                $pdf->Cell(30,6,$choseRole['jenis_pelanggaran'],1,0); 
                $pdf->Cell(15,6,$row['bobot_poin'],1,0,'C'); 
                $pdf->Cell(20,6,$row['at'],1,1,'C'); 

                $i++;
            }
        }

        $pdf->Output();
    }

    public function laporanByJenisPelanggaran()
    {
        $id = $this->input->get('id');

        $data = $this->PelanggaranModel->getAllDataByIdForigen($id, 'id_jenis_pelanggaran');
        
        
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',15);
        $pdf->Cell(190,5,'LAPORAN DAFTAR PELANGGARAN',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(35,6,'Kategori Masalah',1,0,'C');
        $pdf->Cell(40,6,'Nama Pelapor',1,0,'C');
        $pdf->Cell(23,6,'Nama Siswa',1,0,'C');
        $pdf->Cell(19,6,'Nilai Sosial',1,0,'C');
        $pdf->Cell(30,6,'Pelanggaran',1,0,'C');
        $pdf->Cell(15,6,'Poin',1,0,'C');
        $pdf->Cell(20,6,'Tanggal',1,1,'C');

        $pdf->SetFont('Times','',10);
        $i = 1;

        if( $data == NULL) {
            $pdf->Cell(190,6,'Tidak ada data.',1,0,'C');
        } else {
            foreach ($data as $row){
                $pdf->Cell(8,6,$i,1,0,'C');
                $choseRole = $this->db->get_where('rilah', ['id_kategori_masalah' => $row['id_kategori_masalah']])->row_array();
                $pdf->Cell(35,6,$choseRole['kategori_masalah'],1,0);
                $choseRole = $this->db->get_where('tim_stp2k', ['id_tim' => $row['id_tim']])->row_array();
                $pdf->Cell(40,6,$choseRole['nama_tim'],1,0);
                $choseRole = $this->db->get_where('siswa', ['id_siswa' => $row['id_siswa']])->row_array();
                $pdf->Cell(23,6,$choseRole['nama_siswa'],1,0);
                $choseRole = $this->db->get_where('nilai_sosial', ['id_nilai_sosial' => $row['id_nilai_sosial']])->row_array();
                $pdf->Cell(19,6,$choseRole['id_nilai_sosial'],1,0); 
                $choseRole = $this->db->get_where('nipel', ['id_jenis_pelanggaran' => $row['id_jenis_pelanggaran']])->row_array();
                $pdf->Cell(30,6,$choseRole['jenis_pelanggaran'],1,0); 
                $pdf->Cell(15,6,$row['bobot_poin'],1,0,'C'); 
                $pdf->Cell(20,6,$row['at'],1,1,'C'); 

                $i++;
            }
        }

        $pdf->Output();
    }

    public function laporanByPelapor()
    {
        $id = $this->input->get('id');

        $data = $this->PelanggaranModel->getAllDataByIdForigen($id, 'id_tim');
        
        
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',15);
        $pdf->Cell(190,5,'LAPORAN DAFTAR PELANGGARAN',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(35,6,'Kategori Masalah',1,0,'C');
        $pdf->Cell(40,6,'Nama Pelapor',1,0,'C');
        $pdf->Cell(23,6,'Nama Siswa',1,0,'C');
        $pdf->Cell(19,6,'Nilai Sosial',1,0,'C');
        $pdf->Cell(30,6,'Pelanggaran',1,0,'C');
        $pdf->Cell(15,6,'Poin',1,0,'C');
        $pdf->Cell(20,6,'Tanggal',1,1,'C');

        $pdf->SetFont('Times','',10);
        $i = 1;

        if( $data == NULL) {
            $pdf->Cell(190,6,'Tidak ada data.',1,0,'C');
        } else {
            foreach ($data as $row){
                $pdf->Cell(8,6,$i,1,0,'C');
                $choseRole = $this->db->get_where('rilah', ['id_kategori_masalah' => $row['id_kategori_masalah']])->row_array();
                $pdf->Cell(35,6,$choseRole['kategori_masalah'],1,0);
                $choseRole = $this->db->get_where('tim_stp2k', ['id_tim' => $row['id_tim']])->row_array();
                $pdf->Cell(40,6,$choseRole['nama_tim'],1,0);
                $choseRole = $this->db->get_where('siswa', ['id_siswa' => $row['id_siswa']])->row_array();
                $pdf->Cell(23,6,$choseRole['nama_siswa'],1,0);
                $choseRole = $this->db->get_where('nilai_sosial', ['id_nilai_sosial' => $row['id_nilai_sosial']])->row_array();
                $pdf->Cell(19,6,$choseRole['id_nilai_sosial'],1,0); 
                $choseRole = $this->db->get_where('nipel', ['id_jenis_pelanggaran' => $row['id_jenis_pelanggaran']])->row_array();
                $pdf->Cell(30,6,$choseRole['jenis_pelanggaran'],1,0); 
                $pdf->Cell(15,6,$row['bobot_poin'],1,0,'C'); 
                $pdf->Cell(20,6,$row['at'],1,1,'C'); 

                $i++;
            }
        }

        $pdf->Output();
    }
}