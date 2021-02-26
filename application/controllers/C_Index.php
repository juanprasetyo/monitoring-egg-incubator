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
}