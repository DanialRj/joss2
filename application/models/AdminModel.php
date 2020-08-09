<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('admin')->result_array();
    }

    public function getUser($email)
    {
        return $this->db->get_where('admin', ['username' => $email])->num_rows();
    }

    public function getDataUser($email)
    {
        return $this->db->get_where('admin', ['username' => $email])->row_array();
    }

    public function getDataUserById($id)
    {
        return $this->db->get_where('admin', ['id_admin' => $id])->row_array();
    }

    public function insertData($data)
    {
        $this->db->insert('admin', $data);
    }

    public function destroyData($id)
    {
        $this->db->delete('admin', $id);
    }

    public function updateById($id, $data)
    {
        $this->db->where('id_admin', $id);
        $this->db->update('admin', $data);
    }
}