<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_tugas extends CI_Model
{
    public function get_tugas_data()
    {
        $this->db->select('tbl_tugas.*, tbl_user.name as sales, tbl_dbmaps.nama_maps as nama_toko, tbl_dbmaps.latitude, tbl_dbmaps.longitude');
        $this->db->from('tbl_tugas');
        $this->db->join('tbl_user', 'tbl_user.id = tbl_tugas.id_user');
        $this->db->join('tbl_dbmaps', 'tbl_dbmaps.id_maps = tbl_tugas.id_maps');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_latlong_by_id($id_maps)
    {
        $this->db->select('latitude, longitude');
        $this->db->from('tbl_dbmaps');
        $this->db->where('id_maps', $id_maps);
        $query = $this->db->get();
        return $query->row();
    }

    public function insert_tugas_data($data)
    {
        $this->db->insert('tbl_tugas', $data);
        return $this->db->insert_id();
    }

    public function get_tugas_by_user($id_user)
    {
        $this->db->select('tbl_tugas.*, tbl_user.name as sales, tbl_dbmaps.nama_maps as nama_toko, tbl_dbmaps.latitude, tbl_dbmaps.longitude');
        $this->db->from('tbl_tugas');
        $this->db->join('tbl_user', 'tbl_user.id = tbl_tugas.id_user');
        $this->db->join('tbl_dbmaps', 'tbl_dbmaps.id_maps = tbl_tugas.id_maps');
        $this->db->where('tbl_tugas.id_user', $id_user);
        $query = $this->db->get();
        return $query->result();
    }

    //UPDATE
    public function update_tugas_data($id_user, $data)
    {
        // Hapus data lama berdasarkan id_user
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_tugas');

        // Masukkan data baru berdasarkan id_user
        foreach ($data as $item) {
            $this->db->insert('tbl_tugas', $item);
        }
    }

    public function delete_tugas_by_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_tugas');
    }
}
