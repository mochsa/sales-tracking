<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dbmaps extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load Dependencies
        $this->load->library('googlemaps');
        $this->load->model('m_dbmaps');
    }

    // Get All Data
    public function index()
    {
        $data = array(
            'title' => 'Database Maps &mdash; Sales Tracking',
            'section' => 'Database Maps',
            'map' => $this->googlemaps->create_map(),
            'dbmaps' => $this->m_dbmaps->lists(),
            'isi' => 'dbmaps/v_lists'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    // Create New Data
    public function input()
    {
        // ------------------ Google Maps ------------------
        // Config Maps
        $config = array(
            'center' => '-6.981782663363796, 110.40922272688273',
            'zoom' => '15',
            'map_height' => '600px'
        );
        // Mengeksekusi Config Maps + Show Maps
        $this->googlemaps->initialize($config);

        // Setting Markers
        $marker = array(
            'position' => '-6.981782663363796, 110.40922272688273',
            'draggable' => true,
            'ondragend' => 'setToForm(event.latLng.lat(), event.latLng.lng());'
        );
        // Mengeksekusi Markers
        $this->googlemaps->add_marker($marker);
        // ------------------ Google Maps ------------------

        // ------------------ Form Validation ------------------
        // Buatkan form validation
        $this->form_validation->set_rules('nama_maps', 'Nama Maps', 'required');
        $this->form_validation->set_rules('no_telpon', 'Nomor Telpon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        // Jika form validation gagal
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Input Database Maps &mdash; Sales Tracking',
                'section' => 'Input Database Maps',
                'map' => $this->googlemaps->create_map(),
                'isi' => 'dbmaps/v_add'
            );
            $this->load->view('template/v_wrapper', $data, FALSE);
        }

        // Jika form validation berhasil
        else {
            $data = array(
                'nama_maps' => $this->input->post('nama_maps'),
                'no_telpon' => $this->input->post('no_telpon'),
                'alamat' => $this->input->post('alamat'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'deskripsi' => $this->input->post('deskripsi')
            );
            $this->m_dbmaps->input($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');
            redirect('dbmaps');
        }
        // ------------------ Form Validation ------------------
    }
}

/* End of file Dbmaps.php */