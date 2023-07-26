<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
            'title' => 'Dashboard &mdash; Sales Tracking',
            'section' => 'Dashboard',
            'map' => $this->googlemaps->create_map(),
            'isi' => 'v_home'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }
}

/* End of file Home.php */