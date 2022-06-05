<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Metode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelMetode');

        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data['metode'] = $this->ModelMetode->getBankMetode('data_rekening')->result();
        $this->load->view('pembayaran/metode', $data);
    }

    public function create()
    {
        $kode_bank = $this->input->post('kode_bank');
        $nama_bank = $this->input->post('nama_bank');
        $atas_nama = $this->input->post('atas_nama');
        $no_rekening = $this->input->post('no_rekening');
        $dataInsert = array(
            'kode_bank' => $kode_bank,
            'nama_bank' => $nama_bank,
            'atas_nama' => $atas_nama,
            'no_rekening' => $no_rekening
        );
        $this->ModelMetode->addBankMetode('data_rekening', $dataInsert);
        $this->session->set_flashdata('message', 'Berhasil menambahkan data baru');
        $this->session->set_flashdata('message_success', 'Berhasil menambahkan data baru');
        redirect(base_url('admin/metode'));
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->ModelMetode->deleteBankMetode('data_rekening', $where);
        $this->session->set_flashdata('message', 'Berhasil menghapus data');
        $this->session->set_flashdata('message_success', 'Berhasil menghapus data');

        redirect(base_url('admin/metode'));
    }
}
