<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAdmin');
        $this->load->model('ModelOrders');
        $this->load->model('ModelOrder');


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
        $data['title'] = "Paket Layanan";
        $data['package'] = $this->ModelOrders->getDataPaket();
        $this->load->view('admin/orders/index', $data);
    }

    public function new($encode = '')
    {
        if ($encode == null) {
            redirect(base_url('orders'));
        }
        $decode = base64_decode(urldecode($encode));
        $id = array('id' => $decode);
        $data['query'] = $this->db->get_where('services', $id)->result();
        $data['title'] = "Input Data Baru";
        $data['password'] = random_number(10);
        $this->load->view('admin/orders/new', $data);
    }

    public function create()
    {
        $oid = random_number(15);
        $package = $this->input->post('package');
        $name = $this->input->post('name');
        $nomor = $this->input->post('nohp');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $masa = $this->input->post('masa');
        $price = $this->input->post('price');
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y-m-d");

        $tanggal = date('Y-m-d H:i:s');
        $datepx = date_create($tanggal);
        date_add($datepx, date_interval_create_from_date_string('' . $masa . 'days'));

        $insert = array(
            'oid' => $oid,
            'user' => $username,
            'paket' => $package,
            'name' => $username,
            'password' => $password,
            'price' => $price,
            'status' => 'Active',
            'date' => $date,
            'expdate' => date_format($datepx, 'Y-m-d')
        );
        $this->ModelOrders->input('orders', $insert);
        $insert_customer = array(
            'nama' => $name,
            'email' => $email,
            'nomor' => $nomor,
            'alamat' => $alamat
        );
        $this->ModelOrders->input('customer', $insert_customer);
        $insert_user = array(
            'email' => $email,
            'nama' => $name,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'level' => 'user'
        );
        $this->ModelOrders->input('users', $insert_user);
        $this->session->set_flashdata('message_success', 'Berhasil menambahkan data baru');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <i class="fa fa-check-circle"></i>
        <b> Berhasil menambahkan data baru</b>
        <br/> 
        <b> Kode Pesanan : </b> <?php echo $oid; ?> <br/>
        <b> Paket : </b> <?php echo $package; ?><br/>
        <br/>
        <hr>
        <b> Informasi Login Customer Area </b>
        Username : $username <br/>
        Password : $password <br/>
        <hr>
        Kirimkan informasi login customer area diatas kepada customer yang sudah berlangganan layanan ini </div> '
        );
        redirect(base_url('orders'));
    }

    public function list()
    {
        $data['title'] = "List data pesanan";
        $data['content'] = $this->ModelOrders->tampil()->result();
        $this->load->view('admin/orders/list', $data);
    }

    public function detail($oid = null)
    {
        if ($oid == null) {
            redirect(base_url('orders/list'));
        }
        $data['orders'] = $this->ModelOrder->where('oid', $oid)->first();

        $data['order'] = $this->ModelOrder->where('oid', $oid)->get();

        $data['title'] = "Detail Pesanan";
        $this->load->view('admin/orders/detail', $data);
    }
}
