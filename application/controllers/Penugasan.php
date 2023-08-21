<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penugasan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('googlemaps'); // Load Libraries Google Maps
        $this->load->model(['m_dbaccount', 'm_dbmaps', 'm_tugas']); // Load Model
        is_logged_in();
    }

    // READ
    public function index()
    {
        $user = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $maps = $this->googlemaps->create_map();
        $tugas = $this->m_tugas->get_tugas_data();


        $grouped_data = [];
        // foreach ($tugas as $row) {
        //     $user_id = $row->sales;
        //     $id_user = $row->id_user;
        //     if (!isset($grouped_data[$user_id])) {
        //         $grouped_data[$user_id] = [
        //             'sales' => $user_id,
        //             'nama_toko' => [],
        //             'id_user' => $id_user
        //         ];
        //     }
        //     $grouped_data[$user_id]['nama_toko'][] = $row->nama_toko;
        // }

        $data = array(
            'title' => 'Daftar Tugas',
            'section' => 'Daftar Tugas',
            'user' => $user,
            'map' => $maps,
            'tugas' => $tugas,
            'isi' => 'penugasan/v_lists'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }
}
