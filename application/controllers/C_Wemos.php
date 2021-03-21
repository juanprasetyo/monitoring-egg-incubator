<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class C_Wemos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_monitoring');
    }
    public function insert_suhu_kelembaban()
    {   
        $suhu       = $this->input->get('suhu');
        $kelembaban = $this->input->get('kelembaban');
        if($suhu < 200){
            $this->M_monitoring->insert_suhu_kelembaban($suhu, $kelembaban);
        }
    }

    public function update_status_lampu()
    {
        $status = $this->input->get('status_lampu');

        $this->M_monitoring->update_status_lampu($status);
    }

    public function update_status_kipas()
    {
        $status = $this->input->get('status_kipas');

        $this->M_monitoring->update_status_kipas($status);
    }

    public function get_config_device()
    {
        $data = $this->M_monitoring->get_config_device();

        echo $data['LAMPU']. '-' .$data['KIPAS'];
    }
}