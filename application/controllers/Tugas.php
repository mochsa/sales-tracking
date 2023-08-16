<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
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
        foreach ($tugas as $row) {
            $user_id = $row->sales;
            $id_user = $row->id_user;
            if (!isset($grouped_data[$user_id])) {
                $grouped_data[$user_id] = [
                    'sales' => $user_id,
                    'nama_toko' => [],
                    'id_user' => $id_user
                ];
            }
            $grouped_data[$user_id]['nama_toko'][] = $row->nama_toko;
        }


        $data = array(
            'title' => 'Tugas',
            'section' => 'Tambah Tugas',
            'user' => $user,
            'map' => $maps,
            'tugas' => $grouped_data,
            'isi' => 'tugas/v_lists'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    // CREATE
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sales_id = $this->input->post('sales');
            $toko_data = $this->input->post('toko');

            foreach ($toko_data as $toko_id) {
                $data = array(
                    'id_user' => $sales_id,
                    'id_maps' => $toko_id
                );
                $this->m_tugas->insert_tugas_data($data);
            }
            redirect('tugas');
        } else {
            $config = array(
                'center' => '-6.981782663363796, 110.40922272688273',
                'zoom' => '14',
                'map_height' => '600px',
                'directions' => TRUE,
            );
            $this->googlemaps->initialize($config);


            $user = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
            $maps = $this->googlemaps->create_map();
            $sales = $this->m_dbaccount->get();
            $toko = $this->m_dbmaps->lists();


            $data = array(
                'title' => 'Tugas',
                'section' => 'Tambah Tugas',
                'user' => $user,
                'map' => $maps,
                'sales' => $sales,
                'toko' => $toko,
                'isi' => 'tugas/v_add'
            );
            $this->load->view('template/v_wrapper', $data, FALSE);
        }
    }

    public function delete($id_user)
    {
        $this->m_tugas->delete_tugas_by_user($id_user);
        $this->session->set_flashdata('pesan', 'Data telah berhasil dihapus !');
        redirect('tugas');
    }
}
