<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dbmaps extends CI_Model
{

    // Get Data
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_dbmaps');
        $this->db->order_by('id_maps', 'asc');
        return $this->db->get()->result();
    }

    // Input Data
    public function input($data)
    {
        $this->db->insert('tbl_dbmaps', $data);
    }

    // Detail Data
    public function detail($id_maps)
    {
        $this->db->select('*');
        $this->db->from('tbl_dbmaps');
        $this->db->where('id_maps', $id_maps);
        return $this->db->get()->row();
    }

    // Edit Data
    public function edit($data)
    {
        $this->db->where('id_maps', $data['id_maps']);
        $this->db->update('tbl_dbmaps', $data);
    }

    // Delete Data
    public function delete($data)
    {
        $this->db->where('id_maps', $data['id_maps']);
        $this->db->delete('tbl_dbmaps', $data);
    }
}
