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
            'title' => 'Master Tugas',
            'section' => 'List Tugas',
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
            redirect('tugas/edit/' . $sales_id);
        } else {
            $tugas = $this->m_tugas->get_tugas_data();
            $toko = $this->m_dbmaps->lists();


            $config = array(
                'center' => '-6.981782663363796, 110.40922272688273',
                'zoom' => 'auto',
                'map_height' => '600px',
                'directions' => TRUE,
            );
            $this->googlemaps->initialize($config);

            foreach ($toko as $value) {
                $marker = array(
                    'position' => "{$value->latitude},{$value->longitude}",
                    'animation' => 'DROP',
                    'draggable' => false,
                    'icon' => base_url('/template/assets/img/avatar/map-pointer.png'),
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
            };


            $user = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
            $maps = $this->googlemaps->create_map();
            $sales = $this->m_dbaccount->get();


            $data = array(
                'title' => 'Tugas',
                'section' => 'Tambah Tugas',
                'user' => $user,
                'map' => $maps,
                'sales' => $sales,
                'toko' => $toko,
                'tugas' => $tugas,
                'isi' => 'tugas/v_add'
            );
            $this->load->view('template/v_wrapper', $data, FALSE);
        }
    }

    // UPDATE
    public function edit($id_user)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sales_id = $this->input->post('sales');
            $toko_data = $this->input->post('toko');

            foreach ($toko_data as $toko_id) {
                $data[] = array(
                    'id_user' => $sales_id,
                    'id_maps' => $toko_id
                );
            }

            $this->m_tugas->update_tugas_data($sales_id, $data); // Panggil fungsi update_tugas_data dengan parameter tambahan
            redirect('tugas/edit/' . $sales_id); // Redirect ke halaman edit dengan parameter id_user'
        } else {
            $id_user = $this->uri->segment(3); // Get the id_user from the URL parameter
            $tugas = $this->m_tugas->get_tugas_by_user($id_user);
            $toko = $this->m_dbmaps->lists();

            // Get the latitude and longitude values for the retrieved id_maps values
            $latlong_start = $this->m_tugas->get_latlong_by_id($tugas[0]->id_maps);
            $latlong_end = $this->m_tugas->get_latlong_by_id($tugas[count($tugas) - 1]->id_maps);
            $waypoints = array();
            for ($i = 1; $i < count($tugas) - 1; $i++) {
                $latlong_waypoint = $this->m_tugas->get_latlong_by_id($tugas[$i]->id_maps);
                $waypoints[] = "{$latlong_waypoint->latitude},{$latlong_waypoint->longitude}";
            }

            $config = array(
                'center' => '-6.981782663363796, 110.40922272688273',
                'zoom' => '14',
                'map_height' => '600px',
                'directions' => TRUE,
                'directionsStart' => "{$latlong_start->latitude},{$latlong_start->longitude}", // Use the retrieved latitude and longitude values for directionsStart
                'directionsEnd' => "{$latlong_end->latitude},{$latlong_end->longitude}", // Use the retrieved latitude and longitude values for directionsEnd
                'directionsWaypointArray' => $waypoints, // Use the retrieved latitude and longitude values for directionsWaypointArray
            );
            $this->googlemaps->initialize($config);


            $user = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
            $maps = $this->googlemaps->create_map();
            $sales = $this->m_dbaccount->get();

            $selected_sales = $id_user;
            $selected_toko_1 = $tugas[0]->id_maps;
            $selected_toko_2 = $tugas[1]->id_maps;
            $selected_toko_3 = $tugas[2]->id_maps;
            $selected_toko_4 = $tugas[3]->id_maps;
            $selected_toko_5 = $tugas[4]->id_maps;
            $selected_toko_6 = $tugas[5]->id_maps;
            $selected_toko_7 = $tugas[6]->id_maps;
            $selected_toko_8 = $tugas[7]->id_maps;
            $selected_toko_9 = $tugas[8]->id_maps;
            $selected_toko_10 = $tugas[9]->id_maps;
            $selected_toko_11 = $tugas[10]->id_maps;


            $data = array(
                'title' => 'Tugas',
                'section' => 'Edit Tugas',
                'user' => $user,
                'map' => $maps,
                'sales' => $sales,
                'toko' => $toko,
                'tugas' => $tugas,
                'selected_sales' => $selected_sales,
                'selected_toko_1' => $selected_toko_1,
                'selected_toko_2' => $selected_toko_2,
                'selected_toko_3' => $selected_toko_3,
                'selected_toko_4' => $selected_toko_4,
                'selected_toko_5' => $selected_toko_5,
                'selected_toko_6' => $selected_toko_6,
                'selected_toko_7' => $selected_toko_7,
                'selected_toko_8' => $selected_toko_8,
                'selected_toko_9' => $selected_toko_9,
                'selected_toko_10' => $selected_toko_10,
                'selected_toko_11' => $selected_toko_11,
                'isi' => 'tugas/v_edit'
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
