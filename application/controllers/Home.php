<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    private $id;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelService');
        $this->load->model('ModelInvoice');
        $this->load->model('ModelData');

        $onlogin = $this->session->userdata('status', 'login');
        $this->id = $this->session->userdata('username');

        if (!$onlogin) {
            redirect(base_url('login'));
            return;
        }
        if ($this->session->userdata('level') === 'admin') {
            redirect(base_url('admin'));
        } else {
        }
    }
    public function index()
    {
        $this->ModelData->cetak_invoice();
        $this->ModelData->update_status();
        $data['title'] = "Dashboard";
        $data['content'] = $this->ModelService->where('user', $this->id)
            ->orderBy('id', 'DESC')
            ->get();
        $data['invoice'] = $this->ModelInvoice->where('user', $this->id)
            ->where('status', 'Unpaid')
            ->orderBy('id', 'DESC')
            ->get();
        $this->load->view('home', $data);
    }
}
