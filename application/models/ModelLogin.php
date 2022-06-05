<?php

class ModelLogin extends CI_Model
{
    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('users', $where);
    }
}
