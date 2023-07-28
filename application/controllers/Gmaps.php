<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gmaps extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load Libraries Google Maps
        $this->load->library('googlemaps');
    }

    public function index()
    {
        // ------------------ Google Maps ------------------
        $config = array(
            'center' => '-6.981782663363796, 110.40922272688273',
            'zoom' => '15',
            'map_height' => '600px'
        );
        $this->googlemaps->initialize($config);


        $data = array(
            'title' => 'Google Maps &mdash; Sales Tracking',
            'section' => 'Google Maps',
            'map' => $this->googlemaps->create_map(),
            'isi' => 'v_gmaps'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }
}

/* End of file Gmaps.php */