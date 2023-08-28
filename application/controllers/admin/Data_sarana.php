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

        $this->load->view('templates_admin/header', $data);
        $data['active_menu'] = 'Data_sarana';
        $data['active_submenu'] = '';
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/dataSarana', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Alat/Barang";

        $this->load->view('templates_admin/header', $data);
        $data['active_menu'] = 'Data_sarana';
        $data['active_submenu'] = '';
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/tambahDataSarana', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'kode_barang' => $this->input->post('kode_barang')
            );

            $this->dataSarana_model->insert_data('alat', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Alat/Barang berhasil ditambahkan !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Data_sarana');
        }
    }

    public function update_data($id_barang){
        $where = array('id_barang' => $id_barang);
        $data['alat'] = $this->db->query("SELECT * FROM alat WHERE id_barang='$id_barang'")->result();
        $data['title'] = "Data barang STMIK MI";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/updateDataSarana',$data);
        $this->load->view('templates_admin/footer',$data);
    }
    public function edit($id_barang)
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
                'id_barang' => $id_barang,
                'nama_barang' =>$this->input->post('nama_barang'),
                'kode_barang' =>$this->input->post('kode_barang')
            );

            $this->dataSarana_model->update_data('alat', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Alat/barang berhasil diupdate !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Data_sarana');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required', [
            'required' => 'Nama Barang wajib diisi !'
        ]);
        $this->form_validation->set_rules('kode_barang', 'kode_barang', 'required', [
            'required' => 'Kode Barang wajib diisi !'
        ]);
    }

    public function hapus($id_barang)
    {
        $where = array('id_barang' => $id_barang);

        $this->dataSarana_model->delete_data($where, 'alat');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Alat/Barang berhasil dihapus !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </div>');
        redirect('admin/Data_sarana');
    }
}
?>