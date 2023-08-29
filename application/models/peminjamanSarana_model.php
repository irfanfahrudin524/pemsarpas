<?php
class peminjamanSarana_model extends CI_Model {
    public function getPeminjamanHistory($id_pengguna) {
        $this->db->select('a.nama_barang as nama, a.kode_barang as kode, p.tanggal as tanggal, p.id_pinjam as id, p.status as status');
        $this->db->from('pengguna as pe, alat as a, pinjam as p');
        $this->db->where('p.id_pengguna', $id_pengguna);
        $this->db->where('p.id_pengguna = pe.id_pengguna');
        $this->db->where('p.barang_id = a.id_barang');
        $query = $this->db->get();

        return $query->result();
    }
    
    public function getAllPeminjaman() {
        $this->db->select('pe.nama as nama, a.nama_barang as barang, p.tanggal as tanggal, p.id_pinjam as id, p.status as status');
        $this->db->from('pinjam as p');
        $this->db->join('pengguna as pe', 'p.id_pengguna = pe.id_pengguna');
        $this->db->join('alat as a', 'p.barang_id = a.id_barang');

        return $this->db->get();
    }
}
?>

