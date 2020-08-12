<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanSiswa3 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');

        $this->load->model('SiswaModel');
        $this->load->model('NilaiSosialModel');
        $this->load->model('KelasModel');
        $this->load->model('LilasModel');
        $this->load->model('PelanggaranModel');
    }

    public function index ()
    {
        $idWali = $this->session->userdata('id');
        $kelas = $this->KelasModel->getDataUserByIdWali($idWali);
        $data = $this->SiswaModel->getAllData3($kelas['id_kelas']);

        $this->load->view('layout/header', ['data' => $data]);
        $this->load->view('wali_kelas/side_menu');
        $this->load->view('wali_kelas/laporan_siswa');
        $this->load->view('layout/footer');
    }

    public function laporanKeseluruhan()
    {
        $idWali = $this->session->userdata('id');
        $kelas = $this->KelasModel->getDataUserByIdWali($idWali);
        $data = $this->SiswaModel->getAllData3($kelas['id_kelas']);

        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',15);
        $pdf->Cell(190,5,'LAPORAN DAFTAR MURID',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(20,6,'Nama',1,0,'C');
        $pdf->Cell(20,6,'NISN',1,0,'C');
        $pdf->Cell(25,6,'Kelas Jurusan',1,0,'C');
        $pdf->Cell(25,6,'Jenis Kelamin',1,0,'C'); 
        $pdf->Cell(63,6,'Alamat',1,0,'C'); 
        $pdf->Cell(28,6,'Tanggal Lahir',1,1,'C'); 

        $pdf->SetFont('Times','',10);
        $i = 1;
        foreach ($data as $row){
            $pdf->Cell(8,6,$i,1,0,'C');
            $pdf->Cell(20,6,$row['nama_siswa'],1,0);
            $pdf->Cell(20,6,$row['nisn'],1,0);
            $pdf->Cell(25,6,$row['kelas'] . ' ' . $row['jurusan'],1,0);
            $pdf->Cell(25,6,$row['jenis_kelamin'],1,0); 
            $pdf->Cell(63,6,$row['alamat'],1,0); 
            $pdf->Cell(28,6,$row['tgl_lahir'],1,1,'C'); 

            $i++;
        }

        $pdf->Output();
    }

    public function laporanSiswa()
    {
        $id = $this->input->get('id_siswa');
        $data = $this->SiswaModel->getDataUserById($id);

        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',15);
        $pdf->Cell(190,5,'LAPORAN DATA SISWA BEDASARKAN NAMA',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','',10);
        $pdf->Cell(22,6,'Nama Siswa',0,0);
        $pdf->Cell(5,6,':',0,0);
        $pdf->Cell(20,6,$data['nama_siswa'],0,1);

        $pdf->Cell(22,6,'NISN',0,0);
        $pdf->Cell(5,6,':',0,0);
        $pdf->Cell(20,6,$data['nisn'],0,1);

        $data2 = $this->KelasModel->getDataUserById($data['id_kelas']);

        $pdf->Cell(22,6,'Kelas',0,0);
        $pdf->Cell(5,6,':',0,0);
        $pdf->Cell(20,6,$data2['kelas'],0,1);

        $pdf->Cell(22,6,'Jurusan',0,0);
        $pdf->Cell(5,6,':',0,0);
        $pdf->Cell(20,6,$data2['jurusan'],0,1);
    
        $data2 = $this->LilasModel->getDataUserById($data2['id_wali_kelas']);
        $pdf->Cell(22,6,'Wali Kelas',0,0);
        $pdf->Cell(5,6,':',0,0);
        $pdf->Cell(20,6,$data2['nama_wali_kelas'],0,1);

        $pdf->Cell(22,6,'Jenis Kelamin',0,0);
        $pdf->Cell(5,6,':',0,0);
        $pdf->Cell(20,6,$data['jenis_kelamin'],0,1);

        $pdf->Cell(22,6,'Alamat',0,0);
        $pdf->Cell(5,6,':',0,0);
        $pdf->Cell(20,6,$data['alamat'],0,1);

        $pdf->Cell(22,6,'Tanggal Lahir',0,0);
        $pdf->Cell(5,6,':',0,0);
        $pdf->Cell(20,6,$data['tgl_lahir'],0,1);

        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',12);
        $pdf->Cell(190,5,'NILAI SOSIAL',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $data = $this->NilaiSosialModel->getDataUserByIdSiswa($data['id_siswa']);
        if ( $data == NULL ) {
            $pdf->SetFont('Times','',10);
            $pdf->Cell(190,5,'Belum ada data',0,1,'C');
            $pdf->Cell(10,3,'',0,1);
            $pdf->Cell(10,3,'',0,1);
        } else {
            $pdf->SetFont('Times','',10);
            $pdf->Cell(32,6,'Catatan Perilaku',0,0);
            $pdf->Cell(5,6,':',0,0);
            $pdf->Cell(20,6,$data['catatan_perilaku'],0,1);

            $pdf->Cell(32,6,'Nilai Sikap Spiritual',0,0);
            $pdf->Cell(5,6,':',0,0);
            $pdf->Cell(20,6,$data['btr_sikap_spiritual'],0,1);

            $pdf->Cell(32,6,'Nilai Sikap Sosial',0,0);
            $pdf->Cell(5,6,':',0,0);
            $pdf->Cell(20,6,$data['btr_sikap_sosial'],0,1);

            $pdf->Cell(32,6,'Nilai rata-rata',0,0);
            $pdf->Cell(5,6,':',0,0);
            $pdf->Cell(20,6,$data['nilai_sosial'],0,1);
        }

        $pdf->SetFont('Times','B',12);
        $pdf->Cell(190,5,'DAFTAR PELANGGARAN',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $data = $this->PelanggaranModel->getAllDataUserByIdSiswa($id);
        if( $data == NULL ) 
        { 
            $pdf->SetFont('Times','',10);
            $pdf->Cell(190,5,'Belum ada data',0,1,'C');
            $pdf->Cell(10,3,'',0,1);
            $pdf->Cell(10,3,'',0,1);
        } else {

            $pdf->SetFont('Times','B',10);
            $pdf->Cell(8,6,'No.',1,0,'C');
            $pdf->Cell(30,6,'Ketegori Masalah',1,0,'C');
            $pdf->Cell(33,6,'Nama Pelapor',1,0,'C');
            $pdf->Cell(25,6,'Nilai Sosial',1,0,'C');
            $pdf->Cell(25,6,'Pelanggaran',1,0,'C'); 
            $pdf->Cell(40,6,'Bobot Poin',1,0,'C'); 
            $pdf->Cell(28,6,'Tanggal Laporan',1,1,'C'); 

            $pdf->SetFont('Times','',10);
            $i = 1;
            foreach ($data as $row) {
                $pdf->Cell(8,6,$i,1,0,'C');
                $chose2 = $this->db->get_where('rilah', ['id_kategori_masalah' => $row['id_kategori_masalah']])->row_array();
                $pdf->Cell(30,6,$chose2['kategori_masalah'],1,0);

                $chose = $this->db->get_where('tim_stp2k', ['id_tim' => $row['id_tim']])->row_array();
                $pdf->Cell(33,6,$chose['nama_tim'],1,0);

                $chose = $this->db->get_where('nilai_sosial', ['id_nilai_sosial' => $row['id_nilai_sosial']])->row_array();
                $pdf->Cell(25,6,$chose['nilai_sosial'],1,0,'C');

                $chose = $this->db->get_where('nipel', ['id_jenis_pelanggaran' => $row['id_jenis_pelanggaran']])->row_array();
                $pdf->Cell(25,6,$chose['jenis_pelanggaran'],1,0); 
                $pdf->Cell(40,6,$row['bobot_poin'],1,0); 
                $pdf->Cell(28,6,$row['at'],1,1,'C'); 
                $pdf->Cell(8,6,'',0,0,'C');
                $pdf->SetFont('Times','B',10);
                $pdf->Cell(30,6,'Sanksi',1,0);
                $pdf->SetFont('Times','',10);
                $pdf->Cell(151,6,$chose2['sanksi'],1,0);

                $i++;
            }
        }

        $pdf->Output();
    }

    public function laporanSiswaByKelas()
    {
        $id = $this->input->get('id_kelas');

        $data = $this->SiswaModel->getAllDataByKelas($id);

        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',15);
        $pdf->Cell(190,5,'LAPORAN DAFTAR MURID BEDASARKAN KELAS',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',10);

        $pdf->Cell(25,6,'Nama Wali Kelas',0,0);
        $pdf->Cell(8,6,':',0,0,'C');

        $kelas = $this->KelasModel->getDataUserById($id);
        $waliKelas = $this->LilasModel->getDataUserById($kelas['id_wali_kelas']);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(8,6, $waliKelas['nama_wali_kelas'] ,0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(25,6,'Kelas',0,0);
        $pdf->Cell(8,6,':',0,0,'C');
        $pdf->SetFont('Times','',10);
        $pdf->Cell(8,6, $kelas['kelas'] . ' ' . $kelas['jurusan'] ,0,1);
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(20,6,'Nama',1,0,'C');
        $pdf->Cell(20,6,'NISN',1,0,'C');
        $pdf->Cell(25,6,'Kelas Jurusan',1,0,'C');
        $pdf->Cell(25,6,'Jenis Kelamin',1,0,'C'); 
        $pdf->Cell(63,6,'Alamat',1,0,'C'); 
        $pdf->Cell(28,6,'Tanggal Lahir',1,1,'C'); 

        $pdf->SetFont('Times','',10);
        $i = 1;
        foreach ($data as $row){
            $pdf->Cell(8,6,$i,1,0,'C');
            $pdf->Cell(20,6,$row['nama_siswa'],1,0);
            $pdf->Cell(20,6,$row['nisn'],1,0);
            $pdf->Cell(25,6,$row['kelas'] . ' ' . $row['jurusan'],1,0);
            $pdf->Cell(25,6,$row['jenis_kelamin'],1,0); 
            $pdf->Cell(63,6,$row['alamat'],1,0); 
            $pdf->Cell(28,6,$row['tgl_lahir'],1,1,'C'); 

            $i++;
        }

        $pdf->Output();
    }

    public function laporanNilaiSosial()
    {
        $data = $this->NilaiSosialModel->getAllData();

        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',15);
        $pdf->Cell(190,5,'DAFTAR NILAI SOSIAL',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(30,6,'Nama Siswa',1,0,'C');
        $pdf->Cell(30,6,'Kelas',1,0,'C');
        $pdf->Cell(37,6,'Catatan Perilaku',1,0,'C');
        $pdf->Cell(33,6,'Nilai Sikap Spiritual',1,0,'C');
        $pdf->Cell(32,6,'Nilai Sikap Sosial',1,0,'C'); 
        $pdf->Cell(20,6,'Niali Sosial',1,1,'C'); 

        $pdf->SetFont('Times','',10);
        $i = 1;
        foreach ($data as $row){
            $pdf->Cell(8,6,$i,1,0,'C');
            $pdf->Cell(30,6,$row['nama_siswa'],1,0);
            $kelas = $this->KelasModel->getDataUserById($row['id_kelas']);
            $pdf->Cell(30,6,$kelas['kelas'] . ' ' . $kelas['jurusan'],1,0, 'C');
            $pdf->Cell(37,6,$row['catatan_perilaku'],1,0);
            $pdf->Cell(33,6,$row['btr_sikap_spiritual'],1,0,'C');
            $pdf->Cell(32,6,$row['btr_sikap_sosial'],1,0,'C'); 
            $pdf->Cell(20,6,$row['nilai_sosial'],1,1,'C'); 

            $i++;
        }

        $pdf->Output();
    }

    public function laporanNilaiSosialByKelas()
    {
        $id = $this->input->get('id_kelas');

        $data = $this->SiswaModel->getAllDataByKelas($id);
        
        foreach ($data as $key) {
            $data2[] = $this->NilaiSosialModel->getAllDataByIdSiswa($key['id_siswa']);
        }

        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',15);
        $pdf->Cell(190,5,'DAFTAR NILAI SOSIAL BEDASARKAN KELAS',0,1,'C');
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(25,6,'Nama Wali Kelas',0,0);
        $pdf->Cell(8,6,':',0,0,'C');

        $kelas = $this->KelasModel->getDataUserById($id);
        $waliKelas = $this->LilasModel->getDataUserById($kelas['id_wali_kelas']);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(8,6, $waliKelas['nama_wali_kelas'] ,0,1);

        $pdf->SetFont('Times','B',10);
        $pdf->Cell(25,6,'Kelas',0,0);
        $pdf->Cell(8,6,':',0,0,'C');
        $pdf->SetFont('Times','',10);
        $pdf->Cell(8,6, $kelas['kelas'] . ' ' . $kelas['jurusan'] ,0,1);
        $pdf->Cell(10,3,'',0,1);

        if( $data2[0] == NULL ){
            $pdf->SetFont('Times','',10);
            $pdf->Cell(190,6,'Tidak ada data.',1,0,'C');
        } else {

            $pdf->SetFont('Times','B',10);
            $pdf->Cell(8,6,'No.',1,0,'C');
            $pdf->Cell(30,6,'Nama Siswa',1,0,'C');
            $pdf->Cell(30,6,'Kelas',1,0,'C');
            $pdf->Cell(37,6,'Catatan Perilaku',1,0,'C');
            $pdf->Cell(33,6,'Nilai Sikap Spiritual',1,0,'C');
            $pdf->Cell(32,6,'Nilai Sikap Sosial',1,0,'C'); 
            $pdf->Cell(20,6,'Niali Sosial',1,1,'C'); 

            $pdf->SetFont('Times','',10);
            $i = 1;
            foreach ($data2 as $row){
                $pdf->Cell(8,6,$i,1,0,'C');
                $pdf->Cell(30,6,$row['nama_siswa'],1,0);
                $kelas = $this->KelasModel->getDataUserById($row['id_kelas']);
                $pdf->Cell(30,6,$kelas['kelas'] . ' ' . $kelas['jurusan'],1,0, 'C');
                $pdf->Cell(37,6,$row['catatan_perilaku'],1,0);
                $pdf->Cell(33,6,$row['btr_sikap_spiritual'],1,0,'C');
                $pdf->Cell(32,6,$row['btr_sikap_sosial'],1,0,'C'); 
                $pdf->Cell(20,6,$row['nilai_sosial'],1,1,'C'); 

                $i++;
            }
        }

        $pdf->Output();
    }
}