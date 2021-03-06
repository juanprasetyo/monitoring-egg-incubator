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
        $this->db->insert('USERS', $data);
        return $this->db->affected_rows();
    }

    public function get_by_email($email)
    {
        return $this->db->get_where('USERS', ['email' => $email]);
    }

    public function update_password($new_password, $email)
    {
        $this->db->update('USERS', ['PASSWORD' => $new_password], ['EMAIL' => $email]);
    }
}