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

        $this->load->view('templates_admin/header', $data);
        $data['active_menu'] = 'Data_prasarana';
        $data['active_submenu'] = '';
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/dataPrasarana', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Ruangan";

        $this->load->view('templates_admin/header', $data);
        $data['active_menu'] = 'Data_prasarana';
        $data['active_submenu'] = '';
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/tambahDataPrasarana', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_ruangan' => $this->input->post('nama_ruangan'),
                'kode_ruangan' => $this->input->post('kode_ruangan')
            );

            $this->dataPrasarana_model->insert_data('ruangan', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data ruangan berhasil ditambahkan !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Data_prasarana');
        }
    }

    public function update_data($id_ruang){
        $where = array('id_ruang' => $id_ruang);
        $data['ruangan'] = $this->db->query("SELECT * FROM ruangan WHERE id_ruang='$id_ruang'")->result();
        $data['title'] = "Data Ruangan STMIK MI";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/updateDataPrasarana',$data);
        $this->load->view('templates_admin/footer',$data);
    }
    public function edit($id_ruang)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // Validasi form tidak berhasil, tampilkan pesan error dan kembali ke halaman edit
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Error: Validasi form tidak berhasil.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('admin/update_data');
        } else {
            $data = array(
                'id_ruang' => $id_ruang,
                'nama_ruangan' =>$this->input->post('nama_ruangan'),
                'kode_ruangan' =>$this->input->post('kode_ruangan')
            );

            $this->dataPrasarana_model->update_data('ruangan', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data ruangan berhasil diupdate !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Data_prasarana');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_ruangan', 'nama_ruangan', 'required', [
            'required' => 'Nama Ruangan wajib diisi !'
        ]);
        $this->form_validation->set_rules('kode_ruangan', 'kode_ruangan', 'required', [
            'required' => 'Kode Ruangan wajib diisi !'
        ]);
    }

    public function hapus($id_ruang)
    {
        $where = array('id_ruang' => $id_ruang);

        $this->dataPrasarana_model->delete_data($where, 'ruangan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data ruangan berhasil dihapus !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </div>');
        redirect('admin/Data_prasarana');
    }
}
?>