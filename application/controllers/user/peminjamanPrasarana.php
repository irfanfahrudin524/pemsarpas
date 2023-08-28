<?php
class PeminjamanPrasarana extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('peminjamanPrasarana_model'); // Load the model
    }

    public function index() {
        $data['title'] = "Riwayat Peminjaman Prasarana";
        $data['pinjam_ruangan'] = $this->peminjamanPrasarana_model->getPeminjamanHistory($this->session->userdata('id'));

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/riwayatPeminjamanprasarana', $data); // Load the view
        $this->load->view('templates_user/footer');
    }
}
?>
