<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dbmaps extends CI_Model
{

    // Get Data
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('tbl_dbmaps');
        $this->db->order_by('id_maps', 'desc');
        return $this->db->get()->result();
    }

    // Input Data
    public function input($data)
    {
        $this->db->insert('tbl_dbmaps', $data);
    }
}
