<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelanggaranModel extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('pelanggaran')->result_array();
    }

    public function getAllData2($id)
    {
        return $this->db->get_where('pelanggaran', ['id_tim' => $id])->result_array();
    }

    public function getAllData3($data)
    {
        $this->db->where_in('id_siswa', $data);
        return $this->db->get('pelanggaran')->result_array();
    }

    public function getAllDataByIdMasalah($id = NULL)
    {
        return $this->db->get_where('pelanggaran', ['id_kategori_masalah' => $id])->result_array();
    }

    public function getAllDataByIdForigen($id = NULL, $forigen)
    {
        return $this->db->get_where('pelanggaran', [$forigen => $id])->result_array();
    }

    public function getDataUserById($id)
    {
        return $this->db->get_where('pelanggaran', ['id_pelanggaran' => $id])->row_array();
    }

    public function getAllDataByIdSiswa($id)
    {
        return $this->db->get_where('pelanggaran', ['id_siswa' => $id])->row_array();
    }
    
    public function insertData($data)
    {
        $this->db->insert('pelanggaran', $data);
    }

    public function destroyData($id)
    {
        $this->db->delete('pelanggaran', $id);
    }

    public function updateById($id, $data)
    {
        $this->db->where('id_pelanggaran', $id);
        $this->db->update('pelanggaran', $data);
    }

    public function getAllDataUserByIdSiswa($id)
    {
        return $this->db->get_where('pelanggaran', ['id_siswa' => $id])->result_array();
    }

}