<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelReport');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        }
        if ($this->session->userdata('level') === 'admin') {
        } else {
            redirect(base_url('home'));
        }
    }

    public function create()
    {
        $category = $this->input->post('category');
        $balance = $this->input->post('balance');
        $asal = $this->input->post('asal');
        $tanggal = $this->input->post('tanggal');
        $insert = array(
            'category' => $category,
            'balance' => $balance,
            'asal' => $asal,
            'date' => $tanggal
        );
        $this->ModelReport->input('report', $insert);
        $this->session->set_flashdata('message_success', 'Berhasil menambahkan data baru');
        redirect(base_url('admin/report'));
    }
}
