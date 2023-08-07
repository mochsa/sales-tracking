<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('googlemaps'); // Load Libraries Google Maps
        is_logged_in();
    }

    public function index()
    {
        $data = array(
            'title' => 'Tugas',
            'section' => 'List Tugas',
            'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
            'map' => $this->googlemaps->create_map(),
            'isi' => 'tugas/v_lists'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }
}
