<?php
class peminjamanPrasarana_model extends CI_Model {
    public function getPeminjamanHistory($userId) {
        $this->db->select('p.nama_ruangan as nama, p.kode_ruangan as kode, pruang.tanggal as tanggal, pruang.id_pinjam as id, pruang.status as status');
        $this->db->from('user as u, prasarana as p, pinjam_ruangan as pruang');
        $this->db->where('pruang.user_id', $userId);
        $this->db->where('pruang.user_id = u.id');
        $this->db->where('pruang.ruangan_id = p.id');
        $query = $this->db->get();

        return $query->result();
    }
    public function getAllPeminjaman() {
        $this->db->select('u.NAMA as nama, p.nama_ruangan as ruangan, pruang.tanggal as tanggal, pruang.id_pinjam as id, pruang.status as status');
        $this->db->from('pinjam_ruangan as pruang');
        $this->db->join('user as u', 'pruang.user_id = u.id');
        $this->db->join('prasarana as p', 'pruang.ruangan_id = p.id');

        return $this->db->get();
    }
}
?>
