<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelServices');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        }
        if ($this->session->userdata('level') === 'admin') {
        } else {
            redirect(base_url('home'));
        }
    }

    public function index()
    {
        $data['packages'] = $this->ModelServices->getServices('services')->result();
        $this->load->view('pembayaran/metode', $data);
    }

    public function create()
    {
        $package = $this->input->post('package');
        $price = $this->input->post('price');
        $insert = array(
            'paket' => $package,
            'harga' => $price,
            'status' => 'Tersedia'
        );
        $this->ModelServices->input('services', $insert);
        $this->session->set_flashdata('message_success', 'Berhasil menambahkan data baru');
        redirect(base_url('admin/services'));
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->ModelServices->deleteServices('services', $where);
        $this->session->set_flashdata('message', 'Berhasil menghapus data');
        $this->session->set_flashdata('message_success', 'Berhasil menghapus data');

        redirect(base_url('admin/services'));
    }
}
