<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->load->view('admin/login');
    }

    public function proses_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = $password;

            $query_cekLogin = $this->login_model->cek_login($user, $pass);

            if ($query_cekLogin->num_rows() > 0) {
                $user_data = $query_cekLogin->row();
                $sess_data['logged_in'] = TRUE;
                $sess_data['username'] = $user_data->username;
                $sess_data['level'] = $user_data->level;
                $sess_data['nama'] = $user_data->nama;
                $sess_data['nim'] = $user_data->nim;
                $sess_data['unit'] = $user_data->unit;
                $sess_data['id_pengguna'] = $user_data->id_pengguna; 
                $sess_data['id_user'] = $user_data->id_user;// Assuming 'user_level' is the column name for the user level
                $this->session->set_userdata($sess_data);

                // Redirect users based on their user levels
                if ($user_data->level == 'admin') {
                    redirect('admin/dashboard');
                } else {
                    redirect('user/dashboardUser');
                }
            } else {
                $this->session->set_flashdata('pesan', 'Maaf, Username dan Password Anda Salah!');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin/Login'));
    }
}
?>