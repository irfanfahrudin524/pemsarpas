<?php 
    class Dashboard extends CI_Controller{
        public function index(){
            $data['title'] = "Dashboard";
            $pengguna = $this->db->query("SELECT * FROM pengguna");
            $alat = $this->db->query("SELECT * FROM alat");
            $ruangan = $this->db->query("SELECT * FROM ruangan");
            $pinjam = $this->db->query("SELECT * FROM pinjam");
            $pinjam_ruangan =$this->db->query("SELECT * FROM pinjam_ruangan");
            $data['pengguna']=$pengguna->num_rows();
            $data['alat']=$alat->num_rows();
            $data['ruangan']=$ruangan->num_rows();
            $data['pinjam']=$pinjam->num_rows();
            $data['pinjam_ruangan']=$pinjam_ruangan->num_rows();
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar',$data);
            $this->load->view('admin/dashboard',$data);
            $this->load->view('templates_admin/footer',$data);
        }
    }
?>