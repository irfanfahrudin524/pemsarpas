<?php 
class Peminjaman_prasarana extends CI_Controller{
    public function __construct(){
    parent::__construct();
    $this->load->model('peminjamanPrasarana_model');
    }

    public function index() {
        $data['title'] = "Permintaan Peminjaman Ruangan STMIK Mardira Indonesia";
        $data['pinjam_ruangan'] = $this->peminjamanPrasarana_model->getAllPeminjaman()->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/riwayatPeminjamanprasarana', $data);
        $this->load->view('templates_admin/footer');
    }

    public function accPinjam($pinjamId) {
        $this->db->select('p.nama_ruangan, p.kode_ruangan, u.NAMA, u.NIM, pruang.tanggal, pruang.alasan, pruang.bukti_izin, pruang.id_pinjam');
        $this->db->from('user as u, prasarana as p, pinjam_ruangan as pruang');
        $this->db->where('pruang.user_id = u.id');
        $this->db->where('pruang.ruangan_id = p.id');
        $this->db->where('pruang.id_pinjam',$pinjamId);
        $data['title'] = "Sistem Peminjaman Prasarana";
        $data['query'] = $this->db->get()->row();

        $data['namauser'] = $this->session->userdata('nama');
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/accPinjamprasarana');
        $this->load->view('templates_admin/footer');
        
    }
    public function tolak($query){
		$this->db->where('id_pinjam', $query);
		$this->db->set('status', 'Ditolak');
		$this->db->update('pinjam_ruangan');
		redirect('user/peminjamanPrasarana');
	}

    public function terima($query){
		$this->db->where('id_pinjam', $query);
		$this->db->set('status','Diterima');
		$this->db->update('pinjam_ruangan');
		redirect('user/peminjamanPrasarana');
	}
}
?>