<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMetode extends CI_Model
{
    public function getBankMetode($table)
    {
        return $this->db->get($table);
    }

    public function addBankMetode($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function deleteBankMetode($table, $where)
    {
        $this->db->delete($table, $where);
    }
}
