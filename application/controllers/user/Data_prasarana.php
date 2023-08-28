<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_prasarana extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load model
        $this->load->model('dataPrasarana_model');
    }

    public function index()
    {
        $data['title'] = "Data Ruangan STMIK MI";
        $data['ruangan'] = $this->dataPrasarana_model->getAll('ruangan')->result();

        $this->load->view('templates_user/header', $data);
        $data['active_menu'] = 'Data_prasarana';
        $data['active_submenu'] = '';
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('user/dataPrasarana', $data);
        $this->load->view('templates_user/footer');
    }

    public function form_minjam($query){
		$data['title'] = "Sisfo Pemsarpas";
 		$data['query'] = $this->db->get_where('ruangan', array('id_ruang' => $query));
		$data['user']  = $this->db->get_where('user',['NAMA'=>$this->session->userdata('NAMA')])->row_array();
		$data['namauser'] = $this->session->userdata('NAMA');
		$this->load->view('templates_user/header',$data);
        $this->load->view('templates_user/sidebar', $data);
		$this->load->view('user/pinjam_ruangan');
        $this->load->view('templates_user/footer');
	}

    public function pinjam(){
		$user_id		= $this->input->post('user_id');
		$ruangan_id  	= $this->input->post('ruangan_id');
		$tanggal		= $this->input->post('tanggal');
		$alasan 		= $this->input->post('alasan');
		$bukti_izin 	= $this->input->post('bukti_izin');

		$user = $this->db->get_where('pinjam_ruangan', ['ruangan_id' => $ruangan_id, 'tanggal' => $tanggal])->row_array();
		
		$data['data'] = $user;
		
		$this->db->where('ruangan_id',$ruangan_id);
		$this->db->where('tanggal',$tanggal);
		$ada = $this->db->get('pinjam_ruangan')->num_rows();
		if($user && $ada > 0){
			echo '<script>alert("ruangan sudah dipinjam");</script>';
			echo '<script>window.location = document.referrer;</script>';
		}else{

			$data = array(
				'user_id'		=> $user_id,
				'ruangan_id' 	=> $ruangan_id,
				'tanggal'		=> $tanggal,
				'alasan'		=> $alasan,
                'bukti_izin'    => $bukti_izin,
				'status'		=> "Pending"
			);

			$this->db->insert('pinjam_ruangan', $data);
			redirect('user/peminjamanPrasarana');
		}
    }
}
?>