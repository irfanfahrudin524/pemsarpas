<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login_model extends CI_Model
{

    public function cek_login($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get('user');
    }

    public function getDataLogin($user, $pass)
    {
        $u = $user;
        $p = $pass;

        $query_cekLogin = $this->db->get_where('user', array('username' => $u, 'password' => $p));

        if ($query_cekLogin->num_rows() > 0) {
            $user_data = $query_cekLogin->row(); // Fetch the first row (assuming username and password are unique)
            $sess_data['logged_in'] = TRUE;
            $sess_data['username'] = $user_data->username;
            $sess_data['level'] = $user_data->level; // Assuming 'user_level' is the column name for the user level
            $this->session->set_userdata($sess_data);

            // Redirect users based on their user levels
            if ($user_data->level == 'admin') {
                redirect('admin/dashboard');
            } else {
                redirect('admin/dashboardUser');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Username dan Password Salah!');
            redirect('admin/Login');
        }
    }
}
?>