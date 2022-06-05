<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ModelLogin');

        $onlogin = $this->session->userdata('status', 'login');
        if ($onlogin) {
            redirect(base_url());
            return;
        }
    }

    public function index()
    {
        $this->load->view('templates/login/header');
        $this->load->view('login');
        $this->load->view('templates/login/footer');
    }

    function auth_login()
    {
        $username = htmlspecialchars($this->input->POST('username', true));
        $password = $this->input->POST('password');

        $user = $this->ModelLogin->cekData(['username' => $username])->row_array();
        if ($user) {
            if ($user['level'] == 'admin') {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'nama' => $user['nama'],
                        'email' => $user['email'],
                        'level' => $user['level'],
                        'status' => "login"
                    ];
                    $this->session->set_userdata($data);
                    redirect(base_url('admin'));
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah !</div>');
                    $this->session->set_flashdata('message_err', 'Password Salah !');

                    redirect(base_url('login'));
                }
            } else if ($user['level'] == 'user') {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'nama' => $user['nama'],
                        'email' => $user['email'],
                        'level' => $user['level'],
                        'status' => "login"
                    ];
                    $this->session->set_userdata($data);
                    redirect(base_url('home'));
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah !</div>');
                    $this->session->set_flashdata('message_err', 'Password Salah !');

                    redirect(base_url('login'));
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Username / No Internet tidak terdaftar !</div>');
                $this->session->set_flashdata('message_err', 'Username tidak terdaftar !');

                redirect(base_url('login'));
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Username / No Internet tidak terdaftar !</div>');
            $this->session->set_flashdata('message_err', 'Username / No Internet tidak terdaftar !');

            redirect(base_url('login'));
        }
    }
}
