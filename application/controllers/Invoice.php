<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{
    private $id;

    function __construct()
    {
        parent::__construct();
        $this->load->model('ModelInvoice');
        $this->load->model('ModelPayment');


        $onlogin = $this->session->userdata('status', 'login');
        $this->id = $this->session->userdata('username');

        if (!$onlogin) {
            redirect(base_url('login'));
            return;
        }
    }

    public function index()
    {
        $data['title'] = "Data Invoice";
        $data['invoice'] = $this->ModelInvoice->where('user', $this->id)
            ->orderBy('id', 'DESC')
            ->get();
        $this->load->view('invoice/data', $data);
    }

    public function detail($code = null)
    {
        if ($code == null) {
            redirect(base_url('invoice'));
        }
        $data['title'] = "Detail Invoice #$code";
        $data['invoice'] = $this->ModelInvoice->where('code', $code)->first();
        $data['history'] = $this->ModelInvoice->where('code', $code)->get();

        $this->load->view('invoice/detail', $data);
    }

    public function payment($code = null)
    {
        if ($code == null) {
            redirect(base_url('home'));
        }

        $data['title'] = "Payment Invoice #$code";
        $data['history'] = $this->ModelInvoice->where('code', $code)->get();
        $data['bank'] = $this->db->query("SELECT * FROM `data_rekening` ")->result_array();
        $this->load->view('invoice/payment', $data);
        $this->session->set_flashdata('message', 'swal("Berhasil", "Segera lakukan pembayaran pada halaman ini", "success");');
    }

    public function list()
    {
        $data['invoice'] = $this->ModelInvoice->where('user', $this->id)
            ->orderBy('id', 'DESC')
            ->get();
        $data['title'] = "Data Invoice";
        $this->load->view('invoice/list', $data);
    }

    public function pembayaran($id = null)
    {
        if ($id == null) {
            redirect(base_url('invoice'));
        }

        $price = $this->input->post('price');
        $metode = $this->input->post('metode');
        date_default_timezone_set("Asia/Jakarta");
        $randangka = rand(000, 999);

        $totharga = $price + $randangka;
        $total = $totharga;

        $satuhari = mktime(0, 0, 0, date("n"), date("j") + 1, date("Y"));
        $expired = date("d-m-Y", $satuhari) . " " . date('H:i:s');

        $data = array(
            'metode_pembayaran' => $metode,
            'random_price' => $total,
            'exppay' => $expired
        );

        $this->db->where('code', $id);
        $this->db->update('invoice', $data);
        $sqlcek = $this->db->query("SELECT * FROM invoice LEFT JOIN data_rekening on invoice.metode_pembayaran = data_rekening.nama_bank WHERE code = '$id'")->result_array();
        $content['data'] = $sqlcek;
        $this->load->view('invoice/pembayaran', $content);
    }
}
