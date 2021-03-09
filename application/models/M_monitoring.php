<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class M_monitoring extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function insert_suhu_kelembaban($suhu, $kelembaban)
    {
        date_default_timezone_set("Asia/Jakarta");
        
        $data = [
            'SUHU'          => $suhu,
            'KELEMBABAN'    => $kelembaban,
            'DATE_CREATE'   => strtotime(date('d-M-Y H:i'))
        ];

        $this->db->insert('SUHU_KELEMBABAN', $data);
        // $this->db->update('suhu', $data, ['id' => 1]);
    }

    public function get_suhu()
    {
        $query = "SELECT * FROM SUHU_KELEMBABAN ORDER BY ID DESC limit 5";
        return $this->db->query($query)->result_array();
    }
}