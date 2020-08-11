<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RilahModel extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('rilah')->result_array();
    }

    public function getDataUserById($id)
    {
        return $this->db->get_where('rilah', ['id_kategori_masalah' => $id])->row_array();
    }
    
    public function insertData($data)
    {
        $this->db->insert('rilah', $data);
    }

    public function destroyData($id)
    {
        $this->db->delete('rilah', $id);
    }

    public function updateById($id, $data)
    {
        $this->db->where('id_kategori_masalah', $id);
        $this->db->update('rilah', $data);
    }

}