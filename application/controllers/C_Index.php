<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class C_Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('status') !== 'login'){
            $this->session->set_flashdata('notif', 'error_login');
            redirect(base_url('login'));
        } else {}

        $this->load->model('M_monitoring');
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        $this->load->view('V_Header', $data);
        $this->load->view('V_Sidebar', $data);
        $this->load->view('V_Dashboard', $data);
        $this->load->view('V_Footer', $data);
    }

    public function insert_suhu_kelembaban()
    {   
        $suhu       = $this->input->get('suhu');
        $kelembaban = $this->input->get('kelembaban');

        $this->M_monitoring->insert_suhu_kelembaban()($suhu, $kelembaban);
    }

    public function get_suhu()
    {
        date_default_timezone_set("Asia/Jakarta");
        $data = $this->M_monitoring->get_suhu();

        $result = [];
        foreach ($data as $key => $value) {
            $result['date'][]       = date('d M Y H:i', $value['date']);
            $result['suhu'][]       = $value['suhu'];
            $result['kelembaban'][] = $value['kelembaban'];
        }

        echo json_encode($result);
    }
}