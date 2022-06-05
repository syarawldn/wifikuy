<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{
    private $id;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelService');
        $onlogin = $this->session->userdata('status', 'login');
        $this->id = $this->session->userdata('username');

        if (!$onlogin) {
            redirect(base_url('login'));
            return;
        }
    }

    public function index()
    {
        $data['content'] = $this->ModelService->where('user', $this->id)
            ->orderBy('id', 'DESC')
            ->get();
        $data['title'] = "Cek Layanan";
        $this->load->view('service', $data);
    }
}
