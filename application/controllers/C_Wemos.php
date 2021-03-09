<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class C_Wemos extends CI_Controller
{
    public function insert_suhu_kelembaban()
    {   
        $this->load->model('M_monitoring');

        $suhu       = $this->input->get('suhu');
        $kelembaban = $this->input->get('kelembaban');
        if($suhu < 200){
            $this->M_monitoring->insert_suhu_kelembaban($suhu, $kelembaban);
        }
    }
}