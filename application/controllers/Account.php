<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');

        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        }
    }

    public function index($id = '')
    {
        if ($id == null) {
            redirect(base_url());
        }
        $data['title'] = "Pengaturan Akun";

        $data['user'] = $this->db->query("SELECT * FROM users WHERE id LIKE '" . $id . "' ")->row_array();

        $this->load->view('account/index', $data);
    }

    public function setting($id = '')
    {
        $id = $this->session->userdata('id');
        $data['title'] = "Ganti Password";
        $users = $this->db->query("SELECT password FROM users WHERE id = '" . $id . "' ")->row_array();

        $this->form_validation->set_rules('currentpassword', 'currentpassword', 'trim|required', array(
            'required' => 'Masukan Password saat ini'
        ));

        $this->form_validation->set_rules('new_password', 'new_password', 'trim|required|matches[repeat_password]', array(
            'required' => 'Masukan Password.',
            'matches' => 'Password Tidak Sama.',
        ));
        $this->form_validation->set_rules('repeat_password', 'repeat_password', 'trim|required|matches[new_password]', array(
            'required' => 'Masukan Password.',
            'matches' => 'Password Tidak Sama.',
        ));
        if ($this->form_validation->run() == false) {
            $this->load->view('account/change', $data);
        } else {
            $currentpassword = $this->input->post('currentpassword');
            $newpassword    = $this->input->post('new_password');
            if (!password_verify($currentpassword, $users['password'])) {
                $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert"> Password Sebelumnya Salah </div>');
                redirect('account/change');
            } elseif ($currentpassword == $newpassword) {
                $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert"> Password Tidak Boleh Sama Dengan Sebelumnya</div>');
                redirect('account/change');
            } else {
                $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
                $where = array('id' => $id);
                $update = array(
                    'password'      => $password_hash
                );
                $this->db->update('users', $update, $where);
                $this->session->set_flashdata('message_success', 'Password berhasil diganti !');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"></div>');
                redirect('account/index/' . $id);
            }
        }
    }
}
