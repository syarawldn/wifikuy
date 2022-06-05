<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPayment extends CI_Model
{
    public function getDataPayment($table)
    {
        return $this->db->get($table);
    }
}
