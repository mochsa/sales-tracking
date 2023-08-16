<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_tugas extends CI_Model
{
    public function get_tugas_data()
    {
        $this->db->select('tbl_tugas.*, tbl_user.name as sales, tbl_dbmaps.nama_maps as nama_toko');
        $this->db->from('tbl_tugas');
        $this->db->join('tbl_user', 'tbl_user.id = tbl_tugas.id_user');
        $this->db->join('tbl_dbmaps', 'tbl_dbmaps.id_maps = tbl_tugas.id_maps');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_tugas_data($data)
    {
        $this->db->insert('tbl_tugas', $data);
        return $this->db->insert_id();
    }

    public function delete_tugas_by_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_tugas');
    }
}
