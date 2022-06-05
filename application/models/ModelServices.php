<?php

class ModelServices extends CI_Model
{

    public function tampil()
    {
        return $this->db->get('services');
    }

    public function getServices($table)
    {
        return $this->db->get($table);
    }

    public function input($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function deleteServices($table, $where)
    {
        $this->db->delete($table, $where);
    }
}
