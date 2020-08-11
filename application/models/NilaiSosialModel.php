<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiSosialModel extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('nilai_sosial.*, siswa.*');
        $this->db->from('nilai_sosial');
        $this->db->join('siswa', 'siswa.id_siswa = nilai_sosial.id_siswa');
        return $this->db->get()->result_array();
    }

    public function getDataUserById($id)
    {
        return $this->db->get_where('nilai_sosial', ['id_nilai_sosial' => $id])->row_array();
    }

    public function getDataUserByIdSiswa($id)
    {
        return $this->db->get_where('nilai_sosial', ['id_siswa' => $id])->row_array();
    }
    
    public function insertData($data)
    {
        $this->db->insert('nilai_sosial', $data);
    }

    public function destroyData($id)
    {
        $this->db->delete('nilai_sosial', $id);
    }

    public function updateById($id, $data)
    {
        $this->db->where('id_nilai_sosial', $id);
        $this->db->update('nilai_sosial', $data);
    }

}