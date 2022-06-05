<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ticket extends CI_Controller
{
    private $id;

    function __construct()

    {
        parent::__construct();
        $this->load->model('ModelTiket');
        $this->load->model('ModelTikets');


        $onlogin = $this->session->userdata('status', 'login');
        $this->id = $this->session->userdata('username');

        if (!$onlogin) {
            redirect(base_url('login'));
            return;
        }
    }

    public function index()
    {
        $data['title'] = 'Tiket';
        $data['tiket'] = $this->ModelTiket->where('user', $this->id)
            ->orderBy('id', 'DESC')
            ->get();
        $this->load->view('ticket', $data);
    }

    public function create()
    {
        $oid = random_number(15);
        $subject = $this->input->post('subject');
        $pesan = $this->input->post('pesan');
        $date = date("Y-m-d H:i:s");
        $insert = array(
            'code' => $oid,
            'user' => $this->id,
            'subject' => $subject,
            'message' => $pesan,
            'datetime' => $date,
            'last_update' => $date,
            'status' => 'Pending'
        );
        $this->ModelTiket->input('tickets', $insert);
        $this->session->set_flashdata('message_success', 'Berhasil membuat tiket baru');
        redirect(base_url('ticket'));
    }

    public function open($id = null)
    {
        if ($id == null) {
            redirect(base_url('ticket'));
        }
        $data['title'] = "Data Tiket";
        $data['ticket'] = $this->ModelTiket->where('id', $id)->get();
        //        $data['message'] = $this->ModelTiket->where();
        $this->load->view('ticket/open', $data);
    }

    public function reply()
    {
        $post_message = $this->input->post('message');
        $target = $this->input->post('id');
        $user = $this->input->post('user');
        $date = date('Y-m-d H:i:s');

        $insert = array(
            'ticket_id' => $target,
            'sender' => 'User',
            'user' => $user,
            'message' => $post_message,
            'datetime' => $date
        );

        $update = array(
            'last_update' => $date,
            'status' => 'Waiting',
            'seen_admin' => '0',
            'seen_user' => '1'
        );



        $this->db->where('id', $target);
        $this->db->update('tickets', $update);
        $this->ModelTikets->input('tickets_message', $insert);
        $this->session->set_flashdata('message_success', 'Pesan terkirim');
        redirect('ticket/open/' . $target);
    }
}
