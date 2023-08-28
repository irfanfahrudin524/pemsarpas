<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load model
        $this->load->model('user_model');
    }

    public function index()
    {
        $data['title'] = "Management User";
        $data['pengguna'] = $this->user_model->getAll('pengguna')->result();

        $this->load->view('templates_admin/header', $data);
        $data['active_menu'] = 'Management_user';
        $data['active_submenu'] = '';
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah User";

        $this->load->view('templates_admin/header', $data);
        $data['active_menu'] = 'Management_user';
        $data['active_submenu'] = '';
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/tambahDataUser', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'unit' => $this->input->post('unit'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level' => $this->input->post('level')
            );

            $this->user_model->insert_data('pengguna', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data user berhasil ditambahkan !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Management_user');
        }
    }

    public function update_data($id_pengguna){
        $where = array('id_pengguna' => $id_pengguna);
        $data['pengguna'] = $this->db->query("SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'")->result();
        $data['title'] = "Management User";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('admin/updateDataUser',$data);
        $this->load->view('templates_admin/footer',$data);
    }
    public function edit($id_pengguna)
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
                '$id_pengguna' => $$id_pengguna,
                'nama' =>$this->input->post('nama'),
                'nim' =>$this->input->post('nim'),
                'level' =>$this->input->post('level'),
                'username'  => $this->input->post('username'),
                'password'  => $this->input->post('password'),
                'unit' => $this->input->post('unit')
            );

            $this->user_model->update_data('pengguna', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data user berhasil diupdate !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/Management_user');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama wajib diisi !'
        ]);
        $this->form_validation->set_rules('nim', 'NIM', 'required', [
            'required' => 'NIM wajib diisi !'
        ]);
        $this->form_validation->set_rules('level', 'Level', 'required', [
            'required' => 'Level wajib diisi !'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username wajib diisi !'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password wajib diisi !'
        ]);
        $this->form_validation->set_rules('unit', 'Unit', 'required', [
            'required' => 'Unit wajib diisi !'
        ]);
    }

    public function hapus($id_pengguna)
    {
        $where = array('id_pengguna' => $id_pengguna);

        $this->user_model->delete_data($where, 'pengguna');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data user berhasil dihapus !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </div>');
        redirect('admin/Management_user');
    }
}
