<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_dbaccount extends CI_Model
{

    // Get Data
    public function lists()
    {
        $this->db->select('tbl_user.*, user_role.role')
            ->from('tbl_user')
            ->join('user_role', 'tbl_user.role_id = user_role.id');

        return $this->db->get()->result_array();
    }


    // Edit Data
    public function edit()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

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
                $this->session->set_flashdata('pesangagal', $this->upload->display_errors('<p>', '</p>'));
            }
        }

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('tbl_user');
    }
}
