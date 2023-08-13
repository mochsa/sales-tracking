<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gmaps extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('googlemaps'); // Load Libraries Google Maps
        $this->load->model('m_dbmaps'); // Load Model
        is_logged_in();
    }

    public function index()
    {
        $dbmaps = $this->m_dbmaps->lists();

        $config = array(
            'center' => '-6.981782663363796, 110.40922272688273',
            'zoom' => 'auto',
            'map_height' => '600px',
            'directions' => TRUE,
            'directionsStart' => 'auto',
            'directionsEnd' => "{$dbmaps[0]->latitude},{$dbmaps[0]->longitude}",
            // 'directionsWaypointArray' => array(
            //     "{$dbmaps[1]->latitude},{$dbmaps[1]->longitude}",
            // ),
            'directionsWaypointsOptimize' => TRUE,
        );
        $this->googlemaps->initialize($config);

        // ------------------ Marker ------------------
        foreach ($dbmaps as $value) {
            $marker = array(
                'position' => "{$value->latitude},{$value->longitude}",
                'animation' => 'DROP',
                'infowindow_content' =>
                '<div class="card m-0" style="width:150px;">' .
                    '<div class="card-header p-0 mb-1" style="min-height: 0px;">' .
                    '<h4 style="line-height: 16px; color: #000;">' . $value->nama_maps . '</h4>' .
                    '</div>' .
                    '<hr class="m-0">' .
                    '<div class="card-body p-0 mt-1">' .
                    $value->alamat .
                    '</div>' .
                    '<div class="card-body p-0 mt-1">' .
                    '<b>No Telpon : </b>' . $value->no_telpon .
                    '</div>' .
                    '<div class="card-body p-0 mt-1">' .
                    '<b>Deskripsi : </b>' . $value->deskripsi .
                    '</div>' .
                    '</div>',
            );
            $this->googlemaps->add_marker($marker);
        }

        // Show the directions


        $data = array(
            'title' => 'Google Maps',
            'section' => 'Google Maps',
            'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
            'map' => $this->googlemaps->create_map(),
            'isi' => 'v_gmaps'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }
}

/* End of file Gmaps.php */