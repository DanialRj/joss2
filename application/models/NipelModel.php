<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NipelModel extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('nipel.*, ripel.*');
        $this->db->from('nipel');
        $this->db->join('ripel', 'ripel.id_kategori_pelanggaran = nipel.id_kategori_pelanggaran');
        return $this->db->get()->result_array();
    }

    public function getAllDataByKategori($id)
    {
        $this->db->select('nipel.*, ripel.*');
        $this->db->from('nipel');
        $this->db->join('ripel', 'ripel.id_kategori_pelanggaran = nipel.id_kategori_pelanggaran');
        $this->db->where("nipel.id_kategori_pelanggaran = $id");
        return $this->db->get()->result_array();
    }

    public function getDataUserById($id)
    {
        return $this->db->get_where('nipel', ['id_jenis_pelanggaran' => $id])->row_array();
    }
    
    public function insertData($data)
    {
        $this->db->insert('nipel', $data);
    }

    public function destroyData($id)
    {
        $this->db->delete('nipel', $id);
    }

    public function updateById($id, $data)
    {
        $this->db->where('id_jenis_pelanggaran', $id);
        $this->db->update('nipel', $data);
    }

}