<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelData extends CI_Model
{
    public function update_status()
    {
        $query = "UPDATE orders SET status = 'isolir' WHERE DATEDIFF(CURDATE(), expdate) >= 1 AND status = 'Active'";
        return $this->db->query($query);
    }

    public function update_isolir()
    {
        $query = "UPDATE orders SET status = 'Isolir' WHERE DATEDIFF(CURDATE(), expdate) >= 1 AND status = 'Suspended'";
        return $this->db->query($query);
    }
    public function cetak_invoice()
    {
        $data_isolir = $this->db->get_where('orders', array('status' => 'Active'))->result_array();
        foreach ($data_isolir as $value) {

            $user = $value['user'];
            $price = $value['price'];
            $package = $value['paket'];
            $tanggal = time();
            $date = date('Y-m-d');
            $expdate = $value['expdate'];

            if (strtotime('-20 days', strtotime($expdate)) <= date($tanggal)) {
                $oid = random_number(10);
                $invoice = "INV-$oid";

                $check_invoice = $this->db->get_where('invoice', array('user' => $user, 'status' => 'Unpaid'));
                $data_invoice = $check_invoice->num_rows() > 0;
                if ($data_invoice) {
                } else {
                    $data = [
                        'code' => $invoice,
                        'user' => $user,
                        'package' => $package,
                        'price' => $price,
                        'status' => 'Unpaid',
                        'date' => $date,
                        'expdate' => $expdate
                    ];
                    $this->db->insert('invoice', $data);
                }
            }
        }
    }
}
