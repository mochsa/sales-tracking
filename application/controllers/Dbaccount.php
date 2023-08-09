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
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // Cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['overwrite'] = true;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048'; // 2MB
                $config['upload_path'] = './template/assets/img/profile/';

                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    // Delete old image
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . '/template/assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('pesangagal', $this->upload->display_errors('Foto Gagal Diupload karena '));
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('tbl_user');

            $this->session->set_flashdata('pesansukses', 'Data Berhasil Diubah');
            // $this->session->set_flashdata('pesansukses', 'Data Berhasil Diubah');
            // $this->session->set_flashdata('pesangagal', $this->upload->display_errors('<p>', '</p>'));
            // $this->m_dbaccount->edit();
            redirect('dashboard');
        }
    }
}
