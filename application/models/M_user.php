<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function add($data)
    {
        return $this->db->insert('users', $data)->affected_rows();
    }

    public function get_by_email($email)
    {
        return $this->db->get_where('users', ['email' => $email]);
    }
}