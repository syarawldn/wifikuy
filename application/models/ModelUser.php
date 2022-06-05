<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('users', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('users', $where);
    }

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('users', $where);
    }

    public function cekUserAccess($where = null)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->limit(10, 0);
        return $this->db->get();
    }
    public function cekpass($email)
    {
      $this->db->select('password');
      $this->db->from('users');
      $this->db->where('email', $email);
      $cek = $this->db->get();
      if ($cek->num_rows()>0)
      {
        return $cek->row_array();
      } else {
        return false;
      }
    }
    public function update($email,$pass) {
      $data = array(
        'password' => $pass
      );
      $this->db->where('email',$email);
      $update = $this->db->update('users',$data);
      return true;
  }

  public function change($email, $data, $table)
  {
    $this->db->where('email',$email);
    $this->db->update($table,$data);
  }

}
