<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LilasModel extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('lilas')->result_array();
    }

    public function getUser($email)
    {
        return $this->db->get_where('lilas', ['username' => $email])->num_rows();
    }

    public function getDataUser($email)
    {
        return $this->db->get_where('lilas', ['username' => $email])->row_array();
    }

    public function getDataUserById($id)
    {
        return $this->db->get_where('lilas', ['id_wali_kelas' => $id])->row_array();
    }

     public function insertData($data)
    {
        $this->db->insert('lilas', $data);
    }

    public function destroyData($id)
    {
        $this->db->delete('lilas', $id);
    }

    public function updateById($id, $data)
    {
        $this->db->where('id_wali_kelas', $id);
        $this->db->update('lilas', $data);
    }
    
}