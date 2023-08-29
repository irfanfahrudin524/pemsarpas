<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_sarana extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
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
		$data['id_user'] = $this->session->userdata('id_user'); // Make sure to replace 'id_user' with the actual session key for the user's ID
		if ($data['query'] !== null && $data['query']->num_rows() > 0) {
		$this->load->view('templateS_user/header',$data);
        $this->load->view('templates_user/sidebar', $data);
		$this->load->view('user/pinjam_barang');
        $this->load->view('templates_user/footer');
		}
	}

    public function pinjam2(){
		$id_user	= $this->input->post('id_user');
		$id_pengguna	= $this->input->post('id_pengguna');
		$barang_id  = $this->input->post('barang_id');
		$tanggal	= $this->input->post('tanggal');
		$alasan 	= $this->input->post('alasan');
		$bukti		= $this->input->post('bukti');
		
		$config['upload_path'] = './gambar/'; // Specify the upload path
    	$config['allowed_types'] = 'jpg|png|pdf'; // Allowed file types
    	$config['max_size'] = 2048; // Maximum file size in KB
		$config['encrypt_name']	= TRUE;

		$pengguna = $this->db->get_where('pinjam', ['barang_id' => $barang_id, 'tanggal' => $tanggal])->row_array();
		
		$data['data'] = $pengguna;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('bukti')) {
			// Handle file upload error here
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("File upload failed.");</script>';
			echo '<script>window.location = document.referrer;</script>';
			return;
		}

		$file_data = $this->upload->data();
		$bukti_path = 'gambar/' . $file_data['file_name'];
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

			// $data['bukti'] = $bukti_path;
			// $this->db->insert('pinjam', $data);
			// redirect('user/peminjamanSarana');

			$data = array('upload_data' => $this->upload->data());
			$this->db->insert('pinjam', $data);
			redirect('user/peminjamanSarana');
		}
		}	
	
		public function pinjam() 
		{
			if ($this->input->post()) {
				$data = array(
					'id_pengguna' => $this->input->post('id_pengguna'),
					'barang_id' => $this->input->post('barang_id'),
					'tanggal' => $this->input->post('tanggal'),
					'alasan' => $this->input->post('alasan'),
					'status' => "Pending"
				);
	
				$config['upload_path'] = './gambar/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
				$config['max_size'] = 2048;
	
				$this->upload->initialize($config);
	
				if ($this->upload->do_upload('bukti')) {
					$upload_data = $this->upload->data();
					$data['bukti'] = $upload_data['file_name'];
				} else {
					$error = $this->upload->display_errors();
					// Handle upload error
				}
	
				$this->db->insert('pinjam', $data);
	
				// Redirect or do other actions after successful insert
				redirect('user/peminjamanSarana');
			}
		}
}	
?>