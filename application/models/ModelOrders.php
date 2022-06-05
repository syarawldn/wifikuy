<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelOrders extends CI_Model
{

    public function tampil()
    {
        return $this->db->get('orders');
    }

    public function input($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function getDataPaket()
    {
        return $this->db->query('SELECT * FROM services')->result();
    }
}
