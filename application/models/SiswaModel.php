<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('siswa')->result_array();
    }

    public function getDataUserById($id)
    {
        return $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
    }
    
    public function insertData($data)
    {
        $this->db->insert('siswa', $data);
    }

    public function destroyData($id)
    {
        $this->db->delete('siswa', $id);
    }

    public function updateById($id, $data)
    {
        $this->db->where('id_siswa', $id);
        $this->db->update('siswa', $data);
    }

}