<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TimSTP2KModel extends CI_Model
{

    public function getAllData()
    {
        return $this->db->get('tim_stp2k')->result_array();
    }

    public function getUser($email)
    {
        return $this->db->get_where('tim_stp2k', ['username' => $email])->num_rows();
    }

    public function getDataUser($email)
    {
        return $this->db->get_where('tim_stp2k', ['username' => $email])->row_array();
    }

     public function getDataUserById($id)
    {
        return $this->db->get_where('tim_stp2k', ['id_tim' => $id])->row_array();
    }

     public function insertData($data)
    {
        $this->db->insert('tim_stp2k', $data);
    }

    public function destroyData($id)
    {
        $this->db->delete('tim_stp2k', $id);
    }

    public function updateById($id, $data)
    {
        $this->db->where('id_tim', $id);
        $this->db->update('tim_stp2k', $data);
    }
}