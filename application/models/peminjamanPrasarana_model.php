<?php
class peminjamanPrasarana_model extends CI_Model {
    public function getPeminjamanHistory($id_user) {
        $this->db->select('r.nama_ruangan as nama, r.kode_ruangan as kode, pruang.tanggal as tanggal, pruang.id_pinjam as id, pruang.status as status');
        $this->db->from('pengguna as pe, ruangan as r, pinjam_ruangan as pruang');
        $this->db->where('pruang.id_user', $id_user);
        $this->db->where('pruang.id_user = pe.id_pengguna');
        $this->db->where('pruang.ruangan_id = r.id_ruang');
        $query = $this->db->get();

        return $query->result();
    }
    public function getAllPeminjaman() {
        $this->db->select('pe.nama as nama, r.nama_ruangan as ruangan, pruang.tanggal as tanggal, pruang.id_pinjam as id, pruang.status as status');
        $this->db->from('pinjam_ruangan as pruang');
        $this->db->join('pengguna as pe', 'pruang.id_user = pe.id_pengguna');
        $this->db->join('ruangan as r', 'pruang.ruangan_id = r.id_ruang');

        return $this->db->get();
    }
}
?>
