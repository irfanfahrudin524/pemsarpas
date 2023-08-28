<?php 
    class DashboardUser extends CI_Controller{
        public function index(){
            $data['title'] = "Dashboard";
            $alat = $this->db->query("SELECT * FROM alat");
            $ruangan = $this->db->query("SELECT * FROM ruangan");
            $pinjam = $this->db->query("SELECT * FROM pinjam");
            $pinjam_ruangan = $this->db->query("SELECT * FROM pinjam_ruangan");
            $data['alat']=$alat->num_rows();
            $data['ruangan']=$ruangan->num_rows();
            $data['pinjam']=$pinjam->num_rows();
            $data['pinjam_ruangan']=$pinjam_ruangan->num_rows();
            $this->load->view('templates_user/header',$data);
            $this->load->view('templates_user/sidebar',$data);
            $this->load->view('user/dashboardUser',$data);
            $this->load->view('templates_user/footer',$data);
        }
    }
?>