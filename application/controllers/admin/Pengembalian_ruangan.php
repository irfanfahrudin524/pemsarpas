<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian_ruangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load model
        $this->load->model('pengembalian_model');
    }

    public function index()
    {
        $data['title'] = "Pengembalian Peminjaman Ruangan";
        $data['pengembalian_ruang'] = $this->pengembalian_model->getAll('pengembalian_ruang')->result();

        $this->load->view('templates_admin/header', $data);
        $data['active_menu'] = 'Pengembalian';
        $data['active_submenu'] = '';
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/pengembalianRuangan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Pengembalian";

        $this->load->view('templates_admin/header', $data);
        $data['active_menu'] = 'Pengembalian';
        $data['active_submenu'] = '';
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/tambahPengembalianprasarana', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'id_kembali'   => $id,
                'Nama'         =>$this->input->post('Nama'),
                'NIM'          =>$this->input->post('NIM'),
                'unit'         =>$this->input->post('unit'),
                'nama_ruangan'  => $this->input->post('nama_ruangan'),
                'kode_ruangan'  => $this->input->post('kode_ruangan'),
                'tanggal'      => $this->input->post('tanggal')
            );

            $this->pengembalian_model->insert_data('pengembalian_ruang', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data pengembalian peminjaman berhasil ditambahkan !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Pengembalian_ruangan');
        }
    }

    public function update_data($id){
        $where = array('id_kembali' => $id);
        $data['pengembalian_ruang'] = $this->db->query("SELECT * FROM pengembalian_ruang WHERE id_kembali='$id'")->result();
        $data['title'] = "Pengembalian Peminjaman";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/updatePengembalianprasarana',$data);
        $this->load->view('templates_admin/footer',$data);
    }
    public function edit($id)
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
                'id_kembali'   => $id,
                'Nama'         =>$this->input->post('Nama'),
                'NIM'          =>$this->input->post('NIM'),
                'unit'         =>$this->input->post('unit'),
                'nama_ruangan'  => $this->input->post('nama_ruangan'),
                'kode_ruangan'  => $this->input->post('kode_ruangan'),
                'tanggal'      => $this->input->post('tanggal')
            );

            $this->pengembalian_model->update_data('pengembalian_ruang', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pengembalian Peminjaman berhasil diupdate !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Pengembalian_ruangan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('Nama', 'Nama', 'required', [
            'required' => 'Nama wajib diisi !'
        ]);
        $this->form_validation->set_rules('NIM', 'NIM', 'required', [
            'required' => 'NIM wajib diisi !'
        ]);
        $this->form_validation->set_rules('unit', 'Unit', 'required', [
            'required' => 'Unit wajib diisi !'
        ]);
        $this->form_validation->set_rules('nama_ruangan', 'nama_ruangan', 'required', [
            'required' => 'Nama Ruangan wajib diisi !'
        ]);
        $this->form_validation->set_rules('kode_ruangan', 'kode_ruangan', 'required', [
            'required' => 'Kode ruangan wajib diisi !'
        ]);
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required', [
            'required' => 'Tanggal wajib diisi !'
        ]);
    }

    public function hapus($id)
    {
        $where = array('id_kembali' => $id);

        $this->pengembalian_model->delete_data($where, 'pengembalian_ruang');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Pengembalian Peminjaman berhasil dihapus !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </div>');
        redirect('admin/Pengembalian_ruangan');
    }
}
