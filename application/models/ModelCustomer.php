<?php

class ModelCustomer extends CI_Model
{
    public function d_customer()
    {
        return $this->db->get('customer');
    }
}
