<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Email tidak valid!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password harus diisi!'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Login'
            ];
            $this->load->view('auth-template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth-template/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = htmlspecialchars($this->input->post('password'));

        $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

        // Jika usernya ada
        if ($user) {
            // Jika usernya aktif
            if ($user['is_active'] == 1) {
                // Cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('pesansukses', 'Selamat datang ' . $user['name'] . '!');
                    redirect('dashboard');
                    // // Cek role_id
                    // if ($user['role_id'] == 1) {
                    //     $this->session->set_flashdata('pesansukses', 'Selamat datang ' . $user['name'] . '!');
                    //     redirect('Dashboard');
                    // } else {
                    //     $this->session->set_flashdata('pesansukses', 'Selamat datang ' . $user['name'] . '!');
                    //     redirect('user');
                    // }
                } else {
                    $this->session->set_flashdata('pesangagal', 'Password salah!');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesangagal', 'Email belum diaktivasi!');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesangagal', 'Email belum terdaftar!');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Email tidak valid!',
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password harus diisi!',
            'min_length' => 'Password terlalu pendek!',
            'matches' => 'Password tidak sama!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => 'Password harus diisi!',
            'matches' => 'Password tidak sama!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Register'
            ];
            $this->load->view('auth-template/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('auth-template/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('tbl_user', $data);
            $this->session->set_flashdata('pesansukses', 'Selamat! Akun anda berhasil dibuat. Silahkan login!');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesansukses', 'Anda berhasil logout!');
        redirect('auth');
    }

    public function blocked()
    {
        echo "Access Blocked!";
    }
}
