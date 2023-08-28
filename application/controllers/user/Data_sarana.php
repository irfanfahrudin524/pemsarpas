<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_sarana extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load model
        $this->load->model('dataSarana_model');
    }

    public function index()
    {
        $data['title'] = "Data Alat/Barang STMIK MI";
        $data['alat'] = $this->dataSarana_model->getAll('alat')->result();

        $this->load->view('templates_user/header', $data);
        $data['active_menu'] = 'Data_sarana';
        $data['active_submenu'] = '';
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('user/dataSarana', $data);
        $this->load->view('templates_user/footer');
    }

    public function form_minjam($query){
		$data['title'] = "Sisfo Pemsarpas";
		$data['query'] = $this->db->get_where('alat', array('id_barang' => $query));
		$data['pengguna']  = $this->db->get_where('pengguna',['nama'=>$this->session->userdata('nama')])->row_array();
		$data['namauser'] = $this->session->userdata('nama');
		if ($data['query'] !== null && $data['query']->num_rows() > 0) {
		$this->load->view('templateS_user/header',$data);
        $this->load->view('templates_user/sidebar', $data);
		$this->load->view('user/pinjam_barang');
        $this->load->view('templates_user/footer');
		}
	}

    public function pinjam(){
		$id_user	= $this->input->post('id_user');
		$barang_id  = $this->input->post('barang_id');
		$tanggal	= $this->input->post('tanggal');
		$alasan 	= $this->input->post('alasan');
		$bukti		= $this->input->post('bukti');

		$pengguna = $this->db->get_where('pinjam', ['barang_id' => $barang_id, 'tanggal' => $tanggal])->row_array();
		
		$data['data'] = $pengguna;
		
		$this->db->where('barang_id',$barang_id);
		$this->db->where('tanggal',$tanggal);
		$ada = $this->db->get('pinjam')->num_rows();
		if($pengguna && $ada > 0){
			echo '<script>alert("barang sudah dipinjam");</script>';
			echo '<script>window.location = document.referrer;</script>';
		}else{

			$data = array(
				'id_user'		=> $id_user,
				'barang_id' 	=> $barang_id,
				'tanggal'		=> $tanggal,
				'alasan'		=> $alasan,
                'bukti'    		=> $bukti,
				'status'		=> "Pending"
			);

			$this->db->insert('pinjam', $data);
			redirect('user/peminjamanSarana');
		}
		
	}
}
?>