<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTiket extends CI_Model
{
    public $table = 'tickets';

    public function getDataTiket($table)
    {
        return $this->db->get($table);
    }

    public function where($column, $condition)
    {
        $this->db->where($column, $condition);
        return $this;
    }

    public function data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function orderBy($column, $order = 'asc')
    {
        $this->db->order_by($column, $order);
        return $this;
    }
    public function get()
    {
        // Menghasilkan banyak row berupa objek
        return $this->db->get($this->table)->result();
    }


    public function first()
    {
        // Menghasilkan 1 row berupa objek
        return $this->db->get($this->table)->row();
    }
    public function select($columns)
    {
        // Param columns beripe array
        $this->db->select($columns);
        return $this;
    }
    public function join($table, $type = 'left')
    {
        // Param 1: table yang ingin digabungkan
        // Param 2 misal: mencari produk berdasarkan kategori --> "product.id_category = category.id"
        $this->db->join($table, "$this->table.id_$table = $table.id", $type);
        return $this;
    }

    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function input($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }
}
