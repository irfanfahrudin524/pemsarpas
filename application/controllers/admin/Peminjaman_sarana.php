<?php
class Peminjaman_sarana extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('PeminjamanSarana_model');
    }

    public function index() {
        $data['title'] = "Permintaan Peminjaman Alat/Barang STMIK Mardira Indonesia";
        $data['pinjam'] = $this->PeminjamanSarana_model->getAllPeminjaman()->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/riwayatPeminjamansarana', $data);
        $this->load->view('templates_admin/footer');
    }

    public function accPinjam($id_pinjam) {
        $this->db->select('s.nama_barang, s.kode_barang, u.NAMA, u.NIM, p.tanggal, p.alasan, p.bukti_izin, p.id_pinjam');
        $this->db->from('user as u, sarana as s, pinjam as p');
        $this->db->where('p.user_id = u.id');
        $this->db->where('p.barang_id = s.id');
        $this->db->where('p.id_pinjam',$id_pinjam);
        $data['title'] = "Sistem Peminjaman Sarana";
        $data['query'] = $this->db->get()->row();

        $data['namauser'] = $this->session->userdata('nama');
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/accPinjam');
        $this->load->view('templates_admin/footer');
        
    }
    public function tolak($query){
		$this->db->where('id_pinjam', $query);
		$this->db->set('status', 'Ditolak');
		$this->db->update('pinjam');
		redirect('user/peminjamanSarana');
	}

    public function terima($query){
		$this->db->where('id_pinjam', $query);
		$this->db->set('status','Diterima');
		$this->db->update('pinjam');
		redirect('user/peminjamanSarana');
	}
}
?>
