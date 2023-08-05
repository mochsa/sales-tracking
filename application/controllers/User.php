<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load Libraries Google Maps
        $this->load->library('googlemaps');
    }

    public function index()
    {
        $data = array(
            'title' => 'User &mdash; Sales Tracking',
            'section' => 'Sales Dashboard',
            'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
            'role_name' => $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array()['role'],
            'map' => $this->googlemaps->create_map(),
            'isi' => 'v_user'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }
}

/* End of file Admin.php */