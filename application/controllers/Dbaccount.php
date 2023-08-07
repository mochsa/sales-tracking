<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dbaccount extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load Dependencies
        $this->load->library('googlemaps');
        $this->load->model('m_dbaccount');
        is_logged_in();
    }

    // Get All Data
    public function index()
    {
        $data = array(
            'title' => 'Account',
            'section' => 'Database Account',
            'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
            'map' => $this->googlemaps->create_map(),
            'dbaccount' => $this->m_dbaccount->lists(),
            'isi' => 'dbaccount/v_lists'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }
}
