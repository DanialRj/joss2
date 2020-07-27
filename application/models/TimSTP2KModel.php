<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TimSTP2KModel extends CI_Model
{
    public function getUser($email)
    {
        return $this->db->get_where('tim_stp2k', ['username' => $email])->num_rows();
    }

    public function getDataUser($email)
    {
        return $this->db->get_where('tim_stp2k', ['username' => $email])->row_array();
    }

     public function insertData($data)
    {
        $this->db->insert('tim_stp2k', $data);
    }
}