<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelasModel extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('kelas.*, lilas.*');
        $this->db->from('kelas');
        $this->db->join('lilas', 'lilas.id_wali_kelas = kelas.id_wali_kelas');
        return $this->db->get()->result_array();
    }

    public function getDataUserById($id)
    {
        return $this->db->get_where('kelas', ['id_kelas' => $id])->row_array();
    }
    
    public function insertData($data)
    {
        $this->db->insert('kelas', $data);
    }

    public function destroyData($id)
    {
        $this->db->delete('kelas', $id);
    }

    public function updateById($id, $data)
    {
        $this->db->where('id_kelas', $id);
        $this->db->update('kelas', $data);
    }

}