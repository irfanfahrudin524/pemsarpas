<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengembalian_model extends CI_Model
{
    public function getAll($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data)
    {
        $this->db->where('id_kembali', $data['id_kembali']);
        $this->db->update($table, $data);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
