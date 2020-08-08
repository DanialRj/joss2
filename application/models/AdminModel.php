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

    public function insertData($data)
    {
        $this->db->insert('admin', $data);
    }
}