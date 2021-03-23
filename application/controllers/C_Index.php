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
        $this->load->model('M_user');
    }
    
    public function index()
    {
        $email = $this->session->userdata('email');
        $data  = [
            'title' => 'Dashboard',
            'user'  => $this->M_user->get_by_email($email)->row_array(),
        ];
        $this->load->view('V_Header', $data);
        $this->load->view('V_Sidebar', $data);
        $this->load->view('V_Dashboard', $data);
        $this->load->view('V_Footer', $data);
    }

    public function about()
    {
        $email = $this->session->userdata('email');
        $data  = [
            'title' => 'About',
            'user'  => $this->M_user->get_by_email($email)->row_array(),
        ];
        $this->load->view('V_Header', $data);
        $this->load->view('V_Sidebar', $data);
        $this->load->view('V_About', $data);
        $this->load->view('V_Footer', $data);
    }

    public function get_suhu_kelembaban()
    {
        date_default_timezone_set("Asia/Jakarta");
        $data = $this->M_monitoring->get_suhu_kelembaban();
        $data = array_reverse($data);

        $result = [];
        foreach ($data as $key => $value) {
            $result['date'][]       = date('d M Y H:i', $value['DATE_CREATE']);
            $result['suhu'][]       = $value['SUHU'];
            $result['kelembaban'][] = $value['KELEMBABAN'];
        }

        echo json_encode($result);
    }

    public function get_last_suhu_kelembaban()
    {
        $data = $this->M_monitoring->get_last_suhu_kelembaban();

        echo json_encode($data);
    }

    public function get_config_device()
    {
        $config_device  = $this->M_monitoring->get_config_device();
        $config = [
            'lampu'      => $config_device['LAMPU'],
            'kipas'      => $config_device['KIPAS']
        ];

        echo json_encode($config);
    }

    public function update_status_lampu()
    {
        $status = $this->input->post('status');

        $this->M_monitoring->update_status_lampu($status);
    }

    public function update_status_kipas()
    {
        $status = $this->input->post('status');

        $this->M_monitoring->update_status_kipas($status);
    }

    public function get_data_config_dht()
    {
        $data = $this->M_monitoring->get_data_config_dht();

        echo json_encode($data);
    }

    public function save_config_dht()
    {
        $post = $this->input->post();

        $this->M_monitoring->update_config_dht($post);
        
        echo 1;
    }
}