<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load Libraries Google Maps
        $this->load->library('googlemaps');
        is_logged_in();
    }

    public function index()
    {
        $user = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $role_id = $this->session->userdata('role_id');

        if ($role_id == 1) {
            $isi = 'v_admin';
        } elseif ($role_id == 2) {
            $isi = 'v_user';
        } else {
            echo "Access Denied!";
        }

        $data = array(
            'title' => 'Dashboard',
            'user' => $user,
            'role_name' => $this->db->get_where('user_role', ['id' => $role_id])->row_array()['role'],
            'map' => $this->googlemaps->create_map(),
            'isi' => $isi
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }
}

/* End of file Admin.php */