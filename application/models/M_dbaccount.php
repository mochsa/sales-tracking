<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_dbaccount extends CI_Model
{

    // Get Data
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->order_by('id', 'asc');
        return $this->db->get()->result();
    }

    // Input Data
    public function input($data)
    {
        $this->db->insert('tbl_user', $data);
    }

    // Detail Data
    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    // Edit Data
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_user', $data);
    }

    // Delete Data
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('tbl_user', $data);
    }
}
