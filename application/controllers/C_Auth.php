<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('M_user', 'user');
    }

    public function login_view()
    {
        $data = [];
        // $this->session->set_flashdata('error', '');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
			$this->load->view('V_Login');
		} else {
            $email = $this->input->post('email');
            $pass = $this->input->post('password');
			$this->__login($email, $pass);
        }
    }

    private function __login($email, $pass)
    {
        if ($this->user->get_by_email($email)->num_rows() > 0) {
            $data = $this->user->get_by_email($email)->row_array();
            if (password_verify($pass, $data['PASSWORD'])) {
                $this->session->set_userdata('status', 'login');
                $this->session->set_userdata('email', $email);
                redirect(base_url('dashboard'));
            } else {
                $this->session->set_flashdata('notif', 'error_password');
                $this->load->view('V_Login');
            }
        } else {
            $this->session->set_flashdata('notif', 'error_email');
            $this->load->view('V_Login');
        }
    }

    public function register_view()
    {
        $data = [];

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[USERS.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('password2', 'Password2', 'required|matches[password]');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('V_Register', $data);
        } else {
            $user = [
                'ID'              => '',
                'NAME'            => htmlspecialchars($this->input->post('name')),
                'EMAIL'           => htmlspecialchars($this->input->post('email')),
                'PASSWORD'        => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'PROFILE_PICTURE' => 'default.png',
                'DATE_CREATE'     => strtotime(date('d M Y')),
            ];
            $affected = $this->user->add($user);
            if($affected > 0){
                $this->session->set_flashdata('register', 'success');
                redirect(base_url('register'));
            } else {
                $this->session->set_flashdata('register', 'failed');
                redirect(base_url('register'));
            }
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('notif', 'logout');
        redirect(base_url('login'));
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if($this->form_validation->run() == FALSE){
            $this->load->view('V_ForgotPassword');
        } else {
            $email = $this->input->post('email');

            if($this->user->get_by_email($email)->row_array() > 0){
                $this->session->set_flashdata('email', $email);
                redirect(base_url('recovery_password?email='.$email));
            } else {
                $this->session->set_flashdata('notif', 'error');
                $this->load->view('V_ForgotPassword');
            }
        }
        
    }

    public function recovery_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password]');
        $data['email'] = $this->input->get('email');

        if($this->form_validation->run() == FALSE){
            $this->load->view('V_RecoveryPassword', $data);
        } else {
            $new_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $this->session->set_flashdata('notif', 'success');
            $this->user->update_password($new_password, $data['email']);
            redirect(base_url('recovery_password?email='.$data['email']));
        }
    }
}