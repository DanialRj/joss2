<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RipelModel extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('ripel')->result_array();
    }

    public function getDataUserById($id)
    {
        return $this->db->get_where('ripel', ['id_kategori_pelanggaran' => $id])->row_array();
    }
    
    public function insertData($data)
    {
        $this->db->insert('ripel', $data);
    }

    public function destroyData($id)
    {
        $this->db->delete('ripel', $id);
    }

    public function updateById($id, $data)
    {
        $this->db->where('id_kategori_pelanggaran', $id);
        $this->db->update('ripel', $data);
    }

}