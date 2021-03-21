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
            'DATE_CREATE'   => strtotime(date('d-M-Y H:i:s'))
        ];

        $this->db->insert('SUHU_KELEMBABAN', $data);
    }

    public function get_suhu_kelembaban()
    {
        $query = "SELECT * FROM SUHU_KELEMBABAN ORDER BY ID DESC limit 10";
        return $this->db->query($query)->result_array();
    }

    public function get_last_suhu_kelembaban()
    {
        $query = 'SELECT * FROM SUHU_KELEMBABAN ORDER BY ID DESC LIMIT 1';
        return $this->db->query($query)->row_array();
    }

    public function get_config_dht()
    {
        return $this->db->get('CONFIG_DHT')->row_array();
    }

    public function get_config_device()
    {
        return $this->db->get('STATUS_DEVICE')->row_array();
    }

    public function update_status_lampu($status)
    {
        $this->db->update('STATUS_DEVICE', ['LAMPU' => $status], ['ID' => 1]);
    }

    public function update_status_kipas($status)
    {
        $this->db->update('STATUS_DEVICE', ['KIPAS' => $status], ['ID' => 1]);
    }
}