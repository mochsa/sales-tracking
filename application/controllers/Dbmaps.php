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
        is_logged_in();
    }

    // Get All Data
    public function index()
    {
        $data = array(
            'title' => 'Maps',
            'section' => 'Database Maps',
            'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
            'map' => $this->googlemaps->create_map(),
            'dbmaps' => $this->m_dbmaps->lists(),
            'isi' => 'dbmaps/v_lists'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        // ------------------ Google Maps ------------------
        $config = array(
            'center' => '-6.981782663363796, 110.40922272688273',
            'zoom' => '15',
            'map_height' => '600px'
        );
        $this->googlemaps->initialize($config);
        //--------------------------------------------------
        $marker = array(
            'position' => '-6.981782663363796, 110.40922272688273',
            'animation' => 'DROP',
            'draggable' => true,
            'ondragend' => 'setToForm(event.latLng.lat(), event.latLng.lng());'
        );
        $this->googlemaps->add_marker($marker);
        //--------------------------------------------------


        // ------------------ Form Validation ------------------
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
                'section' => 'Add Maps to Database',
                'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
                'map' => $this->googlemaps->create_map(),
                'isi' => 'dbmaps/v_add'
            );
            $this->load->view('template/v_wrapper', $data, FALSE);
        }

        // Jika form validation berhasil
        else {
            $dataInsert = array(
                'nama_maps' => $this->input->post('nama_maps'),
                'no_telpon' => $this->input->post('no_telpon'),
                'alamat' => $this->input->post('alamat'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'deskripsi' => $this->input->post('deskripsi')
            );
            $this->m_dbmaps->input($dataInsert);
            $this->session->set_flashdata('pesan', 'Data telah berhasil ditambahkan !');
            redirect('dbmaps');
        }
    }

    public function edit($id_maps)
    {
        $dbmaps = $this->m_dbmaps->detail($id_maps);

        // ------------------ Google Maps ------------------
        $config = array(
            'center' => "{$dbmaps->latitude}, {$dbmaps->longitude}",
            'zoom' => '15',
            'map_height' => '600px'
        );
        $this->googlemaps->initialize($config);
        //--------------------------------------------------
        $marker = array(
            'position' => "{$dbmaps->latitude}, {$dbmaps->longitude}",
            'animation' => 'DROP',
            'draggable' => true,
            'ondragend' => 'setToForm(event.latLng.lat(), event.latLng.lng());'
        );
        $this->googlemaps->add_marker($marker);
        //--------------------------------------------------


        // ------------------ Form Validation ------------------
        $this->form_validation->set_rules('nama_maps', 'Nama Maps', 'required');
        $this->form_validation->set_rules('no_telpon', 'Nomor Telpon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        // Jika form validation gagal
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Edit Database Maps &mdash; Sales Tracking',
                'section' => 'Edit Maps',
                'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
                'map' => $this->googlemaps->create_map(),
                'dbmaps' => $this->m_dbmaps->detail($id_maps),
                'isi' => 'dbmaps/v_edit'
            );
            $this->load->view('template/v_wrapper', $data, FALSE);
        }

        // Jika form validation berhasil
        else {
            $dataInsert = array(
                'id_maps' => $id_maps, // id_maps tidak diubah, jadi tidak perlu diinput ke dalam array 'dataInsert
                'nama_maps' => $this->input->post('nama_maps'),
                'no_telpon' => $this->input->post('no_telpon'),
                'alamat' => $this->input->post('alamat'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'deskripsi' => $this->input->post('deskripsi')
            );
            $this->m_dbmaps->edit($dataInsert);
            $this->session->set_flashdata('pesan', 'Data telah berhasil diedit !');
            redirect('dbmaps');
        }
    }

    // Delete Data
    public function delete($id_maps)
    {
        $data = array('id_maps' => $id_maps);
        $this->m_dbmaps->delete($data);
        $this->session->set_flashdata('pesan', 'Data telah berhasil dihapus !');
        redirect('dbmaps');
    }
}

/* End of file Dbmaps.php */