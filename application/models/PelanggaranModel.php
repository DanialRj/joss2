<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelanggaranModel extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('pelanggaran')->result_array();
    }

    public function getDataUserById($id)
    {
        return $this->db->get_where('pelanggaran', ['id_pelanggaran' => $id])->row_array();
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

}