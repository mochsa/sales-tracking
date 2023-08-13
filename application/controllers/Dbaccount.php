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

    // Edit Data
    public function edit()
    {
        $user = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $map = $this->googlemaps->create_map();


        $this->form_validation->set_rules('name', 'Full Name', 'required|trim', [
            'required' => 'Nama Lengkap Harus Diisi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Account',
                'section' => 'Edit Account',
                'user' => $user,
                'map' => $map,
                'isi' => 'dbaccount/v_edit'
            );
            $this->load->view('template/v_wrapper', $data, FALSE);
        } else {
            $this->m_dbaccount->edit();
            $this->session->set_flashdata('pesansukses', 'Data Berhasil Diubah');
            redirect('dashboard');
        }
    }
}
