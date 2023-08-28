<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Load necessary libraries or models here if needed
    }

    public function index() {
        $this->session->unset_userdata('NAMA');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('NIM');
        $this->session->unset_userdata('Jurusan');
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah Logout!</div>');
        redirect('admin/login');
    }
}
?>
