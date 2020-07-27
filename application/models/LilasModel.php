<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LilasModel extends CI_Model
{
    public function getUser($email)
    {
        return $this->db->get_where('lilas', ['username' => $email])->num_rows();
    }

    public function getDataUser($email)
    {
        return $this->db->get_where('lilas', ['username' => $email])->row_array();
    }

     public function insertData($data)
    {
        $this->db->insert('lilas', $data);
    }
    
}