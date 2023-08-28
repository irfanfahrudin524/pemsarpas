<?php
class PeminjamanSarana extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('peminjamanSarana_model'); // Load the model
    }

    public function index() {
        $data['title'] = "Riwayat Peminjaman Sarana";
        $data['pinjam'] = $this->peminjamanSarana_model->getPeminjamanHistory($this->session->userdata('id_pinjam'));

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/riwayatPeminjamansarana', $data); // Load the view
        $this->load->view('templates_user/footer');
    }   
}
?>
