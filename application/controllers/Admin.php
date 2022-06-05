<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAdmin');
        $this->load->model('ModelUser');
        $this->load->model('ModelReport');
        $this->load->model('ModelService');
        $this->load->model('ModelServices');
        $this->load->model('ModelCustomer');
        $this->load->model('ModelInvoice');
        $this->load->model('ModelMetode');
        $this->load->model('ModelTiket');
        $this->load->model('ModelTikets');
        $this->load->model('ModelPayment');

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
        $data['users'] = $this->ModelAdmin->tampil_data()->result();
        $data['unpaid'] = $this->db->where('status', 'Unpaid')->from('invoice')->count_all_results();
        $data['paid'] = $this->db->where('status', 'Paid')->from('invoice')->count_all_results();
        $data['close'] = $this->db->where('status', 'Closed')->from('tickets')->count_all_results();
        $data['pending'] = $this->db->where('status', 'Pending')->from('tickets')->count_all_results();
        $data['title'] = "Dashboard Admin";
        $this->load->view('admin/home', $data);
    }

    public function report()
    {
        $data['report'] = $this->db->query("SELECT * FROM report group by id DESC")->result_array();
        $data['debit'] = $this->ModelReport->debit();
        $data['credit'] = $this->ModelReport->credit();
        $data['bersih'] = $this->ModelReport->bersih();
        $data['title'] = "Report Data";
        $this->load->view('admin/report', $data);
    }


    public function contacts()
    {
        $data['title'] = "Data Pelanggan";
        $data['customer'] = $this->ModelAdmin->customer()->result();
        $this->load->view('admin/contacts', $data);
    }

    public function services()
    {
        $data['packages'] = $this->ModelServices->getServices('services')->result();
        $data['title'] = "Data Layanan";
        $this->load->view('admin/services', $data);
    }

    public function ticket()
    {
        $data['title'] = "Data Tiket";
        $data['content'] = $this->ModelTiket->orderBy('id', 'DESC')->get();
        $this->load->view('admin/ticket/index', $data);
    }

    public function payment()
    {
        $data['title'] = "Pembayaran";
        $data['payment'] = $this->ModelPayment->getDataPayment('invoice')->result();
        $this->load->view('admin/pembayaran/data', $data);
    }

    function metode()
    {
        $getDataRekening = $this->ModelMetode->getBankMetode('data_rekening')->result();
        $data['metode'] = $getDataRekening;
        $data['title'] = "Metode Pembayaran";
        $this->load->view('admin/pembayaran/metode', $data);
    }

    public function account()
    {
        $data['title'] = "Pengaturan Akun";
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/account/index', $data);
    }


    public function open($id = null)
    {
        if ($id == null) {
            redirect(base_url('admin/ticket'));
        }
        $data['title'] = "Reply Tiket #$id";
        $data['ticket'] = $this->ModelTiket->where('id', $id)->get();
        $this->load->view('admin/ticket/reply', $data);
    }

    public function delete($id = null)
    {
        if ($id == null) {
            redirect(base_url());
        }
        $where = array('id' => $id);
        $this->ModelTiket->delete($where, 'tickets');
        $this->session->set_flashdata('message_success', 'Berhasil menghapus Ticket');
        redirect('admin/ticket');
    }

    public function reply()
    {

        $post_message = $this->input->post('message');
        $target = $this->input->post('id');
        $user = $this->input->post('user');
        $date = date('Y-m-d H:i:s');

        $insert = array(
            'ticket_id' => $target,
            'sender' => 'Admin',
            'message' => $post_message,
            'user' => $user,
            'datetime' => $date
        );

        $update = array(
            'last_update' => $date,
            'seen_user' => '0',
            'seen_admin' => '1',
            'status' => 'Responded'
        );
        $this->db->where('id', $target);
        $this->db->update('tickets', $update);

        $this->ModelTikets->input('tickets_message', $insert);
        $this->session->set_flashdata('message_success', 'Berhasil mengirimkan pesan');
        redirect('admin/open/' . $target);
    }

    public function changepassword()
    {
        $data['title'] = "Ganti Password";
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

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
            $this->load->view('admin/account/change', $data);
        } else {
            $currentpassword = $this->input->post('currentpassword');
            $newpassword    = $this->input->post('new_password');

            if (!password_verify($currentpassword, $data['user']['password'])) {
                $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert"> Password Sebelumnya Salah </div>');
                redirect('admin/changepassword');
            } else {
                if ($currentpassword == $newpassword) {
                    $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert"> Password Tidak Boleh Sama Dengan Sebelumnya</div>');
                    redirect('admin/changepassword');
                } else {
                    $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('users');

                    $this->session->set_flashdata('message_success', 'Password berhasil diganti !');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"></div>');
                    redirect('admin/changepassword');
                }
            }
        }
    }
}
